<?php

/*  SEND MAIL */
$headers = 'From: MKPartnair.com <noreply@mkpartnair.com>' . "\r\n" .
     'Reply-To: ' . $_POST['newsletter-email'] . "\r\n";
     
mail("contact@mkpartnair.com","New inscription to the newletter","New inscription to the newletter
--
Email : ".$_POST['newsletter-email']."
", $headers);

$_POST['email'] = "";

$isValidate = true;  // RETURN TRUE FROM VALIDATING, NO ERROR DETECTED
/* RETTURN ARRAY FROM YOUR VALIDATION  */


/* THIS NEED TO BE IN YOUR FILE NO MATTERS WHAT */
if($isValidate == true){
	echo "true";
}else{
	echo '{"jsonValidateReturn":'.json_encode($arrayError).'}';		// RETURN ARRAY WITH ERROR
}
?>
