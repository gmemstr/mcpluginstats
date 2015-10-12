<?php
  require __DIR__.'/userapp/lib/UserApp/Autoloader.php';
  require __DIR__.'/userapp/lib/UserApp/Widget/Autoloader.php';  
  
  UserApp\Autoloader::register();
  UserApp\Widget\Autoloader::register();
  
  use \UserApp\Widget\User;
  
  User::setAppId("USERAPP_API_KEY");

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
            <li role="presentation" class="active"><a href="#">Home</a></li>
            <li role="presentation"><a href="api/">Docs</a></li>
            <li role="presentation"><a href="#">Contact</a></li>
            <li role="presentation"><?php
                if(!User::authenticated()){
                  echo"<a href='login.php'>Log in";
                }else{
                    $user = User::current();
                    echo "<a href='logout.php'>Logout ".$user->login;
               }
              ?></a></li>
          </ul>
        </nav>
        <h3 class="text-muted">Gmem's Plugin Tracker</h3>
      </div>

      <div class="jumbotron">
        <h1>Track Your Plugins</h1>
        <p class="lead">
          With a Java library specifically tailored for plugin developers, easy deployment,
          minimal server performance impact, and near-real time analytics of who's using your
          plugins, there's no reason not to use it.
        </p>
        <p><a class="btn btn-lg btn-success" href="register.php" role="button">Get Started Now</a></p>
      </div>

      <div class="row marketing">
        <div class="col-lg-12">
          <h4>Fast</h4>
          <p>
            The majority of the heavy lifting is done by the API. You just implement the
            code and sit back, with the knowledge that there is no significant performance
            impact.
          </p>

          <h4>Safe</h4>
          <p>
            Only a minimal amount of data is collected, including the server address, port,
            and whether it is online. Plugins are distinguished based on the API key used.
          </p>

          <h4>Made by developers</h4>
          <p>
            Literally made by a developer with very clear goals in mind, there is no unnecessary
            code or bloat that does not add anything. Plus, it's fairly bug free.
          </p>
        </div>
      </div>

      <footer class="footer">
        <p>&copy; Gabriel Simmer 2015</p>
      </footer>

    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
