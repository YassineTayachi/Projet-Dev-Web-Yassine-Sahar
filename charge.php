<?php     
if (!isset($_POST['amount']) || !isset($_POST['stripeToken']) || !isset($_POST['stripeEmail'])) {
    header('Location: index.php');
    exit();
}
require_once "stripe-php-master/init.php";
	

	$stripeDetails = array(
		"secretKey" => "sk_test_51Ixb0lJ3LBtPODXZcUM6hbr84kNL2rTJm4NINyG6gi0zJM1rkd5GrPyRehujrs9xFwRpJNDMlIjcZ30d0howUBXO00bvWor5Vr",
		"publishableKey" => "pk_test_51Ixb0lJ3LBtPODXZo8MknGPp1VCuMov7YHpJbNqOUgtEc6aLnECFWDqxPUH8GJeg0n6u4zcICzfKsZFvrvML66ZH00R3eEsnPa"
	);

	\Stripe\Stripe::setApiKey($stripeDetails['secretKey']);


  $token  = $_POST['stripeToken'];
  $email  = $_POST['stripeEmail'];
  $amount = $_POST['amount'];



  $customer = \Stripe\Customer::create(array(
      'source'  => $token,
      'email' => $email)
  );

  $charge = \Stripe\Charge::create(array(
      'customer' => $customer->id,
      'amount'   => $amount*100,
      'currency' => 'eur'
  ));

  $con = mysqli_connect('localhost', 'root', '', 'userform');

  $id_trans=$charge->id; 
  $customer_id=$customer->id;
  $amount=$charge->amount/100;;
  $currency=$charge->currency;
  $status=$charge->status;

session_start();
$email = $_SESSION['email'];
$sql1 = "SELECT id FROM users WHERE email = '$email'  LIMIT 1";
$run_Sql1= mysqli_query($con, $sql1);
$PinCode = mysqli_fetch_array($run_Sql1);
$id_userVNT= $PinCode['id'];


  $sql = "INSERT INTO transactions (id_trans, customer_id, amount,currency, status,	id_userVNT) 
  VALUES ('$id_trans', '$customer_id', '$amount','$currency', '$status', '$id_userVNT')";
  $run_Sql= mysqli_query($con, $sql);
 
if ($run_Sql){
  $subject = "Payment Notification ";
    $message = "
    
    <html> 
    <head> 
        <title> VNT</title> 
    </head> 
    <body> 
    
     <img src='https://vast-new-telecom.com/fr/assets/images/geglogo.png' width='200' height='40' /> 
        <h1>Payment Notification </h1> 
        <h4>
        Hi ,
        <br><br>
         We just wanted to drop you a quick note to let you<br> 
        know that we have received your recent payment:</h4><br>
        
        <table > 
            <tr> 
                <th>Transaction ID :</th><td>$id_trans</td> 
            </tr> 
            <tr> 
                <th>Amount         : </th><td>$amount €</td> 
            </tr> 
            
        </table> 
        
       <br> Thanks,<br>
       VNT.<br>
    </body> 
    </html>";



    
   
    $sender = "From: vnt.test11@gmail.com \r\n";
    $sender = "MIME-Version: 1.0" . "\r\n";
    $sender .= "Content-type:text/html;charset=UTF-8" . "\r\n";
   mail($email, $subject, $message, $sender); 
   
   
   header("Location: Success.php");
  
   die(); 
    
}else{
    
    echo" error !";
}

 

 
?>