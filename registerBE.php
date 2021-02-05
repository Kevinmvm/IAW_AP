<?php
  #Creacion de archivo csv con cabecera
  /*if(!(file_exists("dictionari.csv"))){
    $myFileHead = fopen("dictionari.csv", "a") or die ("No s'ha pogut obrir");
    $head = ("user,contact,email,password,observations\n");
    fwrite($myFileHead, $head);
    fclose($myFileHead);
  }*/
  $user = null;
  $selectOption = $_POST['form_select'];
  $intSelectOption = (int)$selectOption;

  if (empty($_POST['user'])){
    $user = null;
  }
  else if (isset($_POST['user'])){
    $user = $_POST['user'];
  }
  if (isset($_POST['contact'])){
    $contact = $_POST['contact'];
  }
  if (isset($_POST['email'])){
    $email = $_POST['email'];
  }
  if (isset($_POST['password'])){
    $password = $_POST['password'];
  }
  if (isset($_POST['observations'])){
    $observations = $_POST['observations'];
  }
  else {
    echo ('Error');
  }

  #Add data to csv
  /*$content = $user.",".$contact.",".$email.",".$password.",".$observations."\n";
  $myFile = fopen("dictionari.csv", "a") or die ("No s'ha pogut escriure");
  fwrite($myFile,$content);
  fclose($myFile);*/

  #Add data to db
  include 'db_connect.php';
  $conninserts = OpenCon();
  if (mysqli_connect_error()){
    die('Connect Error ('. mysqli_connect_errno() .') ' . mysqli_connect_error());
    }
  else{
    $sqlinsert = "INSERT INTO register (idreg, idrol, empresa, user, email, password, observations) VALUES (default,'$intSelectOption', '$user', '$contact', '$email', '$password', '$observations')";
    if ($conninserts->query($sqlinsert)){
        echo "<script>alert('Usuario Creado Correctamente');window.location= 'index.html'</script>";

    } else {
      echo "Error: " . $sqlinsert . "<br>" . $conninserts->error;
    }
  }
  CloseCon($conninserts);


?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href= "css/stylesIndexFE.css">
    <link href="https://fonts.googleapis.com/css?family=EB+Garamond&display=swap" rel="stylesheet">
  </head>
  <body>
    <section class="form_reg">
      <form action="index.html">
        <p><input type="submit" value="Pagina de inicio"></p>
      </form>
    </section>
  </body>
</html>
