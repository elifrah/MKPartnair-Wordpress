/**
 * Global variables
 * 
 * @author Jonathan Path
 */// size of the document
function slider(){$("#home-slider").liquidSlider({mobileNavigation:!1,dynamicArrows:!0,autoSlide:!0,hoverArrows:!1,hideArrowsWhenMobile:!0})}function showSubmenu(){var e=$("#primary-nav");$("> ul > li.has-submenus",e).hover(function(){$(this).find("ul").dequeue();$(".current-menu-item ul",e).dequeue();$("> ul > li > ul",e).hide();$("> ul > li > a",e).removeClass("hover");$(this).find("a").addClass("hover");$(this).find("ul").show()},function(){$(this).find("ul").show().delay(1e3).queue(function(){$(this).hide().dequeue();$(this).parent().find("a").removeClass("hover");$(".current-menu-item ul",e).show()})})}function responsiveMenu(){$("<select id='menu-mobile' /><label for='menu-mobile'><i class='icon i-menu-mobile'></i> <span>Menu</span></label>").appendTo("#primary-nav");$("#primary-nav > ul > li:not(.circ, .no-on-mobile)").each(function(){var e=$(this),t=e.find("ul"),n=e.find("li");if(t.length){$("<optgroup />",{label:e.find("> a").text()}).appendTo("#primary-nav select");n.each(function(){var e=$("<option />",{value:$(this).find("a").attr("href"),text:" - "+$(this).text()});$(this).hasClass("current_page_item")&&e.attr("selected","selected");e.appendTo("optgroup:last")})}else $("<option />",{value:e.find("> a").attr("href"),text:e.text()}).appendTo("#primary-nav select")});$("#primary-nav select").change(function(){window.location=$(this).find("option:selected").val()})}function fleetFiltersActions(){updateFleetTable();$("select",fleetFilters).change(function(){updateFleetTable()});$(".filters-checkbox",fleetFilters).click(function(){$(this).toggleClass("filter-active");$(this).find(".m-fake-checkbox").toggleClass("is-checked");updateFleetTable()})}function updateFleetTable(){$("tr.fleet-plane",fleetTable).each(function(){needToHidePlane=!1;var e=$('select[name="fleet-passengers"]',fleetFilters).val(),t=parseInt($(this).find(".plane-passengers").html());t<e&&(needToHidePlane=!0);var n=$('select[name="fleet-autonomy"]',fleetFilters).val(),r=parseInt($(this).find(".plane-autonomy").html());r<n&&(needToHidePlane=!0);!$(".filters-jet",fleetFilters).hasClass("filter-active")&&$(this).hasClass("plane-private")&&(needToHidePlane=!0);!$(".filters-airliner",fleetFilters).hasClass("filter-active")&&$(this).hasClass("plane-airliner")&&(needToHidePlane=!0);needToHidePlane?$(this).addClass("dnone"):$(this).removeClass("dnone")})}function homeTestimoniesSlider(){var e=$("#home-testimonies");e.length>0&&e.hasClass("l-default")&&setTimeout(function(){$('[class^="slide"]',e).css("opacity","0");var t=$('[class^="slide"]:not(.dnone)',e);t.animate({opacity:"0"}).delay(1e3).addClass("dnone");e.animate({height:t.height()});var n=t.attr("class").replace("slide","");n=parseInt(n.replace("dnone",""))+1;n<=$('[class^="slide"]').length?$(".slide"+n).animate({opacity:"1"}).delay(1e3).removeClass("dnone"):$(".slide1").show(300).animate({opacity:"1"}).removeClass("dnone");homeTestimoniesSlider()},3e3)}function formQuotation(){var e=$("#form-quotation");$("#flight-type3",e).click(function(){$("#row-flight-step1-block",e).show();$("#row-flight-return .date-wrap",e).show()});$("#flight-type1, #flight-type2",e).bind("click",function(){$('div[id^="row-flight-step"]',e).hide();$('div[id^="row-flight-step"] .btn-new-destination',e).show()});$("#flight-type2",e).click(function(){$("#row-flight-return .date-wrap",e).show()});$("#flight-type1",e).click(function(){$("#row-flight-return .date-wrap",e).hide()});$(".btn-new-destination",e).bind("click",function(){$(this).hide();$("#"+$(this).attr("id")+"-block").show();return!1});if(e.hasClass("lang-fr"))var t={dateFormat:"dd/mm/yy",monthNames:["Janvier","Février","Mars","Avril","Mai","Juin","Juillet","Août","Septembre","Octobre","Novembre","Décembre"],minDate:0,firstDay:1,dayNamesMin:["Di","Lu","Ma","Me","Je","Ve","Sa"]};else var t={dateFormat:"mm/dd/yy",monthNames:["January","February","March","April","May","June","July","August","September","October","November","December"],minDate:0};Modernizr.inputtypes.date||$(".input-date",e).datepicker(t);$("#form-quotation").validationEngine({ajaxSubmit:!0,ajaxSubmitFile:"/wp-content/themes/mkpartnair/formValidator/ajaxSubmit-quotation.php",ajaxSubmitMessage:$("#form-msg-conformation-quotation").text(),success:function(){$("#quotation-steps .step-active").attr("class","step");$("#quotation-steps .step:nth-child(2)").attr("class","step-active");var e=$("#quotation-steps").offset();$("html, body").animate({scrollTop:e.top})},failure:function(){}})}function formContact(){$("#form-contact").validationEngine({ajaxSubmit:!0,ajaxSubmitFile:"/wp-content/themes/mkpartnair/formValidator/ajaxSubmit-contact.php",ajaxSubmitMessage:$("#form-msg-conformation-contact").text(),success:function(){},failure:function(){}})}function formReferral(){$("#winner-mkpartnair-no").click(function(){$("#winner-message").show()});$("#winner-mkpartnair-yes").click(function(){$("#winner-message").hide()});$("#form-referral").validationEngine({ajaxSubmit:!0,ajaxSubmitFile:"/wp-content/themes/mkpartnair/formValidator/ajaxSubmit-referral.php",ajaxSubmitMessage:$("#form-msg-conformation-referral").text(),success:function(){},failure:function(){}})}function formFlash(){$("#form-flash").validationEngine({ajaxSubmit:!0,ajaxSubmitFile:"/wp-content/themes/mkpartnair/formValidator/ajaxSubmit-flash.php",ajaxSubmitMessage:$("#form-msg-conformation-flash").text(),success:function(){},failure:function(){}})}function formNewsletter(){$("#form-newsletter").validationEngine({ajaxSubmit:!0,ajaxSubmitFile:"/wp-content/themes/mkpartnair/formValidator/ajaxSubmit-newsletter.php",ajaxSubmitMessage:$("#form-msg-conformation-newsletter").text(),success:function(){},failure:function(){}})}function tabsPageTabs(){var e=$("#tabs-page-tabs");$('.tabs-content div[id^="tabs-"]',e).hide();$(".tabs-content #tabs-1",e).show();$('.tabs-menu li a[href="#tabs-1"]',e).parent().addClass("active");$(".tabs-menu a",e).click(function(){$('.tabs-content div[id^="tabs-"]').hide();$(".tabs-content "+$(this).attr("href"),e).show();$(".tabs-menu li",e).removeClass("active");$(this).parent().addClass("active");return!1})}function fleetPopin(){$("#fleet-table a.m-btn").click(function(){var e=$(this).attr("id"),t=$('<div class="m-dialog-overlay"></div>');$("body").append(t);$("html").addClass("is-no-scroll");var n=$('<div class="m-dialog"></div>');$("#fleet-"+e).clone().appendTo(n).removeClass("dnone");t.append(n);n.animate({opacity:1});$(".btn-close").bind("click",function(){$(".m-dialog-overlay").animate({opacity:0},300,function(){$("#fleet-"+e).appendTo(".dialogs-wrap");$(this).remove();$("html").removeClass("is-no-scroll")});return!1});return!1})}function fadePopy(){function e(){window.location=linkLocation}jQuery("#slider, #wrap-main, #wrap-projet-recent,#wrap-contact-link, #wrap-footer").fadeIn(1e3);jQuery("#wrap-header a,#wrap-main a").click(function(t){t.preventDefault();linkLocation=this.href;jQuery("#wrap-main, #services, #wrap-projet-recent, #wrap-contact-link, #wrap-footer, #slider").fadeOut(500,e)})}function placeholderOldBrowsers(){Modernizr.input.autofocus||$("input").each(function(){$(this).attr("autofocus")&&$(this).focus()});if(!Modernizr.input.placeholder){$("input").each(function(){if($(this).attr("placeholder")){var e=$(this).attr("placeholder");$(this).attr("value",e).addClass("nc")}});$(".nc").focus(function(){if($(this).hasClass("nc")){$textbox=$(this).val();$(this).removeClass("nc").val("")}}).focusout(function(){$(this).val()==""&&$(this).addClass("nc").val($textbox)})}}var global_W=$("body").width(),global_H=$(window).height(),medium_W=780,medium_H=600,small_W=752,small_H=415;$(document).ready(function(){showSubmenu();slider();placeholderOldBrowsers();fadePopy();responsiveMenu();formQuotation();formContact();formReferral();formFlash();formNewsletter();tabsPageTabs();fleetPopin();fleetFiltersActions();homeTestimoniesSlider()});var fleetPage=$("#fleet-page"),fleetFilters=$("#fleet-filters"),fleetTable=$("#fleet-table");