<nav class="navbar-expand-lg bg-secondary fixed-top text-uppercase">
  <div class="container-fluid">
    <!-- <div class="navbar-header">
      <a class="navbar-brand" href="#">Forum</a>
    </div> -->
    <ul class="nav navbar-nav">
      <li><a href="/">Home</a></li>
      <!-- <li><a href="/newtopics">New Topics</a></li>
      <li><a href="/bestcasinos">Best</a></li>
      <li><a href="/partners">Partners</a></li>  -->
    </ul>
    <?php
    session_start();
    if (isset($_SESSION['username'])) {
      echo '<ul class="nav navbar-nav navbar-right">
            <li><a href="/profile.php"><span class="glyphicon glyphicon-user"></span>Welcome ' . $_SESSION['username'] . '</a></li>
            <li><a href="/logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
            </ul>';
    } else {
      echo '    <ul class="nav navbar-nav navbar-right">
                <li><a href="/register.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                <li><a href="/login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
            </ul>';
    }
    ?>
  </div>
</nav>