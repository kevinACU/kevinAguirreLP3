<?php
class estudianteController {
    private $model;

    public function __construct() {
        include_once ($_SERVER['DOCUMENT_ROOT'].'/routes.php');
        require_once(MODEL_PATH.'estudianteModel.php');
        $this->model = new estudianteModel();
    }

    public function insert($nombre, $apellido, $fecha_nacimiento, $nivel_academico) {
        $id = $this->model->insertar($nombre, $apellido, $fecha_nacimiento, $nivel_academico);
        return ($id != false) ? header('location: ./index.php') : header('location: ./create.php');
    }

    
    public function update($idEstudiante,$nombre, $apellido, $fecha_nacimiento, $nivel_academico) {
        return ($this->model->actualizar($idEstudiante,$nombre, $apellido, $fecha_nacimiento, $nivel_academico) != false) 
            ? header('location: ./index.php') 
            : header('location: ./edit.php?id='.$idEstudiante);
    }

    public function delete($id) {
        return ($this->model->eliminar($id)) ? header('location: ./index.php') : header('location: ./index.php');
    }

    public function search($id) {
        return ($this->model->buscar($id) != false) ? $this->model->buscar($id) : header('location: ./index.php');
    }

    public function select() {
        return ($this->model->listar()) ? $this->model->listar() : false;
    }

    public function combolist() {
        return ($this->model->cargarDesplegable()) ? $this->model->cargarDesplegable() : false;
    }
}
?>
