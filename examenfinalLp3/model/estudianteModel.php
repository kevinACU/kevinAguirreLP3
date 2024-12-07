<?php
class estudianteModel {
    private $PDO;

    public function __construct(){
        include_once ($_SERVER['DOCUMENT_ROOT'].'/routes.php');
        require_once(DAO_PATH.'database.php');
        $data = new dataConex();
        $this->PDO = $data->conexion();
    }

    public function insertar($nombre, $apellido, $fecha_nacimiento, $nivel_academico) {
        $sql = 'INSERT INTO estudiantes (nombre, apellido, fecha_nacimiento, nivel_academico) 
                VALUES (:nombre, :apellido, :fecha_nacimiento, :nivel_academico)';
        $statement = $this->PDO->prepare($sql);
        $statement->bindParam(':nombre', $nombre);
        $statement->bindParam(':apellido', $apellido);
        $statement->bindParam(':fecha_nacimiento', $fecha_nacimiento);
        $statement->bindParam(':nivel_academico', $nivel_academico);
        $statement->execute();
        return ($this->PDO->lastInsertId());  // Retorna el ID del nuevo estudiante insertado
    }
    
    public function actualizar($idEstudiante, $nombre, $apellido, $fecha_nacimiento, $nivel_academico) {
        $sql = 'UPDATE estudiantes 
                SET nombre = :nombre, apellido = :apellido, fecha_nacimiento = :fecha_nacimiento, nivel_academico = :nivel_academico
                WHERE idEstudiante = :idEstudiante';
        $statement = $this->PDO->prepare($sql);
        $statement->bindParam(':nombre', $nombre);
        $statement->bindParam(':apellido', $apellido);
        $statement->bindParam(':fecha_nacimiento', $fecha_nacimiento);
        $statement->bindParam(':nivel_academico', $nivel_academico);
        $statement->bindParam(':idEstudiante', $idEstudiante);
        return ($statement->execute()) ? true : false;
    }
    

    public function eliminar($idEstudiante) {
        $sql = 'DELETE FROM estudiantes WHERE idEstudiante = :idEstudiante';
        $statement = $this->PDO->prepare($sql);
        $statement->bindParam(':idEstudiante', $idEstudiante);
        return ($statement->execute()) ? true : false;
    }

    public function listar() {
        $sql = 'SELECT e.idEstudiante, e.nombre, e.apellido, e.fecha_nacimiento, e.nivel_academico
                FROM estudiantes e
                ORDER BY e.idEstudiante DESC';
        $statement = $this->PDO->prepare($sql);
        return ($statement->execute()) ? $statement->fetchAll() : false;
    }
    
    

    public function cargarDesplegable() {
        $sql = 'SELECT idCiudad, nombre FROM ciudades ORDER BY idCiudad ASC';
        $statement = $this->PDO->prepare($sql);
        return ($statement->execute()) ? $statement->fetchAll() : false;
    }

    public function buscar($idEstudiante) {
        $sql = 'SELECT e.idEstudiante, e.nombre, e.apellido, e.fecha_nacimiento, e.nivel_academico
                FROM estudiantes e
                WHERE e.idEstudiante = :idEstudiante';
        $statement = $this->PDO->prepare($sql);
        $statement->bindParam(':idEstudiante', $idEstudiante);
        return ($statement->execute()) ? $statement->fetch() : false;
    }
    
}
?>
