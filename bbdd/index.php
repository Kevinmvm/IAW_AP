<html>
   <head>
      <title>Connexió a MySQL</title>
   </head>
   <body>
      <?php
			   include 'db_connect.php';
         $conn = open_con();

  			if (!$conn) {
  			   die("Error a la connexió " . mysqli_connect_error());
  			}
  			else{
  				echo "S'ha connectat correctament";
  			}

        $username = utf8_decode($_POST['user']);
        $password = utf8_decode($_POST['password']);

        $sql = "INSERT INTO users (username, password)
  			VALUES ('".$username."', '".$password."')";

  			if ($conn->query($sql) === TRUE) {
  				echo "Usuari enregistrat correctament";
  			} else {
  				echo "Error: " . $sql . "<br>" . $conn->error;
  			}

			close_con($conn);
		?>
   </body>
</html>
