<?php
    include_once ($_SERVER['DOCUMENT_ROOT'].'/routes.php');

    // Cambié docenteController por cursosController
    require_once(CONTROLLER_PATH.'cursosController.php'); 
    $object = new cursosController();

    // Obtener los datos del formulario
    $idCurso = $_REQUEST['id']; // Cambié '$id' por 'id'
    $nombre = $_REQUEST['nombre'];
    $descripcion = $_REQUEST['descripcion']; // Cambié 'especialidad' por 'descripcion'

    // Llamamos al método de actualización del curso
    $registro = $object->update($idCurso, $nombre, $descripcion);   
?>
<script>
    history.replaceState(null, null, location.pathname);
</script>
