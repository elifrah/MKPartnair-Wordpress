<aside class="l-sidebar">
	<div class="m-book">
		<h2 class="book-title"><?php _e("<!--:en-->Request a flight<!--:--><!--:fr-->Réservez un avion<!--:--><!--:ar-->Request a flight<!--:-->"); ?></h2>
		<p><?php _e("<!--:en-->Contact us<!--:--><!--:fr-->Contactez-nous au<!--:--><!--:ar-->Contact us<!--:-->"); ?></p>
		<a class="book-phone" href="tel:+33 1 84 24 03 94">+33 1 84 24 03 94</a>
		<p><?php _e("<!--:en-->or make an<!--:--><!--:fr-->ou faites une<!--:--><!--:ar-->or make an<!--:-->"); ?></p>
		<a href="<?php echo goToPage( 2 ) ?>" class="m-btn color2"><?php _e("<!--:en-->Online request<!--:--><!--:fr-->Demande en ligne<!--:--><!--:ar-->Online request<!--:-->"); ?></a>
	</div><!-- .m-book -->
	
	<?php if( get_field( 'redirection' ) ): ?>
	<div class="article">
		<h2 class="title"><a href="<?php echo goToPage( get_field( 'redirection' ) ) ?>"><?php the_field( 'redirection_text_'.getLang() ) ?></a></h2>
			<a href="<?php echo goToPage( get_field( 'redirection' ) ) ?>"><img src="<?php echo ( get_field( 'redirection_image' ) ) ? the_field( 'redirection_image' ) : get_bloginfo( 'template_url' ).'/img/sidebar-push.jpg' ?>" alt="<?php get_field( 'redirection_text_'.getLang() ) ?>" /></a>
			<a href="<?php echo goToPage( get_field( 'redirection' ) ) ?>" class="more"><?php _e("<!--:en-->Learn more<!--:--><!--:fr-->En savoir plus<!--:--><!--:ar-->معرفة المزيد<!--:-->"); ?></a>
	</div>
	<?php endif ?>
</aside>