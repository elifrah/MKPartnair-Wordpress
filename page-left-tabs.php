<?php
/*
Template Name: Left Tabs
*/
?>

<?php get_header(); ?>

<?php if (have_posts()) : ?>
  <?php while (have_posts()) : the_post(); ?>
	<section class="l-constrained l-main l-tabs-page">
		<div class="title-img">			
				<?php if( has_post_thumbnail() ): ?>
    			<?php the_post_thumbnail( 'full' ) ?>
    		<?php else: ?>
    			<img src="<?php bloginfo('template_url') ?>/img/slider/slide1.jpg" />
    		<?php endif ?>
			<h1 class="title-img-inner"><?php the_title() ?></h1>
			<div class="title-white-gradient"></div>
		</div>
		<div class="tabs-page-intro">
			<?php the_content() ?>
		</div>
		
		<?php 		
		if( get_the_ID() == 15 ) {
			$pageToInclude = 'advantages'; 
		} else if( get_the_ID() == 43 ) {
			$pageToInclude = 'whymkpartnair'; 
		}
		?>
		
  <?php endwhile; ?>
<?php endif; ?>	
		<?php if ( !$mobile_detect->isMobile() || $mobile_detect->isTablet() ): ?>
		
		<div class="m-left-tabs" id="tabs-page-tabs">
			<ul class="tabs-menu">
				<?php query_posts( 'post_type='.$pageToInclude.'&meta_key=order&orderby=meta_value_num&order=ASC' ); $number = 1; ?>
				<?php if ( have_posts() ) : ?>
					<?php while ( have_posts() ) : the_post(); ?>
					<li<?php echo ($number == 1) ? ' class="active"' : '' ?>><a href="#tabs-<?php echo $number ?>"><?php the_title() ?></a></li>
					<?php $number++ ?>
					<?php endwhile; ?>
				<?php endif; ?>	
			</ul>
			<section class="tabs-content m-text">
				<?php query_posts( 'post_type='.$pageToInclude.'&meta_key=order&orderby=meta_value_num&order=ASC' ); $numberContent = 1; ?>
				<?php if ( have_posts() ) : ?>
					<?php while ( have_posts() ) : the_post(); ?>
					<div id="tabs-<?php echo $numberContent ?>">
						<?php the_content() ?>	
					</div>
					<?php $numberContent++ ?>
					<?php endwhile; ?>
				<?php endif; ?>				
			</section>
		</div>
		
		<?php else: ?>
		
		<div class="m-left-tabs">
			<?php query_posts( 'post_type='.$pageToInclude.'&meta_key=order&orderby=meta_value_num&order=ASC' ); $number = 1; ?>
			<?php if ( have_posts() ) : ?>
				<?php while ( have_posts() ) : the_post(); ?>
				<ul class="tabs-menu">
					<li class="active"><a href="#"><?php the_title() ?></a></li>
				</ul>
				<section class="tabs-content m-text mb2">
					<?php the_content() ?>
				</section>
				<?php endwhile; ?>
			<?php endif; ?>			
		</div>
				
		<?php endif ?>
		
	</section>

<?php get_footer(); ?>