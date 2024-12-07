<?php
   include_once ($_SERVER['DOCUMENT_ROOT'].'/routes.php');
   require_once(CONTROLLER_PATH.'cursosController.php'); // Cambié docenteController a cursosController
   $object = new cursosController(); // Instanciamos el controlador de cursos

   $idCurso = $_GET['id']; // Obtener el ID del curso
   $curso = $object->search($idCurso); // Obtener los datos del curso por ID
?>
<!DOCTYPE html>
<html lang="es">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Editar Curso</title>
   <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
</head>
<body>
   <?php
      require_once(VIEW_PATH.'/navbar/navbar.php');
   ?>
   <div class="container">
      <div class="mb-3">
         <h2>Editando curso</h2>
      </div>
      <form id="formCurso" action="update.php" method="post" class="g-3 needs-validation" novalidate>
         <div class="mb-3">
            <label for="id" class="form-label">ID Curso</label>
            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-pencil-square-o bigicon"></i></span>
            <input value="<?=$curso['idCurso']?>" type="text" class="form-control" id="id" name="id" readonly>
         </div>
         <div class="mb-3">
            <label for="nombre" class="form-label">Nombre del Curso</label>
            <input value="<?=$curso['nombre']?>" type="text" class="form-control" id="nombre" name="nombre" autofocus required>
            <div class="invalid-feedback">Ingrese un nombre válido para el curso.</div>
         </div>
         <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <input value="<?=$curso['descripcion']?>" type="text" class="form-control" id="descripcion" name="descripcion" required>
            <div class="invalid-feedback">Ingrese una descripción válida para el curso.</div>          
         </div>
         <button type="submit" class="btn btn-primary">Actualizar</button>
      </form>
   </div>
</body>
<script src="../../assets/js/bootstrap.bundle.min.js"></script>
<script src="../../assets/js/jquery.min.js"></script>
<script src="../../assets/js/validate.js"></script>
</html>
