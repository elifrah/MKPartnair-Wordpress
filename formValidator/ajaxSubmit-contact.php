<?php

/*  SEND MAIL */
$headers = 'From: '.$_POST['client-firstname'].' '.$_POST['client-lastname'].' on MKPartnair.com <noreply@mkpartnair.com>' . "\r\n" .
     'Reply-To: ' . $_POST['email'] . "\r\n";
     
mail("contact@mkpartnair.com","New email","Informations about the client
--
Firstname: ".$_POST['client-firstname']."
Lastname: ".$_POST['client-lastname']."
Email: ".$_POST['client-email']."
Phone: ".$_POST['client-phone']."
Message: ".$_POST['client-message']."
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
