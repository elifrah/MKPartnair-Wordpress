<?php
/*
Template Name: Testimonies
*/
?>

<?php get_header(); ?>
<section class="l-constrained pt2">
	<?php query_posts( 'post_type=testimonies&order=ASC' ) ?>
	<?php if (have_posts()) : ?>
	  <?php while (have_posts()) : the_post(); ?>
	  	
	  	<?php
	  	if( get_field( 'link' ) ){
	  		$testimonies_link = get_field( 'link' );
	  	} else if( get_field( 'pdf' ) ) {
	  		$testimonies_link = get_field( 'pdf' );
	  	}
	  	?>
	  	<article class="m-testimonies l-container mb2">
	  		<?php if( $testimonies_link ): ?>
				<a href="<?php echo $testimonies_link ?>" target="_blank" class="blockquote" title="<?php the_title() ?>">
				<?php else: ?>
				<blockquote cite="#" target="_blank" class="blockquote" title="<?php the_title() ?>">
				<?php endif ?>
					<span class="quote-first">“</span> <?php the_title() ?> <span class="quote-last">”</span>
				<?php if( $testimonies_link ): ?>
				</a>
				<?php else: ?>
				</blockquote>
				<?php endif ?>				
				<br />
				<span class="who">- <?php the_field( 'who' ) ?> -</span>
	  	</article>
	  	
	  <?php endwhile; ?>
	<?php endif; ?>
</section>

<?php get_footer(); ?>