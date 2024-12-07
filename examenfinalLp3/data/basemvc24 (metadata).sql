CREATE DATABASE IF NOT EXISTS `gestion_escolar` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

USE `gestion_escolar`;

-- --------------------------------------------------------
-- Estructura de tabla para la tabla `roles` (Roles de usuario)
-- --------------------------------------------------------

CREATE TABLE `roles` (
    `idRol` INT(11) NOT NULL AUTO_INCREMENT,
    `nombre` VARCHAR(45) NOT NULL,  -- Ejemplo: 'administrador', 'docente', 'estudiante'
    PRIMARY KEY (`idRol`),
    UNIQUE KEY `nombre` (`nombre`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

-- --------------------------------------------------------
-- Estructura de tabla para la tabla `usuarios`
-- --------------------------------------------------------

CREATE TABLE `usuarios` (
    `idUsuario` INT(11) NOT NULL AUTO_INCREMENT,
    `alias` VARCHAR(65) NOT NULL,  -- Alias para login
    `clave` VARCHAR(255) NOT NULL,  -- Clave para el usuario
    `idRol` INT(11) NOT NULL,  -- Relación con el rol del usuario
    PRIMARY KEY (`idUsuario`),
    UNIQUE KEY `alias` (`alias`),
    KEY `idRol` (`idRol`),
    CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`idRol`) REFERENCES `roles` (`idRol`) ON DELETE CASCADE
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

-- --------------------------------------------------------
-- Estructura de tabla para la tabla `estudiantes`
-- --------------------------------------------------------

CREATE TABLE `estudiantes` (
    `idEstudiante` INT(11) NOT NULL AUTO_INCREMENT,
    `nombre` VARCHAR(35) NOT NULL,
    `apellido` VARCHAR(45) NOT NULL,
    `fecha_nacimiento` DATE NOT NULL,
    `nivel_academico` VARCHAR(50) NOT NULL,
    PRIMARY KEY (`idEstudiante`),
    UNIQUE KEY `idEstudiante` (`idEstudiante`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

-- --------------------------------------------------------
-- Estructura de tabla para la tabla `docentes`
-- --------------------------------------------------------

CREATE TABLE `docentes` (
    `idDocente` INT(11) NOT NULL AUTO_INCREMENT,
    `idUsuario` INT(11) NOT NULL,  -- Relación con el usuario
    `especialidad` VARCHAR(100) NOT NULL,
    PRIMARY KEY (`idDocente`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

-- --------------------------------------------------------
-- Estructura de tabla para la tabla `cursos`
-- --------------------------------------------------------

CREATE TABLE `cursos` (
    `idCurso` INT(11) NOT NULL AUTO_INCREMENT,
    `nombre` VARCHAR(50) NOT NULL,
    `descripcion` TEXT NOT NULL,  -- Descripción del curso
    PRIMARY KEY (`idCurso`),
    UNIQUE KEY `nombre` (`nombre`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

-- --------------------------------------------------------
-- Estructura de tabla para la tabla `materias`
-- --------------------------------------------------------

CREATE TABLE `materias` (
    `idMateria` INT(11) NOT NULL AUTO_INCREMENT,
    `nombre` VARCHAR(100) NOT NULL,
    `idCurso` INT(11) NOT NULL,  -- Relación con el curso
    PRIMARY KEY (`idMateria`),
    CONSTRAINT `materias_ibfk_1` FOREIGN KEY (`idCurso`) REFERENCES `cursos` (`idCurso`) ON DELETE CASCADE
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

-- --------------------------------------------------------
-- Relación de tabla `matriculas` (Relación entre estudiantes y cursos)
-- --------------------------------------------------------

CREATE TABLE `matriculas` (
    `idMatricula` INT(11) NOT NULL AUTO_INCREMENT,
    `fecha` DATE NOT NULL,
    `idEstudiante` INT(11) NOT NULL,  -- Relación con el estudiante
    `idCurso` INT(11) NOT NULL,  -- Relación con el curso
    PRIMARY KEY (`idMatricula`),
    KEY `idEstudiante` (`idEstudiante`),
    KEY `idCurso` (`idCurso`),
    CONSTRAINT `matriculas_ibfk_1` FOREIGN KEY (`idEstudiante`) REFERENCES `estudiantes` (`idEstudiante`) ON DELETE CASCADE,
    CONSTRAINT `matriculas_ibfk_2` FOREIGN KEY (`idCurso`) REFERENCES `cursos` (`idCurso`) ON DELETE CASCADE
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

COMMIT;
