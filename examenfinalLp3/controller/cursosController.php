<?php
class cursosController {
    private $model;

    public function __construct() {
        include_once ($_SERVER['DOCUMENT_ROOT'].'/routes.php');
        require_once(MODEL_PATH.'cursosModel.php'); // Se cambia a cursosModel
        $this->model = new cursosModel(); // Se usa el modelo de cursos
    }

    // Método select para listar cursos (con nombre y descripción)
    public function select() {
        return $this->model->listar(); // Devuelve la lista de cursos
    }

    // Método insert para agregar un nuevo curso (incluyendo nombre y descripción)
    public function insert($nombre, $descripcion) {
        $id = $this->model->insertar($nombre, $descripcion); // Llama al método insertar del modelo
        if ($id !== false) {
            header('location: ./index.php'); // Redirige al índice si la inserción es exitosa
            exit;
        } else {
            header('location: ./create.php'); // Redirige al formulario de creación si hay error
            exit;
        }
    }

    // Método update para actualizar los datos de un curso (incluyendo nombre y descripción)
    public function update($idCurso, $nombre, $descripcion) {
        return ($this->model->actualizar($idCurso, $nombre, $descripcion) != false) 
            ? header('location: ./index.php') 
            : header('location: ./edit.php?id='.$idCurso); // Redirige a edit si hay error
    }

    // Método delete para eliminar un curso
    public function delete($idCurso) {
        if ($this->model->eliminar($idCurso)) {
            header('location: ./index.php'); // Redirige al índice si la eliminación es exitosa
        } else {
            header('location: ./index.php?error=true'); // Redirige al índice con un mensaje de error
        }
        exit;
    }

    // Método search para buscar un curso por su ID (con nombre y descripción)
    public function search($idCurso) {
        $result = $this->model->buscar($idCurso); // Llama al método buscar del modelo
        if ($result !== false) {
            return $result; // Devuelve los resultados si el curso existe
        } else {
            header('location: ./index.php'); // Redirige al índice si el curso no existe
            exit;
        }
    }

    // Combobox de cursos (con nombre y descripción)
    public function combolistCursos() {
        $cursos = $this->model->cargarDesplegableCursos(); // Carga los cursos disponibles
        return $cursos !== false ? $cursos : []; // Devuelve los cursos, o un array vacío si no se encuentran
    }
}
?>
