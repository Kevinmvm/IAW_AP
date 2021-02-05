<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href= "css/stylesIndexFE.css">
    <link href="https://fonts.googleapis.com/css?family=EB+Garamond&display=swap" rel="stylesheet">
  </head>
  <body>
    <header id="cabecera">
      <img id="logo" src="./img/logo.png">
      <h1 id="bienvenida">Registro</h1>

    </header>
    <main id="main">
      <section class="form_reg">
        <!--Formulario -->
        <form action="registerBE.php" method="POST">
          <select id="test" name="form_select" onchange="showDiv(this)"required>
            <option value="">Seleccione</option>
              <!--Conexión con mysql para roles -->
              <?php
                include 'db_connect.php';
                $connquery = OpenCon();
                $query = $connquery -> query ("SELECT * FROM roles");
                while ($valor = mysqli_fetch_array($query)){
                  echo '<option value='.$valor[idrol].'>'.$valor[description].'</option>';
                }
                CloseCon($connquery);
              ?>
        </select>

              <!--Script de java para ocultar Nom empresa si es un Alumno o Ex Alumno -->
              <script type="text/javascript">
                function showDiv(elem){
                  //alert(elem.value);
                  if(elem.value == 1 || elem.value == 3){
                    document.getElementById('user').style.display = "none";
                  }
                  else {
                    document.getElementById('user').style.display = "inline";
                  }
                }
              </script>

            <!-- Inputs de formulario -->
            <input class="controls" id="user" type="text" name="user" placeholder="Nom Empresa">
            <input class="controls" id="contact" type="text" name="contact" placeholder="Persona de Contacte" required>
            <input class="controls" id="email" type="text" name="email" placeholder="Email" required>
            <input class="controls" id="password" type="password" name="password" placeholder="Contrasenya" required>
            <input class="controls" id="observations" type="text" name="observations" placeholder="Observacions" required>
            <input class="controls" id="boton" type="submit" value="Entrar">
            <br>
            <a id='botonVolver' href='index.html'>Volver</a>
        </form>
      </section>
    </main>



    <footer id="footer">
      <img id="logo_generalitat" src="./img/logo_generalitat.png">
    </footer>
  </body>
</html>
