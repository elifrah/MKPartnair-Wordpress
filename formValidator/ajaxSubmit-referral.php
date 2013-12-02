<?php

/*  SEND MAIL */
$headers = 'From: '.$_POST['winner-civility'].' '.$_POST['winner-firstname'].' '.$_POST['winner-lastname'].' sur MKPartnair.com <noreply@mkpartnair.com>' . "\r\n" .
     'Reply-To: ' . $_POST['email'] . "\r\n";
     
/* IF SENDING TO FRIEND DIRECTLY */
$link_end_mail = "

www.mkpartnair.com"; 
if( $_POST['winner-mkpartnair'] == 'No' ) {
	mail($_POST['friend-email'], "Découvrez MK Partnair", $_POST['winner-message'].$link_end_mail, $headers);
}

mail("contact@mkpartnair.com","New referral","Informations of the friend
--
Civility : ".$_POST['friend-civility']."
Firstname : ".$_POST['friend-firstname']."
Lastname : ".$_POST['friend-lastname']."
Email : ".$_POST['friend-email']."
Phone : ".$_POST['friend-phone']."

Informations about the godfather
--
Are you a MK Partnair client? : ".$_POST['winner-is-client']."
Civilit : ".$_POST['winner-civility']."
Firstname : ".$_POST['winner-firstname']."
Lastname : ".$_POST['winner-lastname']."
Email : ".$_POST['winner-email']."
Phone : ".$_POST['winner-phone']."

Message : ".$_POST['winner-message']."

Would like that MK Partnair sent the mail : ".$_POST['winner-mkpartnair']."
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
