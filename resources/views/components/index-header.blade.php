<div class="container-fluid container-xl position-relative d-flex align-items-center">

    <a href="index.html" class="logo d-flex align-items-center me-auto">
      <!-- Uncomment the line below if you also wish to use an image logo -->
      <h1 class="sitename">Credis</h1>
    </a>

    <nav id="navmenu" class="navmenu">
      <ul>
        <li><a href="/" class="active">Beranda</a></li>
        <li class="dropdown"><a href="{{ route('study.index') }}"><span>Bidang Studi</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
          <ul>
            <li><a href="/">Komputer Umum & Internet</a></li>
            <li><a href="/">Administrasi Perkantoran</a></li>
            <li><a href="/">Komputer Akuntasi</a></li>
            <li><a href="/">Digital Marketing</a></li>
            <li><a href="/">Animasi 2D & 3D</a></li>
            <li><a href="/">Website Desain CMS</a></li>
            <li><a href="/">Desain Grafis</a></li>
            <li><a href="/">Desain Interior</a></li>
            <li><a href="/">Desain Arsitektur</a></li>
            <li><a href="/">Pemrograman Dasar</a></li>
            <li><a href="/">Pemrograman Web Designer</a></li>
            <li><a href="/">Pemrograman Web</a></li>
            <li><a href="/">Pemrograman Android</a></li>
            <li><a href="/">Videografi</a></li>
            <li><a href="/">Fotografi</a></li>
          </ul>
        </li>
      </li>
        <li class="dropdown"><a href="{{ route('service.index') }}">Layanan Jasa <i class="bi bi-chevron-down toggle-dropdown"></i></a>
          <ul>
            <li><a href="#">Branding & Design</a></li>
            <li><a href="#">Web Development</a></li>
            <li><a href="#">Mobile Apps (Android & IOS)</a></li>
          </ul>
        </li>
        <li><a href="{{ route('student_work.index') }}">Karya Siswa</a></li>
        <li><a href="{{ route('testimony.index') }}">Testimoni</a></li>
        <li><a href="{{ route('article.index') }}">Artikel</a></li>
        <li><a href="{{ route('contact.index') }}">Hubungi Kami</a></li>
      </ul>
      <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
    </nav>

    <a class="cta-btn" href="index.html#login">Login</a>

</div>