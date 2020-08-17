<?php
  require(__DIR__.'/../../config.php');
  require_once($CFG->dirroot.'/user/profile/lib.php');

  $user = get_complete_user_data('id', $_GET['id']);

  if($user->profile["bluesky_learning_auth_token"] == ""){
    print_error("nologinas");
  } else {
    if($user->profile["bluesky_learning_auth_token"] == $_GET['token']){
      complete_user_login($user);
      $user->profile_field_bluesky_learning_auth_token = "";
      profile_save_data($user);
      redirect($_GET['courseid'] ? ("/course/view.php?id=" . $_GET['courseid']) : "/");
    } else {
      print_error("nologinas");
    }
  }
