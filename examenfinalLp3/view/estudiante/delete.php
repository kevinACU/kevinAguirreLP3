<?php
   include_once ($_SERVER['DOCUMENT_ROOT'].'/routes.php');

   require_once(CONTROLLER_PATH.'estudianteController.php');
   $object = new estudianteController();

   $idEstudiante = $_REQUEST['id'];  
   $object->delete($idEstudiante);  
?>
