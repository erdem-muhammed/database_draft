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

  $query = "SELECT * FROM register_info WHERE email= '" . $email . "'";
  $result = $conn->query($query);

  if($result->num_rows == 0)
  {
      exit(json_encode(array(
          "successfull" => "0"
      )));
  }
  else // users found
  {
      $resultcontent = $query->fetch_assoc();
      
      if($resultcontent["password"] == $password) // if the password is correct too
      $token = random_int(1000, 9999);
      $query = "UPDATE register_info SET token = " . $token . " WHERE id = " . $resultcontent["id"];

      $result2 = $conn->query($query);
      if($result2 === true)
      {
          setcookie("token", $token);
          
      }
  }



}






?>