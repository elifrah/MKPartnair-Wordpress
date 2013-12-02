<?php
/*
Template Name: Flash
*/
?>

<?php get_header(); ?>
<?php if (have_posts()) : ?>
  <?php while (have_posts()) : the_post(); ?>
	<section class="l-constrained-57 l-main n-flash mb3">
		<div class="main-head">
			<h1 class="title-section"><?php the_title() ?></h1>
			<b><?php the_field( 'text_intro_'.getLang() ) ?></b>
	<?php endwhile; ?>
<?php endif; ?>	
			<table class="m-table mb2 mt2" id="flash-table">
				<tr>
					<th><?php _e("<!--:en-->Departure<!--:--><!--:fr-->Départ<!--:--><!--:ar-->رحيل<!--:-->"); ?></th>
					<th><?php _e("<!--:en-->Arrival<!--:--><!--:fr-->Arrivée<!--:--><!--:ar-->وصول<!--:-->"); ?></th>
					<th><?php _e("<!--:en-->Available from<!--:--><!--:fr-->Disponible du<!--:--><!--:ar-->المتاحة من<!--:-->"); ?></th>
					<th><?php _e("<!--:en-->To<!--:--><!--:fr-->Au<!--:--><!--:ar-->إلى<!--:-->"); ?></th>
					<th><?php _e("<!--:en-->Plane<!--:--><!--:fr-->Avion<!--:--><!--:ar-->الطائرات<!--:-->"); ?></th>
					<th><?php _e("<!--:en-->Capacity<!--:--><!--:fr-->Capacité<!--:--><!--:ar-->قدرة<!--:-->"); ?></th>
					<th><?php _e("<!--:en-->Price<!--:--><!--:fr-->Prix<!--:--><!--:ar-->السعر<!--:-->"); ?></th>
					<th><?php _e("<!--:en-->Check availability<!--:--><!--:fr-->Vérifier la disponibilité<!--:--><!--:ar-->تأكد من توفر الغرف<!--:-->"); ?></th>
				</tr>

				<?php
				//the filter to sort by date in custom field
				add_filter( 'posts_orderby', 'wdw_query_orderby_postmeta_date', 10, 1);
				query_posts( 'post_type=flash&meta_key=available_from&orderby=meta_value_num date&order=ASC' ) ?>
				<?php 
        query_posts( array( 
          'post_type'   => 'flash',       
          'meta_key'    => 'available_from',
          'orderby'     => 'meta_value',  
          'order'       => 'asc'
        	)
        ); ?>
				  <?php if ( have_posts() ) : ?>
					<?php while ( have_posts() ) : the_post(); ?>
					<tr>
						<td><?php the_field( 'departure' ) ?></td>
						<td><?php the_field( 'arrival' ) ?></td>
						<td><?php the_field( 'available_from' ) ?></td>
						<td><?php the_field( 'available_to' ) ?></td>
						<td><?php the_field( 'plane' ) ?></td>
						<td><?php the_field( 'capacity' ) ?></td>
						<td><?php the_field( 'price_'.enForAr() ) ?></td>
						<td><a href="#" class="m-btn small" id="dialog-<?php the_ID() ?>">+ <?php _e("<!--:en-->I'm interested<!--:--><!--:fr-->Je suis intéressé<!--:--><!--:ar-->I'm interested<!--:-->"); ?></a></td>
					</tr>
					<?php endwhile; ?>
				<?php endif; wp_reset_query();
				//once done, dont forget to remove that filter
				remove_filter( 'posts_orderby', 'wdw_query_orderby_postmeta_date', 10, 1);
				?>		

			</table>	
			
			<?php if (have_posts()) : ?>
			  <?php while (have_posts()) : the_post(); ?>
				<div class="main-content">
					<?php the_content() ?>
				</div>
			  <?php endwhile; ?>
			<?php endif; ?>		
		</div>
	
</section><!-- .l-constrained-53 .l-main .nm-fleet --> 

<div class="dialogs-wrap dnone">
<?php query_posts( 'post_type=flash' ) ?>
<?php if ( have_posts() ) : ?>
	<?php while ( have_posts() ) : the_post(); ?>
	<div id="flash-dialog-<?php the_ID() ?>" title="<?php the_field( 'plane' ) ?>" class="dnone dialog-inner">
		<a href="#" class="m-btn color1 btn-close mini"><?php _e("<!--:en-->Close<!--:--><!--:fr-->Fermer<!--:--><!--:ar-->أغلق<!--:-->"); ?></a>
		<div class="dialog-content row-fluid">
			<div class="span5">
				<h3 class="dialog-title"><?php the_field( 'plane' ) ?></h3>
				<h4 class="dialog-subtitle"><?php _e("<!--:en-->Details of flight<!--:--><!--:fr-->Details du vol<!--:--><!--:ar-->Details of flight<!--:-->"); ?></h4>
				<table>
					<tr>
						<td class="label"><?php _e("<!--:en-->From<!--:--><!--:fr-->De<!--:--><!--:ar-->From<!--:-->"); ?></td>
						<td><?php the_field( 'departure' ) ?></td>
					</tr>
					<tr>
						<td class="label"><?php _e("<!--:en-->To<!--:--><!--:fr-->&Agrave;<!--:--><!--:ar-->To<!--:-->"); ?></td>
						<td><?php the_field( 'arrival' ) ?></td>
					</tr>
					<tr>
						<td class="label"><?php _e("<!--:en-->Type<!--:--><!--:fr-->Type<!--:--><!--:ar-->Type<!--:-->"); ?></td>
						<td><?php the_field( 'plane' ) ?></td>
					</tr>	
					<tr>
						<td class="label"><?php _e("<!--:en-->Passengers<!--:--><!--:fr-->Passagers<!--:--><!--:ar-->Passengers<!--:-->"); ?></td>
						<td><?php the_field( 'capacity' ) ?></td>
					</tr>	
					<tr>
						<td class="label"><?php _e("<!--:en-->Available<!--:--><!--:fr-->Disponible<!--:--><!--:ar-->Available<!--:-->"); ?></td>
						<td><?php _e("<!--:en-->from<!--:--><!--:fr-->du<!--:--><!--:ar-->from<!--:-->"); ?> <?php the_field( 'available_from' ) ?> <?php _e("<!--:en-->to<!--:--><!--:fr-->au<!--:--><!--:ar-->to<!--:-->"); ?> <?php the_field( 'available_to' ) ?></td></td>
					</tr>		
				</table>
			</div>
			<div class="span7">
				<form class="m-form l-cols2 ma0 form-popin-flash">
					<div class="row-form" id="flash-popin-message">
						<label for="flash-popin-message"><?php _e("<!--:en-->Message<!--:--><!--:fr-->Message<!--:--><!--:ar-->Message<!--:-->"); ?> *</label>
						<br />
						<textarea name="flash-popin-message" id="flash-popin-message"><?php _e("<!--:en-->Hi, I am interested in this flight. You can find my contact information below, thank you to contact me as soon as possible.<!--:--><!--:fr-->Bonjour, je suis intéressé par ce vol. Vous trouverez ci-dessous mes coordonnés, merci de me contacter dans les meilleurs délais.<!--:--><!--:ar-->Hi, I am interested in this flight. You can find my contact information below, thank you to contact me as soon as possible.<!--:-->"); ?>
						</textarea>
					</div>
					<div class="row-name row-form">
						<div class="col"> 
							<div class="col">
								<label for="flash-popin-passengers"><?php _e("<!--:en-->Passengers<!--:--><!--:fr-->Passagers<!--:--><!--:ar-->Passengers<!--:-->"); ?> *</label><br />
								<select name="flash-popin-passengers" id="flash-popin-passengers">
									<?php include('includes/form-passengers.php') ?>
								</select>
							</div>
							<div class="col last">
								<label><?php _e("<!--:en-->Civility<!--:--><!--:fr-->Civilité<!--:--><!--:ar-->Civility<!--:-->"); ?> *</label><br />
								<select name="flash-popin-civility">
									<?php include('includes/form-civility.php') ?>
								</select>
							</div><!-- .col -->
						</div><!-- .col -->
						<div class="col last">
							<label for="flash-popin-name"><?php _e("<!--:en-->Name<!--:--><!--:fr-->Nom<!--:--><!--:ar-->Name<!--:-->"); ?> *</label><br />
							<input type="text" name="flash-popin-name" id="flash-popin-name" class="validate[required]" />
						</div><!-- .col -->				
					</div><!-- .name -->
					<div class="row-email row-form">				<div class="col"> 
							<label for="flash-popin-email"><?php _e("<!--:en-->Email<!--:--><!--:fr-->Email<!--:--><!--:ar-->Email<!--:-->"); ?> *</label><br />
							<input type="text" name="flash-popin-email" id="flash-popin-email" class="validate[required]" />
						</div>
						<div class="col last"> 
							<label for="flash-popin-phone"><?php _e("<!--:en-->Phone<!--:--><!--:fr-->Téléphone<!--:--><!--:ar-->Phone<!--:-->"); ?> *</label><br />
							<input type="text" name="flash-popin-phone" id="flash-popin-phone" class="validate[required]"  placeholder="<?php _e("<!--:en-->specify the country code (eg +33)<!--:--><!--:fr-->Précisez l'indicatif (ex: +33)<!--:--><!--:ar-->specify the country code (eg +33)<!--:-->"); ?>" />
						</div><!-- .col -->
					</div><!-- .row-email -->

					<input type="hidden" value="<?php the_field( 'plane' ) ?>" name="flash-popin-plane" />
					<input type="hidden" value="<?php the_field( 'departure' ) ?>" name="flash-popin-departure" />
					<input type="hidden" value="<?php the_field( 'arrival' ) ?>" name="flash-popin-arrival" />
					<input type="hidden" value="<?php the_field( 'capacity' ) ?>" name="flash-popin-capacity" />
					<input type="hidden" value="<?php the_field( 'available_from' ) ?>" name="flash-popin-available_from" />
					<input type="hidden" value="<?php the_field( 'available_to' ) ?>" name="flash-popin-available_to" />

					<div class="btn-wrap">
						<input type="submit" name="valid" value="<?php _e("<!--:en-->Submit<!--:--><!--:fr-->Valider<!--:--><!--:ar-->Submit<!--:-->"); ?>" class="m-btn big color2" id="btn-valid-quotation" />
					</div>				

					<span id="form-msg-conformation-popin-flash" class="dnone"><?php _e("<!--:en-->Thank you for your « flash sales » request. An Expert from MK Partnair will contact you shortly to propose you the best solution<!--:--><!--:fr-->Votre demande pour cette vente flash à bien été prise en compte. Un expert de la société MK Partnair analyse votre demande pour vous proposer la meilleure solution.<!--:--><!--:ar-->Thank you for your « flash sales » request. An Expert from MK Partnair will contact you shortly to propose you the best solution<!--:-->"); ?></span>
				</form>
			</div><!-- .span7 -->
		</div><!-- .dialog-content -->
	</div><!-- .dialog-inner -->
	<?php endwhile; ?>
<?php endif; ?>
</div><!-- .dialogs-wrap -->

<?php get_footer(); ?>