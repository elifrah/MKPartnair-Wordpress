<?php

/*  SEND MAIL */
$headers = 'From: '.$_POST['flash-firstname'].' '.$_POST['flash-lastname'].' on MKPartnair.com <noreply@mkpartnair.com>' . "\r\n" .
     'Reply-To: ' . $_POST['email'] . "\r\n";
     
mail("contact@mkpartnair.com","New flash suscribe","Informations about the client
--
Firstname: ".$_POST['flash-firstname']."
Lastname: ".$_POST['flash-lastname']."
Email: ".$_POST['flash-email']."
Phone: ".$_POST['flash-phone']."

Favorite city 1: ".$_POST['flash-city1']."
Favorite city 2: ".$_POST['flash-city2']."
Favorite city 3: ".$_POST['flash-city3']."
Favorite city 4: ".$_POST['flash-city4']."
Alert by: ".$_POST['flash-alert']."
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
