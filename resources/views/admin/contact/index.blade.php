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
              <form action="{{ route('search.contact_admin') }}" method="GET" class="col-lg-4" id="searchForm">
                @csrf
                <div class="input-group mb-3">
                  <input type="search" name="query" id="searchInput" class="form-control rounded"
                    placeholder="Cari Lokasi..." aria-label="Search" aria-describedby="search-addon"
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
              <a href="{{ route('contact_admin.create') }}" class="btn btn-primary">Tambah Kontak</a>
            </div>
            <div class="card-body">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Lokasi Kantor</th>
                    <th scope="col">Alamat Kantor</th>
                    <th scope="col">Kontak Layanan</th>
                    <th scope="col">Email Kantor</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($contacts as $contact)
            <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $contact->location }}</td>
            <td>{{ $contact->address }}</td>
            <td>{{ $contact->contact }}</td>
            <td>{{ $contact->email }}</td>
            <td>
              <div class="d-flex align-items-center gap-2">
              <button class="btn btn-warning btn-sm edit-btn" data-id="{{ $contact->id }}"
                data-location="{{ $contact->location }}" data-address="{{ $contact->address }}"
                data-contact="{{ $contact->contact }}" data-email="{{ $contact->email }}">
                Edit
              </button>
              <form id="deleteForm" action="{{ route('contact_admin.destroy', $contact->id) }}" method="POST"
                class="ms-2">
                @csrf
                @method('DELETE')
                <button type="button" class="btn btn-danger btn-sm" id="delete-btn"
                data-id="{{ $contact->id }}">Hapus</button>
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
                <form id="editForm" action="{{ route('contact_admin.update', ':id') }}" method="POST">
                  @csrf
                  @method('PUT')
                  <input type="hidden" id="edit-modal-id" name="article_id">

                  <div class="mb-3">
                    <label for="location" class="form-label">Lokasi Kantor</label>
                    <select class="form-select" id="location" name="location" value="{{ $contact->location }}">
                      <option selected disabled>Pilih Lokasi</option>
                      <option value="Surabaya Timur">Surabaya Timur</option>
                      <option value="Surabaya Barat">Surabaya Barat</option>
                      <option value="Kota Tuban">Kota Tuban</option>
                    </select>
                  </div>

                  <div class="mb-3">
                    <label for="address" class="form-label">Alamat Kantor</label>
                    <textarea name="address" class="form-control" id="address"
                      placeholder="Masukkan Alamat">{{ $contact->address }}</textarea>
                  </div>

                  <div class="mb-3">
                    <label for="contact" class="form-label">Kontak Layanan</label>
                    <input type="number" class="form-control" id="contact" name="contact"
                      placeholder="Masukkan Kontak Layanan" value={{ $contact->contact }}>
                  </div>

                  <div class="mb-3">
                    <label for="email" class="form-label">Email Kantor</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan Email Kantor"
                      value={{ $contact->email }}>
                  </div>

                  <button class="btn btn-primary" type="submit">Simpan Perubahan</button>
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
  </script>

  <script>
    @if(session('contactSuccessAlert'))
    Swal.fire({
      title: "Success!",
      text: "{{ session('contactSuccessAlert') }}",
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
          let contactId = this.getAttribute("data-id");
          let location = this.getAttribute("data-location");
          let address = this.getAttribute("data-address");
          let contact = this.getAttribute("data-contact");
          let email = this.getAttribute("data-email");

          // Set nilai form dengan data yang dipilih
          document.getElementById("edit-modal-id").value = contactId;
          document.getElementById("location").value = location;
          document.getElementById("address").value = address;
          document.getElementById("contact").value = contact;
          document.getElementById("email").value = email;

          // Perbarui action form agar sesuai dengan testimoni yang dipilih
          document.getElementById("editForm").setAttribute("action", "/admin/create/contact_admin/" + contactId);

          // Tampilkan modal
          let editModal = new bootstrap.Modal(document.getElementById("editModal"));
          editModal.show();
        });
      });
    });


    // Confirmation delete message
    document.addEventListener("DOMContentLoaded", function () {
      document.querySelectorAll("#delete-btn").forEach(button => {
        button.addEventListener("click", function () {
          let contactId = this.getAttribute("data-id");
          let form = this.closest("form");

          Swal.fire({
            title: "Apakah kamu yakin?",
            text: "Kontak ini akan dihapus secara permanen!",
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