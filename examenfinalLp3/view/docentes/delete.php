<?php
   include_once ($_SERVER['DOCUMENT_ROOT'].'/routes.php');

   require_once(CONTROLLER_PATH.'docenteController.php');
   $object = new docenteController();

   $idDocente = $_REQUEST['id'];  
   $object->delete($idDocente);  
?>
