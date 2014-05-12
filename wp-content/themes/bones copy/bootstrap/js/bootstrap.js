/* ========================================================================

CUSTOM JS

Scripts-ck.js is compiled by scripts.js using CodeKit import statements. Remove the import statements and re-compile to choose scripts

* ======================================================================== */
 
jQuery(document).ready(function ($) {
	
	// When a menu item is selected.
	$('header nav .nav ul li a').click(function(){
			
		// For slide down:
		$('.subnav').addClass('opened');
			
		// For fadein: $('.subnav').fadeIn();
		
		$('header nav .nav ul li a').removeClass('active');
		
		$(this).addClass('active');
	
	});
});