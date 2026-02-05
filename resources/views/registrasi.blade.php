<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no" />
    <title>Pendaftaran | RAKER UIN SU</title>
    <meta name="description" content="Login and Register Form Html Template" />
    <meta name="author" content="harnishdesign.net" />

    <!-- Web Fonts
========================= -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900"
        type="text/css" />

    <!-- Stylesheet
========================= -->
    <link rel="stylesheet" type="text/css" href="{{ asset('form_assets/css/bootstrap.min.css') }} " />
    <link rel=" stylesheet" type="text/css" href="{{ asset('form_assets/css/all.min.css') }} " />
    <link rel=" stylesheet" type="text/css" href="{{ asset('form_assets/css/stylesheet.css') }} " />
    <link href="{{ asset('dashboard_assets/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <!-- Colors Css -->
    <link id=" color-switcher" type="text/css" rel="stylesheet" href="#" />

    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM="
        crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>
    <script>
        function swal(msg, icon) {
            Swal.fire({
                title: `${msg}`,
                icon: `${icon}`,
                confirmButtonText: 'OK',
                showLoaderOnConfirm: true,
                preConfirm: (login) => {},
            }).then((result) => {
                if (result.isConfirmed) {
                    sessionStorage.removeItem('success');
                }
            })
        }
    </script>

    <style>
        .info-card {
            background-color: white;
            border-radius: 12px;
            padding: 25px;
            margin-bottom: 25px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.03);
            border: 1px solid #eef2f7;
            transition: all 0.3s ease;
            display: flex;
            align-items: flex-start;
        }

        .info-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
            border-color: #c3cfe2;
        }

        .info-card:last-child {
            margin-bottom: 0;
        }

        .info-content {
            flex-grow: 1;
        }

        .info-content h3 {
            color: #1a2980;
            margin-bottom: 8px;
            font-size: 1.3rem;
        }

        .info-content p {
            color: #4a5568;
            line-height: 1.6;
            margin-bottom: 15px;
        }

        /* Tombol WhatsApp */
        .whatsapp-btn {
            display: inline-flex;
            align-items: center;
            background-color: #25D366;
            color: white;
            padding: 12px 25px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(37, 211, 102, 0.3);
        }

        .whatsapp-btn:hover {
            background-color: #128C7E;
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(37, 211, 102, 0.4);
        }

        .whatsapp-btn i {
            margin-right: 10px;
            font-size: 1.4rem;
        }

        /* Tombol Lokasi */
        .location-btn {
            display: inline-flex;
            align-items: center;
            background-color: #4285F4;
            color: white;
            padding: 12px 25px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(66, 133, 244, 0.3);
        }

        .location-btn:hover {
            background-color: #3367D6;
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(66, 133, 244, 0.4);
        }

        .location-btn i {
            margin-right: 10px;
            font-size: 1.4rem;
        }

        .contact-details {
            background-color: #f0f7ff;
            padding: 15px;
            border-radius: 10px;
            margin-top: 15px;
            border-left: 4px solid #4285F4;
        }

        .contact-details p {
            margin: 8px 0;
            color: #2d3748;
        }

        .highlight {
            color: #1a2980;
            font-weight: 600;
        }

        .hotel-name {
            color: #1a2980;
            font-weight: 700;
            font-size: 1.2rem;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
    <div id="main-wrapper" class="oxyy-login-register">
        <div class="container-fluid px-0">
            <div class="row g-0 min-vh-100">
                <!-- Welcome Text
      ========================= -->
                <div class="col-md-4">
                    <div class="hero-wrap h-100">
                        <div class="hero-mask opacity-8" style="background-color: #b1b1b1"></div>
                        <div class="hero-bg hero-bg-scroll"></div>
                        <div class="hero-content mx-auto w-100 h-100">
                            <div class="container d-flex flex-column h-100">
                                {{-- <div class="row g-0">
                                    <div class="col-11 col-lg-9 mx-auto">
                                        <div class="logo mt-5">
                                            <a class="d-flex" href="/pendaftaran" title="Logo RAKER"><img src="{{asset("own_assets/images/logo.png")}}" alt="Logo RAKER"/></a>
                                        </div>
                                    </div>
                                </div> --}}
                                <div class="row g-0">
                                    <div class="col-12 col-lg-12 mx-auto">
                                        <img src="{{ asset('own_assets/images/banner.jpeg') }}" style="width: 100%">
                                        <h1 class="text-9 text-dark fw-300 mb-5 text-center">Transformasi BLU UIN
                                            Sumatera Utara Medan Menuju Reputasi Dunia</h1>
                                        <h2 class="text-center">Mariana Resort & Convention</h2>
                                        <h2 class="text-center">09-12 FEBRUARI 2026</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Welcome Text End -->

                <!-- Register Form
      ========================= -->
                <div class="col-md-8 d-flex flex-column align-items-center bg-dark">
                    <div class="container my-auto py-5">
                        <div class="row g-0">
                            <div class="col-11 col-md-8 col-lg-7 col-xl-6 mx-auto">
                                <h3 class="text-white mb-4"></h3>
                                @if (session()->get('error'))
                                    <div class="alert alert-danger" role="alert">
                                        {{ session()->get('error') }}
                                    </div>
                                @endif

                                @if (session()->get('success'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session()->get('success') }}
                                    </div>
                                @endif
                                <form action="/pendaftaran" class="form-dark" method="post"
                                    enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="row mb-3">
                                        <img src="{{ asset('own_assets/images/header.jpeg') }}" alt="">
                                    </div>

                                    <div class="mb-3">
                                        <div class="form-group">
                                            <!-- Informasi Kontak dengan WhatsApp -->
                                            <div class="info-card">
                                                <div class="info-content">
                                                    <h3>Kontak Panitia</h3>
                                                    <p>Untuk informasi lebih lanjut tentang acara, Anda dapat
                                                        menghubungi
                                                        panitia kami:</p>

                                                    <div class="contact-details">
                                                        <p><span class="highlight">Nama:</span> Dwi Sandhi Romadhon,
                                                            S.E,
                                                            M.Si</p>
                                                        <p><span class="highlight">Jabatan:</span> Koordinator Acara
                                                        </p>
                                                        <p><span class="highlight">No. Telepon:</span> +62 811-6584-545
                                                        </p>
                                                    </div>

                                                    <a href="https://wa.me/628116584545?text=Halo%20Pak%20Dwi%20Sandhi%20Romadhon,%20saya%20ingin%20bertanya%20tentang%20acara%20ini"
                                                        target="_blank" class="whatsapp-btn">
                                                        <i class="fab fa-whatsapp"></i> Hubungi via WhatsApp
                                                    </a>
                                                </div>
                                            </div>

                                            <div class="info-card">
                                                <div class="info-content">
                                                    <div class="contact-details">
                                                        <p><i class="fas fa-info-circle"></i> Pendaftaran paling lambat tanggal <span class="highlight">6 februari 2026 pukul 15.00 Wib</span></p>
                                                        <p><i class="fas fa-info-circle"></i> Peserta yang <span class="highlight">tidak</span> melakukan pendaftaran maka <span class="highlight">ukuran baju anda akan disesuaikan dengan stok yang tersedia</span></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <button class="btn btn-primary shadow-none my-2" id="cari_data"
                                            type="button">Temukan Data Anda</button>
                                    </div>
                                    <input type="hidden" id="id" name="id">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <hr>
                                        </div>
                                        <div class="col-md-4 d-flex justify-content-center">Biodata</div>
                                        <div class="col-md-4">
                                            <hr>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label text-light" for="role">Jenis Kepesertaan</label>
                                        <input type="text" class="form-control" name="role" id="role"
                                            readonly placeholder="Jenis Kepsertaan" value="{{ old('role') }}" />
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label text-light" for="nama">Nama Lengkap</label>
                                        <input type="text" class="form-control" name="nama" id="nama"
                                            readonly placeholder="Nama Peserta/Panitia"
                                            value="{{ old('nama') }}" />
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label text-light" for="asal_instansi">Asal Instansi</label>
                                        <input type="text" class="form-control" name="asal_instansi"
                                            id="asal_instansi" readonly placeholder="Asal Instansi Peserta/Panitia"
                                            value="{{ old('asal_instansi') }}" />
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label text-light" for="golongan">Golongan</label>
                                        <select name="golongan" class="form-control" name="golongan" id="golongan"
                                            required>
                                            <option value="III">III</option>
                                            <option value="IV">IV</option>
                                        </select>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <hr>
                                        </div>
                                        <div class="col-md-4 d-flex justify-content-center">Entry Data</div>
                                        <div class="col-md-4">
                                            <hr>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label text-light" for="jenis_kelamin">Jenis Kelamin</label>
                                        <select name="jenis_kelamin" class="form-control" name="jenis_kelamin"
                                            id="jenis_kelamin" required>
                                            <option value="Laki-laki">Laki-laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label text-light" for="nip">NIP</label>
                                        <input type="text" class="form-control" name="nip" id="nip"
                                            required placeholder="NIP Peserta/Panitia" value="{{ old('nip') }}"
                                            maxlength="30" />
                                    </div>
                                    <div class="mb-3">
                                        <div class="mb-3">
                                            <label class="form-label text-light" for="unit_kerja">Unit Kerja</label>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1 me-2">
                                                    <input type="hidden" name="unit_kerja_id" id="unit_kerja_id">
                                                    <input type="text" class="form-control" name="unit_kerja"
                                                        id="unit_kerja" required readonly
                                                        placeholder="Silahkan Pilih Unit Kerja"
                                                        value="{{ old('unit_kerja') }}" />
                                                </div>
                                                <button type="button" class="btn btn-primary" id="pilih_unit_kerja"
                                                    data-toggle="modal"
                                                    data-target="#daftar_unit_kerja">Pilih</button>
                                            </div>
                                            @error('unit_kerja')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="mb-3">
                                            <label class="form-label text-light" for="jabatan">Jabatan</label>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1 me-2">
                                                    <input type="hidden" name="jabatan_id" id="jabatan_id">
                                                    <input type="text" class="form-control" name="jabatan"
                                                        id="jabatan" required readonly
                                                        placeholder="Silahkan Pilih Jabatan"
                                                        value="{{ old('jabatan') }}" />
                                                </div>
                                                <button type="button" class="btn btn-primary" id="pilih_jabatan"
                                                    data-toggle="modal" data-target="#daftar_jabatan">Pilih</button>
                                            </div>
                                            @error('jabatan')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label text-light" for="no_wa">No. Whatsapp</label>
                                        <input type="text" class="form-control" name="no_wa" id="no_wa"
                                            required placeholder="Masukkan No. Whatsapp" value="{{ old('no_wa') }}"
                                            maxlength="15" />
                                        @error('no_wa')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label text-light" for="bank">Bank</label>
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1 me-2">
                                                <input type="text" class="form-control" name="bank"
                                                    id="bank" required readonly placeholder="Silahkan Pilih Bank"
                                                    value="{{ old('bank') }}" />
                                            </div>
                                            <button type="button" class="btn btn-primary" id="pilih_bank"
                                                data-toggle="modal" data-target="#daftar_bank">Pilih</button>
                                        </div>
                                        @error('bank')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="modal fade" id="daftar_bank" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header border-secondary">
                                                    <h5 class="modal-title" id="exampleModalLabel">Daftar Bank</h5>
                                                    <button type="button" class="close text-light"
                                                        data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="table-responsive">
                                                        <table class="table table-bordered table-striped"
                                                            id="dataTable" width="100%" cellspacing="0">
                                                            <thead class="thead-dark">
                                                                <tr>
                                                                    <th style="width: 10%">No</th>
                                                                    <th>Nama Bank</th>
                                                                </tr>
                                                            </thead>
                                                            <tfoot class="thead-dark">
                                                                <tr>
                                                                    <th style="width: 10%">No</th>
                                                                    <th>Nama Bank</th>
                                                                </tr>
                                                            </tfoot>
                                                            <tbody>
                                                                @php
                                                                    $index = 1;
                                                                @endphp
                                                                @foreach ($banks as $bank)
                                                                    <tr data-nama="{{ $bank->nama_bank }}"
                                                                        class="row-data" style="cursor: pointer">
                                                                        <td>{{ $index++ }}</td>
                                                                        <td>{{ $bank->nama_bank }}</td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="modal-footer border-secondary">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">
                                                        Close
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal fade" id="daftar_jabatan" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header border-secondary">
                                                    <h5 class="modal-title" id="exampleModalLabel">Daftar Jabatan</h5>
                                                    <button type="button" class="close text-light"
                                                        data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="table-responsive">
                                                        <table class="table table-bordered table-striped"
                                                            id="jabatan_table" width="100%" cellspacing="0">
                                                            <thead class="thead-dark">
                                                                <tr>
                                                                    <th style="width: 10%">No</th>
                                                                    <th>Nama Jabatan</th>
                                                                </tr>
                                                            </thead>
                                                            <tfoot class="thead-dark">
                                                                <tr>
                                                                    <th style="width: 10%">No</th>
                                                                    <th>Nama Jabatan</th>
                                                                </tr>
                                                            </tfoot>
                                                            <tbody>
                                                                @php
                                                                    $index = 1;
                                                                @endphp
                                                                @foreach ($jabatans as $jabatan)
                                                                    <tr data-nama="{{ $jabatan->nama }}"
                                                                        data-id="{{ $jabatan->id }}"
                                                                        class="row-jabatan" style="cursor: pointer">
                                                                        <td>{{ $index++ }}</td>
                                                                        <td>{{ $jabatan->nama }}</td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="modal-footer border-secondary">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">
                                                        Close
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal fade" id="daftar_unit_kerja" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header border-secondary">
                                                    <h5 class="modal-title" id="exampleModalLabel">Daftar Unit Kerja
                                                    </h5>
                                                    <button type="button" class="close text-light"
                                                        data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="table-responsive">
                                                        <table class="table table-bordered table-striped"
                                                            id="unit_kerja_table" width="100%" cellspacing="0">
                                                            <thead class="thead-dark">
                                                                <tr>
                                                                    <th style="width: 10%">No</th>
                                                                    <th>Nama unit Kerja</th>
                                                                </tr>
                                                            </thead>
                                                            <tfoot class="thead-dark">
                                                                <tr>
                                                                    <th style="width: 10%">No</th>
                                                                    <th>Nama unit Kerja</th>
                                                                </tr>
                                                            </tfoot>
                                                            <tbody>
                                                                @php
                                                                    $index = 1;
                                                                @endphp
                                                                @foreach ($unit_kerjas as $unit_kerja)
                                                                    <tr data-nama="{{ $unit_kerja->nama }}"
                                                                        data-id="{{ $unit_kerja->id }}"
                                                                        class="row-unit_kerja"
                                                                        style="cursor: pointer">
                                                                        <td>{{ $index++ }}</td>
                                                                        <td>{{ $unit_kerja->nama }}</td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="modal-footer border-secondary">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">
                                                        Close
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label text-light" for="no_rek">No. Rekening</label>
                                        <input type="text" class="form-control" name="no_rek" id="no_rek"
                                            required placeholder="Masukkan No. Rekening" value="{{ old('no_rek') }}"
                                            maxlength="50" />
                                        @error('no_rek')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label text-light" for="ukuran_baju">Ukuran Baju Kaos
                                            T-Shirt</label>
                                        <select class="form-control" name="ukuran_baju" id="ukuran_baju" required>
                                            <option value="">Pilih Ukuran</option>
                                            <option value="S" {{ old('ukuran_baju') == 'S' ? 'selected' : '' }}>S
                                            </option>
                                            <option value="M" {{ old('ukuran_baju') == 'M' ? 'selected' : '' }}>M
                                            </option>
                                            <option value="L" {{ old('ukuran_baju') == 'L' ? 'selected' : '' }}>L
                                            </option>
                                            <option value="XL" {{ old('ukuran_baju') == 'XL' ? 'selected' : '' }}>
                                                XL</option>
                                            <option value="XXL"
                                                {{ old('ukuran_baju') == 'XXL' ? 'selected' : '' }}>XXL</option>
                                            <option value="XXXL"
                                                {{ old('ukuran_baju') == 'XXXL' ? 'selected' : '' }}>XXXL</option>
                                            <option value="XXXXL"
                                                {{ old('ukuran_baju') == 'XXXXL' ? 'selected' : '' }}>XXXXL</option>
                                        </select>
                                        @error('ukuran_baju')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <hr>
                                    <button class="btn btn-primary shadow-none my-2 btn-submit"
                                        type="submit">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Register Form End -->
            </div>
        </div>
    </div>

    <div class="modal fade" id="daftar_peserta" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header border-secondary">
                    <h5 class="modal-title" id="exampleModalLabel">Daftar Peserta</h5>
                    <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" id="daftarPeserta" width="100%"
                            cellspacing="0">
                            <thead class="thead-dark">
                                <tr>
                                    <th style="width: 7%">No</th>
                                    <th>Peserta</th>
                                    <th>Role</th>
                                    <th>Asal Instansi</th>
                                    <th>Golongan</th>
                                </tr>
                            </thead>
                            <tfoot class="thead-dark">
                                <tr>
                                    <th style="width: 7%">No</th>
                                    <th>Peserta</th>
                                    <th>Role</th>
                                    <th>Asal Instansi</th>
                                    <th>Golongan</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @php
                                    $index = 1;
                                @endphp
                                @foreach ($pesertas as $peserta)
                                    <tr data-id="{{ $peserta->id }}" data-nama="{{ $peserta->nama }}"
                                        data-role="{{ $peserta->role }}" data-nip="{{ $peserta->nip }}"
                                        data-instansi="{{ $peserta->instansi }}"
                                        data-ukerid="{{ $peserta->unitKerja->id ?? '' }}"
                                        data-uker="{{ $peserta->unitKerja->nama ?? '' }}"
                                        data-jabatanid="{{ $peserta->jabatan->id ?? '' }}"
                                        data-jabatan="{{ $peserta->jabatan->nama ?? '' }}"
                                        data-golongan="{{ $peserta->golongan }}"
                                        data-jk="{{ $peserta->jenis_kelamin }}" data-wa="{{ $peserta->no_wa }}"
                                        data-rek="{{ $peserta->no_rek }}" data-bank="{{ $peserta->nama_bank }}"
                                        data-baju="{{ $peserta->ukuran_baju }}" class="row-peserta"
                                        style="cursor: pointer">
                                        <td>{{ $index++ }}</td>
                                        <td>{{ $peserta->nama }}</td>
                                        <td>{{ $peserta->role }}</td>
                                        <td>{{ $peserta->instansi }}</td>
                                        <td>{{ $peserta->golongan }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer border-secondary">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>

    @if (Session::has('success'))
        @if (Session::get('success'))
            <script>
                swal('success', 'success');
            </script>
        @else
            <script>
                swal({{ Session::get('error') }}, 'error');
            </script>
        @endif
    @endif

    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    <script src="{{ asset('dashboard_assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('form_assets/js/main.js') }}"></script>
    <script src="{{ asset('dashboard_assets/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('dashboard_assets/js/sb-admin-2.min.js') }}"></script>

    <!-- Page level plugins -->
    <script src="{{ asset('dashboard_assets/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('dashboard_assets/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('dashboard_assets/js/demo/datatables-demo.js') }}"></script>

    <script>
        $("#pilih_bank").on("click", function() {
            $("#daftar_bank").modal("show");
        })

        $("#cari_data").on("click", function() {
            $("#daftar_peserta").modal("show");
        })

        $(".row-data").on("click", function() {
            $("#bank").val($(this).data('nama'));
            $("#daftar_bank").modal("hide");
        })

        $(".row-peserta").on("click", function() {
            $("#id").val($(this).data('id'));
            $("#nama").val($(this).data('nama'));
            $("#role").val($(this).data('role'));
            $("#nip").val($(this).data('nip'));
            $("#asal_instansi").val($(this).data('instansi'));
            $("#jenis_kelamin").val($(this).data('jk'));
            $("#unit_kerja").val($(this).data('uker'));
            $("#unit_kerja_id").val($(this).data('ukerid'));
            $("#jabatan").val($(this).data('jabatan'));
            $("#jabatan_id").val($(this).data('jabatanid'));
            $("#golongan").val($(this).data('golongan'));
            $("#no_wa").val($(this).data('wa'));
            $("#bank").val($(this).data('bank'));
            $("#no_rek").val($(this).data('rek'));
            $("#ukuran_baju").val($(this).data('baju'));
            $("#daftar_peserta").modal("hide");
        })

        $(".row-jabatan").on("click", function() {
            $("#jabatan_id").val($(this).data('id'));
            $("#jabatan").val($(this).data('nama'));
            $("#daftar_jabatan").modal("hide");
        })

        $(".row-unit_kerja").on("click", function() {
            $("#unit_kerja_id").val($(this).data('id'));
            $("#unit_kerja").val($(this).data('nama'));
            $("#daftar_unit_kerja").modal("hide");
        })

        document.getElementById('no_wa').addEventListener('input', function(e) {
            this.value = this.value.replace(/[^0-9]/g, '').slice(0, 15);
        });

        document.getElementById('no_rek').addEventListener('input', function(e) {
            this.value = this.value.replace(/[^0-9]/g, '').slice(0, 50);
        });

        document.getElementById('nip').addEventListener('input', function(e) {
            this.value = this.value.replace(/[^0-9]/g, '').slice(0, 50);
        });
    </script>

    <script>
        // Tambahkan efek interaktif pada tombol
        document.addEventListener('DOMContentLoaded', function() {
            const buttons = document.querySelectorAll('.whatsapp-btn, .location-btn');

            buttons.forEach(button => {
                // Efek hover
                button.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-3px)';
                });

                button.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0)';
                });

                // Efek klik
                button.addEventListener('mousedown', function() {
                    this.style.transform = 'translateY(0)';
                });

                button.addEventListener('mouseup', function() {
                    this.style.transform = 'translateY(-3px)';
                });
            });

            // Tambahkan animasi saat halaman dimuat
            const infoCards = document.querySelectorAll('.info-card');
            infoCards.forEach((card, index) => {
                card.style.opacity = '0';
                card.style.transform = 'translateY(20px)';

                setTimeout(() => {
                    card.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
                    card.style.opacity = '1';
                    card.style.transform = 'translateY(0)';
                }, 200 * index);
            });
        });
    </script>
</body>

</html>
