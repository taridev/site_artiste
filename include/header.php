<header>
  <div class="jumbotron">
    <h1>Site ARTISTE</h1>
    <nav class="navbar">
      <div class="container-fluid">
        <div>
          <ul class="nav navbar-nav">
            <li>
              <a href="indexSwitch.php?indexOeuvres=1">oeuvres</a>
            </li>
            <li>
              <a href="indexSwitch.php?indexExpositions=1">expositions</a>
            </li>
            <?php if( isset($_SESSION['login']) ) { ?>
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#">Administration
                <span class="caret"></span>
              </a>
              <ul class="dropdown-menu">
                <li>
                <a href="indexSwitch.php?indexOeuvresAdministration=1">administration oeuvres</a>
                </li>
                <li>
                  <a href="#">administration expositions</a>
                </li>
              </ul>
            </li>
            <?php } ?>
          </ul>
          <form id="signin" class="navbar-form navbar-right" method="POST" action="indexSwitch.php?signin">
            <?php if( !isset($_SESSION['login']) ) { ?>
            <div class="input-group">
              <span class="input-group-addon">
                <i class="glyphicon glyphicon-user"></i>
              </span>
              <input id="username" type="text" class="form-control" name="username" value="" placeholder="admin">
            </div>

            <div class="input-group">
              <span class="input-group-addon">
                <i class="glyphicon glyphicon-lock"></i>
              </span>
              <input id="password" type="password" class="form-control" name="password" value="" placeholder="admin">
            </div>
            <input type="submit" class="btn btn-primary" name="login" value="Login">
            <?php } else { ?>
            <input type="submit" class="btn btn-primary" name="logout" value="Déconnexion">
            <?php } ?>
          </form>

        </div>
      </div>
    </nav>
  </div>
</header>