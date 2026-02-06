@extends('dash_template')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row mb-2">
            <div class="col-md-6">
                <h1 class="h3 mb-2 text-gray-800">{{ $pageTitle }}</h1>
            </div>
            <div class="col-md-6 d-flex justify-content-end">
                <button class="btn btn-success" id="tambah-data">Tambah Data</button>
            </div>
        </div>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary">{{ $pageTitle }}</h6>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th style="width: 5%" class="text-center">No</th>
                                <th style="width: 20%" class="text-center">Nama Peserta</th>
                                <th style="width: 20%" class="text-center">No. Handphone</th>
                                <th style="width: 20%" class="text-center">Jenis Kelamin</th>
                                <th class="text-center">Role</th>
                                <th class="text-center">Instansi</th>
                                <th class="text-center">Unit Kerja</th>
                                <th class="text-center">Jabatan</th>
                                <th class="text-center">Golongan</th>
                                <th class="text-center">Ukuran Baju</th>
                                <th style="width: 20%" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th style="width: 5%" class="text-center">No</th>
                                <th style="width: 20%" class="text-center">Nama Peserta</th>
                                <th style="width: 20%" class="text-center">No. Handphone</th>
                                <th style="width: 20%" class="text-center">Jenis Kelamin</th>
                                <th class="text-center">Role</th>
                                <th class="text-center">Instansi</th>
                                <th class="text-center">Unit Kerja</th>
                                <th class="text-center">Jabatan</th>
                                <th class="text-center">Golongan</th>
                                <th class="text-center">Ukuran Baju</th>
                                <th style="width: 20%" class="text-center">Aksi</th>
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
                                    <td style="font-size: 16px" class="text-center">{{ $peserta->no_wa }}</td>
                                    <td style="font-size: 16px" class="text-center">{{ $peserta->jenis_kelamin }}</td>
                                    <td style="font-size: 16px"><span
                                            class="badge badge-pill badge-{{ $peserta->role == 'PANITIA' ? 'primary' : 'success' }}">{{ $peserta->role }}</span>
                                    </td>
                                    <td style="font-size: 16px">{{ $peserta->instansi }}</td>
                                    <td style="font-size: 16px">{{ $peserta->unitKerja->nama ?? '' }}</td>
                                    <td style="font-size: 16px">{{ $peserta->jabatan->nama ?? '' }}</td>
                                    <td style="font-size: 16px" class="text-center">{{ $peserta->golongan }}</td>
                                    <td style="font-size: 16px" class="text-center">{{ $peserta->ukuran_baju }}</td>
                                    <td style="font-size: 16px" class="text-center">
                                        <button class="btn btn-success"
                                            data-id="{{ $peserta->id }}" id="btn-detail">Detail</button>
                                        <button class="btn btn-primary edit" data-id="{{ $peserta->id }}">Edit</button>
                                        <button class="btn btn-danger delete" data-id="{{ $peserta->id }}">Hapus</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

    <div class="modal fade bd-example-modal-lg" id="tambah-data-modal" tabindex="-1" role="dialog"
        aria-labelledby="myExtraLargeModal" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myExtraLargeModal">Tambah Peserta</h4>
                    <button class="btn-close py-0 cancel-add" type="button" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body dark-modal">
                    <div class="card">
                        <form class="form theme-form dark-inputs">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <hr>
                                    </div>
                                    <div class="col-md-4 d-flex justify-content-center">Biodata</div>
                                    <div class="col-md-4">
                                        <hr>
                                    </div>
                                </div>
                                <div class="">
                                    <label class="form-label text-light" for="nama">Nama Lengkap</label>
                                    <input type="text" class="form-control" name="nama" id="nama"
                                        placeholder="Nama Lengkap" value="{{ old('nama') }}" />
                                </div>
                                <div class="">
                                    <label class="form-label text-light" for="nip">NIP</label>
                                    <input type="text" class="form-control" name="nip" id="nip" required
                                        placeholder="NIP Peserta/Panitia" value="{{ old('nip') }}" maxlength="15" />
                                </div>
                                <div class="">
                                    <label class="form-label text-light" for="jenis_kelamin">Jenis Kelamin</label>
                                    <select name="jenis_kelamin" class="form-control" name="jenis_kelamin"
                                        id="jenis_kelamin" required>
                                        <option value="Laki-laki">Laki-laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                                <div class="">
                                    <label class="form-label text-light" for="no_wa">No. Whatsapp</label>
                                    <input type="text" class="form-control" name="no_wa" id="no_wa" required
                                        placeholder="Masukkan No. Whatsapp" value="{{ old('no_wa') }}"
                                        maxlength="15" />
                                    @error('no_wa')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                {{-- <div class="row mt-4">
                                    <div class="col-md-4">
                                        <hr>
                                    </div>
                                    <div class="col-md-4 d-flex justify-content-center">Data Kepegawaian</div>
                                    <div class="col-md-4">
                                        <hr>
                                    </div>
                                </div>
                                <div class="">
                                    <label class="form-label text-light" for="role">Jenis Kepesertaan</label>
                                    <select class="form-control" name="role" id="role"
                                        value="{{ old('role') }}">
                                        <option value="Peserta">PESERTA</option>
                                        <option value="Panitia">PANITIA</option>
                                        <option value="Narasumber">NARASUMBER</option>
                                    </select>
                                </div>
                                <div class="">
                                    <label class="form-label text-light" for="asal_instansi">Asal Instansi</label>
                                    <input type="text" class="form-control" name="asal_instansi" id="asal_instansi"
                                        placeholder="Asal Instansi" value="{{ old('asal_instansi') }}" />
                                </div>

                                <div class="">
                                    <label class="form-label text-light" for="unit_kerja">Unit Kerja</label>
                                    <select class="form-control" name="unit_kerja" id="unit_kerja" required
                                        value="{{ old('unit_kerja') }}">
                                        @foreach ($unit_kerjas as $unit_kerja)
                                            <option value="{{ $unit_kerja->id }}">{{ $unit_kerja->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>


                                <div class="">
                                    <label class="form-label text-light" for="jabatan">Jabatan</label>
                                    <select class="form-control" name="jabatan" id="jabatan" required
                                        value="{{ old('jabatan') }}">
                                        @foreach ($jabatans as $jabatan)
                                            <option value="{{ $jabatan->id }}">{{ $jabatan->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="">
                                    <label class="form-label text-light" for="golongan">Golongan</label>
                                    <select class="form-control" class="form-control" name="golongan" id="golongan"
                                        value="{{ old('golongan') }}">
                                        <option value="I">Golongan I</option>
                                        <option value="II">Golongan II</option>
                                        <option value="III">Golongan III</option>
                                        <option value="IV">Golongan IV</option>
                                    </select>
                                </div>

                                <div class="row mt-4">
                                    <div class="col-md-4">
                                        <hr>
                                    </div>
                                    <div class="col-md-4 d-flex justify-content-center">Data Raker</div>
                                    <div class="col-md-4">
                                        <hr>
                                    </div>
                                </div>

                                <div class="">
                                    <label class="form-label text-light" for="ukuran-baju">Ukuran Baju</label>
                                    <select class="form-control" id="ukuran-baju" name="ukuran-baju">
                                        <option value="S">S</option>
                                        <option value="M">M</option>
                                        <option value="L">L</option>
                                        <option value="XL">XL</option>
                                        <option value="XXL">XXL</option>
                                        <option value="XXXL">XXXL</option>
                                        <option value="XXXXL">XXXXL</option>
                                    </select>
                                </div>

                                <div class="">
                                    <label class="form-label text-light" for="bank">Bank</label>
                                    <select class="form-control" name="bank" id="bank" required
                                        value="{{ old('bank') }}">
                                        @foreach ($banks as $bank)
                                            <option value="{{ $bank->nama_bank }}">{{ $bank->nama_bank }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="">
                                    <label class="form-label text-light" for="no_rek">No. Rekening</label>
                                    <input type="text" class="form-control" name="no_rek" id="no_rek" required
                                        placeholder="Masukkan No. Rekening" value="{{ old('no_rek') }}"
                                        maxlength="50" />
                                    @error('no_rek')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>


                                <div class="">
                                    <label class="form-label text-light" for="kamar">Kamar Peserta</label>
                                    <select class="form-control" id="kamar" name="kamar">
                                        @foreach ($kamars as $k)
                                            <option value="{{ $k->id }}">Nomor: {{ $k->no_kamar }}</option>
                                        @endforeach
                                    </select>
                                </div> --}}
                                <hr>
                            </div>
                            <div class="card-footer text-end">
                                <input class="btn btn-light cancel-add" type="button" id="cancel-add" value="Cancel">
                                <button class="btn btn-primary me-3" type="button" id="store">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade bd-example-modal-xl" id="edit-data-modal" tabindex="-1" role="dialog"
        aria-labelledby="myExtraLargeModal" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myExtraLargeModal">Edit Peserta</h4>
                    <button class="btn-close py-0 cancel-add" type="button" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body dark-modal">
                    <div class="card">
                        <form class="form theme-form dark-inputs">
                            <div class="card-body">
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

                                <div class="">
                                    <label class="form-label mb-2 text-dark" for="edit-nama">Nama Lengkap</label>
                                    <input type="text" class="form-control" id="edit-nama" name="edit-nama"
                                        placeholder="Nama Lengkap">
                                </div>

                                <div class="">
                                    <label class="form-label mb-2 text-dark" for="edit-nip">NIP</label>
                                    <input type="text" class="form-control" id="edit-nip" name="edit-nip"
                                        placeholder="NIP Peserta/Panitia" maxlength="15">
                                </div>

                                <div class="">
                                    <label class="form-label mb-2 text-dark" for="edit-jenis-kelamin">Jenis Kelamin</label>
                                    <select class="form-control" id="edit-jenis-kelamin" name="edit-jenis-kelamin">
                                        <option value="Laki-laki">Laki-laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>

                                <div class="">
                                    <label class="form-label mb-2 text-dark" for="edit-no-wa">No. Whatsapp</label>
                                    <input type="text" class="form-control" id="edit-no-wa" name="edit-no-wa"
                                        placeholder="Masukkan No. Whatsapp" maxlength="15">
                                </div>

                                <div class="row mt-4">
                                    <div class="col-md-4">
                                        <hr>
                                    </div>
                                    <div class="col-md-4 d-flex justify-content-center">Data Kepegawaian</div>
                                    <div class="col-md-4">
                                        <hr>
                                    </div>
                                </div>

                                <div class="">
                                    <label class="form-label mb-2 text-dark" for="edit-role">Jenis Kepesertaan</label>
                                    <select class="form-control" id="edit-role" name="edit-role">
                                        <option value="Peserta">PESERTA</option>
                                        <option value="Panitia">PANITIA</option>
                                        <option value="Narasumber">NARASUMBER</option>
                                    </select>
                                </div>

                                <div class="">
                                    <label class="form-label mb-2 text-dark" for="edit-instansi">Asal Instansi</label>
                                    <input type="text" class="form-control" id="edit-instansi" name="edit-instansi"
                                        placeholder="Asal Instansi">
                                </div>

                                <div class="">
                                    <label class="form-label mb-2 text-dark" for="edit-unit-kerja">Unit Kerja</label>
                                    <select class="form-control" id="edit-unit-kerja" name="edit-unit-kerja">
                                        @foreach ($unit_kerjas as $unit_kerja)
                                            <option value="{{ $unit_kerja->id }}">{{ $unit_kerja->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="">
                                    <label class="form-label mb-2 text-dark" for="edit-jabatan">Jabatan</label>
                                    <select class="form-control" id="edit-jabatan" name="edit-jabatan">
                                        @foreach ($jabatans as $jabatan)
                                            <option value="{{ $jabatan->id }}">{{ $jabatan->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="">
                                    <label class="form-label mb-2 text-dark" for="edit-golongan">Golongan</label>
                                    <select class="form-control" id="edit-golongan" name="edit-golongan">
                                        <option value="III">Golongan III</option>
                                        <option value="IV">Golongan IV</option>
                                    </select>
                                </div>

                                <div class="row mt-4">
                                    <div class="col-md-4">
                                        <hr>
                                    </div>
                                    <div class="col-md-4 d-flex justify-content-center">Data Raker</div>
                                    <div class="col-md-4">
                                        <hr>
                                    </div>
                                </div>

                                <div class="">
                                    <label class="form-label mb-2 text-dark" for="edit-ukuran-baju">Ukuran Baju</label>
                                    <select class="form-control" id="edit-ukuran-baju" name="edit-ukuran-baju">
                                        <option value="S">S</option>
                                        <option value="M">M</option>
                                        <option value="L">L</option>
                                        <option value="XL">XL</option>
                                        <option value="XXL">XXL</option>
                                        <option value="XXXL">XXXL</option>
                                        <option value="XXXXL">XXXXL</option>
                                    </select>
                                </div>

                                <div class="">
                                    <label class="form-label mb-2 text-dark" for="edit-bank">Bank</label>
                                    <select class="form-control" id="edit-bank" name="edit-bank">
                                        @foreach ($banks as $bank)
                                            <option value="{{ $bank->nama_bank }}">{{ $bank->nama_bank }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="">
                                    <label class="form-label mb-2 text-dark" for="edit-kamar">Kamar Peserta</label>
                                    <select class="form-control" id="edit-kamar" name="edit-kamar">
                                        @foreach ($kamars as $k)
                                            <option value="{{ $k->id }}">Nomor: {{ $k->no_kamar }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="">
                                    <label class="form-label mb-2 text-dark" for="edit-no-rek">No. Rekening</label>
                                    <input type="text" class="form-control" id="edit-no-rek" name="edit-no-rek"
                                        placeholder="Masukkan No. Rekening" maxlength="50">
                                </div>

                                <hr>
                            </div>
                            <div class="card-footer text-end">
                                <input class="btn btn-light cancel-add" type="button" id="cancel-edit" value="Cancel">
                                <button class="btn btn-primary me-3" type="button" id="update">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade bd-example-modal-xl" id="detail-data-modal" tabindex="-1" role="dialog"
        aria-labelledby="myExtraLargeModal" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myExtraLargeModal">Detail Peserta</h4>
                    <button class="btn-close py-0 cancel-add" type="button" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body dark-modal">
                    <div class="card">
                        <form class="form theme-form dark-inputs">
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-md-4">
                                        <hr>
                                    </div>
                                    <div class="col-md-4 d-flex justify-content-center">Biodata</div>
                                    <div class="col-md-4">
                                        <hr>
                                    </div>
                                </div>

                                <div class="">
                                    <label class="form-label text-black" for="detail-nama">Nama Lengkap</label>
                                    <input type="text" class="form-control" id="detail-nama" name="detail-nama"
                                        placeholder="Nama Lengkap" readonly>
                                </div>

                                <div class="">
                                    <label class="form-label text-black" for="detail-nip">NIP</label>
                                    <input type="text" class="form-control" id="detail-nip" name="detail-nip"
                                        placeholder="NIP Peserta/Panitia" maxlength="15" readonly>
                                </div>

                                <div class="">
                                    <label class="form-label text-black" for="detail-jenis-kelamin">Jenis Kelamin</label>
                                    <input type="text" class="form-control" id="detail-jenis-kelamin"
                                        name="detail-jenis-kelamin" readonly>
                                </div>

                                <div class="">
                                    <label class="form-label text-black" for="detail-no-wa">No. Whatsapp</label>
                                    <input type="text" class="form-control" id="detail-no-wa" name="detail-no-wa"
                                        placeholder="Masukkan No. Whatsapp" maxlength="15" readonly>
                                </div>

                                <div class="row mt-4">
                                    <div class="col-md-4">
                                        <hr>
                                    </div>
                                    <div class="col-md-4 d-flex justify-content-center">Data Kepegawaian</div>
                                    <div class="col-md-4">
                                        <hr>
                                    </div>
                                </div>

                                <div class="">
                                    <label class="form-label text-black" for="detail-role">Jenis Kepesertaan</label>
                                    <input type="text" class="form-control" id="detail-role" name="detail-role" readonly>
                                </div>

                                <div class="">
                                    <label class="form-label text-black" for="detail-instansi">Asal Instansi</label>
                                    <input type="text" class="form-control" id="detail-instansi" name="detail-instansi"
                                        placeholder="Asal Instansi" readonly>
                                </div>

                                <div class="">
                                    <label class="form-label text-black" for="detail-unit-kerja">Unit Kerja</label>
                                    <input type="text" class="form-control" id="detail-unit-kerja"
                                        name="detail-unit-kerja" readonly>
                                </div>

                                <div class="">
                                    <label class="form-label text-black" for="detail-jabatan">Jabatan</label>
                                    <input type="text" class="form-control" id="detail-jabatan" name="detail-jabatan"
                                        readonly>
                                </div>

                                <div class="">
                                    <label class="form-label text-black" for="detail-golongan">Golongan</label>
                                    <input type="text" class="form-control" id="detail-golongan" name="detail-golongan"
                                        readonly>
                                </div>

                                <div class="row mt-4">
                                    <div class="col-md-4">
                                        <hr>
                                    </div>
                                    <div class="col-md-4 d-flex justify-content-center">Data Raker</div>
                                    <div class="col-md-4">
                                        <hr>
                                    </div>
                                </div>

                                <div class="">
                                    <label class="form-label text-black" for="detail-kamar">Kamar Peserta</label>
                                    <input type="text" class="form-control" id="detail-kamar" name="detail-kamar" readonly>
                                </div>
                                <div class="">
                                    <label class="form-label text-black" for="detail-baju">Ukuran Baju</label>
                                    <input type="text" class="form-control" id="detail-baju" name="detail-baju" readonly>
                                </div>
                                <div class="">
                                    <label class="form-label text-black" for="detail-bank">Bank</label>
                                    <input type="text" class="form-control" id="detail-bank" name="detail-bank" readonly>
                                </div>

                                <div class="">
                                    <label class="form-label text-black" for="detail-no-rek">No. Rekening</label>
                                    <input type="text" class="form-control" id="detail-no-rek" name="detail-no-rek"
                                        placeholder="Masukkan No. Rekening" maxlength="50" readonly>
                                </div>

                                <hr>
                            </div>
                            <div class="card-footer text-end">
                                <input class="btn btn-info cancel-add" type="button" id="btn-close-detail" value="Close">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade modal-alert" id="alert" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenter1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="modal-toggle-wrapper">
                        <ul class="modal-img">
                            <li> <img id="alert-image"></li>
                        </ul>
                        <h4 class="text-center pb-2" id="alert-title"></h4>
                        <p class="text-center" id="alert-message"></p>
                        <button class="btn btn-secondary d-flex m-auto" id="close-alert" type="button"
                            data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="confirm" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenter1"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="modal-toggle-wrapper">
                        <ul class="modal-img">
                            <li> <img id="alert-image" src="{{ asset('own_assets/icon/confirm.gif') }}" width="300px">
                            </li>
                        </ul>
                        <h4 class="text-center pb-2" id="alert-title">Hapus Data</h4>
                        <p class="text-center" id="alert-message">Apakah anda yakin ingin menghapus data?</p>
                        <div class="row">
                            <div class="col-md-6 d-flex justify-content-end">
                                <button class="btn btn-primary" type="button" data-bs-dismiss="modal">Cancel</button>
                            </div>
                            <div class="col-md-6 d-flex justify-content-start">
                                <button class="btn btn-danger" id="delete-confirmed" type="button"
                                    data-bs-dismiss="modal">Delete</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="modal fade" id="daftar_bank">
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
    </div> --}}

    {{-- <div class="modal fade" id="daftar_jabatan">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header border-secondary">
                    <h5 class="modal-title" id="exampleModalLabel">Daftar Jabatan</h5>
                    <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" id="jabatan_table" width="100%" cellspacing="0">
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
                                    <tr data-nama="{{ $jabatan->nama }}" data-id="{{ $jabatan->id }}" class="row-jabatan" style="cursor: pointer">
                                        <td>{{ $index++ }}</td>
                                        <td>{{ $jabatan->nama }}</td>
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
    </div> --}}

    {{-- <div class="modal fade" id="daftar_unit_kerja">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header border-secondary">
                    <h5 class="modal-title" id="exampleModalLabel">Daftar Unit Kerja</h5>
                    <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" id="unit_kerja_table" width="100%" cellspacing="0">
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
                                    <tr data-nama="{{ $unit_kerja->nama }}" data-id="{{ $unit_kerja->id }}" class="row-unit_kerja" style="cursor: pointer">
                                        <td>{{ $index++ }}</td>
                                        <td>{{ $unit_kerja->nama }}</td>
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
    </div> --}}
@endsection

@section('own_scripts')
    <script src="{{ asset('own_assets/scripts/peserta.js') }}"></script>
@endsection
