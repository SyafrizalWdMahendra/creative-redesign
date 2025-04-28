<!-- [ breadcrumb ] start -->
<div class="page-header">
  <div class="page-block">
    <div class="row align-items-center">
      <div class="col-md-12">
        <div class="page-header-title">
          @if (@request()->routeIs('client_admin.index'))
        <h5 class="m-b-10">Beranda</h5>
      @endif
        </div>
        <ul class="breadcrumb">
          @if(@request()->routeIs('dashboard.index'))
        <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
      @elseif(@request()->routeIs('client_admin.index') || @request()->routeIs('client_admin.create'))
      <li class="breadcrumb-item"><a href="{{ route('client_admin.index') }}">Klien</a></li>
    @elseif(@request()->routeIs('team_admin.index') || @request()->routeIs('team_admin.create'))
      <li class="breadcrumb-item"><a href="{{ route('team_admin.index') }}">Tim</a></li>
    @elseif(@request()->routeIs('study_admin.index') || @request()->routeIs('study_admin.create'))
      <li class="breadcrumb-item"><a href="{{ route('study_admin.index') }}">Bidang Studi</a></li>
    @elseif(@request()->routeIs('service_admin.index') || @request()->routeIs('service_admin.create'))
      <li class="breadcrumb-item"><a href="{{ route('service_admin.index') }}">Layanan Jasa</a></li>
    @elseif(@request()->routeIs('student_work_admin.index') || @request()->routeIs('student_work_admin.create'))
      <li class="breadcrumb-item"><a href="{{ route('student_work_admin.index') }}">Karya Siswa</a></li>
    @elseif(@request()->routeIs('testimony_admin.index') || @request()->routeIs('testimony_admin.create'))
      <li class="breadcrumb-item"><a href="{{ route('testimony_admin.index') }}">Testimoni</a></li>
    @elseif(@request()->routeIs('article_admin.index') || @request()->routeIs('article_admin.create'))
      <li class="breadcrumb-item"><a href="{{ route('article_admin.index') }}">Artikel</a></li>
    @elseif(@request()->routeIs('contact_admin.index') || @request()->routeIs('contact_admin.create'))
      <li class="breadcrumb-item"><a href="{{ route('contact_admin.index') }}">Hubungi Kami</a></li>
    @endif

          @if (@request()->routeIs('client_admin.create'))
        <li class="breadcrumb-item"><a href="javascript: void(0)">Tambah Klien</a></li>
      @elseif(@request()->routeIs('team_admin.create'))
      <li class="breadcrumb-item"><a href="javascript: void(0)">Tambah Tim</a></li>
    @elseif(@request()->routeIs('study_admin.create'))
      <li class="breadcrumb-item"><a href="javascript: void(0)">Tambah Bidang Studi</a></li>
    @elseif(@request()->routeIs('service_admin.create'))
      <li class="breadcrumb-item"><a href="javascript: void(0)">Tambah Layanan Jasa</a></li>
    @elseif(@request()->routeIs('student_work_admin.create'))
      <li class="breadcrumb-item"><a href="javascript: void(0)">Tambah Karya Siswa</a></li>
    @elseif(@request()->routeIs('testimony_admin.create'))
      <li class="breadcrumb-item"><a href="javascript: void(0)">Tambah Testimoni</a></li>
    @elseif(@request()->routeIs('article_admin.create'))
      <li class="breadcrumb-item"><a href="javascript: void(0)">Tambah Artikel</a></li>
    @elseif(@request()->routeIs('contact_admin.create'))
      <li class="breadcrumb-item"><a href="javascript: void(0)">Tambah Kontak</a></li>
    @endif

          {{-- <li class="breadcrumb-item" aria-current="page">Home</li> --}}
        </ul>
      </div>
    </div>
  </div>
</div>