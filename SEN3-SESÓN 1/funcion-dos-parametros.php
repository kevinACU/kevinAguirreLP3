  <?php
  // Ejemplo sencillo de dos funciones para mostrar un texto de bienvenida y otro de despedida con variables
 
  // Creación de la función Bienvenida que admite un parámetro. El parámetro es $saludo
  function bienvenida( $saludo ) {
  echo $saludo;
  }
  
 // Creación de la función Despedida que admite un parámetro. El parámetro $despedida
  function despedida ( $despedida ) {
  echo $despedida;
  }
  ?>
  
 <!DOCTYPE html>
  <html>
  <head>
  <title>Ejemplo de funciones en PHP - Bienvenida</title>
  <meta charset="utf-8">
  </head>
  
 <body>
  <h1>Ejemplo de funciones en PHP</h1>
  <?php
  echo "<p>Texto de ejemplo para esta página web escrito con un echo de php</p>";
  echo "<p>A continuación llamaremos a una función que hemos definido 
anteriormente</p>";
  // Llamada a la  función con paso de parámetro variable $saludo
  $saludo = "<h1 style='text-align: center;'>Bienvenido a LP3 - Formación en Desarrollo 
Web</h1>";
  bienvenida( $saludo );
  echo "<br />";
  $despedida = "<h2 style='text-align: center'>Hasta luego!</h2>";
  despedida($despedida);
  ?>
  </body>
  </html>