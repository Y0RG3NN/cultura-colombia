<?php

header('Content-Type: application/json; charset=utf-8');
header('Cache-Control: no-store');

function respond(int $status, array $body): void
{
    http_response_code($status);
    echo json_encode($body, JSON_UNESCAPED_UNICODE | JSON_INVALID_UTF8_SUBSTITUTE);
    exit;
}

session_set_cookie_params([
    'httponly' => true,
    'samesite' => 'Strict',
    'secure' => !empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off',
]);
session_start();

$method = $_SERVER['REQUEST_METHOD'] ?? '';

if ($method !== 'GET' && $method !== 'POST') {
    header('Allow: GET, POST');
    respond(405, ['error' => 'Método no permitido.']);
}

if ($method === 'POST') {
    $csrfToken = $_SERVER['HTTP_X_CSRF_TOKEN'] ?? '';
    $contentType = $_SERVER['CONTENT_TYPE'] ?? '';

    if (
        !is_string($csrfToken)
        || !isset($_SESSION['culture_csrf_token'])
        || !hash_equals($_SESSION['culture_csrf_token'], $csrfToken)
    ) {
        respond(403, ['error' => 'La sesión expiró. Recarga la página e inténtalo de nuevo.']);
    }

    if (stripos($contentType, 'application/json') !== 0) {
        respond(415, ['error' => 'El formulario tiene un formato no válido.']);
    }

    try {
        $payload = json_decode(file_get_contents('php://input'), true, 512, JSON_THROW_ON_ERROR);
    } catch (JsonException $exception) {
        respond(400, ['error' => 'No se pudo leer el recuerdo enviado.']);
    }

    if (!is_array($payload)) {
        respond(422, ['error' => 'Completa los tres campos del recuerdo.']);
    }

    $name = $payload['name'] ?? null;
    $region = $payload['region'] ?? null;
    $memory = $payload['memory'] ?? null;
    $regions = ['Andina', 'Caribe', 'Pacífica', 'Orinoquía', 'Amazonía', 'Insular'];

    if (!is_string($name) || !is_string($region) || !is_string($memory)) {
        respond(422, ['error' => 'Completa los tres campos del recuerdo.']);
    }

    $name = trim($name);
    $memory = trim($memory);

    if (
        $name === ''
        || mb_strlen($name, 'UTF-8') > 60
        || preg_match('/[\x00-\x1F\x7F]/', $name)
    ) {
        respond(422, ['error' => 'Escribe un nombre de hasta 60 caracteres.']);
    }

    if (!in_array($region, $regions, true)) {
        respond(422, ['error' => 'Elige una de las regiones disponibles.']);
    }

    $memoryLength = mb_strlen($memory, 'UTF-8');
    if (
        $memoryLength < 10
        || $memoryLength > 500
        || preg_match('/[\x00-\x08\x0B\x0C\x0E-\x1F\x7F]/', $memory)
    ) {
        respond(422, ['error' => 'El recuerdo debe tener entre 10 y 500 caracteres.']);
    }
}

try {
    $pdo = require __DIR__ . '/../config/database.php';

    if ($method === 'GET') {
        $statement = $pdo->query(
            'SELECT name, region, memory, created_at
             FROM cultural_memories
             ORDER BY created_at DESC, id DESC
             LIMIT 8'
        );
        $memories = array_map(
            static function (array $row): array {
                $row['created_at'] = (new DateTimeImmutable($row['created_at']))->format('d/m/Y');
                return $row;
            },
            $statement->fetchAll()
        );

        respond(200, ['memories' => $memories]);
    }

    $statement = $pdo->prepare(
        'INSERT INTO cultural_memories (name, region, memory)
         VALUES (:name, :region, :memory)'
    );
    $statement->execute([
        'name' => $name,
        'region' => $region,
        'memory' => $memory,
    ]);

    respond(201, [
        'memory' => [
            'name' => $name,
            'region' => $region,
            'memory' => $memory,
            'created_at' => (new DateTimeImmutable())->format('d/m/Y'),
        ],
    ]);
} catch (PDOException $exception) {
    error_log('Cultura Colombia database error: ' . $exception->getMessage());
    respond(503, ['error' => 'La base de datos no está disponible. Verifica la configuración de MySQL en README.md.']);
}
