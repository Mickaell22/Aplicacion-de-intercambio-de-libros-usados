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


-- Intercambios
CREATE TABLE intercambios (
    id INT PRIMARY KEY AUTO_INCREMENT,
    fechaintercambio DATE NOT NULL,
    fecharegistro DATETIME DEFAULT CURRENT_TIMESTAMP,
    usuario_id INT NOT NULL, -- Columna para la clave foránea
    ubicacion VARCHAR(255) NOT NULL,
    calificacion TINYINT CHECK (calificacion BETWEEN 1 AND 5),
    estado ENUM('pendiente', 'realizado', 'cancelado') DEFAULT 'pendiente',
    metodo ENUM('presencial', 'envio') DEFAULT 'presencial',
    FOREIGN KEY (usuario_id) REFERENCES Usuarios(id) -- Definición de la clave foránea
) ENGINE=InnoDB;

-- denuncias
CREATE TABLE denuncias (
    id INT PRIMARY KEY AUTO_INCREMENT,
    libro_id INT NOT NULL,
    usuario_id INT NOT NULL,
    tipo VARCHAR(50) NOT NULL,
    descripcion TEXT NOT NULL,
    evidencia VARCHAR(255),
    fecha_incidente DATE NOT NULL,
    fecha_registro DATETIME DEFAULT CURRENT_TIMESTAMP,
    estado ENUM('pendiente', 'revisada', 'resuelta') DEFAULT 'pendiente',
    FOREIGN KEY (libro_id) REFERENCES libros(id),
    FOREIGN KEY (usuario_id) REFERENCES Usuarios(id)
);

-- tabla categoria
CREATE TABLE categoria (
    cat_id INT AUTO_INCREMENT PRIMARY KEY,
    cat_nombre VARCHAR(100) NOT NULL,
    cat_descripcion TEXT,
    cat_estado BOOLEAN NOT NULL DEFAULT TRUE
);

-- tabla articulo
CREATE TABLE articulo (
    art_id INT PRIMARY KEY AUTO_INCREMENT,
    art_titulo VARCHAR(255) NOT NULL,
    art_introduccion TEXT NOT NULL,
    art_descripcion TEXT NOT NULL,
    art_conclusion TEXT NOT NULL,
    art_estado BOOLEAN NOT NULL DEFAULT TRUE,
    cat_id INT NOT NULL,
    art_imagen TEXT,
    art_usuarioId INT NOT NULL,
    art_fecha DATETIME NOT NULL,
    art_ref TEXT,
    art_autores TEXT NOT NULL,
    FOREIGN KEY (art_usuarioId) REFERENCES Usuarios(id),
    FOREIGN KEY (cat_id) REFERENCES categoria(cat_id)
);

-- Insert
-- Libro
-- 

-- usuario
INSERT INTO Usuarios (nombre, apellido, nombre_usuario, numero_celular, pais, ubicacion, fecha_nacimiento, genero, correo_electronico, contrasena)
VALUES ('Micka', 'González', 'micka123', '0987654321', 'Ecuador', 'Quito', '1999-01-01', 'Masculino', 'micka@gmail.com', '1234');



