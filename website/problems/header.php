<nav class="navbar " role="navigation">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" style=" font-size:30px">Online Judge</a>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
      <ul class="nav navbar-nav navbar-right">
        <li><a>Welcome <?php echo $_SESSION["username"]; ?>!</a></li>
        <li><a href='../../index.php'>Dashboard</a></li>
        <li><a href='../../logout.php'> Log Out</a></li>
      </ul>
    </div>
  </div>
</nav>
<hr>