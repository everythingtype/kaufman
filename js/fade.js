// Kaufman fade

(function($) {

	var timeout = null;
	var hasFade = false;

	function doTimer() {

		// Fade In, Quickly

		clearTimeout(timeout);

		if ( hasFade == true ) {
			$('body').removeClass('slowfade');
			$('body').removeClass('faded');
			hasFade = false;
		}

		// Fade Out, Slowly

		timeout = setTimeout(function() {

			if ( hasFade == false ) {
				$('body').addClass('slowfade');
				$('body').addClass('faded');
				hasFade = true;
			}

		}, 5000);

	}

	$(document).ready(function() {

		doTimer();

	});

	$(document).on('mousemove', function() {
		doTimer();
	});

})(jQuery);
