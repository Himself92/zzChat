<?php
require 'start.php';
$error = false;
if(isset($_GET['request'])){
  switch($_GET['request']){
    case 'lang':
      if(isset($_GET['lang']) && ( $_GET['lang'] == 'en' || $_GET['lang'] == 'fr' )){
        $_SESSION['lang'] = $_GET['lang'];
      }
      header('location: index.php');
    break;
    case 'login':
      if(!empty(getOnlineUsers()) && in_array($_POST['user'], getOnlineUsers())){
        $error = 'user_already_in_use';
      }else{
        $user->login($_POST['user']);
        header('location: index.php');
      }
    break;
  }
}

require 'header.php';
if($user->loggedIn()){
  require 'room.php';
}else{
  require 'login.php';
}
require 'footer.php';
?>