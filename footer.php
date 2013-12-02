<footer class="l-footer l-cols4">
		<div class="l-constrained">
			<div class="col">
				<h2 class="title"><?php _e("<!--:en-->About<!--:--><!--:fr-->&Agrave; propos<!--:--><!--:ar-->اهتماماتنا<!--:-->"); ?></h2>
				<ul>
					<?php wp_list_pages( array('title_li' => '', 'child_of' => 78) ); ?> 
				</ul>
			</div>
			<div class="col second">
				<h2 class="title"><?php _e("<!--:en-->Contact<!--:--><!--:fr-->Contact<!--:--><!--:ar-->الاتصال<!--:-->"); ?></h2>
				<ul>
					<li><a href="<?php echo goToPage( 457 ) ?>"><?php _e("<!--:en-->Contact form<!--:--><!--:fr-->Formulaire de contact<!--:--><!--:ar-->استمارة التواصل معنا<!--:-->"); ?></a></li>
					<li><hr /></li>
					<li><a href="mailto:contact@mkpartnair.com" class="mail">contact@mkpartnair.com</a></li>
					<li class="phone">+33 1 84 24 03 94</li>
				</ul>
			</div>
			<div class="col small-full">
				<h2 class="title"><?php _e("<!--:en-->Newsletter<!--:--><!--:fr-->Newsletter<!--:--><!--:ar-->النشرة الإخبارية<!--:-->"); ?></h2>
				<p><?php _e("<!--:en-->Sign up to receive occasional e-mail updates about new features and special
offers from MK partnair<!--:--><!--:fr-->Soyez les premiers informés de nos nouveautés, nos ventes flash et exclusivités!<!--:--><!--:ar-->كن اول من يطلع على جديدنا و عروضنا الحصرية و الخاصة<!--:-->"); ?>
				</p>
				<form class="m-form-search" id="form-newsletter">
					<input class="validate[required] text" type="text" placeholder="<?php _e("<!--:en-->Your email<!--:--><!--:fr-->Votre email<!--:--><!--:ar-->بريدك الإلكتروني<!--:-->"); ?>" name="newsletter-email" /><!--
					--><input type="submit" name="newsletter-valid" value="Ok" class="m-btn color2" />
					<span id="form-msg-conformation-newsletter" class="dnone"><?php _e("<!--:en-->We confirm your newsletter subscription.<!--:--><!--:fr-->Nous confirmons votre inscription à la newsletter.<!--:--><!--:ar-->نؤكد الاشتراك الإخبارية.<!--:-->"); ?></span>
				</form>
			</div>
			<div class="col last small-full">
				<h2 class="title"><?php _e("<!--:en-->Follow us<!--:--><!--:fr-->Nous suivre<!--:--><!--:ar-->تابع معنا<!--:-->"); ?></h2>
				<ul>
					<li><a href="http://www.facebook.com/pages/MK-Partnair/297676230360083?fref=ts" target="_blank"><i class="icon i-social i-facebook"></i> Facebook</a></li>
					<li><a href="https://twitter.com/MKPartnair" target="_blank"><i class="icon i-social i-twitter"></i> Twitter</a></li>
					<li><a href="http://www.linkedin.com/company/2994271?trk=tyah" target="_blank"><i class="icon i-social i-linkedin"></i> Linkedin</a></li>
					<li><a href="http://www.viadeo.com/fr/company/mk-partnair" target="_blank"><i class="icon i-social i-viadeo"></i> Viadeo</a></li>
				</ul>
			</div>

			<nav class="lang">  				
				<ul>
					<li<?php echo in_array($_GET['lang'], array('fr', '')) ? ' class="current"' : '' ?>><a href="./?lang=fr">FR</a></li>
					<li<?php echo $_GET['lang'] == 'en' ? ' class="current"' : '' ?>><a href="./?lang=en">EN</a></li>
					<li<?php echo $_GET['lang'] == 'ar' ? ' class="current"' : '' ?>><a href="./?lang=ar">AR</a></li>
				</ul>
			</nav>
			
			<div class="bottom">
				<span class="bottom-bank"></span>
				<p class="bottom-copyright">
					<?php _e("<!--:en-->All Rights Reserved MK Partnair<!--:--><!--:fr-->Tous droits réservés MK Partnair<!--:--><!--:ar-->جميع الحقوق محفوظة MK Partnair<!--:-->"); ?> 
				</p>
				<p class="bottom-jpath">
					<?php _e("<!--:en-->Developed by<!--:--><!--:fr-->Site créé par<!--:--><!--:ar-->Developed by<!--:-->"); ?> <a href="http://integrateurweb.eu" target="_blank" title="Intégrateur web et front-end développeur freelance à Strasbourg">Jonathan Path</a>
				</p>				
				<span class="bottom-logo">MK Partnair - Réservation de jet privés</span>				
			</div>
		</div><!-- .l-constrained -->
	</footer>
    
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="<?php bloginfo('template_url') ?>/js/vendor/jquery-1.8.0.min.js"><\/script>')</script>
    <script src="<?php bloginfo('template_url') ?>/js/lang/jquery.validationEngine-<?php echo $_GET['lang'] ?>.js"></script>
    <script src="<?php bloginfo('template_url') ?>/js/plugins.js"></script>        
    <script src="<?php bloginfo('template_url') ?>/js/main.js"></script>
    
    <script type="text/javascript">
    
      var _gaq = _gaq || [];
      _gaq.push(['_setAccount', 'UA-37903440-2']);
      _gaq.push(['_trackPageview']);
    
      (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
      })();
    
    </script>
    <?php wp_footer(); ?>
</body>
</html>