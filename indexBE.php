<?php
  session_start();
  error_reporting(0);


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

  /*$longitudDeLinea = 1000; #longitud por linea max 1000
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
  fclose($fileRead);*/
$count=0;
include 'db_connect.php';
$connquery = OpenCon();
$query = $connquery -> query ("SELECT * FROM register where email='$user' and password='$password'");
while ($valor = mysqli_fetch_array($query)){
  //Valores para sesiones
  $valorIdReg= (int)$valor[idreg];
  $valorIdRol= (int)$valor[idrol];
  $nomEmpresa= $valor[empresa];
  $nomUser= $valor[user];
  $email= $valor[email];
  $count ++;
  //Fin valores para sesiones
  //Si es empresa:
  if($valor[idrol] == 2){
    header("Location: empresaFE.php");
    $_SESSION['user1']=$user;
    $_SESSION['valorIdReg1']=$valorIdReg;
    $_SESSION['valorIdRol1']=$valorIdRol;
    $_SESSION['nomUser1']=$nomUser;
    $_SESSION['email1']=$email;
  }
  //Si es alumno
  if($valor[idrol] == 3){
    header("Location: exalumnoFE.php");
    $_SESSION['user2']=$user;
    $_SESSION['valorIdReg2']=$valorIdReg;
    $_SESSION['valorIdRol2']=$valorIdRol;
    $_SESSION['nomUser2']=$nomUser;
    $_SESSION['email2']=$email;
  }
  //Si es exalumno
  if($valor[idrol] == 1){
    header("Location: alumnoFE.php");
    $_SESSION['user']=$user;
    $_SESSION['valorIdReg']=$valorIdReg;
    $_SESSION['valorIdRol']=$valorIdRol;
    $_SESSION['nomUser']=$nomUser;
    $_SESSION['email']=$email;
  }
}
//Si no existe
if($count==0){
  echo "<script>alert('Usuario no valido');window.location= 'index.html'</script>";
}

CloseCon($connquery);


?>
