<?php
header('Content-Type: application/json');
 
require("conexion.php");
 
$conexion = retornarConexion();
 
switch ($_GET['accion']) {
    case 'listar':        
        $datos = mysqli_query($conexion, "select codigo,descripcion,precio from articulos");
        $resultado = mysqli_fetch_all($datos, MYSQLI_ASSOC);
        echo json_encode($resultado);
        break; 
        
  }
  ?>