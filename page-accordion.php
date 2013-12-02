<?php
/*
Template Name: Accordion
*/
?>

<?php get_header(); ?>
<section class="l-main l-page l-constrained">
  <?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
    	<div class="title-img">
    		<h1 class="title-img-inner"><?php the_title(); ?></h1>    		
    		<?php if( has_post_thumbnail() ): ?>
    			<?php the_post_thumbnail( 'full' ) ?>
    		<?php else: ?>
    			<img src="<?php bloginfo('template_url') ?>/img/slider/slide1.jpg" />
    		<?php endif ?>
    		<div class="title-white-gradient"></div>
    	</div>
    	<div class="l-container"> 
    		<div class="container-inner">
      		<?php include('includes/aside.php') ?>		
      		<article class="page-content" <?php echo getDir() ?>>
          	<?php the_content(); ?>
          </article> 

          <?php     
          if( get_the_ID() == 25 ) {
            $pageToInclude = 'faq_private_jet'; 
          } else if( get_the_ID() == 34 ) {
            $pageToInclude = 'faq_group_flight'; 
          } elseif( get_the_ID() == 43 ) {
            $pageToInclude = 'whymkpartnair'; 
          }
          ?>
     <?php endwhile; ?>
  <?php endif; ?>
          <div class="m-accordion" id="accordion">
          	<?php query_posts( 'post_type='.$pageToInclude.'&meta_key=order&orderby=meta_value_num&order=ASC' ); ?>
          	<?php if (have_posts()) : ?>
    					<?php while (have_posts()) : the_post(); ?>
    					<h2 class="accordion-header" id="accordion<?php the_ID() ?>">
	        			<i class="icon i-arrow-right"></i>
	        			<span class="accordion-title"><?php the_title() ?></span>
	        		</h2>
	        		<div class="accordion-content" id="accordion<?php the_ID() ?>-content">
	        			<?php the_content() ?>
	        		</div><!-- .accordion-content --> 
    					<?php endwhile; ?>
  					<?php endif; ?> 
        	</div><!-- .m-accordion -->
        </div>  <!-- .container-inner -->	
    	</div><!-- .l-container -->    
</section>
<?php get_footer(); ?>