<?php
/*
Template Name: Sitemap
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
	      		<article class="page-content m-sitemap" <?php echo getDir() ?>>
              <ul class="sitemap-parents">
	          		<?php wp_list_pages('title_li=&exclude=314'); ?>
              </ul>
	         	</article> 
          </div>         	
      	</div>
    <?php endwhile; ?>
  <?php endif; ?>
</section>
<?php get_footer(); ?>