<?php
   include_once ($_SERVER['DOCUMENT_ROOT'].'/routes.php');
   session_start();

   if (!isset($_SESSION["usuario"])) {
       header('location: ../usuario/login.php');
   }

   require_once(CONTROLLER_PATH.'cursosController.php'); // Cambié a cursosController
   $object = new cursosController(); // Instanciamos el controlador de cursos
?>
<!DOCTYPE html>
<html lang="es">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
   <title>Agregar Curso</title> <!-- Cambié "Agregar Docente" por "Agregar Curso" -->
</head>
<body>
   <?php
       require_once(VIEW_PATH.'navbar/navbar.php');
   ?>
   <div class="container">
       <div class="mb-3">
           <h2>Agregando nuevo curso</h2> <!-- Cambié "docente" por "curso" -->
       </div>
       <form id="formCurso" action="store.php" method="post" class="g-3 needs-validation" novalidate>
           <div class="mb-3">
               <label for="nombre" class="form-label">Nombre del Curso</label> <!-- Cambié "Nombre" por "Nombre del Curso" -->
               <input type="text" class="form-control" id="nombre" name="nombre" autofocus required>
               <div class="invalid-feedback">Por favor, ingrese el nombre del curso.</div>
           </div>
           <div class="mb-3">
               <label for="descripcion" class="form-label">Descripción</label> <!-- Cambié "especialidad" por "descripcion" -->
               <input type="text" class="form-control" id="descripcion" name="descripcion" required>
               <div class="invalid-feedback">Por favor, ingrese la descripción del curso.</div>
           </div>
           <button type="submit" class="btn btn-primary btn-lg col-4">Guardar</button>
       </form>
   </div>
</body>
<script src="../../assets/js/bootstrap.bundle.min.js"></script>
<script src="../../assets/js/jquery.min.js"></script>
<script src="../../assets/js/validate.js"></script>
</html>
