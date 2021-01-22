<?php

  #Registro de datos
  if(isset($_POST['user'])){
    $user = $_POST['user'];
  }
  if (isset($_POST['password'])){
    $password = $_POST['password'];
  }
  else {
    echo ('Error');
  }


  $longitudDeLinea = 1000; #longitud por linea max 1000
  $delimiter = ","; # Separador de columnas(igual que el de csv)
  $myFile = "dictionari.csv"; #Ruta del archivo
  # Abrimos el archivo
  $fileRead = fopen($myFile, "r");
  if (!$fileRead) {
      exit("No se puede abrir el archivo $myFile");
  }
  $count = 0;
  $numeroDeFila=0;
  #Comenzamos a leer el csv por filas
  while (($fila = fgetcsv($fileRead, $longitudDeLinea, $delimiter)) !== false) {
    #Solo leemos el campo de la fila que le indicamos, en este caso será la columna de user y de password a partir de la segunda fila para no leer la cabecera
    if ($user == $fila[0] && $password == $fila[3] && $numeroDeFila>0){
      $count++;
    }
    $numeroDeFila++;
  }

  if ($count > 0){
    echo ("Bienvenido");
  }
  else {
    echo ("Usuario no registrado");
  }

  fclose($fileRead);

?>
