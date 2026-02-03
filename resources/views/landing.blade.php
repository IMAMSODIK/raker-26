<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Raker | UIN SU</title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- Favicons -->
    <link href="{{asset('landing_assets/assets/img/favicon.png')}}" rel="icon">
    <link href="{{asset('landing_assets/assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('landing_assets/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('landing_assets/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('landing_assets/assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('landing_assets/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
    <link href="{{ asset('landing_assets/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="{{ asset('landing_assets/assets/css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('dashboard_assets/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

    <!-- =======================================================
  * Template Name: SoftLand
  * Template URL: https://bootstrapmade.com/softland-bootstrap-app-landing-page-template/
  * Updated: Aug 07 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="index-page">

    <header id="header" class="header d-flex align-items-center fixed-top">
        <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

            <a href="index.html" class="logo d-flex align-items-center">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <img src="{{asset('own_assets/images/logo_real.png')}}" width="100%" alt="">
                {{-- <h1 class="sitename">SoftLand</h1> --}}
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="#hero" class="active">Home</a></li>
                    {{-- <li><a href="#about">About</a></li>
                    <li><a href="#features">Features</a></li>
                    <li><a href="#pricing">Pricing</a></li>
                    <li class="dropdown"><a href="#"><span>Dropdown</span> <i
                                class="bi bi-chevron-down toggle-dropdown"></i></a>
                        <ul>
                            <li><a href="#">Dropdown 1</a></li>
                            <li class="dropdown"><a href="#"><span>Deep Dropdown</span> <i
                                        class="bi bi-chevron-down toggle-dropdown"></i></a>
                                <ul>
                                    <li><a href="#">Deep Dropdown 1</a></li>
                                    <li><a href="#">Deep Dropdown 2</a></li>
                                    <li><a href="#">Deep Dropdown 3</a></li>
                                    <li><a href="#">Deep Dropdown 4</a></li>
                                    <li><a href="#">Deep Dropdown 5</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Dropdown 2</a></li>
                            <li><a href="#">Dropdown 3</a></li>
                            <li><a href="#">Dropdown 4</a></li>
                        </ul>
                    </li>
                    <li><a href="#contact">Contact</a></li> --}}
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>

        </div>
    </header>

    <main class="main">

        <!-- Hero Section -->
        <section id="hero" class="hero section dark-background">

            <div class="container">
                <div class="row gy-4">
                    <div class="col-lg-6 order-lg-last hero-img" data-aos="zoom-out">
                        <img src="{{ asset('own_assets/images/banner.jpeg') }}" alt="Phone 1" class="phone-1">
                    </div>
                    <div class="col-lg-6 d-flex flex-column justify-content-center align-items text-center text-md-start"
                        data-aos="fade-up">
                        <h2>Rapat Kerja Pimpinan UINSU Medan</h2>
                        <h3>Transformasi BLU UIN Sumatera Utara Medan Menuju Reputasi Dunia</h3>
                        <p>Mariana Resort & Convention, 09-12 FEBRUARI 2026</p>
                        <div class="d-flex mt-4 justify-content-center justify-content-md-start">
                            <a href="/registrasi" class="download-btn">
                                <span>Registrasi</span>
                            </a>
                            <a href="/absensi" class="download-btn">
                                <span>Absensi</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </section>
        <!-- /Hero Section -->

        <section id="faq" class="faq section">
            <div class="container section-title" data-aos="fade-up">
                <h2>Daftar Peserta Rapat</h2>
                <p>Transformasi BLU UIN Sumatera Utara Medan Menuju Reputasi Dunia</p>
            </div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10" data-aos="fade-up" data-aos-delay="100">
                        <div class="faq-container">
                            <div class="card shadow mb-4">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th style="width: 5%" class="text-center">No</th>
                                                    <th style="width: 20%" class="text-center">Nama Peserta</th>
                                                    <th class="text-center">Role</th>
                                                    <th class="text-center">Instansi</th>
                                                    <th class="text-center">Unit Kerja</th>
                                                    <th class="text-center">Jabatan</th>
                                                    <th class="text-center">Golongan</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th style="width: 5%" class="text-center">No</th>
                                                    <th style="width: 20%" class="text-center">Nama Peserta</th>
                                                    <th class="text-center">Role</th>
                                                    <th class="text-center">Instansi</th>
                                                    <th class="text-center">Unit Kerja</th>
                                                    <th class="text-center">Jabatan</th>
                                                    <th class="text-center">Golongan</th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                                @php
                                                    $index = 1;
                                                @endphp
                                                @foreach ($pesertas as $peserta)
                                                    <tr>
                                                        <td style="font-size: 16px" class="text-center">{{ $index++ }}</td>
                                                        <td style="font-size: 16px" class="">{{ $peserta->nama }} <br><small
                                                                class="{{ $peserta->nip ? '' : 'text-danger' }}">({{ $peserta->nip ?? 'Belum Mendaftar' }})</small>
                                                        </td>
                                                        <td style="font-size: 16px"><span
                                                                class="badge badge-pill badge-{{ $peserta->role == 'PANITIA' ? 'primary' : 'success' }}">{{ $peserta->role }}</span>
                                                        </td>
                                                        <td style="font-size: 16px">{{ $peserta->instansi }}</td>
                                                        <td style="font-size: 16px">{{ $peserta->unitKerja->nama ?? '' }}</td>
                                                        <td style="font-size: 16px">{{ $peserta->jabatan->nama ?? '' }}</td>
                                                        <td style="font-size: 16px" class="text-center">{{ $peserta->golongan }}</td>
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
        </section>

        <section id="faq" class="faq section">
            <div class="container section-title" data-aos="fade-up">
                <h2>Daftar Registrasi Peserta Rapat</h2>
                <p>Transformasi BLU UIN Sumatera Utara Medan Menuju Reputasi Dunia</p>
            </div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10" data-aos="fade-up" data-aos-delay="100">
                        <div class="faq-container">
                            <div class="card shadow mb-4">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable2" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th style="width: 5%" class="text-center">No</th>
                                                    <th style="width: 20%" class="text-center">Nama Peserta</th>
                                                    <th class="text-center">Role</th>
                                                    <th class="text-center">Instansi</th>
                                                    <th class="text-center">Unit Kerja</th>
                                                    <th class="text-center">Jabatan</th>
                                                    <th class="text-center">Golongan</th>
                                                    <th class="text-center">Status Registrasi</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th style="width: 5%" class="text-center">No</th>
                                                    <th style="width: 20%" class="text-center">Nama Peserta</th>
                                                    <th class="text-center">Role</th>
                                                    <th class="text-center">Instansi</th>
                                                    <th class="text-center">Unit Kerja</th>
                                                    <th class="text-center">Jabatan</th>
                                                    <th class="text-center">Golongan</th>
                                                    <th class="text-center">Status Registrasi</th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                                @php
                                                    $index = 1;
                                                @endphp
                                                @foreach ($pesertas as $peserta)
                                                    <tr>
                                                        <td style="font-size: 16px" class="text-center">{{ $index++ }}</td>
                                                        <td style="font-size: 16px" class="">{{ $peserta->nama }} <br><small
                                                                class="{{ $peserta->nip ? '' : 'text-danger' }}">({{ $peserta->nip ?? 'Belum Mendaftar' }})</small>
                                                        </td>
                                                        <td style="font-size: 16px"><span
                                                                class="badge badge-pill badge-{{ $peserta->role == 'PANITIA' ? 'primary' : 'success' }}">{{ $peserta->role }}</span>
                                                        </td>
                                                        <td style="font-size: 16px">{{ $peserta->instansi }}</td>
                                                        <td style="font-size: 16px">{{ $peserta->unitKerja->nama ?? '' }}</td>
                                                        <td style="font-size: 16px">{{ $peserta->jabatan->nama ?? '' }}</td>
                                                        <td style="font-size: 16px" class="text-center">{{ $peserta->golongan }}</td>
                                                        <td>
                                                            @if ($peserta->registrasi == 1)
                                                                <button type="button" class="text-white btn btn-success">Sudah Registrasi</button>
                                                            @else
                                                                <button type="button" class="text-white btn btn-danger">Belum Registrasi</button>
                                                            @endif
                                                        </td>
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
        </section>

        <section id="faq" class="faq section">
            <div class="container section-title" data-aos="fade-up">
                <h2>Daftar Absensi Peserta Rapat</h2>
                <p>Transformasi BLU UIN Sumatera Utara Medan Menuju Reputasi Dunia</p>
            </div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10" data-aos="fade-up" data-aos-delay="100">
                        <div class="faq-container">
                            <div class="card shadow mb-4">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable3" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th style="width: 5%" class="text-center">No</th>
                                                    <th style="width: 20%" class="text-center">Nama Peserta</th>
                                                    <th class="text-center">Role</th>
                                                    <th class="text-center">Instansi</th>
                                                    <th class="text-center">Unit Kerja</th>
                                                    <th class="text-center">Jabatan</th>
                                                    <th class="text-center">Golongan</th>
                                                    <th class="text-center">Status Absensi 1</th>
                                                    <th class="text-center">Status Absensi 2</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th style="width: 5%" class="text-center">No</th>
                                                    <th style="width: 20%" class="text-center">Nama Peserta</th>
                                                    <th class="text-center">Role</th>
                                                    <th class="text-center">Instansi</th>
                                                    <th class="text-center">Unit Kerja</th>
                                                    <th class="text-center">Jabatan</th>
                                                    <th class="text-center">Golongan</th>
                                                    <th class="text-center">Status Absensi 1</th>
                                                    <th class="text-center">Status Absensi 2</th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                                @php
                                                    $index = 1;
                                                @endphp
                                                @foreach ($pesertas as $peserta)
                                                    <tr>
                                                        <td style="font-size: 16px" class="text-center">{{ $index++ }}</td>
                                                        <td style="font-size: 16px" class="">{{ $peserta->nama }} <br><small
                                                                class="{{ $peserta->nip ? '' : 'text-danger' }}">({{ $peserta->nip ?? 'Belum Mendaftar' }})</small>
                                                        </td>
                                                        <td style="font-size: 16px"><span
                                                                class="badge badge-pill badge-{{ $peserta->role == 'PANITIA' ? 'primary' : 'success' }}">{{ $peserta->role }}</span>
                                                        </td>
                                                        <td style="font-size: 16px">{{ $peserta->instansi }}</td>
                                                        <td style="font-size: 16px">{{ $peserta->unitKerja->nama ?? '' }}</td>
                                                        <td style="font-size: 16px">{{ $peserta->jabatan->nama ?? '' }}</td>
                                                        <td style="font-size: 16px" class="text-center">{{ $peserta->golongan }}</td>
                                                        <td>
                                                            @if ($peserta->absensi1 == 1)
                                                                <button type="button" class="text-white btn btn-success">Hadir</button>
                                                            @else
                                                                <button type="button" class="text-white btn btn-danger" style="font-size: 14px">Belum Absensi</button>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if ($peserta->absensi2 == 2)
                                                                <button type="button" class="text-white btn btn-success">Hadir</button>
                                                            @else
                                                                <button type="button" class="text-white btn btn-danger" style="font-size: 14px">Belum Absensi</button>
                                                            @endif
                                                        </td>
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
        </section>

        <section id="faq" class="faq section">
            <div class="container section-title" data-aos="fade-up">
                <h2>Materi Rapat</h2>
                <p>Silahkan download Dokumen Materi Rapat dibawah ini</p>
            </div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10" data-aos="fade-up" data-aos-delay="100">
                        <div class="faq-container">
                            @foreach ($materis as $materi)
                                <div class="faq-item faq-active">
                                    <h3>{{$materi->deskripsi}}</h3>
                                    <div class="faq-content">
                                        <a href="{{asset('storage/materi') . '/' . $materi->file}}" class="btn btn-success" download>Download</a>
                                    </div>
                                    <i class="faq-toggle bi bi-chevron-right"></i>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Featured Section -->
        <section id="featured" class="featured section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Dokumentasi Rapat</h2>
                <p>Silahkan download Dokumen Materi Rapat dibawah ini</p>
            </div><!-- End Section Title -->

            <div class="container">

                <div class="row gy-4" data-aos="fade-up" data-aos-delay="100">

                    @foreach ($dokuments as $dokumen)
                        <div class="col-md-4">
                            <div class="card">
                                <div class="img">
                                    <img src="{{ asset('storage/dokumentasi') . '/' . $dokumen }}" alt=""
                                        class="img-fluid">
                                    {{-- <div class="icon"><i class="bi bi-hdd-stack"></i></div> --}}
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>

            </div>

        </section><!-- /Featured Section -->


        {{-- <!-- About Section -->
        <section id="about" class="about section">

            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <div class="row align-items-xl-center gy-5">

                    <div class="col-xl-5 content">
                        <h3>About Us</h3>
                        <h2>Ducimus rerum libero reprehenderit cumque</h2>
                        <p>Ipsa sint sit. Quis ducimus tempore dolores impedit et dolor cumque alias maxime. Enim
                            reiciendis
                            minus et rerum hic non. Dicta quas cum quia maiores iure. Quidem nulla qui assumenda
                            incidunt
                            voluptatem tempora deleniti soluta.</p>
                        <a href="{{ asset('landing_assets/about') }}" class="read-more"><span>Read More</span><i
                                class="bi bi-arrow-right"></i></a>
                    </div>

                    <div class="col-xl-7">
                        <div class="row gy-4 icon-boxes">

                            <div class="col-md-6" data-aos="fade-up" data-aos-delay="200">
                                <div class="icon-box">
                                    <i class="bi bi-buildings"></i>
                                    <h3>Eius provident</h3>
                                    <p>Magni repellendus vel ullam hic officia accusantium ipsa dolor omnis dolor
                                        voluptatem
                                    </p>
                                </div>
                            </div> <!-- End Icon Box -->

                            <div class="col-md-6" data-aos="fade-up" data-aos-delay="300">
                                <div class="icon-box">
                                    <i class="bi bi-clipboard-pulse"></i>
                                    <h3>Rerum aperiam</h3>
                                    <p>Autem saepe animi et aut aspernatur culpa facere. Rerum saepe rerum voluptates
                                        quia</p>
                                </div>
                            </div> <!-- End Icon Box -->

                            <div class="col-md-6" data-aos="fade-up" data-aos-delay="400">
                                <div class="icon-box">
                                    <i class="bi bi-command"></i>
                                    <h3>Veniam omnis</h3>
                                    <p>Omnis perferendis molestias culpa sed. Recusandae quas possimus. Quod consequatur
                                        corrupti
                                    </p>
                                </div>
                            </div> <!-- End Icon Box -->

                            <div class="col-md-6" data-aos="fade-up" data-aos-delay="500">
                                <div class="icon-box">
                                    <i class="bi bi-graph-up-arrow"></i>
                                    <h3>Delares sapiente</h3>
                                    <p>Sint et dolor voluptas minus possimus nostrum. Reiciendis commodi eligendi omnis
                                        quideme
                                        lorenda</p>
                                </div>
                            </div> <!-- End Icon Box -->

                        </div>
                    </div>

                </div>
            </div>

        </section><!-- /About Section -->

        


        <!-- Cards Section -->
<section id="cards" class="cards section">

  <div class="container">

      <div class="text-center mb-4 steps-img" data-aos="zoom-out">
          <img src="{{ asset('landing_assets/assets/img/steps.svg') }}" alt="">
      </div>

      <div class="row gy-4">

          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
              <div class="card-item">
                  <span>01</span>
                  <h4>Sign Up</h4>
                  <p>Ulamco laboris nisi ut aliquip ex ea commodo consequat. Et consectetur ducimus vero placeat</p>
              </div>
          </div><!-- Card Item -->

          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
              <div class="card-item">
                  <span>02</span>
                  <h4><a href="{{ asset('landing_assets/path/to/link') }}" class="stretched-link">Repellat Nihil</a></h4>
                  <p>Dolorem est fugiat occaecati voluptate velit esse. Dicta veritatis dolor quod et vel dire leno para dest</p>
              </div>
          </div><!-- Card Item -->

          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="300">
              <div class="card-item">
                  <span>03</span>
                  <h4><a href="{{ asset('landing_assets/path/to/link') }}" class="stretched-link">Ad ad velit qui</a></h4>
                  <p>Molestiae officiis omnis illo asperiores. Aut doloribus vitae sunt debitis quo vel nam quis</p>
              </div>
          </div><!-- Card Item -->

      </div>

  </div>

</section><!-- /Cards Section -->

<!-- Features Section -->
<section id="features" class="features section">

  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
      <h2>Features</h2>
      <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
  </div><!-- End Section Title -->

  <div class="container">

      <div class="row gy-4 align-items-center features-item">
          <div class="col-md-5 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="100">
              <img src="{{ asset('landing_assets/assets/img/features-1.svg') }}" class="img-fluid" alt="">
          </div>
          <div class="col-md-7" data-aos="fade-up" data-aos-delay="100">
              <h3>Voluptatem dignissimos provident quasi corporis voluptates sit assumenda.</h3>
              <p class="fst-italic">
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
              </p>
              <ul>
                  <li><i class="bi bi-check"></i><span> Ullamco laboris nisi ut aliquip ex ea commodo consequat.</span></li>
                  <li><i class="bi bi-check"></i><span> Duis aute irure dolor in reprehenderit in voluptate velit.</span></li>
                  <li><i class="bi bi-check"></i><span> Ullam est qui quos consequatur eos accusamus.</span></li>
              </ul>
          </div>
      </div><!-- Features Item -->

      <div class="row gy-4 align-items-center features-item">
          <div class="col-md-5 order-1 order-md-2 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="200">
              <img src="{{ asset('landing_assets/assets/img/features-2.svg') }}" class="img-fluid" alt="">
          </div>
          <div class="col-md-7 order-2 order-md-1" data-aos="fade-up" data-aos-delay="200">
              <h3>Corporis temporibus maiores provident</h3>
              <p class="fst-italic">
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
              </p>
              <p>
                  Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
              </p>
          </div>
      </div><!-- Features Item -->

      <div class="row gy-4 align-items-center features-item">
          <div class="col-md-5 d-flex align-items-center" data-aos="zoom-out">
              <img src="{{ asset('landing_assets/assets/img/features-3.svg') }}" class="img-fluid" alt="">
          </div>
          <div class="col-md-7" data-aos="fade-up">
              <h3>Sunt consequatur ad ut est nulla consectetur reiciendis animi voluptas</h3>
              <p>Cupiditate placeat cupiditate placeat est ipsam culpa. Delectus quia minima quod. Sunt saepe odit aut quia voluptatem hic voluptas dolor doloremque.</p>
              <ul>
                  <li><i class="bi bi-check"></i><span> Ullamco laboris nisi ut aliquip ex ea commodo consequat.</span></li>
                  <li><i class="bi bi-check"></i><span> Duis aute irure dolor in reprehenderit in voluptate velit.</span></li>
                  <li><i class="bi bi-check"></i><span> Facilis ut et voluptatem aperiam. Autem soluta ad fugiat</span>.</li>
              </ul>
          </div>
      </div><!-- Features Item -->

      <div class="row gy-4 align-items-center features-item">
          <div class="col-md-5 order-1 order-md-2 d-flex align-items-center" data-aos="zoom-out">
              <img src="{{ asset('landing_assets/assets/img/features-4.svg') }}" class="img-fluid" alt="">
          </div>
          <div class="col-md-7 order-2 order-md-1" data-aos="fade-up">
              <h3>Quas et necessitatibus eaque impedit ipsum animi consequatur incidunt in</h3>
              <p class="fst-italic">
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
              </p>
              <p>
                  Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
              </p>
          </div>
      </div><!-- Features Item -->

  </div>

</section><!-- /Features Section -->


<section id="gallery" class="gallery section">
  <div class="container section-title" data-aos="fade-up">
      <h2>Gallery</h2>
      <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
  </div>
  <div class="container-fluid" data-aos="fade-up" data-aos-delay="100">
      <div class="swiper init-swiper">
          <script type="application/json" class="swiper-config">
              {
                "loop": true,
                "speed": 600,
                "autoplay": { "delay": 5000 },
                "slidesPerView": "auto",
                "centeredSlides": true,
                "pagination": { "el": ".swiper-pagination", "type": "bullets", "clickable": true },
                "breakpoints": {
                  "320": { "slidesPerView": 1, "spaceBetween": 0 },
                  "768": { "slidesPerView": 3, "spaceBetween": 30 },
                  "992": { "slidesPerView": 5, "spaceBetween": 30 },
                  "1200": { "slidesPerView": 7, "spaceBetween": 30 }
                }
              }
          </script>
          <div class="swiper-wrapper align-items-center">
              <div class="swiper-slide">
                  <a class="glightbox" data-gallery="images-gallery-full" href="{{ asset('landing_assets/assets/img/app-gallery/app-gallery-1.png') }}">
                      <img src="{{ asset('landing_assets/assets/img/app-gallery/app-gallery-1.png') }}" class="img-fluid" alt="">
                  </a>
              </div>
              <!-- Repeat for other slides -->
          </div>
          <div class="swiper-pagination"></div>
      </div>
  </div>
</section>


        <!-- Testimonials Section -->
        <section id="testimonials" class="testimonials section light-background">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Testimonials</h2>
                <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
            </div><!-- End Section Title -->

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="swiper init-swiper">
                    <script type="application/json" class="swiper-config">
            {
              "loop": true,
              "speed": 600,
              "autoplay": {
                "delay": 5000
              },
              "slidesPerView": "auto",
              "pagination": {
                "el": ".swiper-pagination",
                "type": "bullets",
                "clickable": true
              }
            }
          </script>
                    <div class="swiper-wrapper">

                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <img src="{{asset('landing_assets/assets/img/testimonials/testimonials-1.jpg')}}" class="testimonial-img"
                                    alt="">
                                <h3>Saul Goodman</h3>
                                <h4>Ceo &amp; Founder</h4>
                                <div class="stars">
                                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                        class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                        class="bi bi-star-fill"></i>
                                </div>
                                <p>
                                    <i class="bi bi-quote quote-icon-left"></i>
                                    <span>Proin iaculis purus consequat sem cure digni ssim donec porttitora entum
                                        suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et.
                                        Maecen aliquam, risus at semper.</span>
                                    <i class="bi bi-quote quote-icon-right"></i>
                                </p>
                            </div>
                        </div><!-- End testimonial item -->

                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <img src="{{asset('landing_assets/assets/img/testimonials/testimonials-2.jpg')}}" class="testimonial-img"
                                    alt="">
                                <h3>Sara Wilsson</h3>
                                <h4>Designer</h4>
                                <div class="stars">
                                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                        class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                        class="bi bi-star-fill"></i>
                                </div>
                                <p>
                                    <i class="bi bi-quote quote-icon-left"></i>
                                    <span>Export tempor illum tamen malis malis eram quae irure esse labore quem cillum
                                        quid cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat
                                        irure amet legam anim culpa.</span>
                                    <i class="bi bi-quote quote-icon-right"></i>
                                </p>
                            </div>
                        </div><!-- End testimonial item -->

                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <img src="{{asset('landing_assets/assets/img/testimonials/testimonials-3.jpg')}}" class="testimonial-img"
                                    alt="">
                                <h3>Jena Karlis</h3>
                                <h4>Store Owner</h4>
                                <div class="stars">
                                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                        class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                        class="bi bi-star-fill"></i>
                                </div>
                                <p>
                                    <i class="bi bi-quote quote-icon-left"></i>
                                    <span>Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla
                                        quem veniam duis minim tempor labore quem eram duis noster aute amet eram fore
                                        quis sint minim.</span>
                                    <i class="bi bi-quote quote-icon-right"></i>
                                </p>
                            </div>
                        </div><!-- End testimonial item -->

                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <img src="{{asset('landing_assets/assets/img/testimonials/testimonials-4.jpg')}}" class="testimonial-img"
                                    alt="">
                                <h3>Matt Brandon</h3>
                                <h4>Freelancer</h4>
                                <div class="stars">
                                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                        class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                        class="bi bi-star-fill"></i>
                                </div>
                                <p>
                                    <i class="bi bi-quote quote-icon-left"></i>
                                    <span>Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim
                                        fugiat minim velit minim dolor enim duis veniam ipsum anim magna sunt elit fore
                                        quem dolore labore illum veniam.</span>
                                    <i class="bi bi-quote quote-icon-right"></i>
                                </p>
                            </div>
                        </div><!-- End testimonial item -->

                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <img src="{{asset('landing_assets/assets/img/testimonials/testimonials-5.jpg')}}" class="testimonial-img"
                                    alt="">
                                <h3>John Larson</h3>
                                <h4>Entrepreneur</h4>
                                <div class="stars">
                                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                        class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                        class="bi bi-star-fill"></i>
                                </div>
                                <p>
                                    <i class="bi bi-quote quote-icon-left"></i>
                                    <span>Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor
                                        noster veniam enim culpa labore duis sunt culpa nulla illum cillum fugiat legam
                                        esse veniam culpa fore nisi cillum quid.</span>
                                    <i class="bi bi-quote quote-icon-right"></i>
                                </p>
                            </div>
                        </div><!-- End testimonial item -->

                    </div>
                    <div class="swiper-pagination"></div>
                </div>

            </div>

        </section><!-- /Testimonials Section -->

        <section id="testimonials" class="testimonials section light-background">
          <div class="container section-title" data-aos="fade-up">
              <h2>Testimonials</h2>
              <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
          </div>
          <div class="container" data-aos="fade-up" data-aos-delay="100">
              <div class="swiper init-swiper">
                  <script type="application/json" class="swiper-config">
                      {
                        "loop": true,
                        "speed": 600,
                        "autoplay": { "delay": 5000 },
                        "slidesPerView": "auto",
                        "pagination": { "el": ".swiper-pagination", "type": "bullets", "clickable": true }
                      }
                  </script>
                  <div class="swiper-wrapper">
                      <div class="swiper-slide">
                          <div class="testimonial-item">
                              <img src="{{ asset('landing_assets/assets/img/testimonials/testimonials-1.jpg') }}" class="testimonial-img" alt="">
                              <h3>Saul Goodman</h3>
                              <h4>Ceo &amp; Founder</h4>
                              <div class="stars">
                                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                              </div>
                              <p>
                                  <i class="bi bi-quote quote-icon-left"></i>
                                  <span>Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus.</span>
                                  <i class="bi bi-quote quote-icon-right"></i>
                              </p>
                          </div>
                      </div>
                      <!-- Repeat for other slides -->
                  </div>
                  <div class="swiper-pagination"></div>
              </div>
          </div>
      </section>
    

    <section id="contact" class="contact section">
      <div class="container section-title" data-aos="fade-up">
          <h2>Contact</h2>
          <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
      </div>
      <div class="container" data-aos="fade" data-aos-delay="100">
          <div class="row gy-4">
              <div class="col-lg-4">
                  <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="200">
                      <i class="bi bi-geo-alt flex-shrink-0"></i>
                      <div>
                          <h3>Address</h3>
                          <p>A108 Adam Street, New York, NY 535022</p>
                      </div>
                  </div>
                  <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
                      <i class="bi bi-telephone flex-shrink-0"></i>
                      <div>
                          <h3>Call Us</h3>
                          <p>+1 5589 55488 55</p>
                      </div>
                  </div>
                  <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
                      <i class="bi bi-envelope flex-shrink-0"></i>
                      <div>
                          <h3>Email Us</h3>
                          <p>info@example.com</p>
                      </div>
                  </div>
              </div>
              <div class="col-lg-8">
                  <form action="{{ asset('forms/contact.php') }}" method="post" class="php-email-form" data-aos="fade-up" data-aos-delay="200">
                      <div class="row gy-4">
                          <div class="col-md-6">
                              <input type="text" name="name" class="form-control" placeholder="Your Name" required="">
                          </div>
                          <div class="col-md-6">
                              <input type="email" class="form-control" name="email" placeholder="Your Email" required="">
                          </div>
                          <div class="col-md-12">
                              <input type="text" class="form-control" name="subject" placeholder="Subject" required="">
                          </div>
                          <div class="col-md-12">
                              <textarea class="form-control" name="message" rows="6" placeholder="Message" required=""></textarea>
                          </div>
                          <div class="col-md-12 text-center">
                              <div class="loading">Loading</div>
                              <div class="error-message"></div>
                              <div class="sent-message">Your message has been sent. Thank you!</div>
                              <button type="submit">Send Message</button>
                          </div>
                      </div>
                  </form>
              </div>
          </div>
      </div>
  </section> --}}
  

    </main>

    {{-- <footer id="footer" class="footer dark-background">
        <div class="container">
            <h3 class="sitename">SoftLand</h3>
            <p>Et aut eum quis fuga eos sunt ipsa nihil. Labore corporis magni eligendi fuga maxime saepe commodi
                placeat.</p>
            <div class="social-links d-flex justify-content-center">
                <a href=""><i class="bi bi-twitter-x"></i></a>
                <a href=""><i class="bi bi-facebook"></i></a>
                <a href=""><i class="bi bi-instagram"></i></a>
                <a href=""><i class="bi bi-skype"></i></a>
                <a href=""><i class="bi bi-linkedin"></i></a>
            </div>
            <div class="container">
                <div class="copyright">
                    <span>Copyright</span> <strong class="px-1 sitename">SoftLand</strong> <span>All Rights
                        Reserved</span>
                </div>
                <div class="credits">
                    <!-- All the links in the footer should remain intact. -->
                    <!-- You can delete the links only if you've purchased the pro version. -->
                    <!-- Licensing information: https://bootstrapmade.com/license/ -->
                    <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
                    Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
                </div>
            </div>
        </div>
    </footer> --}}

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="{{asset('landing_assets/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('landing_assets/assets/vendor/php-email-form/validate.js')}}"></script>
    <script src="{{asset('landing_assets/assets/vendor/aos/aos.js')}}"></script>
    <script src="{{asset('landing_assets/assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
    <script src="{{asset('landing_assets/assets/vendor/glightbox/js/glightbox.min.js')}}"></script>

    <script src="{{ asset('dashboard_assets/vendor/jquery/jquery.min.js') }}"></script>
    <!-- Main JS File -->
    <script src="{{asset('landing_assets/assets/js/main.js')}}"></script>
    <script src="{{asset('dashboard_assets/vendor/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('dashboard_assets/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

<!-- Page level custom scripts -->

<script src="{{asset('dashboard_assets/js/demo/datatables-demo.js')}}"></script>
<script>
    let table = $("#basic-1").DataTable();
    let table2 = $("#dataTable2").DataTable();
    let table3 = $("#dataTable3").DataTable();
</script>

</body>

</html>
