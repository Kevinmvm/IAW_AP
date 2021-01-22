<?php
  #Creacion de archivo csv con cabecera
  if(!(file_exists("dictionari.csv"))){
    $myFileHead = fopen("dictionari.csv", "a") or die ("No s'ha pogut obrir");
    $head = ("user,contact,email,password,observations\n");
    fwrite($myFileHead, $head);
    fclose($myFileHead);
    }

  #Registro de datos
  if(isset($_POST['user'])){
    $user = $_POST['user'];
    echo $user;
    echo ("<br>");
  }
  if (isset($_POST['contact'])){
    $contact = $_POST['contact'];
    echo $contact;
    echo ("<br>");
  }
  if (isset($_POST['email'])){
    $email = $_POST['email'];
    echo $email;
    echo ("<br>");
  }
  if (isset($_POST['password'])){
    $password = $_POST['password'];
    echo ("restringit");
    echo ("<br>");
  }
  if (isset($_POST['observations'])){
    $observations = $_POST['observations'];
    echo $observations;
    echo ("<br>");
  }
  else {
    echo ('Error');
  }

  #Add datos al csv
  $content = $user.",".$contact.",".$email.",".$password.",".$observations."\n";
  $myFile = fopen("dictionari.csv", "a") or die ("No s'ha pogut escriure");
  fwrite($myFile,$content);
  fclose($myFile);

  <?php
    $conn = new mysqli('localhost', 'root', 'root', 'mvm');
    $sql = "INSERT INTO register (idrol, user, contact, email, password, observations) VALUES (elem, 'user', 'contact', 'email', 'password', 'observations')";
    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    mysqli_close($conn);
  ?>
?>
