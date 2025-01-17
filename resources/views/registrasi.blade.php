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
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" type="text/css" />

    <!-- Stylesheet
========================= -->
    <link rel="stylesheet" type="text/css" href="{{ asset('form_assets/css/bootstrap.min.css') }} " />
    <link rel=" stylesheet" type="text/css" href="{{ asset('form_assets/css/all.min.css') }} " />
    <link rel=" stylesheet" type="text/css" href="{{ asset('form_assets/css/stylesheet.css') }} " />
    <link href="{{asset('dashboard_assets/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
    <!-- Colors Css -->
    <link id=" color-switcher" type="text/css" rel="stylesheet" href="#" />
	
	<script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>
	<script>
		function swal(msg, icon){
			Swal.fire({
				title: `${msg}`,
				icon: `${icon}`,
				confirmButtonText: 'OK',
				showLoaderOnConfirm: true,
				preConfirm: (login) => {
				},
			}).then((result) => {
				if (result.isConfirmed) {
					location.reload();
					sessionStorage.removeItem('success');
				}
			})
		}
	</script>
</head>

<body>
    <div id="main-wrapper" class="oxyy-login-register">
        <div class="container-fluid px-0">
            <div class="row g-0 min-vh-100">
                <!-- Welcome Text
      ========================= -->
                <div class="col-md-4">
                    <div class="hero-wrap h-100">
                        <div class="hero-mask opacity-8" style="background-color: #22a1a7"></div>
                        <div class="hero-bg hero-bg-scroll"></div>
                        <div class="hero-content mx-auto w-100 h-100">
                            <div class="container d-flex flex-column h-100">
                                <div class="row g-0">
                                    <div class="col-11 col-lg-9 mx-auto">
                                        <div class="logo mt-5 mb-5">
                                            <a class="d-flex" href="/" title="Logo RAKER"><img src="{{asset("own_assets/images/foodku.png")}}" alt="Logo RAKER" width="40%" /></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="row g-0 mt-3">
                                    <div class="col-11 col-lg-10 mx-auto">
                                        <h1 class="text-9 text-dark fw-300 mb-5">Pendaftaran <span class="fw-500">RAKER UINSU</span></h1>
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
                                        {{session()->get('error')}}
                                    </div>
                                @endif

                                @if (session()->get('success'))
                                    <div class="alert alert-success" role="alert">
                                        {{session()->get('success')}}
                                    </div>
                                @endif
                                <form action="/pendaftaran" class="form-dark" method="post" enctype="multipart/form-data">
									{{ csrf_field() }}
                                    <div class="row mb-3">
                                        <button class="btn btn-primary shadow-none my-2" id="cari_data" type="button">Temukan Data Anda</button>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4"><hr></div>
                                        <div class="col-md-4 d-flex justify-content-center">Biodata</div>
                                        <div class="col-md-4"><hr></div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label text-light" for="role">Jenis Kepesertaan</label>
                                        <input type="text" class="form-control" name="role" id="role" readonly placeholder="Jenis Kepsertaan" value="{{ old('role') }}"/>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label text-light" for="nama">Nama Lengkap</label>
                                        <input type="text" class="form-control" name="nama" id="nama" readonly placeholder="Nama Peserta/Panitia" value="{{ old('nama') }}"/>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label text-light" for="nip">NIP</label>
                                        <input type="text" class="form-control" name="nip" id="nip" readonly placeholder="NIP Peserta/Panitia" value="{{ old('nip') }}" />
                                        @error('nip')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label text-light" for="jenis_kelamin">Jenis Kelamin</label>
                                        <input type="text" class="form-control" name="jenis_kelamin" id="jenis_kelamin" readonly placeholder="Jenis Kelamin Peserta/Panitia" value="{{ old('jenis_kelamin') }}"/>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label text-light" for="asal_instansi">Asal Instansi</label>
                                        <input type="text" class="form-control" name="asal_instansi" id="asal_instansi" readonly placeholder="Asal Instansi Peserta/Panitia" value="{{ old('asal_instansi') }}"/>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label text-light" for="unit_kerja">Unit Kerja</label>
                                        <input type="text" class="form-control" name="unit_kerja" id="unit_kerja" readonly placeholder="Unit Kerja Peserta/Panitia" value="{{ old('unit_kerja') }}"/>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label text-light" for="jabatan">Jabatan</label>
                                        <input type="text" class="form-control" name="jabatan" id="jabatan" readonly placeholder="Jabatan Peserta/Panitia" value="{{ old('jabatan') }}"/>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label text-light" for="golongan">Golongan</label>
                                        <input type="text" class="form-control" name="golongan" id="golongan" readonly placeholder="Golongan Peserta/Panitia" value="{{ old('golongan') }}"/>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4"><hr></div>
                                        <div class="col-md-4 d-flex justify-content-center">Entry Data</div>
                                        <div class="col-md-4"><hr></div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label text-light" for="no_wa">No. Whatsapp</label>
                                        <input type="text" class="form-control" name="no_wa" id="no_wa" required placeholder="Masukkan No. Whatsapp" value="{{ old('no_wa') }}" maxlength="15"/>
                                        @error('no_wa')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label text-light" for="bank">Bank</label>
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1 me-2">
                                                <input type="text" class="form-control" name="bank" id="bank" required readonly placeholder="Silahkan Pilih Bank" value="{{ old('bank') }}" />
                                            </div>
                                            <button type="button" class="btn btn-primary" id="pilih_bank" data-toggle="modal" data-target="#daftar_bank">Pilih</button>
                                        </div>
                                        @error('bank')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    
                                    <div class="modal fade" id="daftar_bank" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header border-secondary">
                                                    <h5 class="modal-title" id="exampleModalLabel">Daftar Bank</h5>
                                                    <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="table-responsive">
                                                        <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
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
                                                                    <tr
                                                                        data-nama="{{ $bank->nama_bank }}"
                                                                        class="row-data"
                                                                        style="cursor: pointer"
                                                                    >
                                                                        <td>{{ $index++ }}</td>
                                                                        <td>{{ $bank->nama_bank }}</td>
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
                                    
                                    <div class="mb-3">
                                        <label class="form-label text-light" for="no_rek">No. Rekening</label>
                                        <input type="text" class="form-control" name="no_rek" id="no_rek" required placeholder="Masukkan No. Rekening" value="{{ old('no_rek') }}" maxlength="50"/>
                                        @error('no_rek')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label text-light" for="ukuran_baju">Ukuran Baju</label>
                                        <select class="form-control" name="ukuran_baju" id="ukuran_baju" required>
                                            <option value="">Pilih Ukuran</option>
                                            <option value="S" {{ old('ukuran_baju') == 'S' ? 'selected' : '' }}>S</option>
                                            <option value="M" {{ old('ukuran_baju') == 'M' ? 'selected' : '' }}>M</option>
                                            <option value="L" {{ old('ukuran_baju') == 'L' ? 'selected' : '' }}>L</option>
                                            <option value="XL" {{ old('ukuran_baju') == 'XL' ? 'selected' : '' }}>XL</option>
                                            <option value="XXL" {{ old('ukuran_baju') == 'XXL' ? 'selected' : '' }}>XXL</option>
                                            <option value="XXXL" {{ old('ukuran_baju') == 'XXXL' ? 'selected' : '' }}>XXXL</option>
                                        </select>
                                        @error('ukuran_baju')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <hr>
                                    <button class="btn btn-primary shadow-none my-2 btn-submit" type="submit">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Register Form End -->
            </div>
        </div>
    </div>

    <div class="modal fade" id="daftar_peserta" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header border-secondary">
                    <h5 class="modal-title" id="exampleModalLabel">Daftar Peserta</h5>
                    <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" id="daftarPeserta" width="100%" cellspacing="0">
                            <thead class="thead-dark">
                                <tr>
                                    <th style="width: 7%">No</th>
                                    <th>Peserta</th>
                                    <th>Role</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Asal Instansi</th>
                                    <th>Unit Kerja</th>
                                    <th>Jabatan</th>
                                    <th>Golongan</th>
                                </tr>
                            </thead>
                            <tfoot class="thead-dark">
                                <tr>
                                    <th style="width: 7%">No</th>
                                    <th>Peserta</th>
                                    <th>Role</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Asal Instansi</th>
                                    <th>Unit Kerja</th>
                                    <th>Jabatan</th>
                                    <th>Golongan</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @php
                                    $index = 1;
                                @endphp
                                @foreach ($pesertas as $peserta)
                                    <tr data-nama="{{ $peserta->nama }}" data-role="{{ $peserta->role }}" data-nip="{{ $peserta->nip }}" data-instansi="{{ $peserta->instansi }}" data-uker="{{ $peserta->unit_kerja }}" data-jabatan="{{ $peserta->jabatan }}" data-golongan="{{ $peserta->golongan }}" data-jk="{{ $peserta->jenis_kelamin }}" data-wa="{{ $peserta->no_wa }}" data-rek="{{ $peserta->no_rek }}" data-bank="{{ $peserta->nama_bank }}" data-baju="{{ $peserta->ukuran_baju }}" class="row-peserta" style="cursor: pointer">
                                        <td>{{ $index++ }}</td>
                                        <td>{{ $peserta->nama }} <br> <small>({{ $peserta->nip }})</small></td>
                                        <td>{{ $peserta->role }}</td>
                                        <td>
                                            @if ($peserta->jenis_kelamin == 1)
                                                Laki-laki
                                            @else
                                                Perempuan
                                            @endif
                                        </td>
                                        <td>{{ $peserta->instansi }}</td>
                                        <td>{{ $peserta->unit_kerja }}</td>
                                        <td>{{ $peserta->jabatan }}</td>
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
				swal({{Session::get('error')}}, 'error');
			</script>
		@endif
	@endif

        <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
        <script src="{{asset('dashboard_assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <script type="text/javascript" src="{{ asset('form_assets/js/main.js') }}"></script>
        <script src="{{asset("dashboard_assets/vendor/jquery-easing/jquery.easing.min.js")}}"></script>

        <!-- Custom scripts for all pages-->
        <script src="{{asset("dashboard_assets/js/sb-admin-2.min.js")}}"></script>

        <!-- Page level plugins -->
        <script src="{{asset("dashboard_assets/vendor/datatables/jquery.dataTables.min.js")}}"></script>
        <script src="{{asset("dashboard_assets/vendor/datatables/dataTables.bootstrap4.min.js")}}"></script>

        <!-- Page level custom scripts -->
        <script src="{{asset("dashboard_assets/js/demo/datatables-demo.js")}}"></script>

        <script>
            $("#pilih_bank").on("click", function(){
                $("#daftar_bank").modal("show");
            })

            $("#cari_data").on("click", function(){
                $("#daftar_peserta").modal("show");
            })

            $(".row-data").on("click", function(){
                $("#bank").val($(this).data('nama'));
                $("#daftar_bank").modal("hide");
            })

            $(".row-peserta").on("click", function(){
                $("#nama").val($(this).data('nama'));
                $("#role").val($(this).data('role'));
                $("#nip").val($(this).data('nip'));
                $("#asal_instansi").val($(this).data('instansi'));
                $("#jenis_kelamin").val(($(this).data('jk') == 1) ? "Laki-laki" : "Perempuan");
                $("#unit_kerja").val($(this).data('uker'));
                $("#jabatan").val($(this).data('jabatan'));
                $("#golongan").val($(this).data('golongan'));
                $("#no_wa").val($(this).data('wa'));
                $("#bank").val($(this).data('bank'));
                $("#no_rek").val($(this).data('rek'));
                $("#ukuran_baju").val($(this).data('baju'));
                $("#daftar_peserta").modal("hide");
            })

            document.getElementById('no_wa').addEventListener('input', function (e) {
                this.value = this.value.replace(/[^0-9]/g, '').slice(0, 15);
            });

            document.getElementById('no_rek').addEventListener('input', function (e) {
                this.value = this.value.replace(/[^0-9]/g, '').slice(0, 50);
            });
        </script>
</body>

</html>