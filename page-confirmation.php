<?php
/*
Template Name: Paiement confirmation
*/
?>
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
<?php if (have_posts()) : ?>
  <?php while (have_posts()) : the_post(); ?>
	<section class="l-constrained-53 l-main">
		<div class="main-head">
			<h1 class="title-section"><?php the_title() ?></h1>
			<div class="main-content mt1">
				<?php the_content() ?>
			</div>
		</div>

		<form class="l-cols2 m-form lang-<?php echo getLang() ?>" id="form-paiementConfirmation">
			
			<fieldset class="l-container l-cols2">
				<div class="title"><?php _e("<!--:en-->Your invoice address<!--:--><!--:fr-->Votre adresse de facturation<!--:--><!--:ar-->Your invoice address<!--:-->"); ?></div>
				<div class="row-civility row-form">
					<div class="col">
						<label><?php _e("<!--:en-->Civility<!--:--><!--:fr-->Civilité<!--:--><!--:ar-->Civility<!--:-->"); ?> *</label><br />
						<select name="client-civility">
							<?php include('includes/form-civility.php') ?>
						</select>
					</div>
				</div><!-- .civility -->
				<div class="row-name row-form"> 
					<div class="col">
						<label for="client-lastname"><?php _e("<!--:en-->Lastname<!--:--><!--:fr-->Nom<!--:--><!--:ar-->Lastname<!--:-->"); ?> *</label><br />
						<input type="text" name="client-lastname" id="client-lastname" class="validate[required]" />
					</div>
					<div class="col">
						<label for="client-firstname"><?php _e("<!--:en-->Firstname<!--:--><!--:fr-->Prénom<!--:--><!--:ar-->Firstname<!--:-->"); ?> *</label><br />
						<input type="text" name="client-firstname" id="client-firstname" class="validate[required]" />
					</div>
				</div><!-- .name -->
				<div class="row-contact row-form">
					<div class="col">
						<label for="client-address"><?php _e("<!--:en-->Invoice address<!--:--><!--:fr-->Adresse de facturation<!--:--><!--:ar-->Invoice Address<!--:-->"); ?> *</label><br />
						<input type="text" name="client-address" id="client-address" class="validate[required]" />
					</div>
					<div class="col">
						<label for="client-postalcode"><?php _e("<!--:en-->Postal code<!--:--><!--:fr-->Code postal<!--:--><!--:ar-->Postal code<!--:-->"); ?> *</label><br />
						<input type="text" name="client-postalcode" id="client-postalcode" class="validate[required]" />
					</div>
				</div><!-- .city -->
				<div class="row-contact row-form">
					<div class="col">
						<label for="client-city"><?php _e("<!--:en-->City<!--:--><!--:fr-->Ville<!--:--><!--:ar-->City<!--:-->"); ?> *</label><br />
						<input type="text" name="client-city" id="client-city" class="validate[required]" />
					</div>
					<div class="col">
						<label for="client-flight"><?php _e("<!--:en-->Flight<!--:--><!--:fr-->Vol<!--:--><!--:ar-->Flight<!--:-->"); ?> </label><br />
						<input type="text" name="client-flight" id="client-flight" />
					</div>
				</div><!-- .address -->
			</fieldset>

			<div class="btn-wrap">
				<input type="submit" name="valid" value="<?php _e("<!--:en-->Submit<!--:--><!--:fr-->Valider<!--:--><!--:ar-->Submit<!--:-->"); ?>" class="m-btn big color2" id="btn-valid-quotation" />
			</div>
			<span id="form-msg-conformation-paiement-confirmation" class="dnone"><?php _e("<!--:en-->Your invoice informations has been sent to us. Your invoice will be sent as soon as possible.<!--:--><!--:fr-->Vos informations de facturation nous ont bien été transmises, la facture vous sera envoyée dans les meilleurs délais.<!--:--><!--:ar-->Your invoice informations has been sent to us. Your invoice will be sent as soon as possible.<!--:-->"); ?></span>
		</form>
	</section>
  <?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>