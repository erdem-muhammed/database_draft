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


if(empty($_POST["name"]) || empty($_POST["surname"]) ||
empty($_POST["email"]) || empty($_POST["password"] ))
{
    return;
}

$name = $_POST["name"];
$surname = $_POST["surname"];
$email = $_POST["email"];
$pass = $_POST["password"];
$phone_number = $_POST["phoneNumber"];

echo "kurulum";



$conn = new mysqli($server_name, $server_user, $server_pass, $database_name);
//check Connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  $sql = "INSERT INTO register_info (`name`, `surname`, `email`, `password`, `phone_number`) VALUES ( '$name', '$surname', '$email', '$pass', '$phone_number')";
  echo "query gönderiliyor";
  if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  $conn->close();
  
?>