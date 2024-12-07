<?php
class cursosModel {
    private $PDO;
    
    public function __construct(){
        include_once ($_SERVER['DOCUMENT_ROOT'].'/routes.php');
        require_once(DAO_PATH.'database.php');
        $data = new dataConex();
        $this->PDO = $data->conexion();
    }

    // Función para listar todos los cursos (con nombre y descripción)
    public function listar() {
        $sql = 'SELECT c.idCurso, c.nombre, c.descripcion 
                FROM cursos c
                ORDER BY c.idCurso DESC;';
        $statement = $this->PDO->prepare($sql);
        return ($statement->execute()) ? $statement->fetchAll() : false;
    }
    
    // Función para insertar un nuevo curso (incluyendo nombre y descripción)
    public function insertar($nombre, $descripcion) {
        $sql = 'INSERT INTO cursos (nombre, descripcion) 
                VALUES (:nombre, :descripcion)';
        $statement = $this->PDO->prepare($sql);
        $statement->bindParam(':nombre', $nombre);
        $statement->bindParam(':descripcion', $descripcion);
        $statement->execute();
        return ($this->PDO->lastInsertId());
    }

    // Función para actualizar un curso existente (incluyendo nombre y descripción)
    public function actualizar($idCurso, $nombre, $descripcion) {
        $sql = 'UPDATE cursos SET nombre = :nombre, descripcion = :descripcion 
                WHERE idCurso = :idCurso';
        $statement = $this->PDO->prepare($sql);
        $statement->bindParam(':nombre', $nombre);
        $statement->bindParam(':descripcion', $descripcion);
        $statement->bindParam(':idCurso', $idCurso);
        return ($statement->execute()) ? true : false;
    }

    // Función para eliminar un curso
    public function eliminar($idCurso) {
        $sql = 'DELETE FROM cursos WHERE idCurso = :idCurso';
        $statement = $this->PDO->prepare($sql);
        $statement->bindParam(':idCurso', $idCurso);
        return ($statement->execute()) ? true : false;
    }

    // Función para cargar el desplegable de cursos (ahora con nombre y descripción)
    public function cargarDesplegableCursos() {
        $sql = 'SELECT c.idCurso, CONCAT(c.nombre, " - ", c.descripcion) AS curso 
                FROM cursos c
                ORDER BY c.idCurso ASC';
        $statement = $this->PDO->prepare($sql);
        return ($statement->execute()) ? $statement->fetchAll() : false;
    }

    // Función para buscar un curso por su ID (con nombre y descripción)
    public function buscar($idCurso) {
        $sql = 'SELECT c.idCurso, c.nombre, c.descripcion
                FROM cursos c
                WHERE c.idCurso = :idCurso';
        
        $statement = $this->PDO->prepare($sql);
        $statement->bindParam(':idCurso', $idCurso);
        
        return ($statement->execute()) ? $statement->fetch() : false;
    }
}
?>
