<?php

add_action( 'admin_menu', 'spellerberg_ga_menu' );

function spellerberg_ga_menu() {
	add_options_page( 'Google Analytics', 'Google Analytics', 'manage_options', 'spellerberg_google_analytics', 'spellerberg_ga_options' );
}

function spellerberg_ga_options() {

    if (!current_user_can('manage_options')) {
      wp_die( __('You do not have sufficient permissions to access this page.') );
    }

    $opt_name = 'spellerberg_ga_code';
    $hidden_field_name = 'spellerberg_ga_submit_hidden';
    $data_field_name = 'spellerberg_ga_code';

    $opt_val = get_option( $opt_name );

    if( isset($_POST[ $hidden_field_name ]) && $_POST[ $hidden_field_name ] == 'Y' ) {
	    $opt_val = stripslashes($_POST[ $data_field_name ]);
        update_option( $opt_name, $opt_val ); ?>
		<div class="updated"><p><strong><?php _e('Settings saved.', 'spellerberg_ga_menu' ); ?></strong></p></div>
	<?php } ?>

	<div class="wrap">
		<h2>Google Analytics</h2>

		<form name="form1" method="post" action="">
			<input type="hidden" name="<?php echo $hidden_field_name; ?>" value="Y">

			<p>Your Google Analytics asynchronous tracking code:</p>

			<textarea name="<?php echo $data_field_name; ?>" rows="20" style="width: 100%"><?php echo $opt_val; ?></textarea>

			<p class="submit"><input type="submit" name="Submit" class="button-primary" value="<?php esc_attr_e('Save Changes') ?>" /></p>

		</form>
	</div>
<?php }


add_action('wp_head', 'spellerberg_google_analytics');
function spellerberg_google_analytics() {
	if (!is_user_logged_in()) :
		echo get_option('spellerberg_ga_code');
	endif;
}
