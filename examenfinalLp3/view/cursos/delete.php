<?php
   include_once ($_SERVER['DOCUMENT_ROOT'].'/routes.php');

   require_once(CONTROLLER_PATH.'cursosController.php');
   $object = new cursosController();

   $idCurso = $_REQUEST['id'];  
   $object->delete($idCurso);  
?>
