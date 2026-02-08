@extends('dash_template')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row mb-2">
            <div class="col-md-6">
                <h1 class="h3 mb-2 text-gray-800">Daftar Peserta</h1>
            </div>
        </div>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary">Peserta</h6>
            </div>

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
                                <th class="text-center">Status</th>
                                <th class="text-center">Foto</th>
                                <th class="text-center">Tanda Tangan</th>
                                {{-- <th class="text-center">Aksi</th> --}}
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
                                <th class="text-center">Status</th>
                                <th class="text-center">Foto</th>
                                <th class="text-center">Tanda Tangan</th>
                                {{-- <th class="text-center">Aksi</th> --}}
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
                                    <td style="font-size: 16px" class="text-center">
                                        @if ($peserta->registrasi == 1)
                                            <span class="badge badge-pill badge-success">Sudah Registrasi</span>
                                        @else
                                            <span class="badge badge-pill badge-danger">Belum Registrasi</span>
                                        @endif
                                    </td>
                                    <td style="font-size: 16px" class="text-center">
                                        <img src="{{ asset('storage/foto') . '/' . $peserta->foto }}" alt=""
                                            width="100%">
                                    </td>
                                    <td style="font-size: 16px" class="text-center">
                                        <img src="{{ asset('storage/ttd') . '/' . $peserta->ttd }}" alt=""
                                            width="100%">
                                    </td>
                                    {{-- <td class="text-center">
                                        <button class="btn btn-primary registrasi"
                                            data-id="{{ $peserta->id }}"
                                            {{($peserta->registrasi == 1) ? "disabled" : "" }}>Registrasi</button>
                                    </td> --}}
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

    {{-- <div class="modal fade bd-example-modal-lg" id="edit-data-modal" tabindex="-1" role="dialog"
        aria-labelledby="myExtraLargeModal" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myExtraLargeModal">Edit jabatan</h4>
                    <button class="btn-close py-0 cancel-edit" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body dark-modal">
                    <div class="card">
                        <form class="form theme-form dark-inputs">
                            <input type="hidden" name="" id="id">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="form-label" for="edit_kode">Kode Jabatan</label>
                                            <input type="text" class="form-control input-air-primary" id="edit_kode"
                                                placeholder="Kode Jabatan" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="form-label" for="edit_nama">Nama Jabatan</label>
                                            <input type="text" class="form-control input-air-primary" id="edit_nama"
                                                placeholder="Nama Jabatan" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-end">
                                <input class="btn btn-light cancel-edit" type="button" id="cancel-edit" value="Cancel">
                                <button class="btn btn-primary me-3" type="button" id="update">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    <div class="modal fade modal-alert" id="alert" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenter1"
        aria-hidden="true">
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

    <div class="modal fade" id="ttd" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Dokumen Pendukung</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="id_ttd">
                    <div class="mb-3">
                        <label class="form-label text-light" for="foto">Upload Foto</label>
                        <input type="file" accept="" class="form-control" name="foto" id="foto" />
                    </div>
                    <div class="mb-3">
                        <div class="border-canvas" style="background-color: white">
                            <canvas width="460" height="350" id="signature-pad" class="signature-pad"
                                style="border:1px solid #000;"></canvas>
                        </div>
                        <div class="row d-flex justify-content-center mt-3">
                            <button id="reset-canvas" class="btn btn-danger mr-1" type="button">Hapus
                                TTD</button>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="row">
                            <div class="col-md-6">
                                <label class="form-label" for="date">Tanggal</label>
                                <input type="date" class="form-control" id="date" />
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="time">Waktu</label>
                                <input type="time" class="form-control" id="time" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="simpan-dokumen">Simpan</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('own_scripts')
    <script src="{{ asset('own_assets/scripts/peserta.js') }}"></script>
@endsection
