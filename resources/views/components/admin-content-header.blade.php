<!-- [ breadcrumb ] start -->
<div class="page-header">
    <div class="page-block">
      <div class="row align-items-center">
        <div class="col-md-12">
          <div class="page-header-title">
            @if (@request()->routeIs('/'))
                <h5 class="m-b-10">Dashboard</h5>
            @elseif (@request()->routeIs('home.index'))
                <h5 class="m-b-10">Beranda</h5>
            @elseif (@request()->routeIs('study.index'))
                <h5 class="m-b-10">Bidang Studi</h5>
            @elseif (@request()->routeIs('service.index'))
                <h5 class="m-b-10">Layanan Jasa</h5>
            @elseif (@request()->routeIs('study-work.index'))
                <h5 class="m-b-10">Karya Siswa</h5>
            @elseif (@request()->routeIs('testimony.index'))
                <h5 class="m-b-10">Testimoni</h5>
            @elseif (@request()->routeIs('article.index'))
                <h5 class="m-b-10">Artikel</h5>
            @elseif (@request()->routeIs('contact.index'))
                <h5 class="m-b-10">Hubungi Kami</h5>
            @endif
          </div>
          <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="../dashboard/index.html">Home</a></li>
            <li class="breadcrumb-item"><a href="javascript: void(0)">Dashboard</a></li>
            <li class="breadcrumb-item" aria-current="page">Home</li>
          </ul>
        </div>
      </div>
    </div>
</div>