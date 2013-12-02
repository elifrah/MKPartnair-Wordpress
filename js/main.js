/**
 * Global variables
 * 
 * @author Jonathan Path
 */

// size of the document
var global_W = $('body').width();
var global_H = $(window).height();

// responsive medium screens
var medium_W = 780; 
var medium_H = 600; 

// responsive small screens/mobile
var small_W = 752; 
var small_H = 415; 


$(document).ready(function(){
	
	// Show submenu on hover
	showSubmenu();
	
	// Home Slider (need to be after responsiveSlider to function well)
	slider();
	
	// Placeholders for old browsers
	placeholderOldBrowsers();
  
  // Global Fade (by @LordSlop)
  fadePopy();
  
  // responsive menu
  responsiveMenu();
	
	// Multidestination interactions on form quotation form
	formQuotation();

	// Contact form
	formContact();
	
	// Referral form
	formReferral();
	
	// Paiement confirmation form
	formPaiementConfirmation();

	// Flash form
	formFlash();

	// Newsletter form
	formNewsletter();
	
	// Tabs left page tabs
	tabsPageTabs();
	
	// Fleet pop-in
	fleetPopin();

	// Flash pop-in
	flashPopin();
	
	// Fleet pop-in
	fleetFiltersActions();
	
	// Home testimonies slider
	homeTestimoniesSlider();

	// Accordion
	accordion();

	// show button of payment
	cgvPayment();
});


/* ==|=======================================================================
   SLIDER
   ========================================================================== */

/*
 * Coda Slider for Page Story
 * 
 * @author Jonathan Path
 */
 
 function slider() {	
	$('#home-slider').liquidSlider({
		mobileNavigation: false,
		dynamicArrows: true,
		autoSlide: true,
		hoverArrows: false,
		hideArrowsWhenMobile: true,
		autoSlideInterval: 5000,
		autoSlidePauseOnHover: false
	});
 } 
 

/* ==|=======================================================================
   MENU
   ========================================================================== */

/*
 * Show submenu on hover
 * 
 * @author Jonathan Path
 */
 
 function showSubmenu() {	
 	
 	var nav = $('#primary-nav');
 	
 	$('> ul > li.has-submenus', nav).hover(function(){ 	
 		$(this).find('ul').dequeue();
 		$('.current-menu-item ul', nav).dequeue();
 		
 		$('> ul > li > ul', nav).hide();
 		$('> ul > li > a', nav).removeClass('hover');
 		$(this).find('a').addClass('hover');
 		$(this).find('ul').show(); 		
 	}, function(){
 		$(this).find('ul')
 			.show()
 		    .delay(1000)
 		    .queue(function() {
 		    	$(this).hide().dequeue();
 		    	$(this).parent().find('a').removeClass('hover');
 		    	$('.current-menu-item ul', nav).show();
 		});
 	});
	
 }
 
 
/*
 * Menu transform into a select
 * 
 * @author Jonathan Path
 */
 
 function responsiveMenu() {
 	// Create the dropdown base
 	$("<select id='menu-mobile' /><label for='menu-mobile'><i class='icon i-menu-mobile'></i> <span>Menu</span></label>").appendTo("#primary-nav");
 	
 	// Populate dropdown with menu items
 	$("#primary-nav > ul > li:not(.circ, .no-on-mobile)").each(function() {	
 		var el = $(this);		
 		var hasChildren = el.find("ul"),
 		    children    = el.find("li");		
 		if (hasChildren.length) {		
 			$("<optgroup />", {
 				"label": el.find("> a").text()
 			}).appendTo("#primary-nav select");
 			children.each(function() {
 				
 				var option = $("<option />", {
 					"value"   : $(this).find('a').attr("href"),
 					"text": " - " + $(this).text()
 				});

 				if( $(this).hasClass( 'current_page_item' ) ) 
 					option.attr('selected', 'selected');

 				option.appendTo("optgroup:last");
 			});			      	
 		} else {		
 			$("<option />", {
 				"value"   : el.find('> a').attr("href"),
 				"text"    : el.text()
 			}).appendTo("#primary-nav select"); 			
 		} 	     
 	});
 	
 	// To make dropdown actually work
 	// To make more unobtrusive: http://css-tricks.com/4064-unobtrusive-page-changer/
 	$("#primary-nav select").change(function() {
 		window.location = $(this).find("option:selected").val();
 	});
}


/* ==|=======================================================================
   FLEET FILTERS
   ========================================================================== */

var fleetPage = $('#fleet-page');
var fleetFilters = $('#fleet-filters');
var fleetTable = $('#fleet-table');

/**
 * Fleet Filters
 */
function fleetFiltersActions() {	
	
	// init table
	updateFleetTable();	
	
	// when changing filters
	$('select', fleetFilters).change(function(){
		updateFleetTable();
	});
	
	// when choose jet / airlines
	$('.filters-checkbox', fleetFilters).click(function(){	
		// design changes
		$(this).toggleClass('filter-active');
		$(this).find('.m-fake-checkbox').toggleClass('is-checked');
		
		// update table
		updateFleetTable();		
	});
	
}

/**
 * Update Table
 */

function updateFleetTable() {
		
	$('tr.fleet-plane', fleetTable).each(function(){
		
		needToHidePlane = false;
		
		// passengers filter		
		var passengersValInit = $('select[name="fleet-passengers"]', fleetFilters).val();		
		var passengersValPlane = parseInt( $(this).find('.plane-passengers').html() );
		if( passengersValPlane < passengersValInit )
			needToHidePlane = true;
		
		// autonomy filter
		var autonomyValInit = $('select[name="fleet-autonomy"]', fleetFilters).val();
		var autonomyValPlane = parseInt( $(this).find('.plane-autonomy').html() );
		if( autonomyValPlane < autonomyValInit )
			needToHidePlane = true;
		
		// Jets Checkbox
		if( !$('.filters-jet', fleetFilters).hasClass('filter-active') && $(this).hasClass('plane-private') ) {
			needToHidePlane = true;
		}
		if( !$('.filters-airliner', fleetFilters).hasClass('filter-active') && $(this).hasClass('plane-airliner') ) {
			needToHidePlane = true;
		}			
		
		// let's go
		if( needToHidePlane )
			$(this).addClass('dnone');
		else
			$(this).removeClass('dnone');
					
	});
}



/* ==|=======================================================================
   OTHER
   ========================================================================== */


/**
 * Home Testimonies Slider
 */ 
function homeTestimoniesSlider() {
	var testimonies = $('#home-testimonies');
	
	if( testimonies.length > 0 && testimonies.hasClass('l-default') ) {
		setTimeout(function(){	
			
			// init
			$('[class^="slide"]', testimonies).css('opacity', '0');
			
			var currentSlide = $('[class^="slide"]:not(.dnone)', testimonies);
			currentSlide.animate({'opacity':'0'}).delay(1000).addClass('dnone');
			testimonies.animate({'height': currentSlide.height()});
			
			var newSlide = currentSlide.attr('class').replace('slide', '');
			newSlide = parseInt( newSlide.replace('dnone', '') ) + 1;
			
			if( newSlide <= $('[class^="slide"]').length ) {			
				$('.slide' + newSlide).animate({'opacity':'1'}).delay(1000).removeClass('dnone');
			} else {
				$('.slide1').show(300).animate({'opacity':'1'}).removeClass('dnone');
			}
			
			homeTestimoniesSlider();
		},3000);
	}
}


/**
 * Multidestination interactions on form quotation form
 */ 
function formQuotation() {
	var quotation = $('#form-quotation');
	$('#flight-type3', quotation).click(function(){
		$('#row-flight-step1-block', quotation).show();
		$('#row-flight-return .date-wrap', quotation).show();
	});
	$('#flight-type1, #flight-type2', quotation).bind('click', function(){
		$('div[id^="row-flight-step"]', quotation).hide();
		$('div[id^="row-flight-step"] .btn-new-destination', quotation).show();
	});
	$('#flight-type2', quotation).click(function(){
		$('#row-flight-return .date-wrap', quotation).show();
	});
	$('#flight-type1', quotation).click(function(){
		$('#row-flight-return .date-wrap', quotation).hide();
	});
	
	$('.btn-new-destination', quotation).bind('click', function(){
		$(this).hide();
		$( '#' + $(this).attr('id') + '-block' ).show();
	
		return false;
	});
	
	if( quotation.hasClass( 'lang-fr' ) ) {
		var dateText = { 
			dateFormat: "dd/mm/yy",
			monthNames: [ "Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre" ],
			minDate: 0,
			firstDay: 1,
			dayNamesMin: [ "Di", "Lu", "Ma", "Me", "Je", "Ve", "Sa" ]
		};
	} else {
		var dateText = { 
			dateFormat: "mm/dd/yy",
			monthNames: [ "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December" ],
			minDate: 0
		};
	}
	
	if (!Modernizr.inputtypes.date){
	  $('.input-date', quotation).datepicker(dateText); 
	}
	
	$("#form-quotation").validationEngine({
		ajaxSubmit: true,
		ajaxSubmitFile: "/wp-content/themes/mkpartnair/formValidator/ajaxSubmit-quotation.php",
		ajaxSubmitMessage: $('#form-msg-conformation-quotation').text(),
		success : function() {
			$('#quotation-steps .step-active').attr('class', 'step');
			$('#quotation-steps .step:nth-child(2)').attr('class', 'step-active');
			var posMsg = $('#quotation-steps').offset();
			$("html, body").animate({ scrollTop: posMsg.top });
		},
		failure : function() {}
	});
}


/**
 * Contact form
 */ 
function formContact() {

	$("#form-contact").validationEngine({
		ajaxSubmit: true,
		ajaxSubmitFile: "/wp-content/themes/mkpartnair/formValidator/ajaxSubmit-contact.php",
		ajaxSubmitMessage: $('#form-msg-conformation-contact').text(),
		success : function() {},
		failure : function() {}
	});
}

/**
 * Paiement confirmation form
 */ 
function formPaiementConfirmation() {

	$("#form-paiementConfirmation").validationEngine({
		ajaxSubmit: true,
		ajaxSubmitFile: "/wp-content/themes/mkpartnair/formValidator/ajaxSubmit-paiementConfirmation.php",
		ajaxSubmitMessage: $('#form-msg-conformation-paiement-confirmation').text(),
		success : function() {},
		failure : function() {}
	});
}

/**
 * Referral form
 */ 
function formReferral() {

	$('#winner-mkpartnair-no').click(function(){
		$('#winner-message p').show();
		$('#winner-message textarea').removeAttr('disabled').removeClass('disabled');
	});
	$('#winner-mkpartnair-yes').click(function(){
		$('#winner-message p').hide();
		$('#winner-message textarea').attr('disabled', '').addClass('disabled');
	});

	$("#form-referral").validationEngine({
		ajaxSubmit: true,
		ajaxSubmitFile: "/wp-content/themes/mkpartnair/formValidator/ajaxSubmit-referral.php",
		ajaxSubmitMessage: $('#form-msg-conformation-referral').text(),
		success : function() {},
		failure : function() {}
	});
}


/**
 * Flash form
 */ 
function formFlash() {
	$("#form-flash").validationEngine({
		ajaxSubmit: true,
		ajaxSubmitFile: "/wp-content/themes/mkpartnair/formValidator/ajaxSubmit-flash.php",
		ajaxSubmitMessage: $('#form-msg-conformation-flash').text(),
		success : function() {},
		failure : function() {}
	});
}


/**
 * Flash Popin form
 */ 
function formPopinFlash() {
	$(".form-popin-flash").validationEngine({
		ajaxSubmit: true,
		ajaxSubmitFile: "/wp-content/themes/mkpartnair/formValidator/ajaxSubmit-popin-flash.php",
		ajaxSubmitMessage: $('#form-msg-conformation-popin-flash').text(),
		success : function() {},
		failure : function() {}
	});
}


/**
 * Newsletter form
 */ 
function formNewsletter() {

	$("#form-newsletter").validationEngine({
		ajaxSubmit: true,
		ajaxSubmitFile: "/wp-content/themes/mkpartnair/formValidator/ajaxSubmit-newsletter.php",
		ajaxSubmitMessage: $('#form-msg-conformation-newsletter').text(),
		success : function() {},
		failure : function() {}
	});
}


/**
 * Tabs left page tabs
 */ 
 
function tabsPageTabs() {
	var leftTabs = $( "#tabs-page-tabs");
	
	// init
	$('.tabs-content div[id^="tabs-"]', leftTabs).hide();
	$('.tabs-content #tabs-1', leftTabs).show();
	$('.tabs-menu li a[href="#tabs-1"]', leftTabs).parent().addClass('active');
	
	$('.tabs-menu a', leftTabs).click(function(){
		$('.tabs-content div[id^="tabs-"]').hide();
		$('.tabs-content ' + $(this).attr('href'), leftTabs).show();
		
		$('.tabs-menu li', leftTabs).removeClass('active');
		$(this).parent().addClass('active');
		
		return false;
	});
}


/**
 * Fleet Pop-in
 */
function fleetPopin() {
	$('#fleet-table a.m-btn').click(function(){	
		var DialogId = $(this).attr('id');
		popin( "#fleet-" + DialogId );				
		return false;
	});		
}


/**
 * Flash Pop-in
 */
function flashPopin() {
	$('#flash-table a.m-btn').click(function(){	
		$('body').addClass('dialog-white');
		var DialogId = $(this).attr('id');
		popin( "#flash-" + DialogId );	
		formPopinFlash()	
	});		
}


/**
 * Popin
 */ 
function popin(itemToShow) {

	var dialogWrapper = $('<div class="m-dialog-wrapper"></div>');
	var dialogOverlay = $('<div class="m-dialog-overlay"></div>');
	dialogWrapper.append( dialogOverlay );
	$('body').append( dialogWrapper );
	$('html').addClass('is-no-scroll');
	
	var dialog = $('<div class="m-dialog"></div>');
  $( itemToShow ).clone().appendTo( dialog ).removeClass('dnone');

  dialogWrapper.append( dialog );
  dialog.animate({ 'opacity':1 });

  dialogOverlay.height( $('.m-dialog').height() + 96 );

  $('.btn-close, .m-dialog-overlay').on('click', function () {
      $('.m-dialog-wrapper, .m-dialog-overlay').animate({ 'opacity':0 }, 300, function () {            	
        $( itemToShow ).appendTo('.dialogs-wrap');
        $(this).remove();
        $('.formError').remove();
        $('html').removeClass('is-no-scroll');
        $('body').removeClass('dialog-white');
      });
        
    return false;
  });
	
	return false;
}


/**
 * Accordion
 */ 
function accordion() {
	var accordion = $('#accordion');

	$('.accordion-header', accordion).click(function(){
		if( !$(this).hasClass('is-open') ) {	
			var isOpen = false;
		} else {
			var isOpen = true;
		}
		$('.accordion-content', accordion).slideUp();
		$('.accordion-header').removeClass('is-open');
		$('.accordion-header .icon').addClass('i-arrow-right').removeClass('i-arrow-bottom');

		if( !isOpen ) {			
			$(this).next().slideDown();
			$(this).find('.icon').removeClass('i-arrow-right').addClass('i-arrow-bottom');
			$(this).addClass('is-open');
		}
	});
}

/**
 * CGV Payment
 */ 
function cgvPayment() {
	$('#cgv').click(function(){
		$('#bouton').toggleClass( 'disabled' );
	});
	$('#bouton').click(function(){
		if( $(this).hasClass( 'disabled' ) ) {
			alert( $('#text-error-cvg').text() );
			return false;
		}
	});
}


/**
 * Global Fade (by @LordSlop)
 */ 
function fadePopy() {
  
  // need to put 'display:none;' on the following elements in CSS
  jQuery("#slider, #wrap-main, #wrap-projet-recent,#wrap-contact-link, #wrap-footer").fadeIn(1000);
  jQuery("#wrap-header a,#wrap-main a").click(function(event){
    event.preventDefault();
    linkLocation = this.href;
    jQuery("#wrap-main, #services, #wrap-projet-recent, #wrap-contact-link, #wrap-footer, #slider").fadeOut(500, redirectPage);
   });
  function redirectPage() {
    window.location = linkLocation;
  }
}


/**
 * Placeholders for old browsers
 */ 
function placeholderOldBrowsers() {
	if (!Modernizr.input.autofocus) {
        $('input').each(function(){
			if ($(this).attr('autofocus'))
				$(this).focus();
		});
    }
	if (!Modernizr.input.placeholder) {
        $('input').each(function(){
			if ($(this).attr('placeholder')) {
				var placeholder_text = $(this).attr('placeholder');
				$(this).attr('value', placeholder_text).addClass('nc');
			}
		});
		
		// for all fields with uncleared initial value, on focus
		$('.nc').focus(function() {

			// if it is uncleared
			if ($(this).hasClass('nc')) {

				// remeber the initial value
				$textbox = $(this).val();

				// and remove it
				$(this).removeClass('nc').val('');
			}
		}).focusout(function() { // on focus out

			// if there is no new value posted by user
			if ($(this).val() == '')

				// mark as uncleared and show initial value
				$(this).addClass('nc').val($textbox);
		});
	}
}

