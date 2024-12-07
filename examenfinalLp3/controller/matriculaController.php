<?php
class matriculaController
{
    private $model;

    public function __construct()
    {
        include_once($_SERVER['DOCUMENT_ROOT'] . '/routes.php');
        require_once(MODEL_PATH . 'matriculaModel.php');
        $this->model = new matriculaModel();
    }

    // Método select simplificado
    public function select()
    {
        return $this->model->listar(); // No es necesario usar ternarios aquí
    }

    // Método insert
    public function insert($fecha, $idEstudiante, $idCurso)
    {
        $id = $this->model->insertar($fecha, $idEstudiante, $idCurso);
        if ($id !== false) {
            header('location: ./index.php');
            exit;
        } else {
            header('location: ./create.php');
            exit;
        }
    }

    // Método update
    // Método update para actualizar los datos de una matrícula
    public function update($id, $fecha, $idEstudiante, $idCurso)
    {
        // Llamada al modelo para actualizar los datos de la matrícula
        return ($this->model->actualizar($id, $fecha, $idEstudiante, $idCurso) !== false)
            ? header('location: ./index.php?success=true')  // Redirige con mensaje de éxito
            : header('location: ./edit.php?id=' . $id . '&error=true'); // Redirige con error si no se actualizó
        exit;
    }


    // Método delete
    public function delete($id)
    {
        if ($this->model->eliminar($id)) {
            header('location: ./index.php');
        } else {
            // Manejo de error, por ejemplo, redirigir a la página de error
            header('location: ./index.php?error=true');
        }
        exit;
    }

    // Método search
    public function search($id)
    {
        $result = $this->model->buscar($id);
        if ($result !== false) {
            return $result;
        } else {
            header('location: ./index.php');
            exit;
        }
    }

    // Combobox de Estudiantes
    public function combolistEstudiantes()
    {
        $estudiantes = $this->model->cargarDesplegableEstudiantes();
        return $estudiantes !== false ? $estudiantes : [];
    }

    // Combobox de Cursos
    public function combolistCursos()
    {
        $cursos = $this->model->cargarDesplegableCursos();
        return $cursos !== false ? $cursos : [];
    }
}
