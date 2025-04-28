<!DOCTYPE html>
<html lang="en">
<!-- [Head] start -->

<head>
    <title>Home | Mantis Bootstrap 5 Admin Template</title>
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
    <link rel="icon" href="{{ asset('img/favicon.svg') }}" type="image/x-icon"> <!-- [Google Font] Family -->
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
                <!-- [ sample-page ] start -->
                <div class="col-md-6 col-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="mb-2 f-w-400 text-muted">Total Klien</h6>
                            <h4 class="mb-3">{{ $clients }}
                            </h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="mb-2 f-w-400 text-muted">Total Tim</h6>
                            <h4 class="mb-3">{{ $teams }}
                            </h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="mb-2 f-w-400 text-muted">Total Bidang Studi</h6>
                            <h4 class="mb-3">{{ $studies }}</h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="mb-2 f-w-400 text-muted">Total Layanan Jasa</h6>
                            <h4 class="mb-3">{{ $services }}</h4>
                        </div>
                    </div>
                </div>

                <div class="container-fluid">
                    <h5 class="mb-3">Riwayat Penambahan Konten</h5>
                    <div class="card tbl-card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-borderless mb-0">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Menu</th>
                                            <th>Konten</th>
                                            <th>Tanggal</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($clientContents as $content)
                                            <tr>
                                                @if($content->client)
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>Beranda</td>
                                                    <td>{{ $content->client->name }}</td>
                                                    <td>{{ $content->created_at->format('d M Y') }}</td>
                                                    <td><span class="d-flex align-items-center gap-2"><i
                                                                class="fas fa-circle text-primary f-10 m-r-5"></i>Baru
                                                            Ditambahkan</span>
                                                    </td>
                                                @elseif($content->team)
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>Beranda</td>
                                                    <td>{{ $content->team->name }}</td>
                                                    <td>{{ $content->created_at->format('d M Y') }}</td>
                                                    <td><span class="d-flex align-items-center gap-2"><i
                                                                class="fas fa-circle text-primary f-10 m-r-5"></i>Baru
                                                            Ditambahkan</span>
                                                    </td>
                                                @elseif($content->study)
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>Bidang Studi</td>
                                                    <td>{{ $content->study->name }}</td>
                                                    <td>{{ $content->created_at->format('d M Y') }}</td>
                                                    <td><span class="d-flex align-items-center gap-2"><i
                                                                class="fas fa-circle text-primary f-10 m-r-5"></i>Baru
                                                            Ditambahkan</span>
                                                    </td>
                                                @elseif($content->service)
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>Layanan Jasa</td>
                                                    <td>{{ $content->service->name }}</td>
                                                    <td>{{ $content->created_at->format('d M Y') }}</td>
                                                    <td><span class="d-flex align-items-center gap-2"><i
                                                                class="fas fa-circle text-primary f-10 m-r-5"></i>Baru
                                                            Ditambahkan</span>
                                                    </td>
                                                @elseif($content->studentWork)
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>Karya Siswa</td>
                                                    <td>{{ $content->studentWork->name }}</td>
                                                    <td>{{ $content->created_at->format('d M Y') }}</td>
                                                    <td><span class="d-flex align-items-center gap-2"><i
                                                                class="fas fa-circle text-primary f-10 m-r-5"></i>Baru
                                                            Ditambahkan</span>
                                                    </td>
                                                @elseif($content->testimony)
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>Testimoni</td>
                                                    <td>{{ $content->testimony->name }}</td>
                                                    <td>{{ $content->created_at->format('d M Y') }}</td>
                                                    <td><span class="d-flex align-items-center gap-2"><i
                                                                class="fas fa-circle text-primary f-10 m-r-5"></i>Baru
                                                            Ditambahkan</span>
                                                    </td>
                                                @elseif($content->article)
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>Artikel</td>
                                                    <td>{{ $content->article->title }}</td>
                                                    <td>{{ $content->created_at->format('d M Y') }}</td>
                                                    <td><span class="d-flex align-items-center gap-2"><i
                                                                class="fas fa-circle text-primary f-10 m-r-5"></i>Baru
                                                            Ditambahkan</span>
                                                    </td>
                                                @elseif($content->contact)
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>Hubungi Kami</td>
                                                    <td>{{ $content->contact->location }}</td>
                                                    <td>{{ $content->created_at->format('d M Y') }}</td>
                                                    <td><span class="d-flex align-items-center gap-2"><i
                                                                class="fas fa-circle text-primary f-10 m-r-5"></i>Baru
                                                            Ditambahkan</span>
                                                    </td>
                                                @endif
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-admin-footer></x-admin-footer>

    <!-- [Page Specific JS] start -->
    <script src="{{ asset('/js/plugins/apexcharts.min.js') }}"></script>
    <script src="{{ asset('/js/pages/dashboard-default.js') }}"></script>
    <!-- [Page Specific JS] end -->
    <!-- Required Js -->
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



</body>
<!-- [Body] end -->

</html>