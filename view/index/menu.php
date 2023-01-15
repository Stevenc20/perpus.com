<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="index3.html" class="brand-link">
    <img src="picture/<?=$data_info['foto_aplikasi'];?>"  class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light"><?=$data_info['nm_aplikasi'];?></span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="picture/logo.PNG" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block"><?=$nama_user;?></a>
      </div>
    </div>

    <!-- SidebarSearch Form -->
    <div class="form-inline">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
     
      <li class="nav-link"> 
          <p>
            LOGIN 
          </p>
      </li>
      <li class="nav-item">
        <a href="index.php?page=home" class="nav-link active">
        <i class="fa fa-home" aria-hidden="true"></i>
          <p>
            Dashboard
          </p>
        </a>
      </li>
      <?php
      if ($level_user == 1) {
        ?>
        <li class="nav-item">
          <a href="#" class="nav-link">
          <i class="fa fa-address-book"></i>
            <p>
              Referensi
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="index.php?page=user" class="nav-link">
              <i class="fa fa-caret-down"></i>
                <p>User Akun</p>
              </a>
            </li>
            
            <li class="nav-item">
              <a href="index.php?page=settingaplikasi" class="nav-link">
              <i class="fa fa-caret-down"></i>
                <p>Setting Aplikasi</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="index.php?page=kelas" class="nav-link">
              <i class="fa fa-caret-down"></i>
                <p>Daftar Kelas</p>
              </a>
            </li>
            
          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
          <i class="fa fa-calendar" aria-hidden="true"></i>
            <p>
              Master Data
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="index.php?page=siswa" class="nav-link">
              <i class="fa fa-caret-down"></i>
                <p>Data Siswa</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="index.php?page=guru" class="nav-link">
              <i class="fa fa-caret-down"></i>
                <p>Data Guru</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="index.php?page=buku" class="nav-link">
              <i class="fa fa-caret-down"></i>
                <p>Data Buku</p>
              </a>
            </li>
            
          </ul>
        </li>

        <li class="nav-item">
          <a href="#" class="nav-link">
          <i class="fa fa-desktop"></i>
            <p>
              Transaksi
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="index.php?page=pinjam" class="nav-link">
              <i class="fa fa-caret-down"></i>
                <p>Peminjaman</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="index.php?page=kembali" class="nav-link">
              <i class="fa fa-caret-down"></i>
                <p>Pengembalian</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item">
          <a href="#" class="nav-link">
          <i class="fa fa-folder-open"></i>
            <p>
              Laporan
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="index.php?page=kak_rutin" class="nav-link">
              <i class="fa fa-caret-down"></i>
                <p>Data Buku</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="index.php?page=kak_inti" class="nav-link">
              <i class="fa fa-caret-down"></i>
                <p>Data Peminjam</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="index.php?page=kak_inti" class="nav-link">
              <i class="fa fa-caret-down"></i>
                <p>Data Pengembalian</p>
              </a>
            </li>
          </ul>
        </li>
        
        <li class="nav-item">
          <a href="index.php?page=log" class="nav-link">
          <i class="fa-solid fa-gears"></i>
            <p>
              Log Login
            </p>
          </a>
        </li>
    <?php
    } else {
    ?>
        <li class="nav-item">
          <a href="index.php?page=cari" class="nav-link">
          <i class="fa fa-search" aria-hidden="true"></i>
            <p>
              Pencarian
            </p>
          </a>
        </li>
        
        <li class="nav-item">
          <a href="index.php?page=historipinjam" class="nav-link">
          <i class="fa fa-address-card" aria-hidden="true"></i>
            <p>
              History Peminjaman
            </p>
          </a>
        </li>

    <?php
    }
    ?>
        <li class="nav-item">
          <a href="models/logout.php" class="nav-link">
          <i class="fa fa-outdent" aria-hidden="true"></i>
            <p>
              Logout
            </p>
          </a>
        </li>
        
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>