<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CRUD LP3</title>

  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/datatables.min.css" rel="stylesheet">
  
  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery-3.4.1.js"></script>
  <script src="js/datatables.min.js"></script> 

</head>

<body>
  <class="container">
    <div class="row">
      <div class="col-12">
        <table class="table table-striped table-bordered table-hover" id="tablaarticulos">
          <thead>
            <tr>
              <th>Código</th>
              <th>Descripción</th>
              <th>Precio</th>
              <th>Modificar</th>
              <th>Borrar</th>
            </tr>
          </thead>
        </table>
        <button class="btn btn-sm btn-primary" id="BotonAgregar">Agregar artículo</button>
      </div>
    </div>

    <script>
      document.addEventListener("DOMContentLoaded", function() {
        
        let tabla1 = $("#tablaarticulos").DataTable({
          "ajax": {
            url: "php/articulos.php?accion=listar",
            dataSrc: ""
          },
          "columns": [{
              "data": "codigo"
            },
            {
              "data": "descripcion"
            },
            {
              "data": "precio"
            },
            {
              "data": null,
              "orderable": false
            },
            {
              "data": null,
              "orderable": false
            }
          ],
          "columnDefs": [{
            targets: 3,
            "defaultContent": "<button class='btn btn-sm btn-primary botonmodificar'>Modificar</button>",
            data: null
          }, {
            targets: 4,
            "defaultContent": "<button class='btn btn-sm btn-danger botonborrar'>Borrar</button>",
            data: null
          }],
            "language": {
              "url": "https://cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
        }
        });

      });
    </script>

</body>
</html>
