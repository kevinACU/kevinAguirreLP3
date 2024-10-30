<!-- Ejemplo de recogida de datos a través de un formulario html y envío de los datos
 al fichero php correspondiente para procesarlos y mostrar resultado  
 En este ejemplo utilizamos un campo de texto y un botón.
 Utilizamos $_REQUEST[] -->
  <!DOCTYPE html>
  <html>
<head>
<title>Ejemplo formulario con $_REQUEST[]</title>
 <meta charset="utf-8" />
 </head>
 <body>
 <h1>INTRODUCE TU NOMBRE</h1>
 <form method="post" action="formulario-request2.php">
 <p>
 <label for="nombre">Nombre:</label><br />
 <input type="text" id="nombre" name="nombre" />
 </p>
 <button type="submit" name="enviar" value="enviar">Enviar</button>
 </form>
 </body>
 </html>
  