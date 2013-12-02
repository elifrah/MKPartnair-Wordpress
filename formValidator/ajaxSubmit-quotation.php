<?php

/*  SEND MAIL */
$headers = 'From: '.$_POST['client-civility'].' '.$_POST['client-firstname'].' '.$_POST['client-lastname'].' sur MKPartnair.com <noreply@mkpartnair.com>' . "\r\n" .
     'Reply-To: ' . $_POST['email'] . "\r\n";

$mail_content = "Flight informations
--------------------------
Type : ".$_POST['flight-type']."

DEPARTURE
City : ".$_POST['flight-departure-town']."
Schedule : ".$_POST['flight-departure-schedule']."
Date : ".$_POST['flight-departure-date'];

for( $i=1;$i<6;$i++ ) {
	if( $_POST['flight-step'.$i.'-town'] != '' ) {
		$mail_content .= "

STEP ".$i."
City : ".$_POST['flight-step'.$i.'-town']."
Schedule : ".$_POST['flight-step'.$i.'-schedule']."
Date : ".$_POST['flight-step'.$i.'-date'];
	}
}

$mail_content .= "

RETURN
City : ".$_POST['flight-return-town']."
Schedule : ".$_POST['flight-return-schedule']."
Date : ".$_POST['flight-return-date']."

Number of passengers : ".$_POST['flight-passengers']."
Budget : ".$_POST['flight-budget']."
Information : ".$_POST['flight-infos']."


Client informations
--------------------------
Civility : ".$_POST['client-civility']."
Firstname : ".$_POST['client-firstname']."
Lastname : ".$_POST['client-lastname']."
Email : ".$_POST['client-email']."
Phone : ".$_POST['client-phone'];


mail("contact@mkpartnair.com","New quotation MKPartnair.com", $mail_content, $headers);

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
