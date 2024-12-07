<?php
   session_start();
   if (!isset($_SESSION["usuario"])) {
      header('location: ../usuario/login.php');
   }

   include_once ($_SERVER['DOCUMENT_ROOT'].'/routes.php');
   require_once(CONTROLLER_PATH.'estudianteController.php');
   $object = new estudianteController();
?>
<!DOCTYPE html>
<html lang="es">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
   <title>Form PHP</title>
</head>
<body>
   <?php
      require_once(VIEW_PATH.'navbar/navbar.php');
   ?>
   <div class="container">
      <div class="mb-3">
         <h2>Agregando nuevo registro</h2>
      </div>
      <form id="formPersona" action="store.php" method="post" class="g-3 needs-validation" novalidate>
         <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-pencil-square-o bigicon"></i></span>
            <input type="text" class="form-control" id="nombre" name="nombre" autofocus required>
            <div class="invalid-feedback">ingrese un nombre válido!</div>
         </div>
         <div class="mb-3">
            <label for="apellido" class="form-label">Apellido</label>
            <input type="text" class="form-control" id="apellido" name="apellido" required>
            <div class="invalid-feedback">ingrese un apellido válido!</div>
         </div>
         <div class="mb-3">
            <label for="nivel_academico" class="form-label">Nivel Académico</label>
            <input type="text" class="form-control" id="nivel_academico" name="nivel_academico" required>
            <div class="invalid-feedback">ingrese un nivel académico válido!</div>
         </div>
         <div class="mb-3">
            <label for="fecha_nacimiento" class="form-label">Fecha de Nacimiento</label>
            <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" required>
            <div class="invalid-feedback">ingrese una fecha válida!</div>
         </div>           
         <button type="submit" class="btn btn-primary btn-lg col-4">Guardar</button>
      </form>
   </div>
</body>
<script src="../../assets/js/bootstrap.bundle.min.js"></script>
<script src="../../assets/js/jquery.min.js"></script>
<script src="../../assets/js/validate.js"></script>
</html>
