<?php
include_once ($_SERVER['DOCUMENT_ROOT'].'/routes.php');
require_once(CONTROLLER_PATH.'estudianteController.php');

$object = new estudianteController();

$nombre = $_REQUEST['nombre'];
$apellido = $_REQUEST['apellido'];
$fecha_nacimiento = $_REQUEST['fecha_nacimiento'];
$nivel_academico = $_REQUEST['nivel_academico'];

$registro = $object->insert($nombre, $apellido, $fecha_nacimiento, $nivel_academico);
?>
<script>
   history.replaceState(null, null, location.pathname);
</script>
