<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Study Page - Dewi Bootstrap Template</title>
    <meta name="description" content="" />
    <meta name="keywords" content="" />

    <!-- Favicons -->
    <link href="{{ asset('img/favicon.png') }}" rel="icon" />
    <link href="{{ asset('img/apple-touch-icon.png') }}" rel="apple-touch-icon" />

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet" />

    <!-- Vendor CSS Files -->
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('vendor/aos/aos.css') }}" rel="stylesheet" />
    <link href="{{ asset('vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet" />

    <!-- Main CSS File -->
    <link href="{{ asset('css/main.css') }}" rel="stylesheet" />

    <!-- =======================================================
  * Template Name: Dewi
  * Template URL: https://bootstrapmade.com/dewi-free-multi-purpose-html-template/
  * Updated: Aug 07 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="starter-page-page">
    <header id="header" class="header d-flex align-items-center fixed-top">
        <x-index-header :studies="$studies" :services="$services"></x-index-header>
    </header>

    <main class="main">
        <!-- Page Title -->
        <div class="page-title dark-background" data-aos="fade"
            style="background-image: url({{ asset('img/page-title-bg.webp') }});">
            <div class="container position-relative">
                <h1>Hubungi Kami</h1>
                <p>
                    Kami selalu siap membantu Anda.
                </p>
                <nav class="breadcrumbs">
                    <ol>
                        <li><a href="{{ route('index') }}">Beranda</a></li>
                        <li class="current">Hubungi Kami</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- End Page Title -->

        <!-- Articles Section -->
        <section id="studies" class="studies section">
            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Hubungi Kami</h2>
                <p>Semua Lokasi & Kontak Kami<br></p>
            </div><!-- End Section Title -->

            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <div class="row gy-5">
                    @forelse ($contacts as $contact)
                        <div class="col-xl-4 col-md-6" data-aos="zoom-in" data-aos-delay="200">
                            <div class="studies-item">
                                <div class="img">
                                    @if ($contact->location == 'Surabaya Barat')
                                        <iframe
                                            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7915.540840048818!2d112.685617!3d-7.266947!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fe9e83ac2c61%3A0xca8274bb2ee06d06!2sCREATIVE%20MEDIA!5e0!3m2!1sid!2sid!4v1745374957761!5m2!1sid!2sid"
                                            width="600" height="250" style="border:0;" allowfullscreen="" loading="lazy"
                                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                                    @elseif($contact->location == 'Surabaya Timur')
                                        <iframe
                                            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7914.915148912745!2d112.770122!3d-7.302378!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fa5691112989%3A0xfa01325a6e99771!2sCREATIVE%20MEDIA%20SURABAYA%20TIMUR!5e0!3m2!1sen!2sid!4v1745375100308!5m2!1sen!2sid"
                                            width="600" height="250" style="border:0;" allowfullscreen="" loading="lazy"
                                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                                    @elseif($contact->location == 'Kota Tuban')
                                        <iframe
                                            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7921.248395561127!2d112.058073!3d-6.935439!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e77bd9362c1a49f%3A0x559882c9300a63ad!2sCREATIVE%20MEDIA%20CAB.%20TUBAN!5e0!3m2!1sid!2sid!4v1745375123775!5m2!1sid!2sid"
                                            width="600" height="250" style="border:0;" allowfullscreen="" loading="lazy"
                                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                                    @endif
                                </div>
                                <div class="details position-relative">
                                    <div class="icon">
                                        <i class="bi bi-telephone"></i>
                                    </div>
                                    <h3>{{ $contact->location }}</h3>
                                    <p>{{ $contact->address }} <br>
                                        {{ $contact->email }} <br>
                                        {{ $contact->contact }}
                                    </p>
                                </div>
                            </div>
                        </div><!-- End Service Item -->
                    @empty
                        <div class="col-12">
                            <p>Articles not available</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </section><!-- /Articles Section -->

    </main>

    <footer id="footer" class="footer dark-background">
        <x-index-footer :contacts="$contacts" :studies="$studies" :services="$services"></x-index-footer>
    </footer>

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('vendor/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>

    <!-- Main JS File -->
    <script src="{{ asset('js/main.js') }}"></script>
</body>

</html>