<?php
class docenteModel {
    private $PDO;
    
    public function __construct(){
        include_once ($_SERVER['DOCUMENT_ROOT'].'/routes.php');
        require_once(DAO_PATH.'database.php');
        $data = new dataConex();
        $this->PDO = $data->conexion();
    }

    // Función para listar todos los docentes (con nombre y especialidad)
    public function listar() {
        $sql = 'SELECT d.idDocente, d.nombre, d.especialidad 
                FROM docentes d
                ORDER BY d.idDocente DESC;';
        $statement = $this->PDO->prepare($sql);
        return ($statement->execute()) ? $statement->fetchAll() : false;
    }
    
    // Función para insertar un nuevo docente (incluyendo nombre y especialidad)
    public function insertar($nombre, $especialidad) {
        $sql = 'INSERT INTO docentes (nombre, especialidad) 
                VALUES (:nombre, :especialidad)';
        $statement = $this->PDO->prepare($sql);
        $statement->bindParam(':nombre', $nombre);
        $statement->bindParam(':especialidad', $especialidad);
        $statement->execute();
        return ($this->PDO->lastInsertId());
    }

    // Función para actualizar un docente existente (incluyendo nombre y especialidad)
    public function actualizar($idDocente, $nombre, $especialidad) {
        $sql = 'UPDATE docentes SET nombre = :nombre, especialidad = :especialidad 
                WHERE idDocente = :idDocente';
        $statement = $this->PDO->prepare($sql);
        $statement->bindParam(':nombre', $nombre);
        $statement->bindParam(':especialidad', $especialidad);
        $statement->bindParam(':idDocente', $idDocente);
        return ($statement->execute()) ? true : false;
    }

    // Función para eliminar un docente
    public function eliminar($idDocente) {
        $sql = 'DELETE FROM docentes WHERE idDocente = :idDocente';
        $statement = $this->PDO->prepare($sql);
        $statement->bindParam(':idDocente', $idDocente);
        return ($statement->execute()) ? true : false;
    }

    // Función para cargar el desplegable de docentes (ahora con nombre y especialidad)
    public function cargarDesplegableDocentes() {
        $sql = 'SELECT d.idDocente, CONCAT(d.nombre, " - ", d.especialidad) AS docente 
                FROM docentes d
                ORDER BY d.idDocente ASC';
        $statement = $this->PDO->prepare($sql);
        return ($statement->execute()) ? $statement->fetchAll() : false;
    }

    // Función para buscar un docente por su ID (con nombre y especialidad)
    public function buscar($idDocente) {
        $sql = 'SELECT d.idDocente, d.nombre, d.especialidad
                FROM docentes d
                WHERE d.idDocente = :idDocente';
        
        $statement = $this->PDO->prepare($sql);
        $statement->bindParam(':idDocente', $idDocente);
        
        return ($statement->execute()) ? $statement->fetch() : false;
    }
}

?>
