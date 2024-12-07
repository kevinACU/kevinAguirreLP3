<?php
   include_once ($_SERVER['DOCUMENT_ROOT'].'/routes.php');
   session_start();

   if (!isset($_SESSION["usuario"])) {
       header('location: ../usuario/login.php');
   }

   require_once(CONTROLLER_PATH.'docenteController.php');
   $object = new docenteController();
   $docentes = $object->combolistDocentes();  // Obtenemos la lista de docentes
?>
<!DOCTYPE html>
<html lang="es">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
   <title>Agregar Docente</title>
</head>
<body>
   <?php
       require_once(VIEW_PATH.'navbar/navbar.php');
   ?>
   <div class="container">
       <div class="mb-3">
           <h2>Agregando nuevo docente</h2>
       </div>
       <form id="formPersona" action="store.php" method="post" class="g-3 needs-validation" novalidate>
           <div class="mb-3">
               <label for="nombre" class="form-label">Nombre</label>
               <input type="text" class="form-control" id="nombre" name="nombre" autofocus required>
               <div class="invalid-feedback">Por favor, ingrese el nombre del docente.</div>
           </div>
           <div class="mb-3">
               <label for="especialidad" class="form-label">Especialidad</label>
               <input type="text" class="form-control" id="especialidad" name="especialidad" required>
               <div class="invalid-feedback">Por favor, ingrese la especialidad del docente.</div>
           </div>
           <button type="submit" class="btn btn-primary btn-lg col-4">Guardar</button>
       </form>
   </div>
</body>
<script src="../../assets/js/bootstrap.bundle.min.js"></script>
<script src="../../assets/js/jquery.min.js"></script>
<script src="../../assets/js/validate.js"></script>
</html>
