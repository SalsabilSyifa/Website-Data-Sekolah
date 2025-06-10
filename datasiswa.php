<?php
session_start();
include_once 'koneksi.php';
$db = new database();

$data = $db->tampil_data_show_siswa();

$no = 1;
$username = $_SESSION['username'] ?? 'User';
$role = $_SESSION['user']['role'];

$jurusanList = $db->tampil_data_show_jurusan();
$agamaList = $db->tampil_data_show_agama();
?>
<!doctype html>
<html lang="en">
<!--begin::Head-->

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Data Siswa</title>
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
                  class="rounded-circle"
                  style="width: 100px; height: 100px; background-color: #ccc;">

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
                <li class="breadcrumb-item active" aria-current="page">Data Siswa</li>
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
              <div class="card mb-4 ">

                <div class="card-header bg-primary text-white d-flex align-items-center rounded-top">
                  <i class="bi bi-bookmark fs-5 me-2"></i>
                  <h6 class="mb-0">Table Siswa</h6>
                </div>
                <div class="card-header card-body px-0 pt-0 pb-2">
                  <div class="card-header d-flex justify-content-between align-items-center flex-wrap">
                    <div class="d-flex align-items-center">
                      <label class="me-2 mb-1">Show</label>
                      <select id="entriesPerPage" class="form-select form-select-sm w-auto">
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                      </select>
                    </div>
                    <div class="ms-auto">
                      <input type="text" id="searchBox" class="form-control form-control-sm" placeholder="Search">
                    </div>
                  </div>

                  <div class="card-body px-0 pt-0 pb-0">
                    <div class="table-responsive">
                      <table class="table table-bordered table-striped mb-0" id="siswaTable">
                        <thead class="table-light text-center">
                          <tr>
                            <th>No</th>
                            <th>NISN</th>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>Jurusan</th>
                            <th>Kelas</th>
                            <th>Alamat</th>
                            <th>Agama</th>
                            <th>No HP</th>
                            <?php if (isset($_SESSION['user']['role']) && $_SESSION['user']['role'] === 'admin'): ?>
                              <th>Option</th>
                            <?php endif; ?>
                          </tr>
                        </thead>
                        <tbody>
                          <?php include 'siswa_table_rows.php'; ?>
                        </tbody>
                      </table>
                    </div>
                  </div>

                  <div class="card-footer d-flex justify-content-center ">
                    <nav>
                      <ul class="pagination m-0 p-0" id="pagination">
                        <!-- JS generated pagination links -->
                      </ul>
                    </nav>
                  </div>
                </div>
              </div>
              <!--end::Card-->
            </div>
          </div>
          <!--end::Row-->
        </div>
        <!--end::Container-->
        <!-- Edit Modal -->
        <!-- Edit Modal -->
        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <form action="proses.php" method="POST">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editModalLabel">Edit Data Siswa</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
        </div>

        <div class="modal-body">
          <!-- Hidden untuk aksi dan idsiswa -->
          <input type="hidden" name="aksi" value="editsiswa">
          <input type="hidden" name="idsiswa" id="edit-idsiswa">

          <div class="mb-3">
            <label for="edit-nisn">NISN</label>
            <input type="text" name="nisn" id="edit-nisn" class="form-control">
          </div>

          <div class="mb-3">
            <label for="edit-nama">Nama</label>
            <input type="text" name="nama" id="edit-nama" class="form-control">
          </div>

          <div class="mb-3">
            <label for="edit-jeniskelamin">Jenis Kelamin</label>
            <select name="jeniskelamin" id="edit-jeniskelamin" class="form-select">
              <option value="L">Laki-Laki</option>
              <option value="P">Perempuan</option>
            </select>
          </div>

          <div class="mb-3">
            <label for="jurusan">Jurusan</label>
            <select name="jurusan" id="jurusan" class="form-select">
              <?php
              $jurusan = $db->tampil_jurusan();
              foreach ($jurusan as $j) {
                echo "<option value='{$j['kodejurusan']}'>{$j['namajurusan']}</option>";
              }
              ?>
            </select>
          </div>

          <div class="mb-3">
            <label for="edit-kelas">Kelas</label>
            <select name="kelas" id="edit-kelas" class="form-select" required>
              <option value="X">X</option>
              <option value="XI">XI</option>
              <option value="XII">XII</option>
            </select>
          </div>

          <div class="mb-3">
            <label for="edit-alamat">Alamat</label>
            <input type="text" name="alamat" id="edit-alamat" class="form-control">
          </div>

          <div class="mb-3">
            <label for="editAgama">Agama</label>
            <select name="agama" id="editAgama" class="form-select">
              <?php
              $agamaList = $db->tampil_agama();
              foreach ($agamaList as $a) {
                echo "<option value='{$a['idAgama']}'>{$a['namaAgama']}</option>";
              }
              ?>
            </select>
          </div>

          <div class="mb-3">
            <label for="edit-nohp">No HP</label>
            <input type="text" name="nohp" id="edit-nohp" class="form-control">
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>

      </div>
    </form>
  </div>
</div>

<script>
          document.addEventListener("click", function(e) {
  if (e.target.classList.contains("btn-edit")) {
    const button = e.target;

    document.getElementById('edit-idsiswa').value = button.dataset.id;
    document.getElementById('edit-nisn').value = button.dataset.nisn;
    document.getElementById('edit-nama').value = button.dataset.nama;
    document.getElementById('edit-jeniskelamin').value = button.dataset.jeniskelamin;
    document.getElementById('jurusan').value = button.dataset.jurusan;
    document.getElementById('edit-kelas').value = button.dataset.kelas;
    document.getElementById('edit-alamat').value = button.dataset.alamat;
    document.getElementById('editAgama').value = button.dataset.idagama;
    document.getElementById('edit-nohp').value = button.dataset.nohp;
  }
});

        </script>

        <div class="mb-3">
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
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>

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
          document.addEventListener("DOMContentLoaded", function() {
            const table = document.getElementById("siswaTable");
            const searchBox = document.getElementById("searchBox");
            const entriesPerPage = document.getElementById("entriesPerPage");
            const pagination = document.getElementById("pagination");
            const rows = Array.from(table.querySelectorAll("tbody tr"));

            let currentPage = 1;

            function renderTable() {
              const searchTerm = searchBox.value.toLowerCase();
              const perPage = parseInt(entriesPerPage.value);
              const filteredRows = rows.filter(row => row.textContent.toLowerCase().includes(searchTerm));

              const totalPages = Math.ceil(filteredRows.length / perPage);
              const start = (currentPage - 1) * perPage;
              const end = start + perPage;

              table.querySelector("tbody").innerHTML = "";
              filteredRows.slice(start, end).forEach(row => {
                table.querySelector("tbody").appendChild(row);
              });

              pagination.innerHTML = "";
              for (let i = 1; i <= totalPages; i++) {
                const li = document.createElement("li");
                li.className = `page-item ${i === currentPage ? 'active' : ''}`;
                li.innerHTML = `<a class="page-link" href="#">${i}</a>`;
                li.addEventListener("click", function(e) {
                  e.preventDefault();
                  currentPage = i;
                  renderTable();
                });
                pagination.appendChild(li);
              }
            }

            searchBox.addEventListener("input", () => {
              currentPage = 1;
              renderTable();
            });

            entriesPerPage.addEventListener("change", () => {
              currentPage = 1;
              renderTable();
            });

            renderTable();
          });
        </script>
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