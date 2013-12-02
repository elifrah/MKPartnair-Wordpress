<?php
/*
Template Name: Referral
*/
?>

<?php get_header(); ?>
<?php if (have_posts()) : ?>
  <?php while (have_posts()) : the_post(); ?>
	<section class="l-constrained-46 l-main">
		<div class="main-head">
			<h1 class="title-section"><?php the_title() ?></h1>
			<div class="main-content">
				<?php the_content() ?>
			</div>
		</div>		
		
		<form class="l-cols2 m-form" id="form-referral">
			<fieldset class="l-container">
				<div class="title">1. <?php _e("<!--:en-->Fill in the contact information of your referral<!--:--><!--:fr-->Saisissez les coordonnées de votre filleul(e)<!--:--><!--:ar-->Fill in the contact information of your referral<!--:-->"); ?></div>				
				<div class="row-civility row-form">
					<div class="col">
						<label><?php _e("<!--:en-->Civility<!--:--><!--:fr-->Civilité<!--:--><!--:ar-->Civility<!--:-->"); ?> *</label><br />
						<select name="friend-civility">
							<?php include('includes/form-civility.php') ?>
						</select>
					</div>
				</div><!-- .civility -->
				<div class="row-name row-form"> 
					<div class="col">
						<label for="friend-lastname"><?php _e("<!--:en-->Lastname<!--:--><!--:fr-->Nom<!--:--><!--:ar-->Lastname<!--:-->"); ?> *</label><br />
						<input type="text" name="friend-lastname" id="friend-lastname" class="validate[required]" />
					</div>
					<div class="col">
						<label for="friend-firstname"><?php _e("<!--:en-->Firstname<!--:--><!--:fr-->Prénom<!--:--><!--:ar-->Firstname<!--:-->"); ?> *</label><br />
						<input type="text" name="friend-firstname" id="friend-firstname" class="validate[required]" />
					</div>
				</div><!-- .name -->
				<div class="row-contact row-form">
					<div class="col">
						<label for="friend-email">Email *</label><br />
						<input type="text" name="friend-email" id="friend-email" class="validate[required,custom[email]]" />
					</div>
					<div class="col">
						<label for="friend-phone"><?php _e("<!--:en-->Phone<!--:--><!--:fr-->Téléphone<!--:--><!--:ar-->Phone<!--:-->"); ?></label><br />
						<input placeholder="<?php include('includes/form-phone-placeholder.php') ?>" type="text" name="friend-phone" id="friend-phone" />
					</div>
				</div><!-- .name -->
			</fieldset>
			
			<fieldset class="l-container">
				<div class="title">2. <?php _e("<!--:en-->Fill in the contact information of the person who should receive the gift check<!--:--><!--:fr-->Saisissez les coordonnées de la personne à qui seront adressé les chèques cadhoc<!--:--><!--:ar-->Fill in the contact information of the person who should receive the gift check<!--:-->"); ?></div>
				<div class="row-civility row-form">
					<div class="col">
						<label><?php _e("<!--:en-->Civility<!--:--><!--:fr-->Civilité<!--:--><!--:ar-->Civility<!--:-->"); ?> *</label><br />
						<select name="winner-civility">
							<?php include('includes/form-civility.php') ?>
						</select>
					</div>
					<div class="col">
						<?php _e("<!--:en-->Are you a client of MK Partnair ?<!--:--><!--:fr-->Etes-vous client MK Partnair ?<!--:--><!--:ar-->Are you customer Partnair MK?<!--:-->"); ?><br />
						<input type="radio" checked="checked" name="winner-is-client" id="winner-is-client-yes" value="Yes" />
						<label for="winner-is-client-yes" class="mr05"><?php _e("<!--:en-->Yes<!--:--><!--:fr-->Oui<!--:--><!--:ar-->Yes<!--:-->"); ?></label>
						<input type="radio" name="winner-is-client" id="winner-is-client-no" value="No" />
						<label for="winner-is-client-no"><?php _e("<!--:en-->No<!--:--><!--:fr-->Non<!--:--><!--:ar-->No<!--:-->"); ?></label>
					</div>
				</div><!-- .civility -->
				<div class="row-name row-form"> 
					<div class="col">
						<label for="winner-lastname"><?php _e("<!--:en-->Lastname<!--:--><!--:fr-->Nom<!--:--><!--:ar-->Lastname<!--:-->"); ?> *</label><br />
						<input type="text" name="winner-lastname" id="winner-lastname" class="validate[required]" />
					</div>
					<div class="col">
						<label for="winner-firstname"><?php _e("<!--:en-->Firstname<!--:--><!--:fr-->Prénom<!--:--><!--:ar-->Firstname<!--:-->"); ?> *</label><br />
						<input type="text" name="winner-firstname" id="winner-firstname" class="validate[required]" />
					</div>
				</div><!-- .name -->
				<div class="row-contact row-form">
					<div class="col">
						<label for="winner-email">Email *</label><br />
						<input type="text" name="winner-email" id="winner-email" class="validate[required,custom[email]]" />
					</div>
					<div class="col">
						<label for="winner-phone"><?php _e("<!--:en-->Phone<!--:--><!--:fr-->Téléphone<!--:--><!--:ar-->Phone<!--:-->"); ?></label><br />
						<input placeholder="<?php include('includes/form-phone-placeholder.php') ?>" type="text" name="winner-phone" id="winner-phone" />
					</div>
				</div><!-- .name -->
			</fieldset>
			
			<fieldset class="l-container">
				<div class="title">3. <?php _e("<!--:en-->Send a personalized email to your referral or let us take care of contacting them on your behalf<!--:--><!--:fr-->Envoyez un email personnalisé à votre contact ou laissez nous le soin de le contacter de votre part<!--:--><!--:ar-->Send a personalized email to your referral or let us take care of contacting them on your behalf<!--:-->"); ?></div>				
				<div class="row-form">
					<span class="pr1"><?php _e("<!--:en-->I will leave it to MK Partnair to contact my referral on my behalf.<!--:--><!--:fr-->Je laisse le soin à MK Partnair de contacter mon filleul(e) de ma part<!--:--><!--:ar-->I will leave it to MK Partnair to contact my referral on my behalf.<!--:-->"); ?></span>
					<input type="radio" checked="checked" name="winner-mkpartnair" id="winner-mkpartnair-yes" value="Yes" />
					<label for="winner-mkpartnair-yes" class="mr05"><?php _e("<!--:en-->Yes<!--:--><!--:fr-->Oui<!--:--><!--:ar-->Yes<!--:-->"); ?></label>
					<input type="radio" name="winner-mkpartnair" id="winner-mkpartnair-no" value="No" />
					<label for="winner-mkpartnair-no"><?php _e("<!--:en-->No<!--:--><!--:fr-->Non<!--:--><!--:ar-->No<!--:-->"); ?></label>
				</div>
				<div class="row-form-last" id="winner-message">
					<p class="mt0 dnone"><?php _e("<!--:en-->For your personalized reference email to your contact, you may use the text below and modify it as you see fit.<!--:--><!--:fr-->Afin de présenter votre offre de parrainage à votre filleul(e), utilisez ou personnalisez le texte ci-dessous :<!--:--><!--:ar-->For your personalized reference email to your contact, you may use the text below and modify it as you see fit.<!--:-->"); ?></p>
					<textarea class="disabled big" disabled name="winner-message"><?php _e("<!--:en-->Hello,

I am taking the liberty of sending you this email to let you know of the services offered by MK Partnair, a charter jet service and transportation agency. Being well aware that you use this kind of service, I thought this company might be of interest to you. I invite you to learn more about their business by clicking on the following link in the hope it may be of use.

Best regards,

Your Colleague<!--:--><!--:fr-->Bonjour,
															
Je me permets de vous envoyer cet email pour vous faire connaître les services de MK Partnair, entreprise d’affrètement de Jet Privé et d’organisation des déplacements. Sachant que vous utilisez ce type de service j’ai pensé que cela pouvait vous intéresser. Je vous invite à découvrir cette entreprise en cliquant sur le lien ci-dessous.
					
En espérant que cela puisse vous servir
					
Cordialement,
					
Votre parrain<!--:--><!--:ar-->Hello,

I am taking the liberty of sending you this email to let you know of the services offered by MK Partnair, a charter jet service and transportation agency. Being well aware that you use this kind of service, I thought this company might be of interest to you. I invite you to learn more about their business by clicking on the following link in the hope it may be of use.

Best regards,

Your Colleague<!--:-->"); ?>
					</textarea>
				</div>
			</fieldset>
			
			<div class="btn-wrap">
				<input type="submit" name="valid" value="<?php _e("<!--:en-->Submit<!--:--><!--:fr-->Valider<!--:--><!--:ar-->Submit<!--:-->"); ?>" class="m-btn big color2" id="btn-valid-quotation" />
			</div>
			
			<p class="mt3"><?php _e("<!--:en-->For more information on the terms of the recommendation,<!--:--><!--:fr-->Pour plus d’informations sur les modalités de recommandation,<!--:--><!--:ar-->For more information on the terms of the recommendation,<!--:-->"); ?> <a target="_blank" href="<?php echo goToPage( 163 ) ?>"><?php _e("<!--:en-->click here<!--:--><!--:fr-->cliquez ici<!--:--><!--:ar-->click here<!--:-->"); ?></a> <?php _e("<!--:en-->or contact us at +33 1 84 24 03 94.<!--:--><!--:fr-->ou contactez-nous au +33 1 84 24 03 94.<!--:--><!--:ar-->or contact us at +33 1 84 24 03 94.<!--:-->"); ?></p>
			
			<span id="form-msg-conformation-referral" class="dnone"><?php _e("<!--:en-->Your referral message has been sent.<!--:--><!--:fr-->Votre message de parrainage a bien été envoyé.<!--:--><!--:ar-->Your referral message has been sent.<!--:-->"); ?></span>
		</form>
	</section>
  <?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>