<?php
/*
Template Name: Quotation
*/
?>

<?php get_header(); ?>
<?php if (have_posts()) : ?>
  <?php while (have_posts()) : the_post(); ?>
	<section class="l-constrained-53 l-main">
		<div class="main-head">
			<h1 class="title-section l-constrained-46"><?php the_title() ?></h1>
			<?php the_content() ?>
		</div>

		<div class="m-steps" id="quotation-steps">
			<div class="steps-inner">
				<div class="step-active">
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

		<form class="l-constrained-41 pa0 l-cols2 m-form lang-<?php echo getLang() ?>" id="form-quotation">
			<fieldset class="l-container">
				<div class="title"><?php _e("<!--:en-->Your flight<!--:--><!--:fr-->Votre vol<!--:--><!--:ar-->Your flight<!--:-->"); ?></div>
				<div class="row-flight-type row-form">
					<div class="radio-wrap">
						<input type="radio" name="flight-type" checked="checked" id="flight-type1" value="Single" />
						<label for="flight-type1" class="mr2"><?php _e("<!--:en-->Single<!--:--><!--:fr-->Aller simple<!--:--><!--:ar-->Single<!--:-->"); ?></label>
					</div>
					<div class="radio-wrap">
						<input type="radio" name="flight-type" id="flight-type2" value="Round-Trip" />
						<label for="flight-type2" class="mr2"><?php _e("<!--:en-->Round-trip<!--:--><!--:fr-->Aller-retour<!--:--><!--:ar-->Round-trip<!--:-->"); ?></label>
					</div>
					<div class="radio-wrap">
						<input type="radio" name="flight-type" id="flight-type3" value="Multi-destination" />
						<label for="flight-type3"><?php _e("<!--:en-->Multi-destination<!--:--><!--:fr-->Multi-destination<!--:--><!--:ar-->Multi-destination<!--:-->"); ?></label>
					</div>
				</div>
				<div class="row-flight-departure row-form">
					<div class="col">
						<label for="flight-departure-town"><?php _e("<!--:en-->Departure City<!--:--><!--:fr-->Ville de départ<!--:--><!--:ar-->Departure City<!--:-->"); ?> *</label><br />
						<input type="text" name="flight-departure-town" id="flight-departure-town" class="validate[required]" />
					</div>
					<div class="col">
						<div class="schedule">
							<label><?php _e("<!--:en-->Schedule<!--:--><!--:fr-->Horaire<!--:--><!--:ar-->Schedule<!--:-->"); ?> *</label><br />
							<select name="flight-departure-schedule">
								<?php include( 'includes/form-schedule.php' ) ?>
							</select>
						</div>
						<div class="date">
							<label for="flight-departure-date"><?php _e("<!--:en-->Date of departure<!--:--><!--:fr-->Date de départ<!--:--><!--:ar-->Date of departure<!--:-->"); ?> *</label><br />
							<input type="date" name="flight-departure-date" id="flight-departure-date" class="input-date datepicker" min="<?php echo date( 'Y-m-d' ) ?>" />
							<span class="m-icon i-cal"></span>
						</div>
					</div>
				</div><!-- .flight-departure -->

				<?php for( $i=1;$i<6;$i++ ): ?>
				<div class="row-flight-step<? echo $i ?> row-form" id="row-flight-step<? echo $i ?>-block">
					<div class="col first">
						<label for="flight-step1-town" class="flight-step<? echo $i ?>-town-label"><?php _e("<!--:en-->City of step<!--:--><!--:fr-->Ville de l'étape<!--:--><!--:ar-->City of step<!--:-->"); ?> <? echo $i ?> *</label><br />
						<input type="text" name="flight-step<? echo $i ?>-town" id="flight-step<? echo $i ?>-town" /><br />
						<?php if( $i < 5 ): ?>
						<a href="#" class="btn-new-destination" id="row-flight-step<? echo $i + 1 ?>">+ <?php _e("<!--:en-->Add a new destination<!--:--><!--:fr-->Ajouter une nouvelle destination<!--:--><!--:ar-->Add a new destination<!--:-->"); ?></a>
						<?php endif ?>
					</div>
					<div class="col">
						<div class="schedule">
							<label><?php _e("<!--:en-->Schedule<!--:--><!--:fr-->Horaire<!--:--><!--:ar-->Schedule<!--:-->"); ?> *</label><br />
							<select name="flight-step<? echo $i ?>-schedule">
								<?php include( 'includes/form-schedule.php' ) ?>
							</select>
						</div>
						<div class="date">
							<label for="flight-departure-date<? echo $i ?>" class="flight-step<? echo $i ?>-date-label"><?php _e("<!--:en-->Date of departure step<!--:--><!--:fr-->Date de départ étape<!--:--><!--:ar-->Date of departure step<!--:-->"); ?> <? echo $i ?> *</label><br />
							<input type="date" name="flight-step<? echo $i ?>-date" id="flight-step<? echo $i ?>-date" class="input-date datepicker" min="<?php echo date( 'Y-m-d' ) ?>" />
							<span class="m-icon i-cal"></span>
						</div>
					</div>
				</div><!-- .flight-step<? echo $i ?> -->
				<?php endfor ?>

				<div class="row-flight-return row-form" id="row-flight-return">
					<div class="col">
						<label for="flight-return-town"><?php _e("<!--:en-->Arrival city<!--:--><!--:fr-->Ville d'arrivée<!--:--><!--:ar-->Arrival city<!--:-->"); ?> *</label><br />
						<input type="text" name="flight-return-town" id="flight-return-town" class="validate[required]" />
					</div>
					<div class="col date-wrap dnone">
						<div class="schedule">
							<label><?php _e("<!--:en-->Schedule<!--:--><!--:fr-->Horaire<!--:--><!--:ar-->Schedule<!--:-->"); ?> *</label><br />
							<select name="flight-return-schedule">
								<?php include( 'includes/form-schedule.php' ) ?>
							</select>
						</div>
						<div class="date">
							<label for="flight-return-date"><?php _e("<!--:en-->Return date<!--:--><!--:fr-->Date de retour<!--:--><!--:ar-->Return date<!--:-->"); ?> *</label><br />
							<input type="date" name="flight-return-date" id="flight-return-date" class="input-date datepicker" min="<?php echo date( 'Y-m-d' ) ?>" />
							<label for="flight-return-date" class="m-icon i-cal"></label>
						</div>
					</div>
				</div><!-- .flight-return -->
				<div class="row-passengers-budget row-form">
					<div class="col">
						<label for="flight-passengers"><?php _e("<!--:en-->Number of Passengers<!--:--><!--:fr-->Nombre de passagers<!--:--><!--:ar-->Number of Passengers<!--:-->"); ?> *</label><br />
						<select name="flight-passengers">
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
							<option value="19 - 30">19 - 30</option>
							<option value="31 - 50">31 - 50</option>
							<option value="51 - 100">51 - 100</option>
							<option value="101 - 150">101 - 150</option>
							<option value="151 - 200">151 - 200</option>
							<option value="201 - 300">201 - 300</option>
							<option value="+301">+301</option>
						</select>
					</div>
					<div class="col">
						<label for="flight-budget"><?php _e("<!--:en-->Your budget<!--:--><!--:fr-->Votre budget<!--:--><!--:ar-->Your budget<!--:-->"); ?></label><br />
						<input type="text" name="flight-budget" id="flight-budget" />
					</div>
				</div><!-- .passengers-budget -->
				<div class="row-informations row-form-last">
					<label for="flight-infos">
						<?php _e("<!--:en-->Information<!--:--><!--:fr-->Informations complémentaires<!--:--><!--:ar-->Information<!--:-->"); ?>
						<span class="sublabel"><?php _e("<!--:en-->Hotel reservation, car or other complementary services<!--:--><!--:fr-->Reservation d’hôtel, de voiture ou autre services complémentaires<!--:--><!--:ar-->Hotel reservation, car or other complementary services<!--:-->"); ?></span>
					</label>
					<textarea name="flight-infos" id="flight-infos"></textarea>
				</div><!-- .informations -->
			</fieldset>

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
			<div class="btn-wrap">
				<input type="submit" name="valid" value="<?php _e("<!--:en-->Submit<!--:--><!--:fr-->Valider<!--:--><!--:ar-->Submit<!--:-->"); ?>" class="m-btn big color2" id="btn-valid-quotation" />
			</div>
			<span id="form-msg-conformation-quotation" class="dnone"><?php _e("<!--:en-->Thank you for your quote request. An Expert from MK Partnair will contact you shortly to propose you the best solution<!--:--><!--:fr-->Votre demande à bien été prise en compte. Un expert de la société MK Partnair analyse votre demande pour vous proposer la meilleure solution.<!--:--><!--:ar-->Thank you for your quote request. An Expert from MK Partnair will contact you shortly to propose you the best solution<!--:-->"); ?></span>
		</form>
	</section>
  <?php endwhile; ?>
<?php endif; ?>

<!-- Google Code for Demande de Devis Conversion Page -->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 984171273;
var google_conversion_language = "en";
var google_conversion_format = "2";
var google_conversion_color = "ffffff";
var google_conversion_label = "wzzVCMe_0AYQiYal1QM";
var google_conversion_value = 0;
var google_remarketing_only = false;
/* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//www.googleadservices.com/pagead/conversion/984171273/?value=0&amp;label=wzzVCMe_0AYQiYal1QM&amp;guid=ON&amp;script=0"/>
</div>
</noscript>

<?php get_footer(); ?>