<?php
  require __DIR__.'/userapp/lib/UserApp/Autoloader.php';
  require __DIR__.'/userapp/lib/UserApp/Widget/Autoloader.php';  
  
  UserApp\Autoloader::register();
  UserApp\Widget\Autoloader::register();
  
  use \UserApp\Widget\User;
  
  User::setAppId("USERAPP_API_KEY");
  
  $user = User::current();
  $user->logout();
  header( 'Location: index.php' );

?>