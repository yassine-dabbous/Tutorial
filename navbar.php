<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/"><img style="height: 50px;width: 90px;margin-top: -16px;" src="http://www.poste.tn/image/gif/logo.gif" /></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="/">Acceuil <span class="sr-only">(current)</span></a></li>
        <li><a href="/users.php">Clients</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Services <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="/show_tickets.php">Les billets </a></li>
            <li role="separator" class="divider"></li>
            <li><a href="/show_versement.php">Les demandes de versement </a></li>
            <li><a href="/show_retrait.php">Les demandes de retrait </a></li>
            <li><a href="/show_mandate_send.php">Les demandes d'envoi d'une mandate </a></li>
            <li><a href="/show_mandate_receive.php">Les demandes du reception d'une mandate </a></li>
          </ul>
        </li>
      </ul>

      <ul class="nav navbar-nav navbar-right">
      <li class="active"><a href="#">Bonjour <?php echo $_SESSION['username']; ?>!</a></li>
        <li><a href="/logout.php">Déconnexion</a></li>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>