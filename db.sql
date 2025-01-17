-- Aqui deberan meter las tablas
DROP DATABASE IF EXISTS `proyecto_daw`;
CREATE DATABASE IF NOT EXISTS `proyecto_daw` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `proyecto_daw`;

-- Tablas
-- Libro
CREATE TABLE libros (
    id INT PRIMARY KEY AUTO_INCREMENT,
    titulo VARCHAR(255) NOT NULL,
    autor VARCHAR(255) NOT NULL,
    genero VARCHAR(50) NOT NULL,
    anio INT,
    editorial VARCHAR(255),
    descripcion TEXT,
    imagen VARCHAR(255),
    estado ENUM('pendiente', 'aprobado', 'rechazado') DEFAULT 'pendiente',
    usuario_id INT NOT NULL,
    fecha_registro DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (usuario_id) REFERENCES Usuarios(id)
);

-- usuario
CREATE TABLE Usuarios (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(50),
    apellido VARCHAR(50),
    nombre_usuario VARCHAR(50) UNIQUE,
    numero_celular VARCHAR(15),
    pais VARCHAR(50),
    ubicacion VARCHAR(100),
    fecha_nacimiento DATE,
    genero ENUM('Masculino', 'Femenino', 'Otro'),
    correo_electronico VARCHAR(100) UNIQUE,
    contrasena VARCHAR(255)
);
ALTER TABLE Usuarios
ADD COLUMN rol ENUM('admin', 'usuario') NOT NULL DEFAULT 'usuario';



-- Insert
-- Libro
-- 

-- usuario
INSERT INTO Usuarios (nombre, apellido, nombre_usuario, numero_celular, pais, ubicacion, fecha_nacimiento, genero, correo_electronico, contrasena)
VALUES ('Micka', 'González', 'micka123', '0987654321', 'Ecuador', 'Quito', '1999-01-01', 'Masculino', 'micka@gmail.com', '1234');



