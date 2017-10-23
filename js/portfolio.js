// Kaufman

(function($) {

	var currentSlide = null;
	var totalSlides = null;

	function setSlideHeights() {

		var contentheight = $(window).height();

		var headerheight = $('.topheader').outerHeight();
		var controlsheight = $('.controls').outerHeight();

		var wpadminbar = 0;

		if ($('#wpadminbar').length != 0) {
			wpadminbar =+ $('#wpadminbar').outerHeight();
		} 

		contentheight = contentheight - wpadminbar - headerheight - controlsheight;

		$('.slides').css({
	 		'height': contentheight +'px',
		});

		$('.slide').css({
	 		'height': contentheight +'px',
		});

		$('.slideinner').css({
	 		'max-height': contentheight +'px',
		});

		$('.slide img').css({
	 		'max-height': contentheight +'px',
		});

		$('.captionwrap').css({
	 		'bottom': controlsheight +'px',
		});

	}

	function initalizeSlides() {

		setSlideHeights();

		var slideLength = $('.slides .slide').length;
		totalSlides = slideLength - 1;

		currentSlide = 0;

		$('.slides .slide').hide();
		$('.slides .slide:eq(' + currentSlide + ')').show();

		$('.captionwrap .caption').hide();
		$('.captionwrap .caption:eq(' + currentSlide + ')').show();

	}

	function prevSlide() {

		var outgoing = currentSlide;

		if ( outgoing == 0 ) {
			var incoming = totalSlides;
		} else {
			var incoming = currentSlide - 1;
		}

		$('.slides .slide:eq(' + outgoing + ')').css('z-index','1');
		$('.slides .slide:eq(' + incoming + ')').css('z-index','0').stop().css('opacity','1').show();
		$('.slides .slide:eq(' + outgoing + ')').stop().fadeOut(1500);

		$('.captionwrap .caption:eq(' + outgoing + ')').css('z-index','1');
		$('.captionwrap .caption:eq(' + incoming + ')').css('z-index','0').stop().css('opacity','1').show();
		$('.captionwrap .caption:eq(' + outgoing + ')').stop().fadeOut(1500);

		currentSlide = incoming;

	}


	function nextSlide() {

		var outgoing = currentSlide;

		if ( outgoing < totalSlides ) {
			var incoming = currentSlide + 1;
		} else {
			var incoming = 0;
		}

		$('.slides .slide:eq(' + outgoing + ')').css('z-index','1');
		$('.slides .slide:eq(' + incoming + ')').css('z-index','0').css('opacity','1').stop().show();
		$('.slides .slide:eq(' + outgoing + ')').stop().fadeOut(1500);

		$('.captionwrap .caption:eq(' + outgoing + ')').css('z-index','1');
		$('.captionwrap .caption:eq(' + incoming + ')').css('z-index','0').css('opacity','1').stop().show();
		$('.captionwrap .caption:eq(' + outgoing + ')').stop().fadeOut(1500);

		currentSlide = incoming;

	}

	$(document).ready(function() {

		initalizeSlides();

		$('.controls .previous').on( "click", function() {
			prevSlide();
		});

		$('.controls .next').on( "click", function() {
			nextSlide();
		});

		$('.slideinner img').on( "click", function() {
			nextSlide();
		});

		$('.controls .caption').on( "click", function() {
			if ( $(this).hasClass('active') ) {
				$('.captionwrap').removeClass('visible');
				$(this).removeClass('active');
			} else {
				$('.captionwrap').addClass('visible');
				$(this).addClass('active');
			}
		});

	});

	$(document).keydown(function(e) {
		e.preventDefault();

		switch(e.which) {
			// Guide: 37 = left, 38 = up, 39 = right, 40 = down

			case 37: // left
				prevSlide();
	        break;

			case 39: // right
				nextSlide();
			break;

			default: return; // exit this handler for other keys
		}

	});

	$(window).load(function(){
		setSlideHeights()
	});

	$(window).resize(function(){
		setSlideHeights();
	});


})(jQuery);
