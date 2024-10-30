  <!-- Ejemplo de recogida de datos a través de un formulario html y envío de los datos
 al fichero php correspondiente para procesarlos y mostrar resultado -->
  
 <!DOCTYPE html>
  <html>
<head>

<title>Ejemplo formulario</title>
 <meta charset="utf-8" />
 </head>
 <body>
 <h1>RELLENA EL SIGUIENTE FORMULARIO</h1>
 <form method="post" action="formulario-datos2.php">
 <p>
 <label for="nombre">Nombre:</label><br />
 <input type="text" id="nombre" name="nombre" />
 </p>
 <p>
 <label for="mensaje">Mensaje:</label><br />
 <textarea id="mensaje" name="mensaje" rows="5" cols="40"></textarea>
 </p>
 <button type="submit" name="enviar" value="enviar">Enviar</button>
 </form>
 </body>
  </html>
  