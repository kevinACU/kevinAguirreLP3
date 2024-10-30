sesion1\02-cambios-tipos-variables.php
  <?php
  
 // Cambio de tipo de variable con la función settype();
  // En este ejemplo realizamos varios cambios de tipo de una misma variable y los vamos mostrando.
 
  $variable1 = 44;  // Declaración y asignación de un Entero.
 
  // Comprobación si la variable es de tipo entero.
  if (is_integer($variable1)) { 
 echo "La variable \$variable1 es de tipo <strong>Entero (Integer)</strong> y el 
contenido es: <strong>" . $variable1 . "</strong>.<br />";
  }
  echo "<br />";
  
 // Cambio de tipo de la variable a String.
  settype ( $variable1, 'string' );
 
  // Comprobación si la variable es de tipo String
  if (is_string($variable1)) { 
 echo "La variable \$variable1 es de tipo <strong>String</strong> y el contenido es: 
<strong>" . $variable1 . "</strong>.<br />";
  }
  echo "<br />";
 
  //Cambio de tipo de la variable a Double
  settype ( $variable1, 'double' );
 
  // Comprobación si la variable es de tipo Double
  if (is_double($variable1)) { 
 echo "La variable \$variable1 es de tipo <strong>Double</strong> y el contenido es: 
<strong>" . $variable1 . "</strong>.<br />";
 }
  echo "<br />";
 
  //Cambio de tipo de la variable a Bool
  settype ( $variable1, 'bool' );
 
  // Comprobación si la variable es de tipo Double
  if (is_bool($variable1)) { 
 echo "La variable \$variable1 es de tipo <strong>Bool</strong> y el contenido es: 
<strong>" . $variable1 . "</strong>.<br />";
  }
 
  ?>