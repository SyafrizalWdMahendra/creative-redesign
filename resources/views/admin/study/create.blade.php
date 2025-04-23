<!DOCTYPE html>
<html lang="en">
<!-- [Head] start -->

<head>
    <title>Color | Mantis Bootstrap 5 Admin Template</title>
    <!-- [Meta] -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Mantis is made using Bootstrap 5 design framework. Download the free admin template & use it for your project.">
    <meta name="keywords" content="Mantis, Dashboard UI Kit, Bootstrap 5, Admin Template, Admin Dashboard, CRM, CMS, Bootstrap Admin Template">
    <meta name="author" content="CodedThemes">

    <!-- [Favicon] icon -->
    <link rel="icon" href="{{ asset ('/images/favicon.svg') }}" type="image/x-icon"> <!-- [Google Font] Family -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700&display=swap" id="main-font-link">
    <!-- [Tabler Icons] https://tablericons.com -->
    <link rel="stylesheet" href="{{ asset ('/fonts/tabler-icons.min.css') }}" >
    <!-- [Feather Icons] https://feathericons.com -->
    <link rel="stylesheet" href="{{ asset ('/fonts/feather.css') }}" >
    <!-- [Font Awesome Icons] https://fontawesome.com/icons -->
    <link rel="stylesheet" href="{{ asset ('/fonts/fontawesome.css') }}" >
    <!-- [Material Icons] https://fonts.google.com/icons -->
    <link rel="stylesheet" href="{{ asset ('/fonts/material.css') }}" >
    <!-- [Template CSS Files] -->
    <link rel="stylesheet" href="{{ asset ('/css/style.css') }}" id="main-style-link" >
    <link rel="stylesheet" href="{{ asset ('/css/style-preset.css') }}" >

    {{-- Summernote --}}
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-lite.min.js"></script>
</head>
<!-- [Head] end -->
<!-- [Body] Start -->

<body data-pc-preset="preset-1" data-pc-direction="ltr" data-pc-theme="light">
  <!-- [ Pre-loader ] start -->
<div class="loader-bg">
  <div class="loader-track">
    <div class="loader-fill"></div>
  </div>
</div>
<!-- [ Pre-loader ] End -->
<x-admin-sidebar></x-admin-sidebar>
<x-admin-header></x-admin-header>

<!-- [ Main Content ] start -->
<div class="pc-container">
<div class="pc-content">
    <x-admin-content-header></x-admin-content-header>

    <!-- [ Main Content ] start -->
    <div class="row">
        <!-- [ link-button ] start -->
        <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
            <h5>Create Study Content</h5>
            </div>
            <div class="card-body">
              <form action="{{ route('study_admin.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                  <label for="name" class="form-label">Nama Kelas</label>
                  <select class="form-select" id="name" name="name" required>
                    <option selected disabled>Pilih Kelas</option>
                    <option value="Komputer Umum & Internet">Komputer Umum & Internet</option>
                    <option value="Desain Grafis">Desain Grafis</option>
                    <option value="Animasi 2D & 3D">Animasi 2D & 3D</option>
                    <option value="Digital Marketing">Digital Marketing</option>
                    <option value="Desain Interior">Desain Interior</option>
                    <option value="Desain Arsitektur">Desain Arsitektur</option>
                    <option value="Administrasi Perkantoran">Administrasi Perkantoran</option>
                    <option value="Komputer Akuntansi">Komputer Akuntansi</option>
                    <option value="Editing Video Multimedia">Editing Video Multimedia</option>
                    <option value="Website Design CMS">Editing Video Multimedia</option>
                    <option value="Web Designer">Web Designer</option>
                    <option value="Programming Web">Programming Web</option>
                    <option value="Programming Java Android">Programming Java Android</option>
                    <option value="Photography">Photography</option>
                  </select>
                </div>
                <div class="mb-3">
                  <label for="title" class="form-label">Judul</label>
                  <input type="text" class="form-control" id="title" name="title" placeholder="Masukkan Judul" required>
                </div>
                <div class="mb-3">
                  <label for="summernote" class="form-label">Isi Konten</label>
                  <textarea id="summernote" name="content" class="form-control" required></textarea>
                </div>
                <div class="mb-3">
                  <label for="image" class="form-label">Foto Sampul</label>
                  <input type="file" name="image" id="image" accept="image/*" class="form-control" required>
                </div>
                <button class="btn btn-primary" type="submit">Simpan Konten</button>
              </form>
            </div>
        </div>
      </div>
        <!-- [ link-button ] end -->
    </div>
    <!-- [ Main Content ] end -->
</div>
</div>

<x-admin-footer></x-admin-footer>

<script src="{{ asset ('/js/plugins/popper.min.js') }}"></script>
<script src="{{ asset ('/js/plugins/simplebar.min.js') }}"></script>
<script src="{{ asset ('/js/plugins/bootstrap.min.js') }}"></script>
<script src="{{ asset ('/js/fonts/custom-font.js') }}"></script>
<script src="{{ asset ('/js/pcoded.js') }}"></script>
<script src="{{ asset ('/js/plugins/feather.min.js') }}"></script>


<script>layout_change('light');</script>




<script>change_box_container('false');</script>



<script>layout_rtl_change('false');</script>


<script>preset_change("preset-1");</script>


<script>font_change("Public-Sans");</script>

    

<script src="{{ asset ('/js/plugins/clipboard.min.js') }}"></script>
<script>
window.addEventListener('load', (event) => {
    var i_copy = new ClipboardJS('.color-block');
    i_copy.on('success', function (e) {
    var targetElement = e.trigger;
    let icon_badge = document.createElement('span');
    icon_badge.setAttribute('class', 'ic-badge badge bg-success float-end');
    icon_badge.innerHTML = 'copied';
    targetElement.append(icon_badge);
    setTimeout(function () {
        targetElement.children[0].remove();
    }, 3000);
    });

    i_copy.on('error', function (e) {
    var targetElement = e.trigger;
    let icon_badge = document.createElement('span');
    icon_badge.setAttribute('class', 'ic-badge badge bg-danger float-end');
    icon_badge.innerHTML = 'Error';
    targetElement.append(icon_badge);
    setTimeout(function () {
        targetElement.children[0].remove();
    }, 3000);
    });
});

$('#summernote').summernote({
    placeholder: 'Masukkan Isi Konten',
    tabsize: 2,
    height: 120,
    toolbar: [
    ['style', ['style']],
    ['font', ['bold', 'underline', 'clear']],
    ['color', ['color']],
    ['para', ['ul', 'ol', 'paragraph']],
    ['table', ['table']],
    ['insert', ['link', 'picture', 'video']],
    ['view', ['fullscreen', 'codeview', 'help']]
    ]
});
</script>

</body>
<!-- [Body] end -->
</html>

