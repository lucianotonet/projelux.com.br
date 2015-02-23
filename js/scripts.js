$(function () {	
	

	/* STICKY MENU */
    var sticky_main_menu_offset_top = $('#sticky-main-menu').offset().top;
    var sticky_main_menu = function(){
        var scroll_top = $(window).scrollTop();         
        if (scroll_top > sticky_main_menu_offset_top) { 
        	$('#sticky-main-menu').addClass('navbar-fixed-top').removeClass('hidden');  			        	     
        } else {
        	$('#sticky-main-menu').removeClass('navbar-fixed-top').addClass('hidden');        	
        }   
    };
    sticky_main_menu();
    $(window).scroll(function() {
         sticky_main_menu();
    });


    /* BACK TO TOP */
    $("a[href='#top']").click(function(e) {
    	e.preventDefault();
    	$("html, body").animate({ scrollTop: 0 }, 1000);
    });


    /* FILTERS */
    $('#content').isotope();

});