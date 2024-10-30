<?php
  // Este ejemplo crea la estructura de una página web con PHP en varias funciones
  
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
 
echo ('</head>');
  function inicioBody ()
  {
    echo ('<body>');
  }
  
echo ('<body>');
  function finalBody ()
  {
    echo ('</body></html>');
  }
  
echo ('</body></html>');
  inicioHead();
  tituloWeb('Título de la página web');
  finalHead();
  inicioBody();
  
 ?>
 <h2>TEXTO DENTRO DE BODY GENERADO!</h2>
 <h4>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quaerat tenetur 
reprehenderit atque laboriosam dignissimos vero provident ex fugit consectetur facere quo 
accusantium doloribus saepe sequi voluptates, alias, ad impedit dolor!</h4>
  <?php
  finalBody();
  ?>