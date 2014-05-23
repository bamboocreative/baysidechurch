/* ========================================================================

CUSTOM JS

Scripts-ck.js is compiled by scripts.js using CodeKit import statements. Remove the import statements and re-compile to choose scripts

* ======================================================================== */
 
jQuery(document).ready(function ($) {
	
	// Navigation JS
	var links = $('header nav .nav ul li a');
	
	// When a menu item is selected.
	$('.sub-dropdown').click(function(){
		menuNav($(this));
	});
		
	$(document).mouseup(function (e)
	{
	    var container = $('.subnav');
	
	    if( container.hasClass('opened')){
		    
		    if (!container.is(e.target) && !$('.nav ul li a').is(e.target) && container.has(e.target).length === 0 )
		    {
		        $('.subnav').removeClass('opened');
		    }
		    
	    }
	    
	   
	});
	
	function menuNav(menu){
		
		if(menu.hasClass('active')){
		
			menu.removeClass('active');
			$('.subnav').removeClass('opened');
		
		} else{
		
			var id = menu.attr('id');
			
			$('.subnav').addClass('opened');
			
			$('.sub-menu').removeClass('fadeIn');
			$('.sub-menu').addClass('fadeOut');
			
			$('.' + id).removeClass('fadeOut');
			$('.' + id).addClass('fadeIn');
			
			links.removeClass('active');
			menu.addClass('active');	
		
		}
		
	}
	
});