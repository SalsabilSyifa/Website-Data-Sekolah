<?php
include_once 'koneksi.php';
$db = new database();
session_start();
$username = $_SESSION['username'] ?? 'User';
$role = $_SESSION['user']['role'];
?>
<!doctype html>
<html lang="en">
<!--begin::Head-->

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>AdminLTE 4 | Simple Tables</title>
  <!--begin::Primary Meta Tags-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="title" content="AdminLTE 4 | Simple Tables" />
  <meta name="author" content="ColorlibHQ" />
  <meta
    name="description"
    content="AdminLTE is a Free Bootstrap 5 Admin Dashboard, 30 example pages using Vanilla JS." />
  <meta
    name="keywords"
    content="bootstrap 5, bootstrap, bootstrap 5 admin dashboard, bootstrap 5 dashboard, bootstrap 5 charts, bootstrap 5 calendar, bootstrap 5 datepicker, bootstrap 5 tables, bootstrap 5 datatable, vanilla js datatable, colorlibhq, colorlibhq dashboard, colorlibhq admin dashboard" />
  <!--end::Primary Meta Tags-->
  <!--begin::Fonts-->
  <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css"
    integrity="sha256-tXJfXfp6Ewt1ilPzLDtQnJV4hclT9XuaZUKyUvmyr+Q="
    crossorigin="anonymous" />
  <!--end::Fonts-->
  <!--begin::Third Party Plugin(OverlayScrollbars)-->
  <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.10.1/styles/overlayscrollbars.min.css"
    integrity="sha256-tZHrRjVqNSRyWg2wbppGnT833E/Ys0DHWGwT04GiqQg="
    crossorigin="anonymous" />
  <!--end::Third Party Plugin(OverlayScrollbars)-->
  <!--begin::Third Party Plugin(Bootstrap Icons)-->
  <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    integrity="sha256-9kPW/n5nn53j4WMRYAxe9c1rCY96Oogo/MKSVdKzPmI="
    crossorigin="anonymous" />
  <!--end::Third Party Plugin(Bootstrap Icons)-->
  <!--begin::Required Plugin(AdminLTE)-->
  <link rel="stylesheet" href="dist/css/adminlte.css" />
  <!--end::Required Plugin(AdminLTE)-->
</head>
<!--end::Head-->
<!--begin::Body-->

<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
  <!--begin::App Wrapper-->
  <div class="app-wrapper">
    <!--begin::Header-->
    <nav class="app-header navbar navbar-expand bg-body">
      <!--begin::Container-->
      <div class="container-fluid">
        <!--begin::Start Navbar Links-->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button">
              <i class="bi bi-list"></i>
            </a>
          </li>
          <li class="nav-item d-none d-md-block"><a href="#" class="nav-link">Home</a></li>
        </ul>
        <!--end::Start Navbar Links-->
        <!--begin::End Navbar Links-->
        <ul class="navbar-nav ms-auto">
          <!--end::Navbar Search-->
        <!--end::Messages Dropdown Menu-->
        
          <!--end::Notifications Dropdown Menu-->
          <!--begin::Fullscreen Toggle-->
          <!--end::Fullscreen Toggle-->
          <!--begin::User Menu Dropdown-->
          <li class="nav-item dropdown user-menu">
            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
              <img
                src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///ywAAAAAAQABAAACAUwAOw=="
                class="user-image rounded-circle shadow text-bg-primary"
                alt="Profile"
                class="rounded-circle"
                style="background-color: #ccc" ; />
              <span class="d-none d-md-inline"><?= $_SESSION['user']['username'] ?></span>
            </a>
            <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
              <!--begin::User Image-->
              <li class="user-header text-bg-primary">
                <img
                  src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///ywAAAAAAQABAAACAUwAOw=="
                  class="user-image rounded-circle shadow text-bg-primary"
                  alt="Profile"
                  class="rounded-circle"
                  style="background-color: #ccc" ; />
                <p>
                  <?= $_SESSION['user']['username'] ?>
                  <small>
                    <?= $_SESSION['user']['role'] ?>
                  </small>
                </p>
              </li>
              <!--end::User Image-->
              <!--begin::Menu Footer-->
              <li class="user-footer">
                <a href="logout.php" class="btn btn-default btn-flat float-end">Sign out</a>
              </li>
              <!--end::Menu Footer-->
            </ul>
          </li>
          <!--end::User Menu Dropdown-->
        </ul>
        <!--end::End Navbar Links-->
      </div>
      <!--end::Container-->
    </nav>
    <!--end::Header-->
    <?php include "sidebar.php"; ?>
    <!--begin::App Main-->
    <main class="app-main">
      <!--begin::App Content Header-->
      <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid">
          <!--begin::Row-->
          <div class="row">
            <div class="col-sm-6">
              <h3 class="mb-0">Data Agama</h3>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-end">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Data Agama</li>
              </ol>
            </div>
          </div>
          <!--end::Row-->
        </div>
        <!--end::Container-->
      </div>
      <!--end::App Content Header-->
      <!--begin::App Content-->
      <div class="app-content">
        <!--begin::Container-->
        <div class="container-fluid">
          <!--begin::Row-->
          <div class="row">
            <div class="col-md-12">
              <!--begin::Card-->
              <div class="card mb-4">
                <div class="card-header bg-primary text-white">
                  <h3 class="card-title m-0"><i class="bi bi-bookmark"></i> Table Agama</h3>
                </div>
                <div class="card-body p-0">
                  <table class="table table-bordered table-striped m-0">
                    <thead class="table-light text-center">
                      <tr>
                        <th>No</th>
                        <th>Kode Agama</th>
                        <th>Nama Agama</th>
                        <?php if ($role === 'admin'): ?>
                          <th>Aksi</th>
                        <?php endif; ?>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $no = 1;
                      $data_agama = $db->tampil_agama();
                      if (!empty($data_agama)) {
                        foreach ($data_agama as $a):
                      ?>
                          <tr>
                            <td class="text-center"><?= $no++; ?></td>
                            <td><?= htmlspecialchars($a['idAgama']); ?></td>
                            <td><?= htmlspecialchars($a['namaAgama']); ?></td>
                            <?php if ($role === 'admin'): ?>
                              <td class="text-center">
                                <!-- Tombol Edit -->
                                <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal<?= $a['idAgama'] ?>">
                                  Edit <i class="bi bi-pencil-square ms-1"></i>
                                </button>
                                <!-- Tombol Hapus -->
                                <a href="proses.php?aksi=hapusagama&idAgama=<?= $a['idAgama'] ?>"
                                  onclick="return confirm('Yakin ingin menghapus?')"
                                  class="btn btn-danger btn-sm">
                                  Hapus <i class="bi bi-trash3 ms-1"></i>
                                </a>
                                <!-- Modal Edit -->
                                <div class="modal fade" id="editModal<?= $a['idAgama'] ?>" tabindex="-1" aria-labelledby="editModalLabel<?= $a['idAgama'] ?>" aria-hidden="true">
                                  <div class="modal-dialog">
                                    <div class="modal-content">
                                      <form action="proses.php?aksi=update_agama" method="POST">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="editModalLabel<?= $a['idAgama'] ?>">Edit Agama</h5>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>

                                        <div class="modal-body">
                                          <input type="hidden" name="id_lama" value="<?= $a['idAgama'] ?>">
                                          <div class="mb-3">
                                            <label for="idAgama<?= $a['idAgama'] ?>" class="form-label">Kode Agama</label>
                                            <input type="text" class="form-control" id="idAgama<?= $a['idAgama'] ?>" name="idAgama" value="<?= $a['idAgama'] ?>" required>
                                          </div>
                                          <div class="mb-3">
                                            <label for="namaAgama<?= $a['idAgama'] ?>" class="form-label">Nama Agama</label>
                                            <input type="text" class="form-control" id="namaAgama<?= $a['idAgama'] ?>" name="namaAgama" value="<?= $a['namaAgama'] ?>" required>
                                          </div>
                                        </div>

                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                          <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                      </form>
                                    </div>
                                  </div>
                                </div>
                              </td>
                            <?php endif; ?>
                          </tr>
                      <?php
                        endforeach;
                      } else {
                        $colspan = ($role === 'admin') ? 4 : 3;
                        echo "<tr><td colspan='$colspan' class='text-center'>Data agama tidak ditemukan.</td></tr>";
                      }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
              <!--end::Card-->
            </div>
          </div>
          <!--end::Row-->
        </div>
        <!--end::Container-->
      </div>
      <!--end::App Content-->
    </main>
    <!--end::App Main-->
    <!--begin::Footer-->
    <footer class="app-footer">
      <!--begin::To the end-->
      <div class="float-end d-none d-sm-inline">SMK NEGERI 6 SURAKARTA</div>
      <!--end::To the end-->
      <!--begin::Copyright-->

    </footer>
    <!--end::Footer-->
  </div>
  <!--end::App Wrapper-->
  <!--begin::Script-->
  <!--begin::Third Party Plugin(OverlayScrollbars)-->
  <script
    src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.10.1/browser/overlayscrollbars.browser.es6.min.js"
    integrity="sha256-dghWARbRe2eLlIJ56wNB+b760ywulqK3DzZYEpsg2fQ="
    crossorigin="anonymous"></script>
  <!--end::Third Party Plugin(OverlayScrollbars)--><!--begin::Required Plugin(popperjs for Bootstrap 5)-->
  <script
    src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
    crossorigin="anonymous"></script>
  <!--end::Required Plugin(popperjs for Bootstrap 5)--><!--begin::Required Plugin(Bootstrap 5)-->
  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
    integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
    crossorigin="anonymous"></script>
  <!--end::Required Plugin(Bootstrap 5)--><!--begin::Required Plugin(AdminLTE)-->
  <script src="dist/js/adminlte.js"></script>
  <!--end::Required Plugin(AdminLTE)--><!--begin::OverlayScrollbars Configure-->
  <script>
    const SELECTOR_SIDEBAR_WRAPPER = '.sidebar-wrapper';
    const Default = {
      scrollbarTheme: 'os-theme-light',
      scrollbarAutoHide: 'leave',
      scrollbarClickScroll: true,
    };
    document.addEventListener('DOMContentLoaded', function() {
      const sidebarWrapper = document.querySelector(SELECTOR_SIDEBAR_WRAPPER);
      if (sidebarWrapper && typeof OverlayScrollbarsGlobal?.OverlayScrollbars !== 'undefined') {
        OverlayScrollbarsGlobal.OverlayScrollbars(sidebarWrapper, {
          scrollbars: {
            theme: Default.scrollbarTheme,
            autoHide: Default.scrollbarAutoHide,
            clickScroll: Default.scrollbarClickScroll,
          },
        });
      }
    });
  </script>
  <!--end::OverlayScrollbars Configure-->
  <!--end::Script-->
</body>
<!--end::Body-->

</html>