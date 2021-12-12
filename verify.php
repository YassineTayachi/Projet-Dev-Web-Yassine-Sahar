<?php
include_once "controller.php";
         if(isset($_GET['Vkey'])){
            $vkey=$_GET['Vkey'];
            $con = mysqli_connect('localhost', 'root', '', 'userform');
        
            $check = ("SELECT status,Vkey FROM users WHERE status = 0 and Vkey = '$vkey' LIMIT 1");
            $code_res = mysqli_query($con, $check);
            if(mysqli_num_rows($code_res) ==1 ){
                       $update = ("UPDATE users SET status = 1 where Vkey = '$vkey' LIMIT 1");
                       $update_res = mysqli_query($con, $update);
        
                       if($update){
                         $info = "Thank You ! Your account has been verified .";
                         $_SESSION['info'] = $info;
                         header('location: Login.php'); 
           
                       }else{
                        echo "error.";
        
                       }
                
                
            }else{
                $info = "This account already verified !";
                $_SESSION['info'] = $info;
                header('location: Login.php'); 
  
                
            }
        }
?>