<?php
  require(__DIR__.'/../../config.php');

  $token = required_param('token', PARAM_TEXT);
  $userid = required_param('id', PARAM_INT);

  $api_token = get_config('local_bluesky_learning_auth', 'apikey');

  if($token == $api_token){
    $DB->delete_records("sessions", ['userid' => $userid]);
  } else {
    print_error("Your API token is invalid.");
  }
