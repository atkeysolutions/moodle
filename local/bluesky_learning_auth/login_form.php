<?php 

require('../../config.php');

// Check that the backdoor is active
$allow_access = false; // assume foul play
$is_active = get_config('local_bluesky_learning_auth', 'backdoor_active');
if($is_active){    
    // Get IPs allowed to access
    $ip_range = get_config('local_bluesky_learning_auth', 'backdoor_iprange');
    $ip_range = trim($ip_range);
    // Make sure users IP is in the allowed range
    $ips = explode(',', $ip_range);      
    if( in_array($_SERVER["REMOTE_ADDR"], $ips) ){
        $allow_access = true;
    }
}

// Not passed the access rules - redirect to normal login flow
if(!$allow_access){
    // Default redirect location on bad access
    $urltogo= new moodle_url('/login/index.php');
    redirect($urltogo);
    exit();
}

$loginsite = "External/SSO Bypass login";

$authsequence = get_enabled_auth_plugins(); // Auths, in sequence.
foreach($authsequence as $authname) {
    $authplugin = get_auth_plugin($authname);
    // The auth plugin's loginpage_hook() can eventually set $frm and/or $user.
    $authplugin->loginpage_hook();
}

/// Initialize variables
$errormsg = '';
$errorcode = 0;

$context = context_system::instance();
$PAGE->set_url("$CFG->wwwroot/local/bluesky_learning_auth/login_form.php");
$PAGE->set_context($context);

$PAGE->set_title($loginsite);
$PAGE->set_heading("BSL Login");

echo $OUTPUT->header();

if (isloggedin() and !isguestuser()) {
    // Prevent logging again and stop logout via normal means
    echo $OUTPUT->box_start();
    echo $OUTPUT->box_end();
} else {
    // Set up form defaults
    $frm = new stdClass();
    $frm->username = "";
    $frm->password = "";

    // Build login form
    $loginform = new \core_auth\output\login($authsequence, $frm->username);
    $loginform->set_error($errormsg);
    echo $OUTPUT->render($loginform);
}

echo $OUTPUT->footer();