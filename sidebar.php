<?php $role = $_SESSION['user']['role']; ?>
<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
<div class="sidebar-brand">
  <a href="./index.php" class="brand-link d-flex flex-column align-items-center">
    <i class="bi bi-building-fill mb-1" style="font-size: 1rem;"></i>
    <span style="font-size: 15px">SMK NEGERI 6 SURAKARTA</span>
  </a>
</div>
  <div class="sidebar-wrapper">
    <nav class="mt-2">
      <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
        <li class="nav-item menu-open">
          <a href="index.php" class="nav-link active">
            <i class="nav-icon bi bi-speedometer"></i>
            <p>Dashboard</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon bi bi-clipboard-data"></i>
            <p>
              Data
              <i class="nav-arrow bi bi-chevron-right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="datasiswa.php" class="nav-link">
                <i class="nav-icon bi bi-circle"></i>
                <p>Data Siswa</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="datajurusan.php" class="nav-link">
                <i class="nav-icon bi bi-circle"></i>
                <p>Data Jurusan</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="dataagama.php" class="nav-link">
                <i class="nav-icon bi bi-circle"></i>
                <p>Data Agama</p>
              </a>
            </li>
          </ul>
        </li>
        <?php if ($role === 'admin'): ?>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon bi bi-file-earmark-plus"></i>
              <p>
                Tambah Data
                <i class="nav-arrow bi bi-chevron-right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="tambahdatasiswa.php" class="nav-link">
                  <i class="nav-icon bi bi-circle"></i>
                  <p>Tambah Siswa</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="tambahdatajurusan.php" class="nav-link">
                  <i class="nav-icon bi bi-circle"></i>
                  <p>Tambah Jurusan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="tambahdataagama.php" class="nav-link">
                  <i class="nav-icon bi bi-circle"></i>
                  <p>Tambah Agama</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="usermanagement.php" class="nav-link">
              <i class="nav-icon bi bi-folder2-open"></i>
              <p>User Management</p>
            </a>
          </li>
        <?php endif; ?>
        <li class="nav-item">
          <a href="logout.php" class="nav-link">
            <i class="nav-icon bi bi-box-arrow-right"></i>
            <p>Logout</p>
          </a>
        </li>
      </ul>
    </nav>
  </div>
</aside>