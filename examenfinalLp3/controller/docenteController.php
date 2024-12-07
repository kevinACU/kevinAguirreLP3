<?php
class docenteController {
    private $model;

    public function __construct() {
        include_once ($_SERVER['DOCUMENT_ROOT'].'/routes.php');
        require_once(MODEL_PATH.'docenteModel.php');
        $this->model = new docenteModel();
    }

    // Método select para listar docentes (con nombre y especialidad)
    public function select() {
        return $this->model->listar(); // Devuelve la lista de docentes
    }

    // Método insert para agregar un nuevo docente (incluyendo nombre y especialidad)
    public function insert($nombre, $especialidad) {
        $id = $this->model->insertar($nombre, $especialidad); // Llama al método insertar del modelo
        if ($id !== false) {
            header('location: ./index.php'); // Redirige al índice si la inserción es exitosa
            exit;
        } else {
            header('location: ./create.php'); // Redirige al formulario de creación si hay error
            exit;
        }
    }

    // Método update para actualizar los datos de unespecialidad docente (incluyendo nombre y especialidad)
    public function update($idDocente ,$nombre ,$especialidad) {
        return ($this->model->actualizar($idDocente,$nombre, $especialidad) != false) 
            ? header('location: ./index.php') 
            : header('location: ./edit.php?id='.$idDocente);
    }

    // Método delete para eliminar un docente
    public function delete($idDocente) {
        if ($this->model->eliminar($idDocente)) {
            header('location: ./index.php'); // Redirige al índice si la eliminación es exitosa
        } else {
            header('location: ./index.php?error=true'); // Redirige al índice con un mensaje de error
        }
        exit;
    }

    // Método search para buscar un docente por su ID (incluyendo nombre y especialidad)
    public function search($idDocente) {
        $result = $this->model->buscar($idDocente); // Llama al método buscar del modelo
        if ($result !== false) {
            return $result; // Devuelve los resultados si el docente existe
        } else {
            header('location: ./index.php'); // Redirige al índice si el docente no existe
            exit;
        }
    }

    // Combobox de docentes (con nombre y especialidad)
    public function combolistDocentes() {
        $docentes = $this->model->cargarDesplegableDocentes(); // Carga los docentes disponibles
        return $docentes !== false ? $docentes : []; // Devuelve los docentes, o un array vacío si no se encuentran
    }
}

?>
