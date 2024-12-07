<?php
   include_once ($_SERVER['DOCUMENT_ROOT'].'/routes.php');
   session_start();

   // Verifica si el usuario está autenticado
   if (!isset($_SESSION["usuario"])) {
       header('location: ../usuario/login.php');
       exit(); // Detener el script si no está autenticado
   }

   $Usuario = $_SESSION["usuario"];
   require_once(CONTROLLER_PATH.'matriculaController.php');
   $object = new matriculaController();
   $idMatricula = $_GET['id'];

   // Verifica si se encontró la matrícula
   $matricula = $object->search($idMatricula);
   if (!$matricula) {
       // Maneja el caso de error si no se encuentra la matrícula
       echo "Matrícula no encontrada.";
       exit();
   }

   // Obtener los datos para los combos de estudiantes y cursos
   $estudiantes = $object->combolistEstudiantes();
   $cursos = $object->combolistCursos();
?>

<!DOCTYPE html>
<html lang="es">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
   <title>Matriculas</title>
</head>
<body>
   <?php require_once(VIEW_PATH.'navbar/navbar.php'); ?>
   <div class="container">
      <div class="mb-3">
         <h2>Editando registro</h2>
      </div>
      <form id="formPersona" action="update.php" method="post" class="g-3 needs-validation" novalidate>
         <div class="mb-3">
            <label for="id" class="form-label">ID Matricula</label>
            <input value="<?=$matricula['idMatricula']?>" type="text" class="form-control" id="id" name="id" readonly>
         </div>
         <div class="mb-3">
            <label for="fecha" class="form-label">Fecha</label>
            <input value="<?=$matricula['fecha']?>" type="date" class="form-control" id="fecha" name="fecha" autofocus required>
            <div class="invalid-feedback">Ingrese o seleccione una fecha válida.</div>
         </div>
         <div class="mb-3">
            <label for="idEstudiante" class="form-label">Estudiante</label>
            <select class="form-control" name="idEstudiante" id="idEstudiante" required>
               <option selected disabled value="">No especificado</option>
               <?php foreach ($estudiantes as $estudiante) { 
                   $selected = ($matricula['idEstudiante'] == $estudiante['idEstudiante']) ? 'selected' : '';
               ?>
                  <option value="<?=$estudiante['idEstudiante']?>" <?=$selected?>><?=$estudiante['estudiante']?></option>
               <?php } ?>
            </select>
            <div class="invalid-feedback">Seleccione un estudiante válido.</div>
         </div>
         <div class="mb-3">
            <label for="idCurso" class="form-label">Curso</label>
            <select class="form-control" name="idCurso" id="idCurso" required>
               <option selected disabled value="">No especificado</option>
               <?php foreach ($cursos as $curso) { 
                   $selected = ($matricula['idCurso'] == $curso['idCurso']) ? 'selected' : '';
               ?>
                  <option value="<?=$curso['idCurso']?>" <?=$selected?>><?=$curso['nombre']?></option>
               <?php } ?>
            </select>
            <div class="invalid-feedback">Seleccione un curso válido.</div>
         </div>
         <button type="submit" class="btn btn-primary btn-lg col-4">Guardar</button>
      </form>
   </div>
</body>
<script src="../../assets/js/bootstrap.bundle.min.js"></script>
<script src="../../assets/js/jquery.min.js"></script>
<script src="../../assets/js/validate.js"></script>
</html>
