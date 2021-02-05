
<?php
  function OpenCon(){
    $servername = "mysql-kevinmvm.alwaysdata.net";
    $username = "kevinmvm_iaw";
    $password = "@mvm2016";
    $database = "kevinmvm_iaw";
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $database);
    return $conn;

    // Check connection
    if (!$conn) {
          die("Connection failed: " . mysqli_connect_error());
    }
    echo "Connected successfully";
  }


  function CloseCon($conn){
  $conn -> close();
  }
?>
