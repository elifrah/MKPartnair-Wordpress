<?php
/*
Template Name: Alert
*/
?>

<?php get_header(); ?>
<?php if (have_posts()) : ?>
  <?php while (have_posts()) : the_post(); ?>
	<section class="l-constrained-53 l-main n-flash mb3">
		<div class="main-head">
			<h1 class="title-section"><?php the_title() ?></h1>
			<?php the_content() ?>
	<?php endwhile; ?>
<?php endif; ?>	

		<form class="m-form" id="form-flash">
			<fieldset class="l-container l-cols2">
				<div class="title"><?php _e("<!--:en-->Subscribe<!--:--><!--:fr-->S’abonner<!--:--><!--:ar-->Subscribe<!--:-->"); ?></div>
				<div class="row-name row-form"> 
					<div class="col">
						<label for="flash-lastname"><?php _e("<!--:en-->Lastname<!--:--><!--:fr-->Nom<!--:--><!--:ar-->Lastname<!--:-->"); ?> *</label><br />
						<input type="text" name="flash-lastname" id="flash-lastname" class="validate[required]" />
					</div>
					<div class="col">
						<label for="flash-firstname"><?php _e("<!--:en-->Firstname<!--:--><!--:fr-->Prénom<!--:--><!--:ar-->Firstname<!--:-->"); ?> *</label><br />
						<input type="text" name="flash-firstname" id="flash-firstname" class="validate[required]" />
					</div>
				</div><!-- .name -->
				<div class="row-contact row-form">
					<div class="col">
						<label for="flash-email">Email *</label><br />
						<input type="text" name="flash-email" id="flash-email" class="validate[required,custom[email]]" />
					</div>
					<div class="col">
						<label for="flash-phone"><?php _e("<!--:en-->Phone<!--:--><!--:fr-->Téléphone<!--:--><!--:ar-->Phone<!--:-->"); ?> *</label><br />
						<input placeholder="<?php include('includes/form-phone-placeholder.php') ?>" type="text" name="flash-phone" id="flash-phone" class="validate[required]" />
					</div>
				</div><!-- .name -->
				<div class="row-cities row-form">
					<div class="col">
						<label for="flash-city1"><?php _e("<!--:en-->Favorite city 1<!--:--><!--:fr-->Ville favorite 1<!--:--><!--:ar-->Favorite city 1<!--:-->"); ?> *</label><br />
						<input type="text" name="flash-city1" id="flash-city1" class="validate[required]" />
					</div>
					<div class="col">
						<label for="flash-city2"><?php _e("<!--:en-->Favorite city 2<!--:--><!--:fr-->Ville favorite 2<!--:--><!--:ar-->Favorite city 2<!--:-->"); ?> *</label><br />
						<input type="text" name="flash-city2" id="flash-city2" class="validate[required]" />
					</div>
				</div><!-- .city -->
				<div class="row-cities row-form">
					<div class="col">
						<label for="flash-city3"><?php _e("<!--:en-->Favorite city 3<!--:--><!--:fr-->Ville favorite 3<!--:--><!--:ar-->Favorite city 3<!--:-->"); ?></label><br />
						<input type="text" name="flash-city3" id="flash-city3" />
					</div>
					<div class="col">
						<label for="flash-city4"><?php _e("<!--:en-->Favorite city 4<!--:--><!--:fr-->Ville favorite 4<!--:--><!--:ar-->Favorite city 4<!--:-->"); ?></label><br />
						<input type="text" name="flash-city4" id="flash-city4" />
					</div>
				</div><!-- .city -->
				<div class="row-form-last">
					<span class="pr1"><?php _e("<!--:en-->You want to be notified by<!--:--><!--:fr-->Vous souhaitez être averti par<!--:--><!--:ar-->You want to be notified by<!--:-->"); ?></span>
					<input type="radio" checked="checked" name="flash-alert" id="flash-alert-mail" value="Mail" />
					<label for="flash-alert-mail" class="mr05"><?php _e("<!--:en-->Mail<!--:--><!--:fr-->Email<!--:--><!--:ar-->Mail<!--:-->"); ?></label>
					<input type="radio" name="flash-alert" id="flash-alert-sms" value="SMS" />
					<label for="flash-alert-sms"><?php _e("<!--:en-->SMS<!--:--><!--:fr-->SMS<!--:--><!--:ar-->SMS<!--:-->"); ?></label>
					<br />
					<small><?php _e("<!--:en-->Alert is sent to one per week.<!--:--><!--:fr-->1 alerte est envoyée au maximum par semaine.<!--:--><!--:ar-->Alert is sent to one per week.<!--:-->"); ?></small>
				</div>
			</fieldset>

			<div class="btn-wrap">
				<input type="submit" name="valid" value="<?php _e("<!--:en-->Submit<!--:--><!--:fr-->Valider<!--:--><!--:ar-->Submit<!--:-->"); ?>" class="m-btn big color2" id="btn-valid-quotation" />
			</div>

			<span id="form-msg-conformation-flash" class="dnone"><?php _e("<!--:en-->We will confirm your registration jet alert.<!--:--><!--:fr-->Nous confirmons votre inscription à l'alerte jet.<!--:--><!--:ar-->We will confirm your registration jet alert.<!--:-->"); ?></span>
		</form>

		<p class="mt3"><?php _e("<!--:en-->For more information on our flash sales and the « Jet Alert » program, contact us at +33 1 84 24 03 94 or by email at<!--:--><!--:fr-->Pour plus d’informations sur nos ventes flash et notre programme « Alerte Jet » contactez-nous au +33 1 84 24 03 94 ou par email à<!--:--><!--:ar-->For more information on our flash sales and the « Jet Alert » program, contact us at +33 1 84 24 03 94 or by email at<!--:-->"); ?> <a href="mailto:contact@mkpartnair.com">contact@mkpartnair.com</a>.</p>
	</section>

<?php get_footer(); ?>