<?php get_header(); ?>
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
				<div class="step-active">
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
		
		<?php echo getTranslation( 1397 ) ?>

    <?php 
    $count = 1;
    foreach($propositions as $post) {
      setup_postdata($post);   
      $price_euros  = get_post_meta($params['id'], 'price_euros', true);
      $client_email = get_post_meta($params['id'], 'client_email', true);
    ?>
    <div class="l-container">
      <h2 class="title"><?php _e("<!--:en-->Propal<!--:--><!--:fr-->Proposition<!--:--><!--:ar-->Propal<!--:-->"); ?> <?php echo $count ?> : <?php the_title() ?></h2>
      <div class="reservation-iframe">
      	<iframe frameBorder="0" src="http://docs.google.com/gview?url=<?php the_field( 'proposition_[pdf]' ) ?>&embedded=true"></iframe>
    	</div>	
      <a class="m-btn color2" href="<?php echo $mk->get_sig($client_email, get_the_ID()); ?>"><?php _e("<!--:en-->Choose this offer<!--:--><!--:fr-->Choisir cette offre<!--:--><!--:ar-->Choose this offer<!--:-->"); ?></a>
    </div>
    <?php
    $count++;
     } ?>

     <div class="l-container">
     	<?php $the_query = new WP_Query( 'post_type=translation&p=1396&order=ASC' ); ?>
     	<?php while ( $the_query->have_posts() ) : ?>
				<?php $the_query->the_post(); ?>
				<h2 class="title"><?php the_title() ?></h2>
				<?php the_content() ?>
			<?php endwhile; wp_reset_postdata(); ?>    
     </div>
  </section>
</section>

<?php get_footer(); ?>