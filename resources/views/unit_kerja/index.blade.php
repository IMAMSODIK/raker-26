@extends('dash_template')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row mb-2">
            <div class="col-md-6">
                <h1 class="h3 mb-2 text-gray-800">Daftar Unit Kerja</h1>
            </div>
            <div class="col-md-6 d-flex justify-content-end">
                <button class="btn btn-success" id="tambah-data">Tambah Data</button>
            </div>
        </div>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary">Unit Kerja</h6>
            </div>
            
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th style="width: 5%" class="text-center">No</th>
                                <th style="width: 20%" class="text-center">Kode</th>
                                <th class="text-center">Nama</th>
                                <th style="width: 20%" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th style="width: 5%" class="text-center">No</th>
                                <th style="width: 20%" class="text-center">Kode</th>
                                <th class="text-center">Nama</th>
                                <th style="width: 20%" class="text-center">Aksi</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @php
                                $index = 1;
                            @endphp
                            @foreach ($unit_kerjas as $unit_kerja)
                                <tr>
                                    <td style="font-size: 16px" class="text-center">{{$index++}}</td>
                                    <td style="font-size: 16px" class="text-center">{{$unit_kerja->kode}}</td>
                                    <td style="font-size: 16px">{{$unit_kerja->nama}}</td>
                                    <td style="font-size: 16px" class="text-center">
                                        <button class="btn btn-primary edit" data-id="{{$unit_kerja->id}}">Edit</button>
                                        <button class="btn btn-danger delete" data-id="{{$unit_kerja->id}}">Hapus</button>
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
                    <h4 class="modal-title" id="myExtraLargeModal">Tambah Unit Kerja</h4>
                    <button class="btn-close py-0 cancel-add" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body dark-modal">
                    <div class="card">
                        <form class="form theme-form dark-inputs">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="form-label" for="kode">Kode Unit</label>
                                            <input type="text" class="form-control input-air-primary" id="kode"
                                                placeholder="Kode Unit" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="form-label" for="nama">Nama Unit</label>
                                            <input type="text" class="form-control input-air-primary" id="nama"
                                                placeholder="Nama Unit" required>
                                        </div>
                                    </div>
                                </div>
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

    <div class="modal fade bd-example-modal-lg" id="edit-data-modal" tabindex="-1" role="dialog"
        aria-labelledby="myExtraLargeModal" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myExtraLargeModal">Edit Arsip</h4>
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
                                            <label class="form-label" for="edit_kode">Kode Unit</label>
                                            <input type="text" class="form-control input-air-primary" id="edit_kode"
                                                placeholder="Kode Unit" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="form-label" for="edit_nama">Nama Unit</label>
                                            <input type="text" class="form-control input-air-primary" id="edit_nama"
                                                placeholder="Nama Unit" required>
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
@endsection

@section('own_scripts')
    <script src="{{ asset('own_assets/scripts/unit_kerja.js') }}"></script>
@endsection
