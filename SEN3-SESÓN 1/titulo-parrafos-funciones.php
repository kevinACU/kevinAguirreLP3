<?php
  // Este ejemplo crea la estructura de una página web con PHP en varias funciones
  // Posteriormente creamos varias fuciones para poder crear tíctulos con h1, h2 y párrafos con p
  
 function inicioHead ()
  {
    echo ('<!DOCTYPE html>');
    echo ('<html>');
    echo ('<head><meta charset="utf-8">');
  }
 function tituloWeb ( $tituloWeb )
  {
    echo ('<title>' . $tituloWeb . '</title>');
  }
  function finalHead ()
  {
    echo ('</head>');
  }
  
  function inicioBody ()
  {
    echo ('<body>');
  }
  
  function finalBody ()
  {
    echo ('</body></html>');
  }
  
 $tituloH1 = "<h1>Título de la web con H1</h1>";

 $subTituloH2 = "<h2>Subtítulo de la web con H2</h2>";  
 
 $parrafo1 = "<p>Este es el primer párrafo de la página web en el que simplemente incluimos un 
texto de ejemplo para que tengamos algo de contenido en nuestra página web y así podamos ver 
que el párrafo con p se ve correctamente</p>";
  
 inicioHead();
  tituloWeb('Título de la página web');
  finalHead();
  inicioBody();
  echo $tituloH1;
  echo $subTituloH2;
  echo $parrafo1;
  finalBody();
  ?>