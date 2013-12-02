<?php
get_header();

//var_dump($params);
/* OK : signature validée */
$post         = get_post($params['id']);
$price_euros  = get_post_meta($params['id'], 'price_euros', true);
$client_email = get_post_meta($params['id'], 'client_email', true);

setup_postdata($post);

require_once( ABSPATH . 'wp-content/plugins/mkp_resa/cic/CMCIC_Config.php' );
require_once( ABSPATH . 'wp-content/plugins/mkp_resa/cic/CMCIC_Tpe.inc.php' );

$sOptions = "";



$sReference = "ref" . date("His");  // Reference: unique, alphaNum (A-Z a-z 0-9), 12 characters max


$sMontant = $price_euros ; // Amount : format  "xxxxx.yy" (no spaces)


$sDevise  = "EUR"; // Currency : ISO 4217 (c'est con, ça nous auraitcompliant

// free texte : a bigger reference, session context for the return on the merchant website
$sTexteLibre = "Texte Libre";

// transaction date : format d/m/y:h:m:s
$sDate = date("d/m/Y:H:i:s");

// Language of the company code
$sLangue = "FR";

// customer email
//$sEmail = "test@test.zz";

// ----------------------------------------------------------------------------

// between 2 and 4
//$sNbrEch = "4";
$sNbrEch = "";

// date echeance 1 - format dd/mm/yyyy
//$sDateEcheance1 = date("d/m/Y");
$sDateEcheance1 = "";

// montant échéance 1 - format  "xxxxx.yy" (no spaces)
//$sMontantEcheance1 = "0.26" . $sDevise;
$sMontantEcheance1 = "";

// date echeance 2 - format dd/mm/yyyy
$sDateEcheance2 = "";

// montant échéance 2 - format  "xxxxx.yy" (no spaces)
//$sMontantEcheance2 = "0.25" . $sDevise;
$sMontantEcheance2 = "";

// date echeance 3 - format dd/mm/yyyy
$sDateEcheance3 = "";

// montant échéance 3 - format  "xxxxx.yy" (no spaces)
//$sMontantEcheance3 = "0.25" . $sDevise;
$sMontantEcheance3 = "";

// date echeance 4 - format dd/mm/yyyy
$sDateEcheance4 = "";

// montant échéance 4 - format  "xxxxx.yy" (no spaces)
//$sMontantEcheance4 = "0.25" . $sDevise;
$sMontantEcheance4 = "";

// ----------------------------------------------------------------------------

$oTpe = new CMCIC_Tpe($sLangue);     		
$oHmac = new CMCIC_Hmac($oTpe);      	        

// Control String for support
$CtlHmac = sprintf(CMCIC_CTLHMAC, $oTpe->sVersion, $oTpe->sNumero, $oHmac->computeHmac(sprintf(CMCIC_CTLHMACSTR, $oTpe->sVersion, $oTpe->sNumero)));

// Data to certify
$PHP1_FIELDS = sprintf(CMCIC_CGI1_FIELDS,     $oTpe->sNumero,
                                              $sDate,
                                              $sMontant,
                                              $sDevise,
                                              $sReference,
                                              $sTexteLibre,
                                              $oTpe->sVersion,
                                              $oTpe->sLangue,
                                              $oTpe->sCodeSociete, 
                                              $client_email,
                                              $sNbrEch,
                                              $sDateEcheance1,
                                              $sMontantEcheance1,
                                              $sDateEcheance2,
                                              $sMontantEcheance2,
                                              $sDateEcheance3,
                                              $sMontantEcheance3,
                                              $sDateEcheance4,
                                              $sMontantEcheance4,
                                              $sOptions);

// MAC computation
$sMAC = $oHmac->computeHmac($PHP1_FIELDS);

// --------------------------------------------------- End Stub ---------------


// ----------------------------------------------------------------------------
// Your Page displaying payment button to be customized  
// ----------------------------------------------------------------------------
?>

<section class="l-constrained pt2">
	<section class="l-constrained-53 l-main nm-reservation">
		
		<div class="m-steps" id="quotation-steps">
			<div class="steps-inner">
				<div class="step">
					<span class="foot"></span>
					<span class="num">1</span>
					<span class="body">
						<span class="num-inner">1. </span>
						<?php _e("<!--:en-->Request<!--:--><!--:fr-->Votre demande<!--:--><!--:ar-->Request<!--:-->"); ?></span>
					<span class="head"></span>
				</div>
				<div class="step">
					<span class="foot"></span>
					<span class="num">2</span>
					<span class="body">
						<span class="num-inner">2. </span>
						<?php _e("<!--:en-->Study<!--:--><!--:fr-->L'étude<!--:--><!--:ar-->Study<!--:-->"); ?>
					</span>
					<span class="head"></span>
				</div>
				<div class="step">
					<span class="foot"></span>
					<span class="num">3</span>
					<span class="body">
						<span class="num-inner">3. </span>
						<?php _e("<!--:en-->Proposition<!--:--><!--:fr-->La proposition<!--:--><!--:ar-->Proposition<!--:-->"); ?>
					</span>
					<span class="head"></span>
				</div>
				<div class="step-active">
					<span class="foot"></span>
					<span class="num">4</span>
					<span class="body">
						<span class="num-inner">4. </span>
						<?php _e("<!--:en-->Confirmation<!--:--><!--:fr-->Confirmation<!--:--><!--:ar-->Confirmation<!--:-->"); ?>
					</span>
					<span class="head"></span>
				</div>
				<div class="step-last">
					<span class="foot"></span>
					<span class="num">5</span>
					<span class="body">
						<span class="num-inner">5. </span>
						<?php _e("<!--:en-->Payment<!--:--><!--:fr-->Paiement<!--:--><!--:ar-->Payment<!--:-->"); ?>
					</span>
					<span class="head"></span>
				</div>
			</div>
		</div>

    <p><?php echo getTranslation(1399) ?></p>
		
		<div class="l-container">
      <h2 class="title">Récapitulatif de votre commande</h2>
      <div class="reservation-iframe">
        <iframe frameBorder="0" src="http://docs.google.com/gview?url=<?php the_field( 'confirmation_[pdf]' ) ?>&embedded=true"></iframe>
      </div>
    </div>

    <div class="l-container">
    	<h2 class="title">Conditions générales</h2>
    	<p><?php echo getTranslation(1400) ?></p>
      <!-- FORMULAIRE TYPE DE PAIEMENT / PAYMENT FORM TEMPLATE -->
      <form action="<?php echo $oTpe->sUrlPaiement;?>" method="post" id="PaymentRequest">
      	<input type="checkbox" id="cgv" />
      	<label for="cgv"><?php echo getTranslation(1401) ?></label>
        <input type="hidden" name="version"             id="version"        value="<?php echo $oTpe->sVersion;?>" />
        <input type="hidden" name="TPE"                 id="TPE"            value="<?php echo $oTpe->sNumero;?>" />
        <input type="hidden" name="date"                id="date"           value="<?php echo $sDate;?>" />
        <input type="hidden" name="montant"             id="montant"        value="<?php echo $sMontant . $sDevise;?>" />
        <input type="hidden" name="reference"           id="reference"      value="<?php echo $sReference;?>" />
        <input type="hidden" name="MAC"                 id="MAC"            value="<?php echo $sMAC;?>" />
        <input type="hidden" name="url_retour"          id="url_retour"     value="<?php echo $oTpe->sUrlKO;?>" />
        <input type="hidden" name="url_retour_ok"       id="url_retour_ok"  value="<?php echo $oTpe->sUrlOK;?>" />
        <input type="hidden" name="url_retour_err"      id="url_retour_err" value="<?php echo $oTpe->sUrlKO;?>" />
        <input type="hidden" name="lgue"                id="lgue"           value="<?php echo $oTpe->sLangue;?>" />
        <input type="hidden" name="societe"             id="societe"        value="<?php echo $oTpe->sCodeSociete;?>" />
        <input type="hidden" name="texte-libre"         id="texte-libre"    value="<?php echo HtmlEncode($sTexteLibre);?>" />
        <input type="hidden" name="mail"                id="mail"           value="<?php echo $client_email;?>" />
        <input type="hidden" name="nbrech"              id="nbrech"         value="<?php echo $sNbrEch;?>" />
        <input type="hidden" name="dateech1"            id="dateech1"       value="<?php echo $sDateEcheance1;?>" />
        <input type="hidden" name="montantech1"         id="montantech1"    value="<?php echo $sMontantEcheance1;?>" />
        <input type="hidden" name="dateech2"            id="dateech2"       value="<?php echo $sDateEcheance2;?>" />
        <input type="hidden" name="montantech2"         id="montantech2"    value="<?php echo $sMontantEcheance2;?>" />
        <input type="hidden" name="dateech3"            id="dateech3"       value="<?php echo $sDateEcheance3;?>" />
        <input type="hidden" name="montantech3"         id="montantech3"    value="<?php echo $sMontantEcheance3;?>" />
        <input type="hidden" name="dateech4"            id="dateech4"       value="<?php echo $sDateEcheance4;?>" />
        <input type="hidden" name="montantech4"         id="montantech4"    value="<?php echo $sMontantEcheance4;?>" />
        <br />
        <input class="m-btn color2 disabled" type="submit" name="bouton" id="bouton" value="<?php echo getTranslation(1404) ?>" />
        <span class="hidden" id="text-error-cvg"><?php echo getTranslation(1403) ?></span>
			</form>
    </div>

 </section>                 
</section>

<?php get_footer(); ?>