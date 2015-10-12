<?php
  require __DIR__.'/userapp/lib/UserApp/Autoloader.php';
  require __DIR__.'/userapp/lib/UserApp/Widget/Autoloader.php';  
  
  UserApp\Autoloader::register();
  UserApp\Widget\Autoloader::register();
  
  use \UserApp\Widget\User;
  
  User::setAppId("USERAPP_API_KEY");

  $username = $_POST['name'];
  $password = $_POST['password'];
  
  if(User::login($username, $password)){
    echo("Logged in as " . $username . " redirecting to dashboard");
    header( 'Location: dashboard/' );
  }else{
    echo("Invalid something");
    header( 'Location: dashboard/' );
  }

?>