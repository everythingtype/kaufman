// Kaufman

(function($) {

	var resizeTimer = null;
	var menuopen = false;
	var wasDesktop = true;

	function handleResize() {
	    resizeTimer = null;
		if ( wasDesktop == true ) {
			menuopen = false;
			if ( isMobile() ) {
				wasDesktop = false;
			}
		} else {
			if( !isMobile() ) {
				wasDesktop = true;
				resetNav();
			}
		}
	}

	function menuToggle() {
		if ( $('.menutoggle').hasClass('active') ) {
			closeNav();
		} else {
			openNav();
		}
	}

	function openNav() {
		$('.menutoggle').addClass('active');
		$('.mobilenav').slideDown('fast');
		menuopen = true;
	}

	function closeNav() {
		$('.menutoggle').removeClass('active');
		$('.mobilenav').slideUp('fast');
		menuopen = false;
	}

	function resetNav() {
		$('.menutoggle').removeClass('active');
		$('.mobilenav').hide();
		menuopen = false;
	}

	function isMobile() {
		if ( $(".responsivecue").css("float") == "right" ) { 
			return false;
		} else {
			return true;
		}
	}


	$(document).ready(function() {

		handleResize();

		$('.menutoggle').on('click', function( event ) {
			menuToggle();
		});


		$('a.lightbox').colorbox({
			rel: 'gal', 
			width:'100%;', 
			height: '100%;',
			opacity: '1',
			transition: 'fade'
		});


	});

	$(window).load(function(){
		handleResize();
	});

	$(window).resize(function(){

		// Resize actions are in handleResize()
		if (resizeTimer) {
			clearTimeout(resizeTimer);   // clear any previous pending timer
		}
		resizeTimer = setTimeout(handleResize, 25);   // set new timer

	});

})(jQuery);
