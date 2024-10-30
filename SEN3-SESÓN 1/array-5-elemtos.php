<?php
  // Crear un array con 5 elemementos de texto (strings) con [].
  // Posteriormente mostrar todos los elementos del array sin utilidar bucles.
  $nombres[0] = "Oscar";
  $nombres[1] = "Sara";
  $nombres[2] = "Juan";
  $nombres[3] = "Pedro";
  $nombres[4] = "Yolanda";
  
  echo "$nombres[0] " . "<br />";
  echo "$nombres[1] " . "<br />";
  echo "$nombres[2] " . "<br />";
  echo "$nombres[3] " . "<br />";
  echo "$nombres[4] " . "<br />";
  echo "<hr />";
  
 // Crear un array con 5 elemementos de texto (strings) con funcion array().
  // Posteriormente mostrar todos los elementos del array sin utilidar bucles.
  $anombres = array ("Oscar", "Sara", "Juan", "Pedro", "Yolanda");
 
  echo "$anombres[0] " . "<br />";
  echo "$anombres[1] " . "<br />";
  echo "$anombres[2] " . "<br />";
  echo "$anombres[3] " . "<br />";
  echo "$anombres[4] " . "<br />";
  echo "<hr />";
  
 // Crear un array con 5 elemementos de texto (strings) con funcion array().
 // Posteriormente mostrar todos los elementos del array con bucle foreach.
  $fnombres = array ("Oscar", "Sara", "Juan", "Pedro", "Yolanda");
 
  foreach ($fnombres as $clave=>$valor){
  echo "El contenido de \$fnombres[$clave] es : $valor " . "<br />";
  }
  echo "<hr />";
  
 // Crear un array asociativo con 5 elemementos para almacenar nombres y edades.
  // Posteriormente mostrar todos los elementos del array con bucle foreach.
 
  $edad["Oscar"] = 43;
  $edad["Sara"] = 80;
  $edad["Juan"] = 27;
  $edad["Pedro"] = 56;
  $edad["Yolanda"] = 42;
 
  foreach ($edad as $nombre=>$edad){
  echo "$nombre tiene $edad años." . "<br />";
 }
  echo "<hr />";
 
  // Crear un array asociativo con 5 elemementos para almacenar nombres y edades con la funcion array().
 // Posteriormente mostrar todos los elementos del array con bucle foreach.
  $edadf = array("Oscar"=>43, "Sara"=>80, "Juan"=>27, "Pedro"=>56, "Yolanda"=>42);
 
  foreach ($edadf as $nombre=>$edadf){
  echo "$nombre tiene $edadf años." . "<br />";
  }
  ?>