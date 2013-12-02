<?php
/*
Template Name: Fleet
*/
?>

<?php get_header(); ?>
<?php if (have_posts()) : ?>
  <?php while (have_posts()) : the_post(); ?>
	<section class="l-constrained-53 l-main nm-fleet" id="fleet-page">
		<div class="main-head">
			<h1 class="title-section"><?php the_title() ?></h1>
			<div class="main-content">
				<?php the_content() ?>
			</div>
		</div>
	<?php endwhile; ?>
<?php endif; ?>
	<hr class="double" />
	<form class="m-filters" id="fleet-filters">
		<div class="filters-col">
			<label><?php _e("<!--:en-->Number of Passengers<!--:--><!--:fr-->Nombre de passagers<!--:--><!--:ar-->عدد الركاب<!--:-->"); ?></label><br />
			<select name="fleet-passengers">
				<option value="0">-</option>
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5">5</option>
				<option value="6">6</option>
				<option value="7">7</option>
				<option value="8">8</option>
				<option value="9">9</option>
				<option value="10">10</option>
				<option value="11">11</option>
				<option value="12">12</option>
				<option value="13">13</option>
				<option value="14">14</option>
				<option value="15">15</option>
				<option value="16">16</option>
				<option value="17">17</option>
				<option value="18">18</option>
				<option value="19">19 - 50</option>
				<option value="51">51 - 100</option>
				<option value="101">101 - 200</option>
				<option value="201">+201</option>
			</select>
		</div>
		<div class="filters-col">
			<label><?php _e("<!--:en-->Autonomy<!--:--><!--:fr-->Autonomie<!--:--><!--:ar-->الحكم الذاتي<!--:-->"); ?></label><br />
			<select name="fleet-autonomy">
				<option value="0">-</option>
				<option value="1"><?php _e("<!--:en-->1 - 1500 nm<!--:--><!--:fr-->1 - 2500 km<!--:--><!--:ar-->1 - 2500 km<!--:-->"); ?></option>
				<option value="<?php _e("<!--:en-->1500<!--:--><!--:fr-->2500<!--:--><!--:ar-->2500<!--:-->"); ?>"><?php _e("<!--:en-->1500 - 3000 nm<!--:--><!--:fr-->2500 - 5000 km<!--:--><!--:ar-->2500 - 5000 km<!--:-->"); ?></option>
				<option value="<?php _e("<!--:en-->6000<!--:--><!--:fr-->5000<!--:--><!--:ar-->5000<!--:-->"); ?>"><?php _e("<!--:en-->3000 - 6000 nm<!--:--><!--:fr-->5000 - 10000 km<!--:--><!--:ar-->5000 - 10000 km<!--:-->"); ?></option>
				<option value="<?php _e("<!--:en-->6000<!--:--><!--:fr-->10000<!--:--><!--:ar-->10000<!--:-->"); ?>"><?php _e("<!--:en-->+6000 nm<!--:--><!--:fr-->+10000 km<!--:--><!--:ar-->+10000 km<!--:-->"); ?></option>
			</select>
		</div>
		<div class="filters-col filters-jet filters-checkbox filter-active">
			<span class="m-fake-checkbox is-checked"></span>
			<i class="icon i-private"></i>
			<span class="label"><?php _e("<!--:en-->Private jet<!--:--><!--:fr-->Jet privés<!--:--><!--:ar-->طائرة خاصة<!--:-->"); ?></span>
		</div>
		<div class="filters-col filters-airliner filters-checkbox filter-active">
			<span class="m-fake-checkbox is-checked"></span>
			<i class="icon i-airliner"></i>
			<span class="label"><?php _e("<!--:en-->Airliners<!--:--><!--:fr-->Avions de ligne<!--:--><!--:ar-->طائرات<!--:-->"); ?></span>
		</div>
	</form>
	
	<table class="m-table" id="fleet-table">
		<tr>
			<th><?php _e("<!--:en-->Builder<!--:--><!--:fr-->Constructeur<!--:--><!--:ar-->باني<!--:-->"); ?></th>
			<th><?php _e("<!--:en-->Type<!--:--><!--:fr-->Type<!--:--><!--:ar-->نوع<!--:-->"); ?></th>
			<th><?php _e("<!--:en-->Model<!--:--><!--:fr-->Modèle<!--:--><!--:ar-->نموذج<!--:-->"); ?></th>
			<th><?php _e("<!--:en-->Passengers<!--:--><!--:fr-->Passagers<!--:--><!--:ar-->الركاب<!--:-->"); ?></th>
			<th colspan="2"><?php _e("<!--:en-->Range<!--:--><!--:fr-->Autonomie<!--:--><!--:ar-->الحكم الذاتي<!--:-->"); ?></th>
		</tr>
		<?php query_posts( 'post_type=fleet&meta_key=number_of_passengers&orderby=meta_value_num&order=ASC' ) ?>
		<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : the_post(); ?>
			<tr class="fleet-plane plane-<?php echo trim( strtolower( get_field( 'type' ) ) ) ?>">
				<td><img src="<?php the_field( 'builder' ) ?>" height="30" /></td>
				<td><i class="icon i-<?php echo trim( strtolower( get_field( 'type' ) ) ) ?>"></i></td>
				<td><?php the_field( 'model' ) ?></td>
				<td class="plane-passengers"><?php the_field( 'number_of_passengers' ) ?></td>
				<td><span class="plane-autonomy"><?php the_field( 'autonomy_'.frForAr() ) ?></span> <?php _e("<!--:en-->nm<!--:--><!--:fr-->km<!--:--><!--:ar-->km<!--:-->"); ?></td>
				<td><a href="#" class="m-btn small" id="dialog-<?php the_ID() ?>">+ <?php _e("<!--:en-->details<!--:--><!--:fr-->détails<!--:--><!--:ar-->تفاصيل<!--:-->"); ?></a></td>
			</tr>
			<?php endwhile; ?>
		<?php endif; ?>			
	</table>					
	
</section><!-- .l-constrained-53 .l-main .nm-fleet --> 

<?php include_once('module-cta.php') ?>

<div class="dialogs-wrap dnone">
<?php query_posts( 'post_type=fleet&meta_key=number_of_passengers&orderby=meta_value_num&order=ASC' ) ?>
<?php if ( have_posts() ) : ?>
	<?php while ( have_posts() ) : the_post(); ?>
	<div id="fleet-dialog-<?php the_ID() ?>" title="<?php the_title() ?>" class="dnone dialog-inner <?php echo trim( strtolower( get_field( 'type' ) ) ) ?>">
		<a href="javascript:alert('test');" class="m-btn color1 btn-close mini"><?php _e("<!--:en-->Close<!--:--><!--:fr-->Fermer<!--:--><!--:ar-->Close<!--:-->"); ?></a>
		<h3 class="dialog-title"><?php the_title() ?></h3>
		<ul class="dialog-btns">
			<li><a href="<?php echo goToPage( 2, $_GET['lang'] ) ?>" class="m-btn big color2"><?php _e("<!--:en-->Request a quote<!--:--><!--:fr-->Demander un devis<!--:--><!--:ar-->Request a quote<!--:-->"); ?></a></li>
			<li><a href="<?php the_field( 'pdf_for_print_'.enForAr() ) ?>" target="_blank" class="m-btn big white"><?php _e("<!--:en-->PDF file<!--:--><!--:fr-->Fiche PDF<!--:--><!--:ar-->PDF file<!--:-->"); ?></a></li>
		</ul>
		<div class="dialog-content">
			<div class="l-cols3">
				<div class="col">
					<img class="first" src="<?php the_field( 'photo_left_1' ) ?>" />
					<img src="<?php the_field( 'photo_left_2' ) ?>" />
				</div>
				<div class="col last double">
					<img src="<?php the_field( 'photo_cutting' ) ?>" />
					<h3 class="dialog-subtitle"><?php _e("<!--:en-->Aircraft Characteristics<!--:--><!--:fr-->Caractéristiques de l'appareil<!--:--><!--:ar-->Aircraft Characteristics<!--:-->"); ?></h3>
					<table>
						<tr>
							<td class="label"><?php _e("<!--:en-->Aircraft category<!--:--><!--:fr-->Catégorie de l'avion<!--:--><!--:ar-->Aircraft category<!--:-->"); ?></td>
							<td><?php the_field( 'category_'.getLang() ) ?></td>
						</tr>
						<tr>
							<td class="label"><?php _e("<!--:en-->Passengers<!--:--><!--:fr-->Nombre de passagers<!--:--><!--:ar-->Passengers<!--:-->"); ?></td>
							<td><?php the_field( 'number_of_passengers' ) ?></td>
						<tr>
						<tr>
							<td class="label"><?php _e("<!--:en-->Cuise speed<!--:--><!--:fr-->Vitesse de croisière<!--:--><!--:ar-->Cuise speed<!--:-->"); ?></td>
							<td><?php the_field( 'speed_of_cruise_'.frForAr() ) ?> <?php _e("<!--:en-->kt<!--:--><!--:fr-->km/h<!--:--><!--:ar-->km/h<!--:-->"); ?></td>
						</tr>
						<tr>
							<td class="label"><?php _e("<!--:en-->Range<!--:--><!--:fr-->Autonomie<!--:--><!--:ar-->Range<!--:-->"); ?></td>
							<td><?php the_field( 'autonomy_'.frForAr() ) ?> <?php _e("<!--:en-->nm<!--:--><!--:fr-->km<!--:--><!--:ar-->km<!--:-->"); ?></td>
						</tr>
						<tr>
							<td class="label"><?php _e("<!--:en-->Crew<!--:--><!--:fr-->Equipage<!--:--><!--:ar-->Crew<!--:-->"); ?></td>
							<td><?php the_field( 'equipage_'.getLang() ) ?></td>
						</tr>
					</table>
				</div>
			</div>
		</div>
		<p class="dialog-coordinates">
			www.mkpartnair.com<br />
			Tel +33 1 84 24 03 94<br />
			Fax +33 1 84 24 03 92<br />
			<a href="mailto:contact@mkpartnair.com">contact@mkpartnair.com</a>
		</p>
	</div>
	<?php endwhile; ?>
<?php endif; ?>
</div>

<?php get_footer(); ?>