<?php
    include_once ($_SERVER['DOCUMENT_ROOT'].'/routes.php');

    require_once(CONTROLLER_PATH.'matriculaController.php');
    $object = new matriculaController();

    $fecha = $_REQUEST['fecha'];
    $idEstudiante = $_REQUEST['idEstudiante'];
    $idCurso = $_REQUEST['idCurso'];

    $registro = $object->insert($fecha, $idEstudiante, $idCurso);   
?>
<script>
    history.replaceState(null,null,location.pathname);
</script>
    