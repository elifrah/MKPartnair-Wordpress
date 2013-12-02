<?php
add_theme_support( 'post-thumbnails' );


/* ==|=======================================================================
   Dates
   ========================================================================== */

/*
 * Change the date format 
 * 
 * @author Jonathan Path
 */

function changeDateFormat( $date ) {

	return utf8_encode( ucfirst( strftime("%A %d %B %Y", strtotime( $date ) ) ) );
	
}


/*
 * Get the date with possibility to have 2 dates 
 * 
 * @author Jonathan Path
 */

function getCustomDate( $date1, $date2, $date_of_post ) {
	
	// if no specific date from custom fields, put the date of the post
	if( $date1 == '' ) {
		$date = $date_of_post;
	} else {
		$date = changeDateFormat( $date1 );
		$date .= ( $date2 != '' ) ? ' - ' . changeDateFormat( $date2 ) : '';
	}
	
	return $date;
	
}


/* ==|=======================================================================
   Posts/Pages
   ========================================================================== */

/*
 * Get the ID of the post's parent
 * 
 * @author Jonathan Path
 */

function getParentId( $post ) {

  if( $post->post_parent == 0 ){
    return get_the_ID();
  } else {
    return $post->post_parent;
  }
  
}


/*
 * Get the list (<li>) of the children of a Page
 * 
 * @author Jonathan Path
 */
 
function listPageChildren( $id ) {

	$children = wp_list_pages('title_li=&child_of=' . $id . '&echo=0');
	if ($children) { 
		$childrenList = '<ul>';
		$childrenList .= $children;
		$childrenList .= '</ul>';
	}
	
	return $childrenList;
	
}


/*
 * Check if page is direct child
 * 
 * @author Jonathan Path
 */
 
function isChild( $page_id ) { 
	wp_reset_query();
    global $post; 
    if( is_page() && ($post->post_parent == $page_id) ) {
       return true;
    } else { 
       return false; 
    }
}


/*
 * Check if page is an ancestor
 * 
 * @author Jonathan Path
 */
 
function isAncestor( $post_id ) {
	wp_reset_query();
    global $wp_query;
    $ancestors = $wp_query->post->ancestors;
    if ( in_array($post_id, $ancestors) ) {
        return true;
    } else {
        return false;
    }
}


/*
 * Now if it is current page or a children page
 * 
 * @author Jonathan Path
 */
 
function isPageOrAncestor( $page_id ) { 
	wp_reset_query();
    global $post;
    if( isChild( $page_id ) || $page_id == $post->ID ) {
       return true;
    } else { 
       return false; 
    }
}


/*
 * Now if it is current page or a children page
 * 
 * @author Jonathan Path
 */
 
function getFirstChildLink( $page_id ) { 
    $pagekids = get_pages("child_of=".$page_id."&sort_column=menu_order");
    $firstchild = $pagekids[0];
    return get_permalink( $firstchild->ID );
}


/*
 * Query of a list of post of a Category
 * 
 * @author Jonathan Path
 */
 
function queryPostOfCategory( $category ) { 
    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
    query_posts( 'cat=' . $category . '&orderby=date&order=asc&post_status=publish&paged=' . $paged );
}



/* ==|=======================================================================
   Mobile
   ========================================================================== */

require_once('includes/Mobile_Detect.php');
$mobile_detect = new Mobile_Detect();

/*
 * Get device class
 * 
 * @author Jonathan Path
 */
 
function getDeviceClass( $mobile_detect ) {
	if ( $mobile_detect->isMobile() )
		$device_class = 'l-mobile';
	else if ( $mobile_detect->isTablet() )
		$device_class = 'l-tablet';
	else 
		$device_class = 'l-default';
		
	return $device_class;
}


/*
 * Get custom post type translation
 * 
 * @author Jonathan Path
 */

function getTranslation( $post_id ) {
	$the_query = new WP_Query( 'post_type=translation&p='.$post_id );
  while ( $the_query->have_posts() ) {
  	$the_query->next_post();
    echo $the_query->post->post_content;
  }
}


/* ==|=======================================================================
   Url
   ========================================================================== */

/*
 * Get the url of the menu
 * 
 * @author Jonathan Path
 */

function getUrlMenu() {
	$tab_url = explode('/', $_SERVER['REQUEST_URI']); 
	return $tab_url[1];
}


/*
 * Get the url of the menu
 * 
 * @author Jonathan Path
 */

function getUrlMenu2() {
	$tab_url = explode('/', $_SERVER['REQUEST_URI']); 
	return $tab_url[2];
}


/*
 * Write url for a page in function of if we are on home page or not
 * 
 * @author Jonathan Path
 */

function goToPage( $id, $lang ) {
	$lang = $_GET['lang'];
	if( $lang == '' )
		$langUrl = '';
	else 
		$langUrl = '&amp;lang='.$lang;
	return str_replace( 'index.php', '', $_SERVER['PHP_SELF'].'?page_id='.$id.$langUrl);
}


/*
 * Get language
 * 
 * @author Jonathan Path
 */

function getLang() {
	
	if( $_GET['lang'] == '' )
		$lang = 'fr';
	else 
		$lang = $_GET['lang'];
			
	return $lang;
}


/*
 * Enable english for arabish
 * 
 * @author Jonathan Path
 */

function enForAr() {
	
	if( getLang() == 'ar' )
		$lang = 'en';
	else 
		$lang = getLang();
			
	return $lang;
}


/*
 * Enable french for arabish
 * 
 * @author Jonathan Path
 */

function frForAr() {
	
	if( getLang() == 'ar' )
		$lang = 'fr';
	else 
		$lang = getLang();
			
	return $lang;
}


/* ==|=======================================================================
   Custom Post Types
   ========================================================================== */
   
require_once('includes/cpt-fleet.php');  
require_once('includes/cpt-advantages.php');  
require_once('includes/cpt-whymkpartnair.php');
require_once('includes/cpt-slider.php');
require_once('includes/cpt-push.php');
require_once('includes/cpt-testimonies.php');
require_once('includes/cpt-flash.php');
require_once('includes/cpt-partners.php');
require_once('includes/cpt-faq-group-flight.php');
require_once('includes/cpt-faq-private-jet.php');
require_once('includes/cpt-translation.php');
require_once('includes/cpt-indexing.php');
  

/* ==|=======================================================================
   Other
   ========================================================================== */

function getDir() {
	if( getLang() == 'ar' ) {
		return 'dir="rtl"';
	} else {
		return '';
	}
}

/* sorts the post based on a date value in custom fields 
 * check: http://webdeveloperswall.com/wordpress/order-by-date-in-post-meta
*/
function wdw_query_orderby_postmeta_date( $orderby ){
    $new_orderby = str_replace( "wp_postmeta.meta_value", "STR_TO_DATE(wp_postmeta.meta_value, '%m/%d/%Y')", $orderby );
    return $new_orderby;
}



