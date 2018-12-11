<?php


$servername = "localhost";
$username = "root";
$password = "";


$conn = new mysqli($servername, $username, $password,"nursery_website(complete)");



if (!$conn) {
  die("Connection failed: ".mysqli_connect_error()."there is no connection to the database");
}













 ?>
