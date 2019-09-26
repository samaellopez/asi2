SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "-06:00";

DROP DATABASE IF EXISTS `clinica`;
CREATE DATABASE IF NOT EXISTS `clinica` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci;
USE `clinica`;

CREATE TABLE `medicos` (
  `id_medico` int(4) NOT NULL,
  `nombres` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  -- Horarios de disponibilidad
  `inicio_turno` time NOT NULL,
  `fin_turno` time NOT NULL,
  -- Estado de disponibilidad (true(1)|false(0))
  `estado` tinyint(1) NOT NULL,
  `tel_medico` int(8) NOT NULL,
  `num_jvpm` int(5) NOT NULL,
  PRIMARY KEY(id_medico)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `pacientes` (
  `id_paciente` int(5) NOT NULL AUTO_INCREMENT,
  -- Datos personales
  `nombres` varchar(20) NOT NULL,
  `apellidos` varchar(30) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `genero` varchar(1) NOT NULL,
  `direccion` varchar(200) NOT NULL,
  -- contacto
  `correo` varchar(50) DEFAULT NULL,
  `telefono` varchar(8) NOT NULL,
  -- identificacion (opc si es menor de edad)
  `dui` varchar(10) DEFAULT '00000000-0',
  `nit` varchar(17) DEFAULT '0000-000000-000-0',
  -- Historial Medico (opc)
  `alergias` varchar(50) DEFAULT NULL,
  `medicamentos` varchar(50) DEFAULT NULL,
  -- Metadata
  `fechaRegistro` date NOT NULL,
  -- Relacion con doctor que lleva su "caso"
  `id_medico` int(4) DEFAULT NULL,
  PRIMARY KEY(id_paciente),
  FOREIGN KEY(id_medico) REFERENCES medicos(id_medico)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `estado_citas` (
  `id_estado_cita` int(1) NOT NULL PRIMARY KEY,
  `tipo_estado` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `estado_citas` (`id_estado_cita`, `tipo_estado`) VALUES
(1, 'Pendiente'),
(2, 'En proceso'),
(3, 'Cancelada'),
(4, 'Reprogramada'),
(5, 'Terminada');

-- Citas es la tabla pivote de todo el sistema.
CREATE TABLE `citas` (
  `id_cita` int(10) NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  -- Considerar regresar a tabla, por la integridad?
  `estado` int(1) NOT NULL, 
  `hora_inicio` time NOT NULL,
  `hora_fin` time NOT NULL,
  -- Motivo de la consulta. Se ingresará a la hora de *establecer* la cita
  `motivo` varchar(100) DEFAULT NULL,
  -- Observaciones que hará el doctor a la hora de la cita.
  `sintomas` varchar(200) DEFAULT NULL,
  `diagnostico` varchar(200) DEFAULT NULL,
  `tratamiento` varchar(200) DEFAULT NULL,
  -- Relaciones
  `id_medico` int(4) NOT NULL, -- hacer el idMedico el usuario del doctor.
  `id_paciente` int(5) NOT NULL, -- Este si debe de ser increment 
  PRIMARY KEY(id_cita),
  FOREIGN KEY(id_medico) REFERENCES medicos(id_medico),
  FOREIGN KEY(id_paciente) REFERENCES pacientes(id_paciente),
  FOREIGN KEY(estado) REFERENCES estado_citas(id_estado_cita)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Tabla servira para dar de baja a un usuario
CREATE TABLE `estado_usuario` (
  `id_estado_usuario` int(1) NOT NULL PRIMARY KEY,
  `tipo_estado_usuario` varchar(15) NOT NULL DEFAULT 'Activo' -- 'Activo'|'Inactivo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Tabla para roles. Establece los permisos del usuario.
-- ROLES >> 'MEDICO'|'SECRETARIA'|'ADMIN'
-- Permisos es un placeholder en tanto me invento otras cosas along the way
CREATE TABLE `roles` (
  `id_rol` int(1) NOT NULL PRIMARY KEY AUTO_INCREMENT, 
  `rol` varchar(15) NOT NULL
  -- `permisos` varchar(20) NOT NULL
);

CREATE TABLE `login` (
  `id_usuario` int(4) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL UNIQUE,
  `password` varchar(100) NOT NULL, -- Aca se almacenará el HASH de la contraseña.
  `rol` int(1) NOT NULL, -- ROLES. Permisos
  `estado` int(1) NOT NULL,
  PRIMARY KEY (id_usuario),
  FOREIGN KEY (estado) REFERENCES estado_usuario(id_estado_usuario),
  FOREIGN KEY (rol) REFERENCES roles(id_rol)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO roles VALUES (1, 'ADMIN'), (2, 'DOCTOR'), (3, 'SECRETARIA');
INSERT INTO estado_usuario VALUES (1, 'ACTIVO'), (2, 'INACTIVO');
INSERT INTO login (username, password, rol, estado) VALUES ('EVA', '12345678', '1', '1');
SELECT * FROM login;

CREATE TABLE `responsables` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `nombres` varchar(30) NOT NULL,
  `apellidos` varchar(30) NOT NULL,
  `telefono` int(8) NOT NULL,
  `correo` varchar(50) NOT NULL,
  -- Relacion con tabla pacientes
  `id_paciente` int(5) NOT NULL, 
  PRIMARY KEY(id),
  FOREIGN KEY(id_paciente) REFERENCES pacientes(id_paciente)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


