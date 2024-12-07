<?php
    include_once ($_SERVER['DOCUMENT_ROOT'].'/routes.php');
    require_once(CONTROLLER_PATH.'cursosController.php'); // Cambié a cursosController
    $object = new cursosController(); // Instanciamos el controlador de cursos
    $rows = $object->select(); // Obtener la lista de cursos
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include_once (ROOT_PATH . 'header.php') ?>
    <title>Cursos</title> <!-- Cambié "Docentes" por "Cursos" -->
</head>
<body>
    <?php
        require_once(VIEW_PATH.'navbar/navbar.php');
    ?>
    <section class="intro">
        <div class="container">
            <div class="mb-3"></div>
            <div class="mb-3">
                <a href="create.php" class="btn btn-primary">Agregar Curso</a> <!-- Cambié "Agregar Docente" por "Agregar Curso" -->
                <a href="/view/cursos/pdf/cursos.php" class="btn btn-info">Imprimir</a>
            </div>
            <div class="table-responsive table-scroll" 
            data-mdb-perfect-scrollbar="true" style="position: relative; height:700px;">
                <table id="myTabla" class="table table-striped mb-0">
                    <thead style="background-color: #002d72;">
                        <tr>
                            <th scope="col">ID CURSO</th> <!-- Cambié "ID DOCENTE" por "ID CURSO" -->
                            <th scope="col">NOMBRE</th>
                            <th scope="col">DESCRIPCIÓN</th> <!-- Cambié "ESPECIALIDAD" por "DESCRIPCIÓN" -->
                            <th scope="col">OPERACIONES</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ((array) $rows as $row) { ?>
                        <tr>
                            <td><?=$row['idCurso']?></td> <!-- Cambié 'idDocente' por 'idCurso' -->
                            <td><?=$row['nombre']?></td>
                            <td><?=$row['descripcion']?></td> <!-- Cambié 'especialidad' por 'descripcion' -->
                            <td>
                                <a href="edit.php?id=<?=$row['idCurso']?>" class="btn btn-warning">Editar</a>
                                <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#iddel<?=$row['idCurso']?>">Eliminar</a>

                                <!-- modal para ver y eliminar -->
                                <?php 
                                    include ('viewModal.php');
                                    include ('deleteModal.php');
                                ?>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>  
        </div>  
    </section>
    <!-- div area de impresion -->
    <div class="container" id="ventana" style="display:none;">
        <div class="mb-3">
            <h2 style="font-size: 3.00rem;">Listado de Cursos</h2> <!-- Cambié "Listado de Docentes" por "Listado de Cursos" -->
        </div>
        <div class="table-responsive table-scroll" 
        data-mdb-perfect-scrollbar="true" style="position: relative; height:700px;">
        <table class="table table-striped mb-0" style="font-size: 1.50rem;">
            <thead>
                <tr>
                    <th colspan="1" scope="col">ID CURSO</th> <!-- Cambié "ID DOCENTE" por "ID CURSO" -->
                    <th colspan="3" scope="col">NOMBRE</th>
                    <th colspan="3" scope="col">DESCRIPCIÓN</th> <!-- Cambié "ESPECIALIDAD" por "DESCRIPCIÓN" -->
                </tr>
            </thead>
            <tbody>
            <?php foreach ($rows as $row) { ?>
                <tr>
                    <td colspan="1"><?=$row['idCurso']?></td>
                    <td colspan="4"><?=$row['nombre']?></td>
                    <td colspan="4"><?=$row['descripcion']?></td> <!-- Cambié "especialidad" por "descripcion" -->
                </tr>
            <?php } ?>
            </tbody>
        </table>
        </div>  
    </div>   
    <!-- fin area de impresion -->
</body>
<?php include_once (ROOT_PATH . 'footer.php')  ?>
<script>
    $(document).ready( function () {
        var table = new DataTable('#myTabla', {
            language: {
                url: '../../assets/js/es-ES.json',
            },
            'paging': true,
            lengthMenu: [
                [5, 10, 25, 50, -1],
                [5, 10, 25, 50, 'Todos']
            ] 
        });
    } );    
</script>
</html>
