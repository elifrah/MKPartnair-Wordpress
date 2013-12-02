<?php

/*  SEND MAIL */
$headers = 'From: '.$_POST['flash-popin-name'].' on MKPartnair.com <noreply@mkpartnair.com>' . "\r\n" .
     'Reply-To: ' . $_POST['email'] . "\r\n";
     
mail("jonathan.path@gmail.com, contact@mkpartnair.com","Interested in Flash flight","Informations of the person
--
Civility : ".$_POST['flash-popin-civility']."
Number of passengers : ".$_POST['flash-popin-passengers']."
Name: ".$_POST['flash-popin-name']."
Email: ".$_POST['flash-popin-email']."
Phone: ".$_POST['flash-popin-phone']."
Message: ".$_POST['flash-popin-message']."

Information of the flight
--
Plane: ".$_POST['flash-popin-plane']."
Departure: ".$_POST['flash-popin-departure']."
Arrival: ".$_POST['flash-popin-arrival']."
Capacity: ".$_POST['flash-popin-capacity']."
Available from: ".$_POST['flash-popin-available_from']."
Available to: ".$_POST['flash-popin-available_to']."

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
