<?php
include "connect.php";



$email = $_SESSION['email'];
$sql = "SELECT id FROM users WHERE email = '$email'  LIMIT 1";
$run_Sql= mysqli_query($con, $sql);
$PinCode = mysqli_fetch_array($run_Sql);
$var= $PinCode['id'];
$sql = "SELECT * FROM numeros_tel Where id_user = '$var' ";

//execute the query

$result = mysqli_query($con, $sql);     
 /* if ($result){
  header("Location: company.php"); 
  
}    
*/ 
?>