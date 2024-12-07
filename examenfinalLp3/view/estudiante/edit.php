<?php
   include_once ($_SERVER['DOCUMENT_ROOT'].'/routes.php');
   require_once(CONTROLLER_PATH.'estudianteController.php');
   $object = new estudianteController();
   $idEstudiante = $_GET['id'];
   $estudiante = $object->search($idEstudiante);
?>
<!DOCTYPE html>
<html lang="es">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Form PHP</title>
   <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
</head>
<body>
   <?php
      require_once(VIEW_PATH.'/navbar/navbar.php');
   ?>
   <div class="container">
      <div class="mb-3">
         <h2>Editando registro</h2>
      </div>
      <form id="formPersona" action="update.php" method="post" class="g-3 needs-validation" novalidate>
         <div class="mb-3">
            <label for="id" class="form-label">ID Estudiante</label>
            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-pencil-square-o bigicon"></i></span>
            <input value="<?=$estudiante['idEstudiante']?>" type="text" class="form-control" id="id" name="id" readonly>
         </div>
         <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input value="<?=$estudiante['nombre']?>" type="text" class="form-control" id="nombre" name="nombre" autofocus required>
            <div class="invalid-feedback">Ingrese un nombre válido!</div>
         </div>
         <div class="mb-3">
            <label for="apellido" class="form-label">Apellido</label>
            <input value="<?=$estudiante['apellido']?>" type="text" class="form-control" id="apellido" name="apellido" required>
            <div class="invalid-feedback">Ingrese un apellido válido!</div>          
         </div>
         <div class="mb-3">
            <label for="fecha_nacimiento" class="form-label">Fecha de Nacimiento</label>
            <input value="<?=$estudiante['fecha_nacimiento']?>" type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" required>
            <div class="invalid-feedback">Seleccione una fecha válida!</div>          
         </div> 
         <div class="mb-3">
            <label for="nivel_academico" class="form-label">Nivel Académico</label>
            <select class="form-control" name="nivel_academico" id="nivel_academico" required>
               <option selected disabled value="">Seleccione un nivel académico</option>
               <option value="primaria" <?=($estudiante['nivel_academico'] == 'primaria') ? 'selected' : '' ?>>Primaria</option>
               <option value="secundaria" <?=($estudiante['nivel_academico'] == 'secundaria') ? 'selected' : '' ?>>Secundaria</option>
               <option value="universidad" <?=($estudiante['nivel_academico'] == 'universidad') ? 'selected' : '' ?>>Universidad</option>
            </select>
            <div class="invalid-feedback">Seleccione un nivel académico!</div>          
         </div> 
         <button type="submit" class="btn btn-primary">Actualizar</button>
      </form>
   </div>
</body>
<script src="../../assets/js/bootstrap.bundle.min.js"></script>
<script src="../../assets/js/jquery.min.js"></script>
<script src="../../assets/js/validate.js"></script>
</html>
