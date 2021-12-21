<?php

if (isset($_SERVER['HTTP_ORIGIN']))
{
    header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
    header('Access-Control-Allow-Credentials: true');
    header('Access-Control-Max-Age: 86400');
}

$server_name = "localhost";
$server_user = "root";
$server_pass = "";
$database_name = "final_project";


if(empty($_POST["vorname"]) || empty($_POST["nachname"]) ||
empty($_POST["email"]) || empty($_POST["pass"]) || empty($_POST["pass2"]))
{
    //es gibt ein Problem
    return;
}

$vorname = $_POST["name"];
$nachname = $_POST["surname"];
$email = $_POST["email"];
$pass = $_POST["password"];
$phone_number = $_POST["phoneNumber"];

?>



$conn = new mysqli($server_name, $server_user, $server_pass, $database_name);
//check Connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  $sql = "INSERT INTO register_info (`id`, `name`, `surname`, `email`, `password`, `phone_number`) VALUES ('3', 'maria', 'müller', 'maria@test.com', '123456789', '123123123')";
  if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  
  $conn->close();
  
?>