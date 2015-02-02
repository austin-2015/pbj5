<?php

/*
Plugin Name: Distraction Free Publish Button
Description: Add a preview button to the distraction free writing environment.
Version: 5.0
Author: Sharon Austin, but based on the code from the Full Screen Preview Button by Alex King with accessibility features added in
Author URI: http://cook-my-catch.com but based on http://alexking.org
License: GPL2
*/

function pbj5_fullscreen_publish_button() {
?>
<script type="text/javascript">
;(function($) {
	var $pbj5buttons = $('#wp-content-media-buttons');

	// add a preview button if one doesn't exist
	$(document).on('dfw-on', function() {
		var $exists = $pbj5buttons.find('#pbj4-button');
		if ($exists.length == 0) {
			$pbj4buttons.append('<a href="#" id="pbj5-button" class="button button-primary button-large" tabindex="0" aria-label="Publish"><?php _e('Publish Test'); ?></a>');
		}
	});

	// when our preview button is clicked, execute the standard preview function
	$(document).on('click', '#pbj5-button', function(e) {
		e.preventDefault();
		$("#publish").click();
		$(this).blur();
	});

	// remove the preview button when exiting DFW
	$(document).on('dfw-off', function() {
		$pbj5buttons.find('#pbj5-button').remove();
	});
}(jQuery));
</script>
<?php
}
add_action('admin_footer-post-new.php', 'pbj5_fullscreen_publish_button');
add_action('admin_footer-post.php', 'pbj5_fullscreen_publish_button');

