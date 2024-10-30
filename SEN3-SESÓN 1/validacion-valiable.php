  <?php
  // Comprobación de el tipo de variables
  // En este ejemplo relizamos la comprobación del tipo de una variable para saber si es null, entero, string, flotante o booleano.
  // Utilizamos las funciones de la familia is_*** como: is_null(), is_int(), is_string(), is_double(), is_bool()
 
  $variable1;  // declaración de una variable sin asignale ningún valor
 
  // Comprobación de que le variable tiene asignado algún valor y si no lo tiene, mostrar que es null
  if (!isset($variable1)) {
  echo "La variable \$variable1 es NULL";
  }
  echo "<br />";
 
  // Comprobación que el contenido de la variable es de tipo Integer (entero).
  $variable1 = 5;  // Asignar un número entero a $variable1
  if (is_int($variable1)) {  // Comprobar si es un número entero
  echo "La variable \$variable1 es de tipo Integer.";
  }
  echo "<br />";
 
  //Comprobación que el contenido de la variable es de tipo String (caneda - texto).
  $variable1 = "Una cadena de texto";  // Asignar un string a la  variable
  if(is_string($variable1)) {  // Comprobar si es un string
  echo "La variable \$variable1 es de tipo String.";
  }
  echo "<br />";
 
  // Comprobación que el contenido de la variable es de tipo Double.
  $variable1 = 3.564;  // Asignar un tipo doble a la variable.
  if(is_double($variable1)) {  // Comprobar si es de tipo Double
  echo "La variable \$variable1 es de tipo Double.";
  }
  echo "<br />";
 
  // Comprobación que el contenido de la variable es de tipo Bool.
  $variable1 = true;  // Asignar un valor de tipo bool a la variable.
  if(is_bool($variable1)) {  // Comprobar si es de tipo bool
  echo "La variable \$variable1 es de tipo Bool.";
  }
  echo "<br />";
  ?>