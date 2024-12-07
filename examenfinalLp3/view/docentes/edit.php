<?php
   include_once ($_SERVER['DOCUMENT_ROOT'].'/routes.php');
   require_once(CONTROLLER_PATH.'docenteController.php');
   $object = new docenteController();
   $idDocente = $_GET['id']; // Obtener el ID del docente
   $docente = $object->search($idDocente); // Obtener los datos del docente por ID
?>
<!DOCTYPE html>
<html lang="es">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Editar Docente</title>
   <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
</head>
<body>
   <?php
      require_once(VIEW_PATH.'/navbar/navbar.php');
   ?>
   <div class="container">
      <div class="mb-3">
         <h2>Editando docente</h2>
      </div>
      <form id="formPersona" action="update.php" method="post" class="g-3 needs-validation" novalidate>
         <div class="mb-3">
            <label for="id" class="form-label">ID Docente</label>
            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-pencil-square-o bigicon"></i></span>
            <input value="<?=$docente['idDocente']?>" type="text" class="form-control" id="id" name="id" readonly>
         </div>
         <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input value="<?=$docente['nombre']?>" type="text" class="form-control" id="nombre" name="nombre" autofocus required>
            <div class="invalid-feedback">Ingrese un nombre válido!</div>
         </div>
         <div class="mb-3">
            <label for="especialidad" class="form-label">Especialidad</label>
            <input value="<?=$docente['especialidad']?>" type="text" class="form-control" id="especialidad" name="especialidad" required>
            <div class="invalid-feedback">Ingrese una especialidad válida!</div>          
         </div>
         <button type="submit" class="btn btn-primary">Actualizar</button>
      </form>
   </div>
</body>
<script src="../../assets/js/bootstrap.bundle.min.js"></script>
<script src="../../assets/js/jquery.min.js"></script>
<script src="../../assets/js/validate.js"></script>
</html>
