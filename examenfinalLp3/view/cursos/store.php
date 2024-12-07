<?php
    include_once ($_SERVER['DOCUMENT_ROOT'].'/routes.php');

    require_once(CONTROLLER_PATH.'cursosController.php'); // Cambié docenteController a cursosController
    $object = new cursosController(); // Instanciamos el controlador de cursos

    $nombre = $_REQUEST['nombre'];
    $descripcion = $_REQUEST['descripcion']; // Cambié especialidad a descripcion

    $registro = $object->insert($nombre, $descripcion); // Llamamos al método insert del controlador de cursos
?>
<script>
    history.replaceState(null, null, location.pathname); // Mantiene la URL sin cambios en el historial del navegador
</script>
