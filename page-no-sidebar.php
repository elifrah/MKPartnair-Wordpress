<?php
/*
Template Name: No Sidebar
*/
?>

<?php get_header(); ?>
<section class="l-main l-page l-constrained l-no-sidebar">
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
      		<article class="page-content">
          		<?php the_content(); ?>
          	</article>          	
      	</div>
    <?php endwhile; ?>
  <?php endif; ?>
</section>
<?php get_footer(); ?>