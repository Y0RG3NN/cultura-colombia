# Colombia en plural

Sitio educativo sobre las regiones, los sabores, los ritmos y las tradiciones de Colombia. La sección **Memorias** permite compartir y consultar recuerdos culturales almacenados en MySQL.

## Requisitos

- PHP 8.0 o posterior con las extensiones `pdo_mysql` y `mbstring`.
- MySQL o MariaDB.
- Apache (por ejemplo, XAMPP).

## Iniciar en XAMPP

1. Copia o descomprime el proyecto dentro de `C:\xampp\htdocs\cultura-colombia`.
2. Inicia **Apache** y **MySQL** desde el panel de XAMPP.
3. Importa [`database/schema.sql`](database/schema.sql) en phpMyAdmin, o ejecútalo con el cliente de MySQL. El script crea la base `cultura_colombia` y la tabla `cultural_memories`.
4. En una instalación local estándar de XAMPP, no hace falta configurar nada más. La conexión usa `127.0.0.1:3306`, la base `cultura_colombia` y el usuario local `root`.
5. Si tu MySQL tiene otro usuario, puerto o contraseña, configura las variables de entorno `DB_HOST`, `DB_PORT`, `DB_NAME`, `DB_USER` y `DB_PASSWORD` para Apache/PHP.
6. Abre [http://localhost/cultura-colombia/](http://localhost/cultura-colombia/).

En hosting, define credenciales de MySQL en variables de entorno. No publiques contraseñas, archivos `.env` ni credenciales personales en GitHub.

## Datos enviados

La tabla guarda el nombre, la región, el recuerdo y la fecha de creación. Los ocho recuerdos más recientes se muestran públicamente. El formulario explica esto antes de publicarlo; evita ingresar información personal o sensible.

## Fotografías

Las atribuciones y licencias de las fotografías aparecen junto a cada imagen en la página.
