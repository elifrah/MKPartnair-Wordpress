<?php get_header(); ?>
<section class="l-main l-constrained l-page">
	<div class="title-img">
		<h1 class="title-img-inner"><?php _e("<!--:en-->Page no found<!--:--><!--:fr-->Page non trouvée<!--:--><!--:ar-->لم يتم العثور على الصفحة<!--:-->"); ?></h1>    		
			<img src="<?php bloginfo('template_url') ?>/img/slider/slide1.jpg" />
		<div class="title-white-gradient"></div>
	</div>
	<div class="l-container"> 
		<div class="container-inner">
  		<?php include('includes/aside.php') ?>			
  		<article class="page-content" <?php echo getDir() ?>>
        <?php _e("<!--:en-->We advise you to return<!--:--><!--:fr-->Nous vous conseillons de retourner sur<!--:--><!--:ar-->لم يتم العثور على الصفحة<!--:-->"); ?>
      	<a href="<?php bloginfo( 'siteurl' ) ?>"><?php _e("<!--:en-->the Home Page<!--:--><!--:fr-->la page d'accueil<!--:--><!--:ar-->الصفحة الرئيسية<!--:-->"); ?></a>.
      </article>  
    </div>       	
  </div>
</section>
<?php get_footer(); ?>