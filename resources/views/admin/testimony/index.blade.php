<!DOCTYPE html>
<html lang="en">
<!-- [Head] start -->

<head>
  <title>Color | Mantis Bootstrap 5 Admin Template</title>
  <!-- [Meta] -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description"
    content="Mantis is made using Bootstrap 5 design framework. Download the free admin template & use it for your project.">
  <meta name="keywords"
    content="Mantis, Dashboard UI Kit, Bootstrap 5, Admin Template, Admin Dashboard, CRM, CMS, Bootstrap Admin Template">
  <meta name="author" content="CodedThemes">

  <!-- [Favicon] icon -->
  <link rel="icon" href="{{ asset('/images/favicon.svg') }}" type="image/x-icon"> <!-- [Google Font] Family -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700&display=swap"
    id="main-font-link">
  <!-- [Tabler Icons] https://tablericons.com -->
  <link rel="stylesheet" href="{{ asset('/fonts/tabler-icons.min.css') }}">
  <!-- [Feather Icons] https://feathericons.com -->
  <link rel="stylesheet" href="{{ asset('/fonts/feather.css') }}">
  <!-- [Font Awesome Icons] https://fontawesome.com/icons -->
  <link rel="stylesheet" href="{{ asset('/fonts/fontawesome.css') }}">
  <!-- [Material Icons] https://fonts.google.com/icons -->
  <link rel="stylesheet" href="{{ asset('/fonts/material.css') }}">
  <!-- [Template CSS Files] -->
  <link rel="stylesheet" href="{{ asset('/css/style.css') }}" id="main-style-link">
  <link rel="stylesheet" href="{{ asset('/css/style-preset.css') }}">

  {{-- Summernote --}}
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
    crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-lite.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-lite.min.js"></script>

  {{-- SweetAlert2 --}}
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
            <div class="card-header d-flex justify-content-between align-items-center">
              <form action="{{ route('search.testimony_admin') }}" method="GET" class="col-lg-4" id="searchForm">
                @csrf
                <div class="input-group mb-3">
                  <input type="search" name="query" id="searchInput" class="form-control rounded"
                    placeholder="Cari Testimoni..." aria-label="Search" aria-describedby="search-addon"
                    value="{{ request('query') ?? '' }}" onkeyup="handleSearchInput()" autofocus />
                  <button type="submit" class="input-group-text border-0" id="search-addon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                      class="bi bi-search" viewBox="0 0 16 16">
                      <path
                        d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                    </svg>
                  </button>
                </div>
              </form>
              <a href="{{ route('testimony_admin.create') }}" class="btn btn-primary">Tambah Testimoni</a>
            </div>
            <div class="card-body">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama Alumni</th>
                    <th scope="col">Komentar</th>
                    @if ($testimonies->isNotEmpty())
            <th scope="col">Video Testimoni</th>
          @endif
                    <th scope="col">Foto Profil</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($testimonies as $testimony)
            <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $testimony->name }}</td>
            <td>{{ $testimony->comment }}</td>
            <td>
              @if (!empty($testimony->video))
          <iframe width="150" height="150" src="{{ $testimony->video }}" frameborder="0"
          allowfullscreen></iframe>
        @else
        <p>-</p>
      @endif
            </td>
            <td><img src="{{ asset('storage/' . $testimony->image) }}" alt="" width="100px"></td>
            <td>
              <div class="d-flex align-items-center gap-2">
              <button class="btn btn-warning btn-sm edit-btn" data-id="{{ $testimony->id }}"
                data-name="{{ $testimony->name }}" data-comment="{{ $testimony->comment }}"
                data-video="{{ $testimony->video }}" data-image="{{ $testimony->image }}">
                Edit
              </button>
              <form id="deleteForm" action="{{ route('testimony_admin.destroy', $testimony->id) }}"
                method="POST" class="ms-2">
                @csrf
                @method('DELETE')
                <button type="button" class="btn btn-danger btn-sm" id="delete-btn"
                data-id="{{ $testimony->id }}">Hapus</button>
              </form>
              </div>
            </td>
            </tr>
          @endforeach
                </tbody>
              </table>
            </div>
          </div>

          <!-- Scrollable modal -->
          <div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Edit Testimoni</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form id="editForm" action="{{ route('testimony_admin.update', $testimony->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" id="edit-modal-id" name="testimony_id">

                    <div class="mb-3">
                      <label for="name" class="form-label">Nama Alumni</label>
                      <input type="text" class="form-control" id="name" name="name" value="{{ $testimony->name }}"
                        placeholder="Masukkan Nama Alumni" required>
                    </div>
                    <div class="mb-3">
                      <label for="comentar" class="form-label">Komentar</label>
                      <textarea class="form-control" id="comentar" name="comment" placeholder="Masukkan Komentar"
                        required>{{ $testimony->comment }}</textarea>
                    </div>
                    <div class="mb-3">
                      <label for="summernote" class="form-label">Video Testimoni</label>
                      <textarea id="summernote" name="video" class="form-control">{{ $testimony->video }}</textarea>
                    </div>
                    <div class="mb-3">
                      <label for="image" class="form-label">Foto Profil</label>
                      <img id="preview-image" src="{{ asset('storage/' . $testimony->image) }}" alt="Foto Profil"
                        width="150px" class="d-block mb-2">
                      <input type="file" name="image" id="image" accept="image/*" class="form-control">
                    </div>
                    <button class="btn btn-primary" type="submit">Simpan Perubahan</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- [ link-button ] end -->
      </div>
      <!-- [ Main Content ] end -->
    </div>
  </div>

  <x-admin-footer></x-admin-footer>

  <script src="{{ asset('/js/plugins/popper.min.js') }}"></script>
  <script src="{{ asset('/js/plugins/simplebar.min.js') }}"></script>
  <script src="{{ asset('/js/plugins/bootstrap.min.js') }}"></script>
  <script src="{{ asset('/js/fonts/custom-font.js') }}"></script>
  <script src="{{ asset('/js/pcoded.js') }}"></script>
  <script src="{{ asset('/js/plugins/feather.min.js') }}"></script>





  <script>layout_change('light');</script>




  <script>change_box_container('false');</script>



  <script>layout_rtl_change('false');</script>


  <script>preset_change("preset-1");</script>


  <script>font_change("Public-Sans");</script>



  <script src="{{ asset('/js/plugins/clipboard.min.js') }}"></script>
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
      placeholder: 'Masukkan Link Video',
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

  <script>
    @if(session('testimonySuccessAlert'))
    Swal.fire({
      title: "Success!",
      text: "{{ session('testimonySuccessAlert') }}",
      icon: "success",
      showConfirmButton: true,
      confirmButtonText: 'OK',
      timer: 3000
    });
  @endif
  </script>

  <script>
    // Edit button click event
    document.addEventListener("DOMContentLoaded", function () {
      document.querySelectorAll(".edit-btn").forEach(button => {
        button.addEventListener("click", function () {
          let testimonyId = this.getAttribute("data-id");
          let name = this.getAttribute("data-name");
          let comment = this.getAttribute("data-comment");
          let video = this.getAttribute("data-video");
          let image = this.getAttribute("data-image");

          // Set nilai form dengan data yang dipilih
          document.getElementById("edit-modal-id").value = testimonyId;
          document.getElementById("name").value = name;
          document.getElementById("comentar").value = comment;
          document.getElementById("summernote").value = video;

          // Jika ada gambar, ubah src untuk preview
          if (image) {
            document.getElementById("preview-image").src = "/storage/" + image;
          }

          // Perbarui action form agar sesuai dengan testimoni yang dipilih
          document.getElementById("editForm").setAttribute("action", "/admin/create/testimony_admin/" + testimonyId);

          // Tampilkan modal
          let editModal = new bootstrap.Modal(document.getElementById("editModal"));
          editModal.show();
        });
      });
    });

    // Dynamic preview image
    document.getElementById("image").addEventListener("change", function (event) {
      let file = event.target.files[0];
      if (file) {
        let reader = new FileReader();
        reader.onload = function (e) {
          document.getElementById("preview-image").src = e.target.result;
        };
        reader.readAsDataURL(file);
      }
    });

    // Confirmation delete message
    document.addEventListener("DOMContentLoaded", function () {
      document.querySelectorAll("#delete-btn").forEach(button => {
        button.addEventListener("click", function () {
          let articleId = this.getAttribute("data-id");
          let form = this.closest("form");

          Swal.fire({
            title: "Apakah kamu yakin?",
            text: "Testimoni ini akan dihapus secara permanen!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#3085d6",
            confirmButtonText: "Ya, hapus!",
            cancelButtonText: "Batal"
          }).then((result) => {
            if (result.isConfirmed) {
              form.submit();
            }
          });
        });
      });
    });

    let searchTimeout;
    const searchForm = document.getElementById('searchForm');
    const searchInput = document.getElementById('searchInput');

    function handleSearchInput() {
      clearTimeout(searchTimeout);

      searchTimeout = setTimeout(() => {
        if (searchInput.value === '') {
          searchForm.submit();
        }
      }, 500);
    }


  </script>

</body>
<!-- [Body] end -->

</html>