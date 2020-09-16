<?php
if ( $hassiteconfig ){

	$settings = new admin_settingpage( 'local_bluesky_learning_auth', 'Bluesky Learning Auth Settings' );

	$ADMIN->add( 'localplugins', $settings );

	$settings->add( new admin_setting_configtext(
		'local_bluesky_learning_auth/apikey',
		'BSL API Key',
		'This is the key BSL will use to access the logout feature',
		'No Key Defined',
		PARAM_TEXT
	) );
}
