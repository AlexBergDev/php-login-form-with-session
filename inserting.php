<?php
$username = $_POST['username'];
$password = $_POST['password'];
if (!empty($username) || !empty($password)) {
 $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "root";
    $dbname = "company";
    //create connection
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
    if (mysqli_connect_error()) {
     die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    } else {
     $INSERT = "INSERT Into login (username, password) values(?, ?)";
     //Prepare statement
     $stmt = $conn->prepare($SELECT);
     $stmt->execute();
     $stmt->store_result();
     $stmt->store_result();
     $stmt->fetch();
     $rnum = $stmt->num_rows;
     if ($rnum==0) {
      $stmt->close();
      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("ssssii", $username, $password);
      $stmt->execute();
      echo "New record inserted sucessfully";
     } else {
      echo "Someone already register using this email";
     }
     $stmt->close();
     $conn->close();
    }
} else {
 echo "All field are required";
 die();
}
?>