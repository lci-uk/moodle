$(document).ready(function() {
	
	
	/* ======= Fixed header when scrolled ======= */
    
    $(window).on('scroll load', function() {
         if ($(window).scrollTop() > 0) {
             $('#header').addClass('scrolled');
         }
         else {
             $('#header').removeClass('scrolled');
         }
    });
    
    /* ======= Header Background Slideshow - Flexslider ======= */    
    /* Ref: https://github.com/woothemes/FlexSlider/wiki/FlexSlider-Properties */
    
    $('.hero-slider').flexslider({
    
        animation: "fade",
        directionNav: false, //remove the default direction-nav - https://github.com/woothemes/FlexSlider/wiki/FlexSlider-Properties
        controlNav: false, //remove the default control-nav
        slideshowSpeed: 8000,
        start: function(){
             $(this).find('.slide').css("display", "block"); //prevent flash of the images
        },
    });   
    
    $('.featured-carousel').owlCarousel({

	    margin:15,
	    //dots:false,
        nav:true,
        navText: ['<i class="material-icons">&#xE314;</i>', '<i class="material-icons">&#xE315;</i>'],
	    responsive:{		    
		    // 0px and up
	        0:{
	            items:1,
	        },
	        576:{
	            items:2,
	        },

	        768:{
	            items:2,
	        },
	        992: {
		        items:3,
	        },
	        1200:{
	            items:4,
	        }
	        
	    }
	}); 
	
	$('.promo-carousel').owlCarousel({
		
        loop:true,
	    autoplay:true,
	    autoplayHoverPause:true,
	    smartSpeed: 1000,
	    autoplayTimeout: 8000,
	    
	    
        items: 1,
        dots:false,
        nav:true,
        navText: ['<i class="material-icons">&#xE314;</i>', '<i class="material-icons">&#xE315;</i>']
	    
	}); 
	
	$('.testimonial-carousel').owlCarousel({
        margin:30,
        //dots:false,
        nav:true,
        navText: ['<i class="material-icons">&#xE314;</i>', '<i class="material-icons">&#xE315;</i>'],
        responsive:{
	        0:{
	            items:1,
	        },
	        768:{
	            items:2,
	        },
	        992: {
		        items:3,
	        }
	    }
	    
	}); 
	
	/* ======= Play/Stop YouTube/Vimeo Video in Bootstrpa Modal ======= */

    $('.play-trigger').on('click', function() {
        
        var theModal = $(this).data("target");
        var theVideo = $(theModal + ' iframe').attr('src');
        var theVideoAuto = theVideo + "?autoplay=1";
        
        $(theModal).on('shown.bs.modal', function () {
            $(theModal + ' iframe').attr('src', theVideoAuto);
        });
        
        
        $(theModal).on('hide.bs.modal', function () {
            $(theModal + ' iframe').attr('src', '');
        });
        

        
        $(theModal).on('hidden.bs.modal', function () {
            $(theModal + ' iframe').attr('src', theVideo);
        });
        
        
 
    });
    
    /* ======= FAQ ======= */
    
    $('#faq-accordion .card-toggle').on('click', function(e){
	    $(this).find('i.fa').toggleClass('fa-plus-square fa-minus-square');
	    
    });
    
    

});



