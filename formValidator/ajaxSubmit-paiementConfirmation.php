<?php

/*  SEND MAIL */
$to = 'contact@mkpartnair.com';
$subject = 'Information sur le client';
$headers = 'From: '.$_POST['client-firstname'].' '.$_POST['client-lastname'].' on MKPartnair.com <noreply@mkpartnair.com>' . "\r\n" .
     'Reply-To: ' . $_POST['email'] . "\r\n";

	 
mail($to, $subject, "Informations sur le client --

Nom du client : ".$_POST['client-lastname']."
Prénom du client : ".$_POST['client-firstname']."
Ville : ".$_POST['client-city']."
Code Postal : ".$_POST['client-postalcode']."
Email : ".$_POST['client-email']."
Adresse : ".$_POST['client-address']."
Vol : ".$POST['client-flight']."
",$headers);

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