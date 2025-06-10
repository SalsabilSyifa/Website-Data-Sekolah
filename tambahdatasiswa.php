<?php
include "koneksi.php";
$db = new database();

session_start();
$username = $_SESSION['username'] ?? 'User';
$role = $_SESSION['user']['role'];

if (!isset($_SESSION['username'])) {
  header("Location: login.php");
  exit();
}

if (isset($_POST['simpan'])) {
  $db->tambah_siswa(
    $_POST['nisn'],
    $_POST['nama'],
    $_POST['jeniskelamin'],
    $_POST['kodejurusan'],
    $_POST['kelas'],
    $_POST['alamat'],
    $_POST['idAgama'],
    $_POST['nohp']
  );
  header("location:datasiswa.php");
}
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
          <!--begin::Navbar Search-->
          <!--end::Navbar Search-->
          <!--begin::Messages Dropdown Menu-->
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
              <span class="d-none d-md-inline"><?= $_SESSION['user']['username'] ?></span> </a>
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
              <h3 class="mb-0">Data Siswa</h3>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-end">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Tambah Data Siswa </li>
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
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card mb-4">
                <div class="card-header">
                  <h3 class="card-title">Tambah Data Siswa</h3>
                </div>
                <div class="card-body p-4">
                  <form action="" method="post">
                    <div class="form-grid">
                      <div class="form-column">
                        <label for="nisn">NISN:</label>
                        <input type="text" id="nisn" name="nisn" required>

                        <label for="nama">Nama:</label>
                        <input type="text" id="nama" name="nama" class="capitalize" required>

                        <label for="jeniskelamin">Jenis Kelamin:</label>
                        <div class="radio-group">
                          <input type="radio" id="laki-laki" name="jeniskelamin" value="L" required>
                          <label for="laki-laki">Laki-laki</label>
                          <input type="radio" id="perempuan" name="jeniskelamin" value="P" required>
                          <label for="perempuan">Perempuan</label>
                        </div>

                        <label for="kodejurusan">Jurusan:</label>
                        <select name="kodejurusan" required>
                          <option value="">Pilih Jurusan</option>
                          <?php
                          $data_jurusan = $db->tampil_jurusan();
                          if (!empty($data_jurusan)) {
                            foreach ($data_jurusan as $x) {
                              echo '<option value="' . $x['kodejurusan'] . '">' . $x['namajurusan'] . '</option>';
                            }
                          } else {
                            echo '<option value="">Data tidak ditemukan</option>';
                          }
                          ?>
                        </select>
                      </div>

                      <div class="form-column">
                        <label for="kelas">Kelas:</label>
                        <select name="kelas" required>
                          <option value="">Pilih Kelas</option>
                          <option value="X">X</option>
                          <option value="XI">XI</option>
                          <option value="XII">XII</option>
                        </select>

                        <label for="alamat">Alamat:</label>
                        <input type="text" id="alamat" name="alamat" class="capitalize" required>

                        <label for="idAgama">Agama:</label>
                        <select name="idAgama" required>
                          <option value="">Pilih Agama</option>
                          <?php
                          $data_agama = $db->tampil_agama();
                          if (!empty($data_agama)) {
                            foreach ($data_agama as $x) {
                              echo '<option value="' . $x['idAgama'] . '">' . $x['namaAgama'] . '</option>';
                            }
                          } else {
                            echo '<option value="">Data tidak ditemukan</option>';
                          }
                          ?>
                        </select>

                        <label for="nohp">No HP:</label>
                        <input type="text" id="nohp" name="nohp" required>
                      </div>
                    </div>

                    <div class="mt-4 btn-blue">
                      <input type="submit" name="simpan" value="Tambah Siswa">
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <style>
        .form-grid {
          display: flex;
          gap: 30px;
          flex-wrap: wrap;
        }

        .form-column {
          flex: 1;
          min-width: 300px;
        }

        label {
          font-weight: bold;
          margin-top: 12px;
          display: block;
        }

        input[type="text"],
        select {
          padding: 10px;
          width: 100%;
          border: 1px solid #ccc;
          border-radius: 5px;
          margin-top: 5px;
          font-size: 14px;
          transition: all 0.3s ease;
        }

        input[type="text"]:focus,
        select:focus {
          border-color: #4c78af;
          outline: none;
          box-shadow: 0px 0px 5px rgba(76, 120, 175, 0.5);
        }

        .radio-group {
          display: flex;
          gap: 15px;
          margin-top: 5px;
        }

        input[type="submit"] {
          background-color: #007bff;
          color: white;
          border: none;
          padding: 12px;
          width: 100%;
          border-radius: 5px;
          font-size: 16px;
          font-weight: bold;
          cursor: pointer;
          transition: background-color 0.3s ease-in-out, transform 0.2s;
        }

        input[type="submit"]:hover {
          background-color: #5409DA;
        }

        input[type="submit"]:active {
          transform: scale(0.98);
        }

        .capitalize {
          text-transform: capitalize;
        }
      </style>

      <script>
        function capitalizeWords(input) {
          input.value = input.value
            .toLowerCase()
            .split(' ')
            .map(word => word.charAt(0).toUpperCase() + word.slice(1))
            .join(' ');
        }

        document.getElementById('nama').addEventListener('blur', function() {
          capitalizeWords(this);
        });

        document.getElementById('alamat').addEventListener('blur', function() {
          capitalizeWords(this);
        });
      </script>

      <!--end::App Content-->
    </main>
    <!--end::App Main-->
    <!--begin::Footer-->
    <footer class="app-footer">
      <!--begin::To the end-->
      <div class="float-end d-none d-sm-inline">SMK NEGERI 6 SURAKARTA</div>
      <!--end::To the end-->
      <!--begin::Copyright-->
      <!--end::Copyright-->
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