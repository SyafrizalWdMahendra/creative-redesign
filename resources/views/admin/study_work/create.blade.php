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
            <h5>Create Student Work Content</h5>
            </div>
            <div class="card-body">
              <form action="{{ route('student_work_admin.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                  <label for="name" class="form-label">Nama Siswa <span class="text-danger">*</span></label>
                  <input type="text" name="name" id="name" class="form-control" placeholder="Masukkan Nama Siswa" value={{ old('name') }}>
                  @error('name')
                    <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="image" class="form-label">Foto Karya <span class="text-danger">*</span></label>
                  <input type="file" name="image" id="image" accept="image/*" class="form-control" value={{ old('image') }}>
                  @error('image')
                    <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="description" class="form-label">Deskripsi Karya <span class="text-danger">*</span></label>
                  <textarea id="description" name="description" class="form-control" placeholder="Masukkan Deskripsi Karya" value={{ old('description') }}></textarea>
                  @error('description')
                    <div class="text-danger">{{ $message }}</div>
                  @enderror
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
  </script>
</body>
<!-- [Body] end -->
</html>

