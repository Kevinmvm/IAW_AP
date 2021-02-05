<?php
session_start();
$varsesion = $_SESSION['email'];
if ($varsesion == null || $varsesion=''){
    echo 'PERMISO DENEGADO';
    die();
}
$idreg = $_SESSION['valorIdReg'];

?>
<!DOCTYPE html>
<html lang="es" dir="ltr">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href= "css/stylesEmpresaFR.css">
    <link href="https://fonts.googleapis.com/css?family=EB+Garamond&display=swap" rel="stylesheet">
</head>
<body>
<header id="cabecera">
    <img id="logo" src="./img/logo.png">
    <h1 id="bienvenida">Bienvenido <br><?php echo $_SESSION['nomUser']?></h1>
    <a id='botonLogout' href="logout.php">Cerrar Sesion</a>
</header>
<table id="tableVacantes">
    <tr> <th>Tipo</th> <th>Empresa</th> <th>Puesto</th> <th>Ver</th><th>Optar</th></tr>
    <?php
    echo "<br>";
    include 'db_connect.php';
    $connquery = OpenCon();
    $query = $connquery -> query ("SELECT * FROM vacantes where idtipovacante<3");

    while ($valor = mysqli_fetch_array($query)){
        $valorIdVacante=$valor[idvacante];
        $tipovacante= (int)$valor[idtipovacante];

        //tipo
        $connquery2 = OpenCon();
        $query2=mysqli_query($connquery2,"SELECT descripcion FROM tipovacante where idtipovacante='$tipovacante'");
        while ($valor2 = mysqli_fetch_array($query2)){
            echo "<td>$valor2[descripcion]</td>";
        }
        CloseCon($connquery3);

        //empresa
        $connquery2 = OpenCon();
        $query3=mysqli_query($connquery3,"SELECT empresa FROM register where idreg='$valorIdVacante'");
        while ($valor3 = mysqli_fetch_array($query2)){
            echo "<td>$valor3[empresa]</td>";
        }
        CloseCon($connquery3);

        //puesto
        echo "<td>$valor[titulo]</td>";

        echo "<td><a button type='submit' id='botonVerOptar' href='verVacanteFE.php?valorVacante=$valorIdVacante'>Ver</abutton></td>";
        echo "<td><a button type='submit' id='botonVerOptar' href='optarVacanteBE.php?valorVacante=$valorIdVacante'>Optar</abutton></td></tr>";
        echo "<br>";
    }
    CloseCon($connquery);
    ?>
</table>
<footer id="footer">
    <img id="logo_generalitat" src="./img/logo_generalitat.png">
</footer>
</body>
</html>
