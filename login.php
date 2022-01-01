<?php
include("register.php");


$query = $_SERVER["REQUEST_METHOD"];

if($query == "POST")
{
  // invalid post query
  if(empty($_POST["email"]) || empty($_POST["password"]))
  {
      exit(json_encode(array(
          "successfull" => "0"
      )));
  }
   
  $email = $_POST["email"];
  $password = $_POST["password"];



}






?>