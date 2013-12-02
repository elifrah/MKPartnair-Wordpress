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
				<div class="step">
					<span class="foot"></span>
					<span class="num">4</span>
					<span class="body">
						<span class="num-inner">4. </span>
						<?php _e("<!--:en-->Confirmation<!--:--><!--:fr-->Confirmation<!--:--><!--:ar-->Confirmation<!--:-->"); ?>
					</span>
					<span class="head"></span>
				</div>
				
			</div>
		</div>
		
		<div class="l-container">
      <h2 class="title"><?php echo getTranslation(1405) ?></h2>
      <p><a href="<?php the_field( 'facture_[pdf]' ) ?>" target="_blank"><?php echo getTranslation(1406) ?></a> <?php echo getTranslation(1407) ?>.</p>
    </div>

 </section>                 
</section>

<?php get_footer(); ?>