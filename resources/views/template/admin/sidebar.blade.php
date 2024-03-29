<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="{{ route('dashboard-admin')}}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->
      <li class="nav-item">
        <a class="nav-link " href="{{ URL::to('/data-user')}}">
          <i class="bi bi-lock-fill"></i>
          <span>Data User</span>
        </a>
      </li><!-- End Dashboard Nav -->
      <li class="nav-item">
        <a class="nav-link " href="{{ URL::to('/data-diagnosis') }}">
          <i class="bi bi-pencil"></i>
          <span>Data Diagnosis</span>
        </a>
      </li><!-- End Data Diagnosis Nav -->
      <li class="nav-item">
        <a class="nav-link " href="{{ URL::to('/data-gejala') }}">
          <i class="bi bi-person"></i>
          <span>Data Gejala</span>
        </a>
      </li><!-- End Dashboard Nav -->
      <li class="nav-item">
        <a class="nav-link " href="{{ URL::to('/data-basis-pengetahuan') }}">
          <i class="bi bi-book"></i>
          <span>Data Basis Pengetahuan</span>
        </a>
      </li><!-- End Data Basis Pengetahuan Nav -->
      <li class="nav-item">
        <a class="nav-link " href="{{ URL::to('/data-riwayat') }}">
          <i class="bi bi-clipboard"></i>
          <span>Data Riwayat</span>
        </a>
      </li><!-- End Data Riwayat Nav -->
      <li class="nav-item">
        <a class="nav-link " href="{{ URL::to('/data-artikel') }}">
          <i class="bi bi-file-text"></i>
          <span>Data Artikel</span>
        </a>
      </li><!-- End Data Artikel Nav -->
    </ul>

  </aside><!-- End Sidebar-->