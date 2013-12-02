<?php
/*
Template Name: Partners
*/
?>

<?php get_header(); ?>
<section class="l-constrained m-clients-big">
  	<ul>
  		<?php query_posts( 'post_type=partners&meta_key=order&orderby=meta_value_num&order=ASC' ) ?>
			<?php if ( have_posts() ): ?>
			<?php while ( have_posts() ) : the_post(); ?>		  		
			<li>
				<?php if( get_field( 'link' ) ): ?>
				<a href="<?php the_field( 'link' ) ?>" target="_blank" title="<?php the_title() ?>">
				<?php endif ?>
					<img src="<?php the_field( 'logo' ) ?>" alt="<?php the_title() ?>" />
				<?php if( get_field( 'link' ) ): ?>
				</a>
				<?php endif ?>
			</li>
			<?php endwhile; ?>
		<?php endif; ?>
	</ul>	  	
</section>

<?php get_footer(); ?>