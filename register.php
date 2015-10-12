<?php
  require __DIR__.'/userapp/lib/UserApp/Autoloader.php';
  require __DIR__.'/userapp/lib/UserApp/Widget/Autoloader.php';  
  
  UserApp\Autoloader::register();
  UserApp\Widget\Autoloader::register();
  
  use \UserApp\Widget\User;
  
  User::setAppId("USERAPP_API_KEY");

  if(User::authenticated()){
    header( 'Location: index.php' );
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title>Gmem's Plugin Tracker</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/jumbotron-narrow.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="container">
      <div class="header clearfix">
        <nav>
          <ul class="nav nav-pills pull-right">
            <li role="presentation"><a href="index.php">Home</a></li>
            <li role="presentation"><a href="api/">Docs</a></li>
            <li role="presentation"><a href="#">Contact</a></li>
            <li role="presentation" class="active">
              <?php
                if(!User::authenticated()){
                  echo"<a href='#'>Log in";
                }
              ?>
            </a></li>
          </ul>
        </nav>
        <h3 class="text-muted">Log In</h3>
      </div>

      <div class="jumbotron">
        <h1>Register</h1>
        <form action="newaccount.php" method="post" role="form">
          <div class="form-group">
            <input type="text" placeholder="Email" class="form-control" name="email">
            <br />
            <input type="text" placeholder="Username" class="form-control" name="name">
            <br />
            <input type="password" placeholder="Password" class="form-control" name="password">
            <br />
            <input type="password" placeholder="Confirm password" class="form-control" name="c_password">
            <br />
            <input type="submit">
          </div>
        </form>
      </div>

      <footer class="footer">
        <p>&copy; Gabriel Simmer 2015</p>
      </footer>

    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
