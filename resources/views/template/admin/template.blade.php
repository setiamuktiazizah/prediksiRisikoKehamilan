<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Admin</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Icon -->
  <link rel="icon" href="{{asset('images\logo.jpeg')}}">
  <!-- Favicons -->
  <!-- <link href="{{asset('admin/img/favicon.png')}}" rel="icon">
  <link href="{{asset('admin/img/apple-touch-icon.png')}}" rel="apple-touch-icon"> -->

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('admin/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('admin/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('admin/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('admin/vendor/quill/quill.snow.css')}}" rel="stylesheet">
  <link href="{{asset('admin/vendor/quill/quill.bubble.css')}}" rel="stylesheet">
  <link href="{{asset('admin/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{asset('admin/vendor/simple-datatables/style.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('admin/css/style.css')}}" rel="stylesheet">

  <style>
    .logo span {
      margin-left: 10px;
    }

    /* Tambahkan CSS untuk tabel responsif */
    /* .table-responsive {
      overflow-x: auto;
    } */

    /* Tambahkan CSS untuk memperindah tampilan tabel */
    .table-bordered {
      border-collapse: collapse;
      border-radius: 10px;
      width: 100%;
      /* Tambahkan properti ini untuk memastikan tabel mengisi lebar kontainer */
    }

    .table-bordered thead th,
    .table-bordered tbody td {
      border: 1px solid #dee2e6;
    }

    .table-bordered thead th {
      background-color: #f8f9fa;
      color: #212529;
      font-weight: bold;
    }

    .table-bordered tbody td {
      background-color: #fff;
      color: #212529;
    }

    .table-bordered tbody tr:nth-child(even) {
      background-color: #f2f2f2;
    }

    /* Mengatur tata letak tombol "Show" di kiri atas */
    .dataTables_length {
      float: left;
      margin-bottom: 20px;
    }

    /* Mengatur tata letak tombol pencarian dan tombol "Show" */
    /* .dataTables_length,
    .dataTables_filter {
      margin-right: 20px;
    } */

    /* Mengatur tata letak tombol pencarian di sebelah kanan tombol "Show" */
    .dataTables_filter {
      float: right;
      margin-bottom: 20px;
    }

    /* Mengatur tata letak tombol pagination di pojok kiri */
    .dataTables_paginate {
      float: right;
    }

    /* Mengatur tata letak tombol pencarian saat dihover */
    .dataTables_filter label {
      float: right;
    }

    /* Mengatur tata letak input pencarian saat dihover */
    .dataTables_filter label input[type="search"]:hover {
      color: #333;
      border: 1px solid;
    }

    /* Mengubah warna latar belakang dan teks pada tombol paginasi */
    .dataTables_paginate {
      background-color: #f2f2f2;
      padding: 10px;
      border-radius: 5px;
    }

    .dataTables_paginate .paginate_button {
      background-color: green;
      color: #fff;
      border: none;
      padding: 5px 10px;
      margin: 0 2px;
      border-radius: 3px;
      cursor: pointer;
    }

    .dataTables_paginate .paginate_button:hover {
      background-color: #0056b3;
    }

    /* Memberikan efek hover pada tombol paginasi */
    .dataTables_paginate .paginate_button.current,
    .dataTables_paginate .paginate_button.current:hover {
      background-color: darkgreen !important;
      color: #fff !important;
    }

    /* Mengatur tampilan tombol "Previous" dan "Next" */
    .dataTables_paginate .paginate_button.previous,
    .dataTables_paginate .paginate_button.next {
      background-color: #007bff;
      color: #fff;
      border: none;
      padding: 5px 10px;
      margin: 0 2px;
      border-radius: 3px;
      cursor: pointer;
    }

    .dataTables_paginate .paginate_button.previous:hover,
    .dataTables_paginate .paginate_button.next:hover {
      background-color: darkgrey;
    }

    /* Mengatur tampilan disabled pada tombol "Previous" dan "Next" */
    .dataTables_paginate .paginate_button.disabled {
      background-color: #ccc;
      color: #999;
      cursor: not-allowed;
    }
  </style>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const toggleHeaderBtn = document.querySelector('.toggle-header-btn');
      const header = document.getElementById('header');

      toggleHeaderBtn.addEventListener('click', function() {
        header.classList.toggle('header-open');
      });
    });
  </script>

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Jan 09 2024 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <i class="bi bi-list toggle-sidebar-btn toggle-header-btn"></i>
      <a href="index.html" class="logo d-flex align-items-center" style="margin-left: 10px;">
        <img src="{{asset('images/logo-lama.jpg')}} " alt="">
        <span class="d-none d-lg-block">Admin</span>
      </a>
    </div><!-- End Logo -->

    <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div><!-- End Search Bar -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->

        <li class="nav-item dropdown">

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-bell" style="color: white;"></i>
            <span class="badge bg-primary badge-number">4</span>
          </a><!-- End Notification Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
            <li class="dropdown-header">
              You have 4 new notifications
              <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-exclamation-circle text-warning"></i>
              <div>
                <h4>Lorem Ipsum</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>30 min. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-x-circle text-danger"></i>
              <div>
                <h4>Atque rerum nesciunt</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>1 hr. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-check-circle text-success"></i>
              <div>
                <h4>Sit rerum fuga</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>2 hrs. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-info-circle text-primary"></i>
              <div>
                <h4>Dicta reprehenderit</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>4 hrs. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>
            <li class="dropdown-footer">
              <a href="#">Show all notifications</a>
            </li>

          </ul><!-- End Notification Dropdown Items -->

        </li><!-- End Notification Nav -->

        <li class="nav-item dropdown">

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-chat-left-text"></i>
            <span class="badge bg-success badge-number">3</span>
          </a><!-- End Messages Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
            <li class="dropdown-header">
              You have 3 new messages
              <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="admin/img/messages-1.jpg" alt="" class="rounded-circle">
                <div>
                  <h4>Maria Hudson</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>4 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="admin/img/messages-2.jpg" alt="" class="rounded-circle">
                <div>
                  <h4>Anna Nelson</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>6 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="admin/img/messages-3.jpg" alt="" class="rounded-circle">
                <div>
                  <h4>David Muldon</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>8 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="dropdown-footer">
              <a href="#">Show all messages</a>
            </li>

          </ul><!-- End Messages Dropdown Items -->

        </li><!-- End Messages Nav -->

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="admin/img/profile-img.jpg" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2" style="color: white;">{{Auth::user()->name}} </span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <img src="admin/img/profile-img.jpg" alt="Profile" class="rounded-circle">
              <h6>{{Auth::user()->name}}</h6>
              <span>Bidan</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                <i class="bi bi-gear"></i>
                <span>Account Settings</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
                <i class="bi bi-question-circle"></i>
                <span>Need Help?</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="bi bi-box-arrow-right"></i>
                <span style="margin-left: 5px;">{{ __('Logout') }}</span>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
                </form>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  @include('template.admin.sidebar')

  @yield('content')

  <!-- ======= Footer ======= -->
  @include('template.admin.footer')

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{asset('admin/vendor/apexcharts/apexcharts.min.js')}}"></script>
  <script src="{{asset('admin/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('admin/vendor/chart.js/chart.umd.js')}}"></script>
  <script src="{{asset('admin/vendor/echarts/echarts.min.js')}}"></script>
  <script src="{{asset('admin/vendor/quill/quill.min.js')}}"></script>
  <script src="{{asset('admin/vendor/simple-datatables/simple-datatables.js')}}"></script>
  <script src="{{asset('admin/vendor/tinymce/tinymce.min.js')}}"></script>
  <script src="{{asset('admin/vendor/php-email-form/validate.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('admin/js/main.js')}}"></script>

  <!-- Datatable JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
  <!-- <script src="https://cdn.datatables.net/rowreorder/1.2.8/js/dataTables.rowReorder.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script> -->
  <script>
    $(document).ready(function() {
      var table = $('#responsive-table').DataTable({
        rowReorder: {
          selector: 'td:nth-child(2)'
        },
        responsive: true
      });
    });
  </script>
  <script src="{{ asset('js/datadiagnosis.js') }}"></script>
  <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.6/css/jquery.dataTables.min.css">
<script type="text/javascript" src="https://cdn.datatables.net/1.11.6/js/jquery.dataTables.min.js"></script> -->


</body>

</html>