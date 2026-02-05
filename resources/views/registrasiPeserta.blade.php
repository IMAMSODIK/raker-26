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
        .form-wizard-step {
            display: none;
        }

        .form-wizard-step.active-step {
            display: block;
        }

        .border-canvas {
            border: 2px solid #000;
            border-radius: 5px;
        }
    </style>

    <meta name="csrf-token" content="{{ csrf_token() }}">
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
                                            <a class="d-flex" href="/pendaftaran" title="Logo RAKER"><img
                                                    src="{{ asset('own_assets/images/logo.png') }}"
                                                    alt="Logo RAKER" /></a>
                                        </div>
                                    </div>
                                </div> --}}
                                <div class="row g-0">
                                    <div class="col-12 col-lg-12 mx-auto">
                                        <img src="{{ asset('own_assets/images/banner.jpeg') }}" style="width: 100%">
                                        <h1 class="text-9 text-dark fw-300 mb-5 text-center">Registrasi Peserta</h1>
                                        <h1 class="text-9 text-dark fw-300 mb-5 text-center">Transformasi BLU UIN Sumatera Utara Medan Menuju Reputasi Dunia</h1>
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
                                <form class="form-dark" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="row mb-3">
                                        <img src="{{asset('own_assets/images/header.jpeg')}}" alt="">
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
                                            readonly placeholder="Nama Peserta/Panitia" value="{{ old('nama') }}" />
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label text-light" for="nip">NIP</label>
                                        <input type="text" class="form-control" name="nip" id="nip"
                                            readonly required placeholder="NIP Peserta/Panitia"
                                            value="{{ old('nip') }}" maxlength="30" />
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label text-light" for="asal_instansi">Asal Instansi</label>
                                        <input type="text" class="form-control" name="asal_instansi"
                                            id="asal_instansi" readonly placeholder="Asal Instansi Peserta/Panitia"
                                            value="{{ old('asal_instansi') }}" />
                                    </div>
                                    <hr>
                                    <div class="mb-3">
                                        <label class="form-label text-light" for="foto">Upload Foto</label>
                                        <input type="file" accept="" class="form-control" name="foto"
                                            id="foto" />
                                    </div>
                                    <div class="mb-3">
                                        <div class="border-canvas" style="background-color: white">
                                            <canvas width="460" height="300" id="signature-pad"
                                                class="signature-pad" style="border:1px solid #000;"></canvas>
                                        </div>
                                        <div class="row d-flex justify-content-center mt-3">
                                            <button id="reset-canvas" class="btn btn-danger mr-1"
                                                type="button">Hapus
                                                TTD</button>
                                            {{-- <button class="btn btn-success" type="button" id="simpan">
                                                Simpan
                                            </button> --}}
                                        </div>
                                    </div>
                                    <button class="btn btn-primary shadow-none my-2 btn-submit"
                                        type="button">Submit</button>
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

    {{-- @if (Session::has('success'))
        @if (Session::get('success'))
            <script>
                swal('success', 'success');
            </script>
        @else
            <script>
                swal({{ Session::get('error') }}, 'error');
            </script>
        @endif
    @endif --}}

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

        // fungsi untuk tanda tangan
        document.addEventListener("DOMContentLoaded", function() {
            var canvas = document.getElementById("signature-pad");
            var context = canvas.getContext("2d");

            var drawing = false;
            var lastPos = null;

            context.lineWidth = 5;  // Ubah angka ini untuk menyesuaikan ketebalan
            context.lineCap = "round"; // Membuat ujung garis lebih halus
            context.strokeStyle = "#000";

            function getMousePos(canvas, evt) {
                var rect = canvas.getBoundingClientRect();
                return {
                    x: evt.clientX - rect.left,
                    y: evt.clientY - rect.top,
                };
            }

            function drawLine(context, x1, y1, x2, y2) {
                context.beginPath();
                context.moveTo(x1, y1);
                context.lineTo(x2, y2);
                context.stroke();
            }

            function mouseDownHandler(e) {
                drawing = true;
                lastPos = getMousePos(canvas, e);
            }

            function mouseMoveHandler(e) {
                if (drawing) {
                    var mousePos = getMousePos(canvas, e);
                    drawLine(context, lastPos.x, lastPos.y, mousePos.x, mousePos.y);
                    lastPos = mousePos;
                }
            }

            function endDrawing() {
                drawing = false;
            }

            canvas.addEventListener("mousedown", mouseDownHandler);
            canvas.addEventListener("mousemove", mouseMoveHandler);
            canvas.addEventListener("mouseup", endDrawing);
            canvas.addEventListener("mouseleave", endDrawing);

            canvas.addEventListener(
                "touchstart",
                function(e) {
                    mouseDownHandler(e.touches[0]);
                },
                false
            );

            canvas.addEventListener(
                "touchmove",
                function(e) {
                    mouseMoveHandler(e.touches[0]);
                    e.preventDefault();
                },
                false
            );

            canvas.addEventListener("touchend", endDrawing, false);

            document
                .getElementById("reset-canvas")
                .addEventListener("click", function() {
                    context.clearRect(0, 0, canvas.width, canvas.height);
                });
        });

        // fungsi untuk mendapatkan tanda tangan
        function getSignatureData() {
            var canvas = document.getElementById("signature-pad");
            return canvas.toDataURL("image/png");
        }

        $(".btn-submit").click(function() {
            let btn = $(this);
            btn.prop('disabled', true);
            var signatureData = getSignatureData();

            let formData = new FormData();
            let token = $('meta[name="csrf-token"]').attr("content");

            formData.append("_token", token);
            formData.append("signature", signatureData);
            formData.append("id", $("#id").val());
            formData.append("nip", $("#nip").val());
            formData.append("foto", $("#foto")[0].files[0]);

            $.ajax({
                url: "/registrasi/store",
                method: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    if (response.status) {
                        var raw = JSON.stringify({
                            instance_key: "w8nPaB3RPMks",
                            jid: response.data.no_wa,
                            message: `Terima kasih sudah melakukan Registrasi\n`
                        });
                        var requestOptions = {
                            method: 'POST',
                            body: raw,
                            redirect: 'follow'
                        };

                        fetch("https://whatsva.id/api/sendMessageText", requestOptions)
                            .then((response) => {
                                if (response.ok) {
                                    Swal.fire({
                                        title: "Success",
                                        text: "Berhasil Melakukan Registrasi",
                                        icon: "success",
                                        confirmButtonColor: "#3085d6",
                                        confirmButtonText: "OK",
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            location.reload();
                                        }
                                    });
                                } else {
                                    throw new Error("Gagal mengirim pesan WhatsApp.");
                                }
                            })
                            .catch((error) => {
                                Swal.fire({
                                    title: "Error",
                                    text: error.message,
                                    icon: "error",
                                    confirmButtonColor: "#d33",
                                    confirmButtonText: "OK",
                                });
                            });

                    } else {
                        Swal.fire({
                            icon: "error",
                            title: "Error",
                            text: `${response.message}`,
                        });
                        btn.prop('disabled', false);
                    }
                },
                error: function(response) {
                    Swal.fire({
                        icon: "error",
                        title: "Error",
                        text: `${response.message}`,
                    });
                    btn.prop('disabled', false);
                },
            });
        });
    </script>
</body>

</html>
