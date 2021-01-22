<?php
  $conn = new mysqli('localhost', 'root', 'root', 'mvm');
?>

<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href= "./css/stylesv2.css">
    <link href="https://fonts.googleapis.com/css?family=EB+Garamond&display=swap" rel="stylesheet">
  </head>
  <body>
    <header id="cabecera">
      <img id="logo" src="./img/logo.png">
      <h1 id="bienvenida">Registro</h1>
    </header>

    <main id="main">
      <section class="form_reg">
        <select id="test" name="form_select" onchange="showDiv(this)">
          <option value=NULL>Seleccione:</option>

          <?php
            $query = $conn -> query ("SELECT * FROM roles");
            while ($valor = mysqli_fetch_array($query)) {
              echo '<option value="'.$valor[idrol].'">'.$valor[description].'</option>';
            }
            function CloseCon($conn){
            $conn -> close();
            }
          ?>

        </select>

        <script type="text/javascript">
          function showDiv(elem){
            //alert(elem.value);
            if(elem.value == 1)
              document.getElementById('user').style.display = "none";
            else {
              document.getElementById('user').style.display = "inline";
            }
          }

        </script>



        <form action="register.php" method="POST">
          <input class="controls" id="user" type="text" name="user" placeholder="Nom Empresa">
          <input class="controls" id="contact" type="text" name="contact" placeholder="Persona de Contacte">
          <input class="controls" id="email" type="text" name="email" placeholder="Email">
          <input class="controls" id="password" type="password" name="password" placeholder="Contrasenya">
          <input class="controls" id="observations" type="text" name="observations" placeholder="Observacions">
          <input class="controls" id="boton" type="submit" value="Entrar">
        </form>
      </section>
    </main>



    <footer id="footer">
      <img id="logo_generalitat" src="./img/logo_generalitat.png">
    </footer>
  </body>
</html>
