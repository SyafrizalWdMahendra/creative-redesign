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
            <div class="card-header">
              <h5>All Student Work Content</h5>
              <a href="{{ route('student_work.create') }}">Tambah Karya Siswa</a>
            </div>
            <div class="card-body">
              <table class="table table-hover">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama Siswa</th>
                    <th scope="col">Deskripsi Karya</th>
                    <th scope="col">Sampul Karya</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($studentWorks as $student)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $student->name }}</td>
                            <td>{{ $student->description }}</td>  
                            <td><img src="{{ asset('storage/' .$student->image) }}" alt="" width="100px"></td>
                            <td>
                              <div class="d-flex align-items-center gap-2">
                                <button class="btn btn-warning btn-sm edit-btn" 
                                  data-id="{{ $student->id }}" 
                                  data-name="{{ $student->name }}"
                                  data-description="{{ $student->description }}"
                                  data-image="{{ $student->image }}">
                                  Edit
                                </button>
                                <form id="deleteForm" action="{{ route('student_work.destroy', $student->id) }}" method="POST" class="ms-2">
                                  @csrf
                                  @method('DELETE')
                                  <button type="button" class="btn btn-danger btn-sm" id="delete-btn" data-id="{{ $student->id }}">Hapus</button>
                                </form>
                              </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
              </table>
            </div>
        </div>
      </div>
      <!-- [ link-button ] end -->

      <!-- Scrollable modal -->
      <div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Kontak</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form id="editForm" action="{{ route('student_work.update', ':id') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" id="edit-modal-id" name="student_work_id">

                    <div class="mb-3">
                      <label for="name" class="form-label">Nama Siswa</label>
                      <input type="text" name="name" id="name" class="form-control" placeholder="Masukkan Nama Siswa" value="{{ $student->name }}" required>
                    </div>
                    <div class="mb-3">
                      <label for="image" class="form-label">Foto Karya</label>
                      <img id="preview-image" src="{{ asset('storage/' . $student->image) }}" alt="Artikel Image" width="150px" class="d-block mb-2">
                      <input type="file" name="image" id="image" accept="image/*" class="form-control">
                      <small class="text-muted">Unggah gambar baru jika ingin mengubah foto sampul.</small>
                    </div>
                    <div class="mb-3">
                      <label for="description" class="form-label">Deskripsi Karya</label>
                      <textarea id="description" name="description" class="form-control" placeholder="Masukkan Deskripsi Karya" required>{{ $student->description }}</textarea>
                    </div>
                    <button class="btn btn-primary" type="submit">Simpan Konten</button>
                  </form>
                </div>
            </div>
        </div>
      </div>
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

<script>
  @if(session('studentSuccessAlert'))
    Swal.fire({
        title: "Success!",
        text: "{{ session('studentSuccessAlert') }}",
        icon: "success",
        showConfirmButton: true,
        confirmButtonText: "OK",
        timer: 3000
    });
  @endif
</script>

<script>
  // Edit button click event
  document.addEventListener("DOMContentLoaded", function() {
      document.querySelectorAll(".edit-btn").forEach(button => {
          button.addEventListener("click", function() {
              let studentWorkId = this.getAttribute("data-id");
              let name = this.getAttribute("data-name");
              let description = this.getAttribute("data-description");
              let image = this.getAttribute("data-image");

              // Set nilai form dengan data yang dipilih
              document.getElementById("edit-modal-id").value = studentWorkId;
              document.getElementById("name").value = name;
              document.getElementById("description").value = description;
              
              // Jika ada gambar, ubah src untuk preview
              if (image) {
                  document.getElementById("preview-image").src = "/storage/" + image;
              }

              // Perbarui action form agar sesuai dengan testimoni yang dipilih
              document.getElementById("editForm").setAttribute("action", "/admin/create/student_work/" + studentWorkId);

              // Tampilkan modal
              let editModal = new bootstrap.Modal(document.getElementById("editModal"));
              editModal.show();
          });
      });
  });


  // Dynamic preview image
  document.getElementById("image").addEventListener("change", function(event) {
      let file = event.target.files[0];
      if (file) {
          let reader = new FileReader();
          reader.onload = function(e) {
            document.getElementById("preview-image").src = e.target.result;
          };
          reader.readAsDataURL(file);
      }
  });

  // Confirmation delete message
  document.addEventListener("DOMContentLoaded", function() {
    document.querySelectorAll("#delete-btn").forEach(button => {
        button.addEventListener("click", function() {
            let studentWorkId = this.getAttribute("data-id");
            let form = this.closest("form");

            Swal.fire({
                title: "Apakah kamu yakin?",
                text: "Karya siswa ini akan dihapus secara permanen!",
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

</script>

</body>
<!-- [Body] end -->
</html>

