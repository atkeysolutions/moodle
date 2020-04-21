<?php
  require(__DIR__.'/../config.php');
  require_once($CFG->dirroot.'/user/profile/lib.php');

  $user = get_complete_user_data('idnumber', $_GET['id']);

  if($user->profile["blue_login_token"] == ""){
    print_error("nologinas");
  } else {
    if($user->profile["blue_login_token"] == $_GET['token']){
      complete_user_login($user);
      $user->profile_field_blue_login_token = "";
      profile_save_data($user);
      redirect($_GET['redirect'] ? $_GET['redirect'] : "/");
    } else {
      print_error("nologinas");
    }
  }
?>
