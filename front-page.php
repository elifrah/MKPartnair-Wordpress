<?php get_header(); ?>

<?php if ( !$mobile_detect->isMobile() || $mobile_detect->isTablet() ): ?>
<div class="liquid-slider-gradient-wrap">
	<section class="liquid-slider preload" id="home-slider">
		<?php query_posts( 'post_type=slider&order=ASC' ) ?>
		<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : the_post(); ?>
			<article class="panel">
				<div class="text l-constrained">
					<h2 class="title"><?php the_title() ?></h2>
					<div class="subtitle"><?php the_content() ?></div>				
					<ul class="cta">
						<?php if( get_field('enable_button_quotation') == 'Yes' ): ?>
						<li><a href="<?php echo goToPage( 2 ) ?>" class="m-btn color2 big"><?php _e("<!--:en-->Free quote<!--:--><!--:fr-->Devis en ligne<!--:--><!--:ar-->تخمين كلفة السفر الكترونيا <!--:-->"); ?></a></li>					
						<?php endif ?>
						<?php if( get_field('link_to_know_more') ): ?>
						<li><a href="<?php the_field('link_to_know_more') ?>" class="m-btn <?php echo ( get_field('enable_button_quotation') != 'Yes' ) ? 'color2' : '' ?> big"><?php _e("<!--:en-->Learn more<!--:--><!--:fr-->En savoir plus<!--:--><!--:ar-->لمزيد من المعلومات <!--:-->"); ?></a></li>
						<?php else: ?>
						<li><a href="<?php echo goToPage( 457 ) ?>" class="m-btn <?php echo ( get_field('enable_button_quotation') != 'Yes' ) ? 'color2' : '' ?> big"><?php _e("<!--:en-->Contact Us<!--:--><!--:fr-->Nous contacter<!--:--><!--:ar-->الاتصال بنا<!--:-->"); ?></a></li>
						<?php endif ?>
					</ul>
				</div>
				<?php the_post_thumbnail(); ?>
			</article>
			<?php endwhile; ?>
		<?php endif; ?>	
	</section><!-- .coda-slider -->	
	<span class="white-gradient"></span>
</div>
<?php endif ?>
		
<div class="l-constrained-lesspadding p-relative z-index10">
	<?php if ( $mobile_detect->isMobile() && !$mobile_detect->isTablet() ): ?>
	<section class="l-grid l-cols4 clearfix">
		<?php query_posts( 'post_type=slider&order=ASC' ) ?>
		<?php if ( have_posts() ) : $count_slider = 1; ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php if( get_field('link_to_know_more') ): ?>
					<?php $slideLink = get_field('link_to_know_more'); ?>			
				<?php else: ?>
					<?php $slideLink = goToPage( 2 ); ?>			
				<?php endif ?>
				<article class="article col<?php echo ($count_slider == 2) ? ' second' : ''; echo ($count_slider == 4) ? ' last' : ''; ?>">
					<h2 class="title"><a href="<?php echo $slideLink ?>"><?php the_title() ?></a></h2>
					<a href="<?php echo $slideLink ?>"><img src="<?php the_field( 'image_mobile' ); ?>" alt="<?php the_title(); ?>" /></a>
					<?php the_content() ?>
					<?php if( get_field('link_to_know_more') ): ?>
					<a href="<?php the_field('link_to_know_more') ?>" class="more"><?php _e("<!--:en-->Learn more<!--:--><!--:fr-->En savoir plus<!--:--><!--:ar-->لمزيد من المعلومات <!--:-->"); ?></a>
					<?php else: ?>
					<a href="<?php echo goToPage( 2 ) ?>" class="more"><?php _e("<!--:en-->Free quote<!--:--><!--:fr-->Devis en ligne<!--:--><!--:ar-->على الانترنت اقتباس<!--:-->"); ?></a>
					<?php endif ?>
				</article>
				<?php $count_slider++ ?>
			<?php endwhile; ?>
		<?php endif; ?>
	</section>
	<?php include('module-cta.php') ?>
	<?php endif ?>
	
	<section class="l-grid l-cols4 clearfix">
		<?php query_posts( 'post_type=push&order=ASC' ) ?>
		<?php if ( have_posts() ) : $count_push = 1; ?>
			<?php while ( have_posts() ) : the_post(); ?>
			<article class="article col<?php echo ($count_push == 2) ? ' second' : ''; echo ($count_push == 4) ? ' last' : ''; ?>" style="margin-bottom: 4%;">
				<h2 class="title"><a href="<?php the_field('link') ?>" title="<?php the_title() ?>"><?php the_title() ?></a></h2>
				<a href="<?php the_field('link') ?>"><?php the_post_thumbnail(); ?></a>
				<?php the_content() ?>
				<a href="<?php the_field('link') ?>" class="more"><?php _e("<!--:en-->Learn more<!--:--><!--:fr-->En savoir plus<!--:--><!--:ar-->معرفة المزيد<!--:-->"); ?></a>
			</article>
			<?php $count_push++ ?>
			<?php endwhile; ?>
		<?php endif; ?>
	</section>
	
	<section class="l-grid l-cols2 clearfix">
		<?php query_posts( 'post_type=indexing&order=ASC' ) ?>
		<?php if ( have_posts() ) : $count_push = 1; ?>
			<?php while ( have_posts() ) : the_post(); ?>
			<article class="col" <?php echo ($count_push == 1) ? 'style="width: 40%; text-align: left"' : ''; echo ($count_push == 2) ? 'style="width: 58%; text-align: left"' : ''; ?> >
				<h2 style="text-align: left;font: 300 1.25em/1.5 'Oswald',sans-serif;margin: 0;color: #971a2a;"><?php the_title() ?></h2>
				<p><?php the_field( 'indexing_text' ) ?></p>
				<a href="" class="more"><?php _e("<!--:en-->Learn more<!--:--><!--:fr-->En savoir plus<!--:--><!--:ar-->معرفة المزيد<!--:-->"); ?></a>
			</article>
			<?php $count_push++ ?>
			<?php endwhile; ?>
		<?php endif; ?>
	</section>
	
	<section class="m-testimonies <?php echo getDeviceClass( $mobile_detect ) ?>" id="home-testimonies">
		<?php query_posts( 'post_type=testimonies&order=ASC' ) ?>
		<?php if ( have_posts() ) : $count_testimonies = 1; ?>
			<?php while ( have_posts() ) : the_post(); ?>
			<div onclick="document.location.href = '<?php echo goToPage( 81 ) ?>'" class="slide<?php echo $count_testimonies; echo ($count_testimonies > 1) ? ' dnone' : '' ?>">
				<blockquote cite="#" class="blockquote">
					<span class="quote-first">“</span> <?php the_title() ?> <span class="quote-last">”</span>
				</blockquote><br />
				<span class="who">- <?php the_field( 'who' ) ?> -</span>
			</div>
			<?php $count_testimonies++ ?>
			<?php endwhile; ?>
		<?php endif; ?>
	</section>
	
	<hr class="double mt0" />
	
	<?php include('module-cta.php') ?>
</div><!-- .l-constrained -->

<section class="m-clients">
	<div class="l-constrained">
		<h2 class="title"><a href="<?php echo goToPage( 605 ) ?>"><?php _e("<!--:en-->They trust us<!--:--><!--:fr-->Ils nous font confiance<!--:--><!--:ar-->انهم يثقون بنا<!--:-->"); ?></a></h2>
		<ul>
			<?php
			if( $mobile_detect->isMobile() && !$mobile_detect->isTablet() )
				$postPerPage = 4;
			else
				$postPerPage = 8;
			?>
			<?php query_posts( 'post_type=partners&meta_key=order&orderby=meta_value_num&order=ASC&posts_per_page='.$postPerPage ) ?>
			<?php if ( have_posts() ): ?>
				<?php while ( have_posts() ) : the_post(); ?>		  		
				<li><a href="<?php echo goToPage( 605 ) ?>" title="<?php the_title() ?>"><img src="<?php the_field( 'logo' ) ?>" alt="<?php the_title() ?>" /></a></li>
				<?php endwhile; ?>
			<?php endif; ?>
		</ul>
	</div><!-- .l-constrained -->
</section>
<?php get_footer(); ?>