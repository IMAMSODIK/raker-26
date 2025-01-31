@extends('dash_template')
@section('own_style')
    <link rel="stylesheet" href="{{asset('own_assets/css/dokumentasi.css')}}">
@endsection
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row mb-2">
            <div class="col-md-6">
                <h1 class="h3 mb-2 text-gray-800">{{$pageTitle}}</h1>
            </div>
            <div class="col-md-6 d-flex justify-content-end">
                <button class="btn btn-success" id="btn-tambah-dokumentasi">Tambah Data</button>
            </div>
        </div>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary">{{$pageTitle}}</h6>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th style="width: 5%" class="text-center">No</th>
                                <th class="text-center">Judul Foto</th>
                                <th style="width: 10%" class="text-center">Hari</th>
                                <th class="text-center">Foto</th>
                                <th style="width: 10%" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $index = 1; @endphp
                            @foreach ($dokumentasi as $d)
                                <tr>
                                    <td style="font-size: 16px" class="text-center">{{ $index++ }}</td>
                                    <td style="font-size: 16px" class="text-center">{{ $d->judul }}</td>
                                    <td style="font-size: 16px" class="text-center">{{ \Carbon\Carbon::parse($d->hari)->format('d M Y') }}</td>
                                    <td>
                                        @php
                                            $images = json_decode($d->foto, true);
                                        @endphp
                                        @foreach ($images as $img)
                                            <img src="{{ asset($img) }}" class="thumb" data-images="{{ json_encode($images) }}" width="300" height="300">
                                        @endforeach
                                    </td>
                                    <td style="font-size: 16px" class="text-center">
                                        <button class="btn btn-primary edit" data-id="{{ $d->id }}">Edit</button>
                                        <button class="btn btn-danger delete" data-id="{{ $d->id }}">Hapus</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        </div>

    </div>

    {{-- modal preview gambar --}}
    <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Preview Gambar</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="modalContent"></div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="btn-close-preview">Close</button>
            </div>
          </div>
        </div>
      </div>


    <div class="modal fade bd-example-modal-lg" id="tambah-data-modal" tabindex="-1" role="dialog"
        aria-labelledby="myExtraLargeModal" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myExtraLargeModal">Tambah kamar</h4>
                    <button class="btn-close py-0 cancel-add" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body dark-modal">
                    <div class="card">
                        <form class="form theme-form dark-inputs" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="form-label" for="judul-foto">Judul Foto</label>
                                            <input type="text" class="form-control input-air-primary" id="judul-foto"
                                                placeholder="Judul Foto" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="form-label" for="foto">Foto</label>
                                            <input type="file" class="form-control input-air-primary" id="foto"
                                                placeholder="foto dokumentasi" required accept="image/*" multiple name="foto[]">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="form-label" for="hari">Hari</label>
                                            <input type="date" class="form-control input-air-primary" id="hari"
                                                placeholder="Hari Dokumentasi" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3 mt-3">
                                            <label class="form-label">Preview Foto</label>
                                            <div id="preview-container" class="d-flex flex-wrap"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-end">
                                <input class="btn btn-light cancel-add" type="button" id="cancel-add" value="Cancel">
                                <button class="btn btn-primary me-3" type="button" id="btn-store">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<div class="modal fade" id="edit-data-modal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Dokumentasi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="edit-form">
                    <input type="hidden" id="edit-id">

                    <div class="mb-3">
                        <label for="edit-judul" class="form-label">Judul</label>
                        <input type="text" class="form-control" id="edit-judul" required>
                    </div>

                    <div class="mb-3">
                        <label for="edit-hari" class="form-label">Hari</label>
                        <input type="date" class="form-control" id="edit-hari" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Gambar Lama</label>
                        <div id="edit-preview-images" class="d-flex flex-wrap"></div>
                    </div>

                    <div class="mb-3">
                        <label for="edit-foto-baru" class="form-label">Tambah Gambar Baru</label>
                        <input type="file" class="form-control" id="edit-foto-baru" multiple accept="image/*">
                    </div>

                </form>
                <div class="row">
                    <div class="col">
                        <div class="mb-3 mt-3">
                            <label class="form-label">Preview Foto</label>
                            <div id="preview-container-edit" class="d-flex flex-wrap"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="btn-cancel-edit">Batal</button>
                <button type="button" class="btn btn-primary" id="save-edit">Simpan</button>
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
    <script src="{{ asset('own_assets/scripts/dokumentasi.js') }}"></script>
@endsection
