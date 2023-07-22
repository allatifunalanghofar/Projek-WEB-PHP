<aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="images/user.jpg" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
              <p><?php echo $_SESSION["admin"]['nama_admin']; ?></p>
              <span class="small"><?php echo date('l. d M Y'); ?></span>
            </div>
          </div>

          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li>
              <a href="index.php">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
              </a>
            </li>
            
            <?php if($_SESSION['admin']['username_admin']="admin") { ?>
            <li class="header">ADMINISTRASI GoFish.com</li>
            
            <li>
              <a  href="?module=produk/produk-list"><i class="fa fa-cube"></i> <span>Produk</span></a>
            </li>
            <li>
              <a   href="?module=pembelian/pembelian-list"><i class="fa fa-shopping-cart"></i> <span>Pembelian</span></a>
            </li>	

            <li>
              <a  href="?module=pelanggan/pelanggan-list"><i class="fa fa-user"></i> <span>Pelanggan</span></a>
            </li>
            <li>
              <a  href="?module=ongkir/ongkir-list"><i class="fa fa-truck"></i> <span>Ongkir</span></a>
            </li>
            
            <?php } ?>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>
