@props(['studies' => [], 'services' => []])
<div class="container-fluid container-xl position-relative d-flex align-items-center">

  <a href="index.html" class="logo d-flex align-items-center me-auto">
    <!-- Uncomment the line below if you also wish to use an image logo -->
    <h1 class="sitename">Credis</h1>
  </a>

  <nav id="navmenu" class="navmenu">
    <ul>
      <li><a href="/" class="active">Beranda</a></li>
      <li class="dropdown">
        <a href="{{ route('study.index') }}">
          <span>Bidang Studi</span>
          <i class="bi bi-chevron-down toggle-dropdown"></i>
        </a>
        <ul>
          @foreach($studies as $study)
        <li>
        {{-- Perbaiki route ke 'study.show' --}}
        <a href="{{ route('study.show', $study->id) }}">
          {{ $study->name }}
        </a>
        </li>
      @endforeach
        </ul>
      </li>
      </li>
      <li class="dropdown"><a href="{{ route('service.index') }}">Layanan Jasa <i
            class="bi bi-chevron-down toggle-dropdown"></i></a>
        <ul>
          @foreach($services as $service)
        <li>
        {{-- Perbaiki route ke 'service.show' --}}
        <a href="{{ route('service.show', $service->id) }}">
          {{ $service->name }}
        </a>
        </li>
      @endforeach
        </ul>
      </li>
      <li><a href="{{ route('student_work.index') }}">Karya Siswa</a></li>
      <li><a href="{{ route('testimony.index') }}">Testimoni</a></li>
      <li><a href="{{ route('article.index') }}">Artikel</a></li>
      <li><a href="{{ route('contact.index') }}">Hubungi Kami</a></li>
    </ul>
    <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
  </nav>

  <a class="cta-btn" href="{{ route('login') }}">Login</a>

</div>