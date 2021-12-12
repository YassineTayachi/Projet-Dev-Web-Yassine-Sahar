<?php 
session_start();
require "connect.php";
$email = "";
$name = "";
$errors = array();
$info=array();


//Register button
if(isset($_POST['signup'])){
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
    
    $number = preg_match('@[0-9]@', $password);
    $uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
     
    if(strlen($password) < 8 || !$number || !$uppercase || !$lowercase ) {
        $errors['password'] = "Password must be at least 8 characters, one number, one upper case letter, one lower case letter !";
    } 
    
    if($password !== $cpassword){
        $errors['password'] = "Confirm password not matched!";

    }
    
    $email_check = "SELECT * FROM users WHERE email = '$email'";
    $res = mysqli_query($con, $email_check);
    if(mysqli_num_rows($res) > 0){
        $errors['email'] = "Email that you have entered is already exist!";
    }
    if(count($errors) === 0){
       

        $encpass = $password;
        $PIN_code = rand(999999, 111111);
        $vkey= md5(time().$name);
        $insert_data = "INSERT INTO users (PIN_Code ,name, email, password, Vkey)
                        values('$PIN_code','$name', '$email', '$encpass', '$vkey')";
                      
                      $data_check = mysqli_query($con, $insert_data);
                      if($data_check){
                          $subject = "Email Verification";

                        //   $message = "<a href='http://localhost/SMART_project/verify.php?Vkey=$vkey'> Register account verification link </a>";
                          $message = "
                          
                          <html> 
                          <head> 
                              <title>Welcome to VNT</title> 
                          </head> 
                          <body> 
                           <img src='https://vast-new-telecom.com/fr/assets/images/geglogo.png' width='200' height='40' /> 
                              <h1>Welcome to VNT</h1> 
                              <h4>We're excited to have you get started. First, you need to confirm your account.<br> Just press the Link below.</h4>
                              
                              <table > 
                                  <tr> 
                                      <th>Name:</th><td>$name</td> 
                                  </tr> 
                                  <tr '> 
                                      <th>Email:</th><td>$email</td> 
                                  </tr> 
                                  <tr> 
                                      <th>Your link :</th><td><a href='http://localhost/PROJET_WEB_Yassine_Sahar/verify.php?Vkey=$vkey'> verify My Email</a></td> 
                                  </tr> 
                              </table> 
                              <br>
                             <br> <br>
                          </body> 
                          </html>";
                          
                          
                          
                          $sender = "From: vnt.test11@gmail.com \r\n";
                          $sender = "MIME-Version: 1.0" . "\r\n";
                          $sender .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                          if(mail($email, $subject, $message, $sender)){
                              $info = "We've sent a verification link to your email : $email";
                              $_SESSION['info'] = $info;
                              $_SESSION['email'] = $email;
                              $_SESSION['password'] = $password;
                              header('location: thankyou.php');
                              exit();
                          }else{
                              $errors['otp-error'] = "Failed while sending Link!";
                          }
                      }else{
                          $errors['db-error'] = "Failed while inserting data into database!";
                      }
                  } 
         }
    

//verification login


//Login button
         if(isset($_POST['login'])){
            $email = mysqli_real_escape_string($con, $_POST['email']);
            $password = mysqli_real_escape_string($con, $_POST['password']);
            $check_email = "SELECT * FROM users WHERE email = '$email'";
            $res = mysqli_query($con, $check_email);
            if(mysqli_num_rows($res) > 0){
                $fetch = mysqli_fetch_assoc($res);
                $fetch_pass = $fetch['password'];
               
                if($password == $fetch_pass){
                       
                    
                    $status = $fetch['status'];
                    if($status == 1){
                        session_regenerate_id();
                       $_SESSION['loggedin'] = TRUE;
                      $_SESSION['email'] = $email;
                      $_SESSION['password'] = $password;
                         header('location: index.php');
                    }else{
                        $info = "It's look like you haven't still verify your email - $email";
                        $errors['info'] = $info;
                    
                    }
                }else{
                    $errors['email'] = "Incorrect email or password!";
                }
            }else{
                $errors['email'] = "It's look like you're not yet a member! Click on the bottom link to signup.";
            }
        }


//index/Home page data
if(isset($_SESSION['email'])){


        $email = $_SESSION['email'];
      
        $sql = "SELECT * FROM users WHERE email = '$email'  LIMIT 1";
        $run_Sql= mysqli_query($con, $sql);
        $PinCode = mysqli_fetch_array($run_Sql);
        $var= $PinCode['id'];
        $name = $PinCode['name'];
        
        
        $sql2 = "SELECT SUM(amount) AS balance FROM transactions WHERE id_userVNT = '$var'";
        $run_Sql2= mysqli_query($con, $sql2) or die( mysqli_error($con));
        $balance = mysqli_fetch_array($run_Sql2);
    }


//company page add number
    if(isset($_POST['add'])){
        $name = $_POST['name'];
        $NumTel = $_POST['NumTel'];
        $email = $_SESSION['email'];
        $sql = "SELECT id FROM users WHERE email = '$email'  LIMIT 1";
        $run_Sql= mysqli_query($con, $sql);
        $PinCode = mysqli_fetch_array($run_Sql);
        $var= $PinCode['id'];
        
           $insert_data = "INSERT INTO numeros_tel (name , NumTel, id_user)
                               values('$name','$NumTel','$var')";
            $test= mysqli_query($con, $insert_data) ;
          if ($test){
            $info['info'] = "Number add success!";


            $email = $_SESSION['email'];
            $sql = "SELECT id FROM users WHERE email = '$email'  LIMIT 1";
            $run_Sql= mysqli_query($con, $sql);
            $PinCode = mysqli_fetch_array($run_Sql);
            $var= $PinCode['id'];
            $sql = "SELECT * FROM numeros_tel Where id_user = '$var' ";
            
            //execute the query
            
            $result = mysqli_query($con, $sql);     
             if ($result){
              header("Location: company.php");  }
            
          }else {
            $errors['error'] = "error";
          }
          
          }
          
          
          /*   $email = $_SESSION['email'];
            $sql = "SELECT Vkey FROM users WHERE email = '$email'  LIMIT 1";
            $run_Sql= mysqli_query($con, $sql);
            $PinCode = mysqli_fetch_array($run_Sql);
            $mykey= $PinCode['Vkey'];   
 */
?>