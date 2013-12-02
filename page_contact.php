<?php
/*
Template Name: Contact
*/
?>

<?php get_header(); ?>
<?php if (have_posts()) : ?>
  <?php while (have_posts()) : the_post(); ?>
	<section class="l-constrained-53 l-main">
		<div class="main-head">
			<h1 class="title-section"><?php the_title() ?></h1>
			<div class="main-content mt1">
				<?php the_content() ?>
			</div>
		</div>

		<form class="l-cols2 m-form lang-<?php echo getLang() ?>" id="form-contact">
			
			<fieldset class="l-container l-cols2">
				<div class="title"><?php _e("<!--:en-->Your information<!--:--><!--:fr-->Vos informations<!--:--><!--:ar-->Your information<!--:-->"); ?></div>
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
						<label for="client-email">Email *</label><br />
						<input type="text" name="client-email" id="client-email" class="validate[required,custom[email]]" />
					</div>
					<div class="col">
						<label for="client-phone"><?php _e("<!--:en-->Phone<!--:--><!--:fr-->Téléphone<!--:--><!--:ar-->Phone<!--:-->"); ?> *</label><br />
						<input type="text" name="client-phone" id="client-phone" class="validate[required]" placeholder="<?php include('includes/form-phone-placeholder.php') ?>" />
					</div>
				</div><!-- .name -->
			</fieldset>

			<fieldset class="l-container">
				<div class="title">Message</div>
				<div class="row-form">
					<textarea name="client-message"></textarea>
				</div>
			</fieldset>

			<div class="btn-wrap">
				<input type="submit" name="valid" value="<?php _e("<!--:en-->Submit<!--:--><!--:fr-->Valider<!--:--><!--:ar-->Submit<!--:-->"); ?>" class="m-btn big color2" id="btn-valid-quotation" />
			</div>
			<span id="form-msg-conformation-contact" class="dnone"><?php _e("<!--:en-->Your email has been sent to us. We will reply as soon as possible.<!--:--><!--:fr-->Votre email nous a bien été envoyé. Nous vous répondrons dès que possible.<!--:--><!--:ar-->Your email has been sent to us. We will reply as soon as possible.<!--:-->"); ?></span>
		</form>
	</section>
  <?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>