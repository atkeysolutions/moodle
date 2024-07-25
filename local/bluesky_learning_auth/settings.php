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

	$settings->add( new admin_setting_configcheckbox(
		'local_bluesky_learning_auth/backdoor_active',
		get_string('backdoor_active','local_bluesky_learning_auth'),
		get_string('backdoor_active_help','local_bluesky_learning_auth',$CFG->wwwroot),
		0
	) );

	$settings->add( new admin_setting_configtext(
		'local_bluesky_learning_auth/backdoor_iprange',
		get_string('backdoor_ip_range','local_bluesky_learning_auth'),
		get_string('backdoor_ip_range_help','local_bluesky_learning_auth'),
		'',
		PARAM_TEXT
	) );
}
