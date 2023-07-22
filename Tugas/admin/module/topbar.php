<header class="main-header">

        <a class="navbar-brand" href="index.php"> GoFish.com </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="navbar-brand">
          <span class="small">Sistem Administrasi </span>
            <b> GoFish.com</b>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="images/user.jpg" class="user-image" alt="User Image" />
                  <span class="hidden-xs"><?php echo $_SESSION["admin"]['nama_admin']; ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="images/user.jpg" class="img-circle" alt="User Image" />
                    <p>
                      <?php echo $_SESSION["admin"]['nama_admin']; ?><br>
                      <?php echo $_SESSION["admin"]['role']; ?>
                    </p>
                    
                  </li>               
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="#" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">
                      <a href="../logout.php" class="btn btn-default btn-flat">Log Out</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
</header>
