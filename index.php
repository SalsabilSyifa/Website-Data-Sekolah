<?php
session_start();
include_once 'koneksi.php';
$db = new database();

if (!isset($_SESSION['user'])) {
  header("Location: login.php");
  exit;
}
if (isset($_GET['welcome']) && $_GET['welcome'] == 1) {
  $username = $_SESSION['username'] ?? 'User';
  $role = $_SESSION['user']['role'] ?? 'guest';
  echo "<script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                title: 'Selamat Datang!',
                text: '$role: $username',
                icon: 'success',
                confirmButtonText: 'OK'
            });
        });
    </script>";
}
$conn = mysqli_connect("localhost", "root", "", "sekolah");

$jumlah_siswa = mysqli_fetch_array(mysqli_query($conn, "SELECT COUNT(*) as total FROM siswa"))['total'];

$jumlah_jurusan = mysqli_fetch_array(mysqli_query($conn, "SELECT COUNT(*) as total FROM jurusan"))['total'];

$jumlah_agama = mysqli_fetch_array(mysqli_query($conn, "SELECT COUNT(*) as total FROM agama"))['total'];
?>

<!doctype html>
<html lang="en">
<!--begin::Head-->

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>AdminLTE v4 | Dashboard</title>
  <!--begin::Primary Meta Tags-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="title" content="AdminLTE v4 | Dashboard" />
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
  <!-- apexcharts -->
  <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.css"
    integrity="sha256-4MX+61mt9NVvvuPjUWdUdyfZfxSB1/Rf9WtqRHgG5S0="
    crossorigin="anonymous" />
  <!-- jsvectormap -->
  <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/jsvectormap@1.5.3/dist/css/jsvectormap.min.css"
    integrity="sha256-+uGLJmmTKOqBr+2E6KDYs/NRsHxSkONXFHUL0fy2O/4="
    crossorigin="anonymous" />
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
          <li class="nav-item">
            <a class="nav-link" data-widget="navbar-search" href="#" role="button">
              <i class="bi bi-search"></i>
            </a>
          </li>
          <!--end::Navbar Search-->
          <!--begin::Messages Dropdown Menu-->
          <!--end::Messages Dropdown Menu-->
          <!--begin::Notifications Dropdown Menu-->
          
          <!--end::Notifications Dropdown Menu-->
          <!--end::Fullscreen Toggle-->
          <!--begin::User Menu Dropdown-->
          <li class="nav-item dropdown user-menu">
            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
              <img
                src="dist/assets/img/user2-160x160.jpg"
                class="user-image rounded-circle shadow"
                alt="User Image" />
              <span class="d-none d-md-inline"><?= $_SESSION['user']['username'] ?></span>
            </a>
            <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
              <!--begin::User Image-->
              <li class="user-header text-bg-primary">
                <img
                  src="dist/assets/img/user2-160x160.jpg"
                  class="rounded-circle shadow"
                  alt="User Image" />
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
    <?php include "sidebar.php" ?>
    <!--begin::App Main-->
    <main class="app-main">
      <!--begin::App Content Header-->
      <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid">
          <!--begin::Row-->
          <div class="row">
            <div class="col-sm-6">
              <h3 class="mb-0">Dashboard</h3>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-end">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
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
            <div class="col-lg-4 col-6">
              <!--begin::Small Box Widget 3-->
              <div class="small-box text-bg-warning">
                <div class="inner">
                  <h3><?php echo $jumlah_siswa; ?></h3>
                  <p>Siswa</p>
                </div>
                <svg
                  class="small-box-icon"
                  fill="currentColor"
                  viewBox="0 0 24 24"
                  xmlns="http://www.w3.org/2000/svg"
                  aria-hidden="true">
                  <path
                    d="M6.25 6.375a4.125 4.125 0 118.25 0 4.125 4.125 0 01-8.25 0zM3.25 19.125a7.125 7.125 0 0114.25 0v.003l-.001.119a.75.75 0 01-.363.63 13.067 13.067 0 01-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 01-.364-.63l-.001-.122zM19.75 7.5a.75.75 0 00-1.5 0v2.25H16a.75.75 0 000 1.5h2.25v2.25a.75.75 0 001.5 0v-2.25H22a.75.75 0 000-1.5h-2.25V7.5z"></path>
                </svg>
                <a
                  href="datasiswa.php"
                  class="small-box-footer link-dark link-underline-opacity-0 link-underline-opacity-50-hover">
                  More info <i class="fas fa-arrow-circle-right"></i>
                </a>
              </div>
              <!--end::Small Box Widget 3-->
            </div>
            <!--end::Col-->
            <div class="col-lg-4 col-6">
              <!--begin::Small Box Widget 4-->
              <div class="small-box text-bg-danger">
                <div class="inner">
                  <h3><?php echo $jumlah_jurusan; ?></h3>
                  <p>Jurusan</p>
                </div>
                <svg
                  class="small-box-icon"
                  fill="currentColor"
                  viewBox="0 0 24 24"
                  xmlns="http://www.w3.org/2000/svg"
                  aria-hidden="true">
                  <path
                    clip-rule="evenodd"
                    fill-rule="evenodd"
                    d="M2.25 13.5a8.25 8.25 0 018.25-8.25.75.75 0 01.75.75v6.75H18a.75.75 0 01.75.75 8.25 8.25 0 01-16.5 0z"></path>
                  <path
                    clip-rule="evenodd"
                    fill-rule="evenodd"
                    d="M12.75 3a.75.75 0 01.75-.75 8.25 8.25 0 018.25 8.25.75.75 0 01-.75.75h-7.5a.75.75 0 01-.75-.75V3z"></path>
                </svg>
                <a
                  href="datajurusan.php"
                  class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover">
                  More info <i class="fas fa-arrow-circle-right"></i>
                </a>
              </div>
              <!--end::Small Box Widget 4-->
            </div>
            <!--end::Col-->
            <div class="col-lg-4 col-6">
              <!--begin::Small Box Widget 2-->
              <div class="small-box text-bg-success">
                <div class="inner">
                  <h3><?php echo $jumlah_agama; ?><sup class="fs-5"></sup></h3>
                  <p>Agama</p>
                </div>
                <svg
                  class="small-box-icon"
                  fill="currentColor"
                  viewBox="0 0 24 24"
                  xmlns="http://www.w3.org/2000/svg"
                  aria-hidden="true">
                  <path
                    d="M18.375 2.25c-1.035 0-1.875.84-1.875 1.875v15.75c0 1.035.84 1.875 1.875 1.875h.75c1.035 0 1.875-.84 1.875-1.875V4.125c0-1.036-.84-1.875-1.875-1.875h-.75zM9.75 8.625c0-1.036.84-1.875 1.875-1.875h.75c1.036 0 1.875.84 1.875 1.875v11.25c0 1.035-.84 1.875-1.875 1.875h-.75a1.875 1.875 0 01-1.875-1.875V8.625zM3 13.125c0-1.036.84-1.875 1.875-1.875h.75c1.036 0 1.875.84 1.875 1.875v6.75c0 1.035-.84 1.875-1.875 1.875h-.75A1.875 1.875 0 013 19.875v-6.75z"></path>
                </svg>
                <a
                  href="dataagama.php"
                  class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover">
                  More info <i class="fas fa-arrow-circle-right"></i>
                </a>
              </div>
              <!--end::Small Box Widget 2-->
            </div>
            <!--end::Col-->
          </div>
          <!--end::Row-->
        
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
  <!-- OPTIONAL SCRIPTS -->
  <!-- sortablejs -->
  <script
    src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"
    integrity="sha256-ipiJrswvAR4VAx/th+6zWsdeYmVae0iJuiR+6OqHJHQ="
    crossorigin="anonymous"></script>
  <!-- sortablejs -->
  <script>
    const connectedSortables = document.querySelectorAll('.connectedSortable');
    connectedSortables.forEach((connectedSortable) => {
      let sortable = new Sortable(connectedSortable, {
        group: 'shared',
        handle: '.card-header',
      });
    });

    const cardHeaders = document.querySelectorAll('.connectedSortable .card-header');
    cardHeaders.forEach((cardHeader) => {
      cardHeader.style.cursor = 'move';
    });
  </script>
  <!-- apexcharts -->
  <script
    src="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.min.js"
    integrity="sha256-+vh8GkaU7C9/wbSLIcwq82tQ2wTf44aOHA8HlBMwRI8="
    crossorigin="anonymous"></script>
  <!-- ChartJS -->
  <script>
    const sales_chart_options = {
      series: [{
          name: 'Digital Goods',
          data: [28, 48, 40, 19, 86, 27, 90],
        },
        {
          name: 'Electronics',
          data: [65, 59, 80, 81, 56, 55, 40],
        },
      ],
      chart: {
        height: 300,
        type: 'area',
        toolbar: {
          show: false,
        },
      },
      legend: {
        show: false,
      },
      colors: ['#0d6efd', '#20c997'],
      dataLabels: {
        enabled: false,
      },
      stroke: {
        curve: 'smooth',
      },
      xaxis: {
        type: 'datetime',
        categories: [
          '2023-01-01',
          '2023-02-01',
          '2023-03-01',
          '2023-04-01',
          '2023-05-01',
          '2023-06-01',
          '2023-07-01',
        ],
      },
      tooltip: {
        x: {
          format: 'MMMM yyyy',
        },
      },
    };

    const sales_chart = new ApexCharts(
      document.querySelector('#revenue-chart'),
      sales_chart_options,
    );
    sales_chart.render();
  </script>
  <!-- jsvectormap -->
  <script
    src="https://cdn.jsdelivr.net/npm/jsvectormap@1.5.3/dist/js/jsvectormap.min.js"
    integrity="sha256-/t1nN2956BT869E6H4V1dnt0X5pAQHPytli+1nTZm2Y="
    crossorigin="anonymous"></script>
  <script
    src="https://cdn.jsdelivr.net/npm/jsvectormap@1.5.3/dist/maps/world.js"
    integrity="sha256-XPpPaZlU8S/HWf7FZLAncLg2SAkP8ScUTII89x9D3lY="
    crossorigin="anonymous"></script>
  <!-- jsvectormap -->
  <script>
    const visitorsData = {
      US: 398, // USA
      SA: 400, // Saudi Arabia
      CA: 1000, // Canada
      DE: 500, // Germany
      FR: 760, // France
      CN: 300, // China
      AU: 700, // Australia
      BR: 600, // Brazil
      IN: 800, // India
      GB: 320, // Great Britain
      RU: 3000, // Russia
    };

    // World map by jsVectorMap
    const map = new jsVectorMap({
      selector: '#world-map',
      map: 'world',
    });

    // Sparkline charts
    const option_sparkline1 = {
      series: [{
        data: [1000, 1200, 920, 927, 931, 1027, 819, 930, 1021],
      }, ],
      chart: {
        type: 'area',
        height: 50,
        sparkline: {
          enabled: true,
        },
      },
      stroke: {
        curve: 'straight',
      },
      fill: {
        opacity: 0.3,
      },
      yaxis: {
        min: 0,
      },
      colors: ['#DCE6EC'],
    };

    const sparkline1 = new ApexCharts(document.querySelector('#sparkline-1'), option_sparkline1);
    sparkline1.render();

    const option_sparkline2 = {
      series: [{
        data: [515, 519, 520, 522, 652, 810, 370, 627, 319, 630, 921],
      }, ],
      chart: {
        type: 'area',
        height: 50,
        sparkline: {
          enabled: true,
        },
      },
      stroke: {
        curve: 'straight',
      },
      fill: {
        opacity: 0.3,
      },
      yaxis: {
        min: 0,
      },
      colors: ['#DCE6EC'],
    };

    const sparkline2 = new ApexCharts(document.querySelector('#sparkline-2'), option_sparkline2);
    sparkline2.render();

    const option_sparkline3 = {
      series: [{
        data: [15, 19, 20, 22, 33, 27, 31, 27, 19, 30, 21],
      }, ],
      chart: {
        type: 'area',
        height: 50,
        sparkline: {
          enabled: true,
        },
      },
      stroke: {
        curve: 'straight',
      },
      fill: {
        opacity: 0.3,
      },
      yaxis: {
        min: 0,
      },
      colors: ['#DCE6EC'],
    };

    const sparkline3 = new ApexCharts(document.querySelector('#sparkline-3'), option_sparkline3);
    sparkline3.render();
  </script>
  <!--end::Script-->
</body>
<!--end::Body-->

</html>