<?php
	require_once "stripe-php-master/init.php";
	require_once "charge.php";

	$stripeDetails = array(
		"secretKey" => "sk_test_51Ixb0lJ3LBtPODXZcUM6hbr84kNL2rTJm4NINyG6gi0zJM1rkd5GrPyRehujrs9xFwRpJNDMlIjcZ30d0howUBXO00bvWor5Vr",
		"publishableKey" => "pk_test_51Ixb0lJ3LBtPODXZo8MknGPp1VCuMov7YHpJbNqOUgtEc6aLnECFWDqxPUH8GJeg0n6u4zcICzfKsZFvrvML66ZH00R3eEsnPa"
	);

	\Stripe\Stripe::setApiKey($stripeDetails['secretKey']);
?>
