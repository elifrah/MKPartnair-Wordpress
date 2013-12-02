<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" > <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head <?php language_attributes(); ?>>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title><?php bloginfo('name'); ?><?php wp_title(); ?></title>
    <?php if( is_home() ): ?>
    <meta name="description" content="<?php bloginfo('description'); ?>">
    <?php endif ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="<?php bloginfo('template_url') ?>/favicon.ico" />
    <link rel="stylesheet" href="<?php bloginfo('template_url') ?>/css/style.css">
    <script src="<?php bloginfo('template_url') ?>/js/vendor/modernizr-2.6.2.custom.min.js"></script>
    <?php wp_head(); ?>
</head>
<body <?php body_class( 'lang-'.getLang() ); ?>>
	<header class="l-header clearfix" role="banner">
  		<div class="l-constrained">
  			<a href="<?php bloginfo('home'); ?>" class="logo">MK Partnair - Réservation de jet privés</a>
  			<nav class="l-primary-nav" id="primary-nav" <?php echo getDir() ?>>
  				<ul>
  					<li <?php echo is_home() ? 'class="current-menu-item"': '' ?>><a href="<?php bloginfo('home'); ?>"><?php _e("<!--:en-->Home<!--:--><!--:fr-->Accueil<!--:--><!--:ar-->الصفحة الرئيسية <!--:-->"); ?></a></li>
  					<li class="circ">•</li>
  					<li class="<?php echo isPageOrAncestor( 8 ) ? 'current-menu-item ': '' ?>has-submenus">
  						<a href="<?php echo goToPage( 15 ) ?>"><?php _e("<!--:en-->Private jet flights<!--:--><!--:fr-->Vols en jet privés<!--:--><!--:ar-->السفر في طائرة خاصة <!--:-->"); ?></a>
  						<ul>
  							 <?php wp_list_pages( array('title_li' => '', 'child_of' => 8) ); ?> 
  						</ul>
  					</li>
  					<li class="circ">•</li>
  					<li class="<?php echo isPageOrAncestor( 17 ) ? 'current-menu-item ': '' ?>has-submenus">
  						<a href="<?php echo goToPage( 11 ) ?>"><?php _e("<!--:en-->Group flights<!--:--><!--:fr-->Vols en groupes<!--:--><!--:ar-->الرحلات الجماعية<!--:-->"); ?></a>
  						<ul>
  							 <?php wp_list_pages( array('title_li' => '', 'child_of' => 17) ); ?> 
  						</ul>
  					</li>
  					<li class="circ">•</li>
  					<li class="<?php echo isPageOrAncestor( 37 ) ? 'current-menu-item ': '' ?>has-submenus">
  						<a href="<?php echo getFirstChildLink( 37 ) ?>"><?php _e("<!--:en-->MK Partnair<!--:--><!--:fr-->MK Partnair<!--:--><!--:ar-->MK Partnair<!--:-->"); ?></a>
  						<ul>
  							 <?php wp_list_pages( array('title_li' => '', 'child_of' => 37) ); ?> 
  						</ul>
  					</li>
  					<li class="circ">•</li>
  					<li class="<?php echo isPageOrAncestor( 49 ) ? 'current-menu-item ': '' ?>has-submenus">
  						<a href="<?php echo goToPage( 53 ) ?>"><?php _e("<!--:en-->MK network<!--:--><!--:fr-->Le réseau MK<!--:--><!--:ar-->MK شبكة<!--:-->"); ?></a>
  						<ul>
  							 <?php wp_list_pages( array('title_li' => '', 'child_of' => 49) ); ?> 
  						</ul>
  					</li>
  					<li class="circ">•</li>
  					<li class="no-on-mobile<?php echo ( isPageOrAncestor( 60 ) ) ? ' current-menu-item': '' ?>"><a href="<?php echo goToPage( 60, $_GET['lang'] ) ?>"><?php _e("<!--:en-->The fleet<!--:--><!--:fr-->La flotte<!--:--><!--:ar-->اسطولنا الجوي<!--:-->"); ?></a></li>
  					<li class="circ">•</li>
  					<li class="no-on-mobile<?php echo isPageOrAncestor( 62 ) ? ' current-menu-item': '' ?> has-submenus">
                <a href="<?php echo goToPage( 981, $_GET['lang'] ) ?>"><?php _e("<!--:en-->Flash sales<!--:--><!--:fr-->Ventes flash<!--:--><!--:ar-->العروض الخاصة للبيع <!--:-->"); ?></a>
                <ul>
                 <?php wp_list_pages( array('title_li' => '', 'child_of' => 62) ); ?> 
              </ul>
            </li>
  				</ul>
  			</nav>
  			<nav class="lang">  				
  				<ul>
  					<li<?php echo in_array($_GET['lang'], array('fr', '')) ? ' class="current"' : '' ?>><a href="./?lang=fr<?php if($_GET['sig'] != ''){ echo '&sig='.$_GET['sig']; } ?>">FR</a></li>
  					<li<?php echo $_GET['lang'] == 'en' ? ' class="current"' : '' ?>><a href="./?lang=en<?php if($_GET['sig'] != ''){ echo '&sig='.$_GET['sig']; } ?>">EN</a></li>
  					<li<?php echo $_GET['lang'] == 'ar' ? ' class="current"' : '' ?>><a href="./?lang=ar<?php if($_GET['sig'] != ''){ echo '&sig='.$_GET['sig']; } ?>">AR</a></li>
  				</ul>        
  			</nav>
  			<a class="phone" href="tel:+33184240394"><i class="icon i-phone"></i> <span>+33 1 84 24 03 94</span></a>
  		</div><!-- .l-constrained -->
  	</header>
  	