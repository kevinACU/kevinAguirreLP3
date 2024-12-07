<?php
class matriculaModel {
    private $PDO;
    
    public function __construct(){
        include_once ($_SERVER['DOCUMENT_ROOT'].'/routes.php');
        require_once(DAO_PATH.'database.php');
        $data = new dataConex();
        $this->PDO = $data->conexion();
    }

    public function listar() {
        // Seleccionamos los detalles de la matrícula, estudiantes y cursos
        $sql = 'SELECT m.idMatricula, m.fecha, m.idEstudiante, e.nombre, e.apellido, c.nombre AS curso, m.idCurso
                FROM matriculas m
                JOIN estudiantes e ON m.idEstudiante = e.idEstudiante
                JOIN cursos c ON m.idCurso = c.idCurso
                ORDER BY m.idMatricula DESC;';
        $statement = $this->PDO->prepare($sql);
        return ($statement->execute()) ? $statement->fetchAll() : false;
    }
    
    public function insertar($fecha, $idEstudiante, $idCurso) {
        // Verificar si el estudiante ya está matriculado en el curso
        $checkSql = 'SELECT COUNT(*) FROM matriculas WHERE idEstudiante = :idEstudiante AND idCurso = :idCurso';
        $checkStatement = $this->PDO->prepare($checkSql);
        $checkStatement->bindParam(':idEstudiante', $idEstudiante);
        $checkStatement->bindParam(':idCurso', $idCurso);
        $checkStatement->execute();
        
        if ($checkStatement->fetchColumn() > 0) {
            // Si el estudiante ya está matriculado en ese curso, no lo insertamos
            return false;
        }
        
        // Si no está matriculado, procedemos con la inserción
        $sql = 'INSERT INTO matriculas (fecha, idEstudiante, idCurso) 
                VALUES (:fecha, :idEstudiante, :idCurso)';
        $statement = $this->PDO->prepare($sql);
        $statement->bindParam(':fecha', $fecha);
        $statement->bindParam(':idEstudiante', $idEstudiante);
        $statement->bindParam(':idCurso', $idCurso);
        $statement->execute();
        return ($this->PDO->lastInsertId());
    }

    public function actualizar($idMatricula, $fecha, $idEstudiante, $idCurso) {
        // Verificar si el idMatricula existe
        if (!$this->verificarExistenciaMatricula($idMatricula)) {
            return false; // No existe la matrícula
        }

        // Validar que la fecha esté en un formato correcto
        $fecha = date('Y-m-d', strtotime($fecha)); // Asegurarse de que la fecha esté en formato YYYY-MM-DD

        // Actualización de matrícula
        $sql = 'UPDATE matriculas SET fecha = :fecha, idEstudiante = :idEstudiante, idCurso = :idCurso 
                WHERE idMatricula = :idMatricula';
        $statement = $this->PDO->prepare($sql);
        $statement->bindParam(':fecha', $fecha);
        $statement->bindParam(':idEstudiante', $idEstudiante);
        $statement->bindParam(':idCurso', $idCurso);
        $statement->bindParam(':idMatricula', $idMatricula);

        // Ejecutar la consulta
        $success = $statement->execute();
        
        // Verificar cuántas filas fueron afectadas
        $rowsAffected = $statement->rowCount();

        if ($success && $rowsAffected > 0) {
            return true; // La actualización fue exitosa
        } else {
            return false; // No se actualizó nada
        }
    }

    public function eliminar($idMatricula) {
        // Eliminación de una matrícula
        $sql = 'DELETE FROM matriculas WHERE idMatricula = :idMatricula';
        $statement = $this->PDO->prepare($sql);
        $statement->bindParam(':idMatricula', $idMatricula);
        return ($statement->execute()) ? true : false;
    }

    public function cargarDesplegableCursos() {
        // Cargar cursos disponibles
        $sql = 'SELECT idCurso, nombre FROM cursos ORDER BY idCurso ASC';
        $statement = $this->PDO->prepare($sql);
        return ($statement->execute()) ? $statement->fetchAll() : false;
    }

    public function cargarDesplegableEstudiantes() {
        // Cargar estudiantes disponibles
        $sql = 'SELECT idEstudiante, CONCAT(nombre, " ", apellido) AS estudiante 
                FROM estudiantes ORDER BY idEstudiante ASC';
        $statement = $this->PDO->prepare($sql);
        return ($statement->execute()) ? $statement->fetchAll() : false;
    }

    public function buscar($idMatricula) {
        // Buscar matrícula específica por id
        $sql = 'SELECT m.idMatricula, m.fecha, m.idEstudiante, e.nombre AS estudiante_nombre, e.apellido AS estudiante_apellido, c.nombre AS curso, m.idCurso
                FROM matriculas m
                JOIN estudiantes e ON m.idEstudiante = e.idEstudiante
                JOIN cursos c ON m.idCurso = c.idCurso
                WHERE m.idMatricula = :idMatricula';
        
        $statement = $this->PDO->prepare($sql);
        $statement->bindParam(':idMatricula', $idMatricula);
        
        return ($statement->execute()) ? $statement->fetch() : false;
    }

    // Método para verificar la existencia de la matrícula
    private function verificarExistenciaMatricula($idMatricula) {
        $sql = 'SELECT COUNT(*) FROM matriculas WHERE idMatricula = :idMatricula';
        $statement = $this->PDO->prepare($sql);
        $statement->bindParam(':idMatricula', $idMatricula);
        $statement->execute();
        return $statement->fetchColumn() > 0;
    }
}
?>
