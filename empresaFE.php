<?php
    session_start();
    error_reporting(0);
    $varsesion = $_SESSION['email1'];
    if ($varsesion == null || $varsesion=''){
        echo 'PERMISO DENEGADO';
        die();
    }
    $idreg = $_SESSION['valorIdReg1'];
?>
<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href= "css/stylesEmpresa.css">
    <link href="https://fonts.googleapis.com/css?family=EB+Garamond&display=swap" rel="stylesheet">
  </head>
  <body>
    <header id="cabecera">
      <img id="logo" src="./img/logo.png">
      <h1 id="bienvenida">Bienvenido <br><?php echo $_SESSION['nomUser1']?></h1>
        <a id='botonLogout' href="logout.php">Cerrar Sesion</a>
        <a id='botonVacante' href='addVacanteFE.php'>Nueva Vacante</a>
    </header>
        <table id="tableVacantes">
            <tr> <th>ID</th><th>Tipo</th> <th>Puesto</th> <th>Ver/Editar</th><th>Eliminar</th></tr>
                <?php
                    echo "<br>";
                    include 'db_connect.php';
                    $connquery = OpenCon();
                    $query = $connquery -> query ("SELECT * FROM vacantes where idreg='$idreg'");

                    while ($valor = mysqli_fetch_array($query)){
                        echo "<tr><td>$valor[idvacante]</td>";
                        $tipovacante= (int)$valor[idtipovacante];
                        $valorIdVacante=(int)$valor[idvacante];
                        $connquery2 = OpenCon();
                        $query2=mysqli_query($connquery2,"SELECT descripcion FROM tipovacante where idtipovacante='$tipovacante'");
                        while ($valor2 = mysqli_fetch_array($query2)){
                            echo "<td>$valor2[descripcion]</td>";
                        }
                        CloseCon($connquery2);
                        echo "<td>$valor[titulo]</td>";

                        echo "<td><a button type='submit' id='botonEditar' href='editVacanteFE.php?valorVacante=$valorIdVacante'>Ver/Editar</abutton></td>";
                        echo "<td><a button type='submit' id='botonEditar' href='suprVacanteBE.php?valorVacante=$valorIdVacante'>Eliminar</abutton></td></tr>";
                        echo "<br>";
                    }
                    CloseCon($connquery);
                    ?>
        </table>

  </body>
</html>
