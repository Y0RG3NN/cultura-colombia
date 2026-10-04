CREATE DATABASE IF NOT EXISTS cultura_colombia
  CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci;

USE cultura_colombia;

CREATE TABLE IF NOT EXISTS cultural_memories (
  id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  name VARCHAR(60) NOT NULL,
  region ENUM('Andina', 'Caribe', 'Pacífica', 'Orinoquía', 'Amazonía', 'Insular') NOT NULL,
  memory VARCHAR(500) NOT NULL,
  created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id),
  INDEX idx_cultural_memories_created_at (created_at, id)
) ENGINE=InnoDB
  DEFAULT CHARSET=utf8mb4
  COLLATE=utf8mb4_unicode_ci;
