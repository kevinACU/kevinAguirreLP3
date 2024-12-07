<?php
    include_once ($_SERVER['DOCUMENT_ROOT'].'/routes.php');

    require_once(CONTROLLER_PATH.'docenteController.php');
    $object = new docenteController();

    $nombre = $_REQUEST['nombre'];
    $especialidad = $_REQUEST['especialidad'];

    $registro = $object->insert($nombre, $especialidad);   
?>
<script>
    history.replaceState(null, null, location.pathname);
</script>
