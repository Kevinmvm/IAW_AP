<?php
    session_start();
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
    <link rel="stylesheet" href= "./css/stylesVacantes.css">
    <link href="https://fonts.googleapis.com/css?family=EB+Garamond&display=swap" rel="stylesheet">
  </head>
  <body>
    <header id="cabecera">
      <img id="logo" src="./img/logo.png">
      <h1 id="bienvenida">Nueva Vacante</h1>
    </header>
    <main id="main">
      <section class="form_reg">
        <!--Formulario -->
        <form action="addVacanteBE.php" method="POST">
            <select id="test" name="form_select" onchange="showDiv(this)"required>
                <option value="">Tipo Vacante</option>
                <!--Conexión con mysql para tipos de vacantes -->
                <?php
                include 'db_connect.php';
                $connquery = OpenCon();
                $query = $connquery -> query ("SELECT * FROM tipovacante");
                while ($valor = mysqli_fetch_array($query)){
                    echo '<option value='.$valor[idtipovacante].'>'.$valor[descripcion].'</option>';
                }
                CloseCon($connquery);
                ?>
            </select>

            <!-- Inputs de formulario -->
            <br>
            <input class="controls" id="titulo" type="text" name="titulo" placeholder="Título">
            <br>
            <textarea class="controls" id="description" type="text" name="description" placeholder="Descripción" required></textarea>
            <br>
            <input class="controls" id="botonAddVacante" type="submit" value="Crear">
        </form>
      </section>
    </main>

    <footer id="footer">
      <img id="logo_generalitat" src="./img/logo_generalitat.png">
    </footer>
  </body>
</html>
