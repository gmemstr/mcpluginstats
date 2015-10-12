<?php
  require __DIR__.'/userapp/lib/UserApp/Autoloader.php';
  require __DIR__.'/userapp/lib/UserApp/Widget/Autoloader.php';  
  
  UserApp\Autoloader::register();
  UserApp\Widget\Autoloader::register();
  
  use \UserApp\Widget\User;
  
  User::setAppId("USERAPP_API_KEY");

  $username = $_POST['name'];
  $password = $_POST['password'];
  $email = $_POST['email'];
  
  try{
  if(User::signup($username, $password, $email, $auto_login = true)){
    echo("Logged in as " . $username . " - redirecting to homepage");
    header( 'Location: index.php' );
  }else{
    echo("Invalid something");
    header( 'Location: register.php' );
  }
  }catch(Exception $e){
    echo("Invalid something");
    header( 'Location: register.php' );
  }

?>