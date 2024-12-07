<?php
    include_once ($_SERVER['DOCUMENT_ROOT'].'/routes.php');

    require_once(CONTROLLER_PATH.'matriculaController.php');
    $object = new matriculaController();

    // Obtener los parámetros de la URL y la solicitud
    $idMatricula = $_GET['id']; // Asegúrate de que el parámetro 'id' esté en la URL
    $fecha = $_REQUEST['fecha']; // Fecha de la matrícula
    $idEstudiante = $_REQUEST['idEstudiante']; // ID del estudiante
    $idCurso = $_REQUEST['idCurso']; // ID del curso

    // Llamar al método update del controlador
    $object->update($idMatricula, $fecha, $idEstudiante, $idCurso); // El controlador se encarga de la redirección
?>

<script>
    history.replaceState(null, null, location.pathname); // Evitar que el formulario se vuelva a enviar si se actualiza la página
</script>
