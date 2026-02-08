@extends('dash_template')

@section('own_style')
    <style>
        .kit-card {
            width: 100%;
            cursor: pointer;
            border: 2px solid #e9ecef;
            transition: all 0.25s ease;
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 14px;
            border-radius: 12px;
        }

        .kit-card:hover {
            background: #f8f9fa;
            transform: scale(1.01);
        }

        .kit-card.active {
            background: #e9f7ef;
            border-color: #198754;
        }

        /* checkbox besar & tidak nabrak */
        .kit-check {
            width: 24px;
            height: 24px;
            flex-shrink: 0;
            cursor: pointer;
        }

        /* icon check */
        .kit-icon {
            font-size: 24px;
            color: #ccc;
            transition: 0.25s ease;
            flex-shrink: 0;
        }

        .kit-card.active .kit-icon {
            color: #198754;
            transform: scale(1.2);
        }

        .kit-label {
            font-weight: 600;
            flex-grow: 1;
        }
    </style>
@endsection

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
                                <th style="width: 5%" class="text-center">Tumbler</th>
                                <th style="width: 5%" class="text-center">Buku Panduan</th>
                                <th style="width: 5%" class="text-center">Lanyard (ID Card)</th>
                                <th style="width: 5%" class="text-center">Topi</th>
                                <th style="width: 5%" class="text-center">Baju</th>
                                <th style="width: 20%" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th style="width: 5%" class="text-center">No</th>
                                <th style="width: 20%" class="text-center">Nama Peserta</th>
                                <th style="width: 5%" class="text-center">Tumbler</th>
                                <th style="width: 5%" class="text-center">Buku Panduan</th>
                                <th style="width: 5%" class="text-center">Lanyard (ID Card)</th>
                                <th style="width: 5%" class="text-center">Topi</th>
                                <th style="width: 5%" class="text-center">Baju</th>
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

                                    <td class="text-center">
                                        {!! optional($peserta->kit)->tumbler ? '✅' : '❌' !!}
                                    </td>

                                    <td class="text-center">
                                        {!! optional($peserta->kit)->buku_panduan ? '✅' : '❌' !!}
                                    </td>

                                    <td class="text-center">
                                        {!! optional($peserta->kit)->lanyard ? '✅' : '❌' !!}
                                    </td>

                                    <td class="text-center">
                                        {!! optional($peserta->kit)->topi ? '✅' : '❌' !!}
                                    </td>

                                    <td class="text-center">
                                        {!! optional($peserta->kit)->baju ? '✅' : '❌' !!}
                                    </td>


                                    <td style="font-size: 16px" class="text-center">
                                        <button class="btn btn-primary edit" data-id="{{ $peserta->id }}">Edit</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

    <div class="modal fade" id="edit-data-modal" tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content shadow-lg border-0 rounded-4">

                <!-- Header -->
                <div class="modal-header bg-primary text-white rounded-top-4">
                    <h5 class="modal-title fw-semibold">
                        <i class="fa fa-box me-2"></i> Edit Kit Peserta
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>

                <!-- Body -->
                <div class="modal-body px-4 py-3">

                    <form id="editPesertaForm">

                        <input type="hidden" id="peserta_id">

                        <!-- Info peserta -->
                        <div class="card border-0 bg-light mb-3">
                            <div class="card-body p-3">

                                <div class="mb-2">
                                    <label class="form-label fw-semibold">Nama Peserta</label>
                                    <input class="form-control" id="peserta_nama" readonly>
                                </div>

                                <div class="mb-0">
                                    <label class="form-label fw-semibold">NIP</label>
                                    <input class="form-control" id="peserta_nip" readonly>
                                </div>

                            </div>
                        </div>

                        <!-- Kit checklist -->
                        <h6 class="fw-bold mb-3">Checklist Kit Diterima</h6>

                        <div class="mb-3">
                            <div class="d-flex justify-content-between mb-1">
                                <small class="fw-semibold">Progress Kit</small>
                                <small id="kit-progress-text">0 / 5</small>
                            </div>

                            <div class="progress" style="height: 12px;">
                                <div id="kit-progress-bar" class="progress-bar bg-success" style="width: 0%"></div>
                            </div>
                        </div>


                        <div class="row g-3">

                            <div class="col-12 col-md-6">
                                <label class="kit-card">
                                    <i class="fa fa-check-circle kit-icon"></i>
                                    <input class="kit-check" type="checkbox" id="tumbler">
                                    <span class="kit-label">Tumbler</span>
                                </label>
                            </div>

                            <div class="col-12 col-md-6">
                                <label class="kit-card">
                                    <i class="fa fa-check-circle kit-icon"></i>
                                    <input class="kit-check" type="checkbox" id="buku_panduan">
                                    <span class="kit-label">Buku Panduan</span>
                                </label>
                            </div>

                            <div class="col-12 col-md-6">
                                <label class="kit-card">
                                    <i class="fa fa-check-circle kit-icon"></i>
                                    <input class="kit-check" type="checkbox" id="lanyard">
                                    <span class="kit-label">Lanyard</span>
                                </label>
                            </div>

                            <div class="col-12 col-md-6">
                                <label class="kit-card">
                                    <i class="fa fa-check-circle kit-icon"></i>
                                    <input class="kit-check" type="checkbox" id="topi">
                                    <span class="kit-label">Topi</span>
                                </label>
                            </div>

                            <div class="col-12 col-md-6">
                                <label class="kit-card">
                                    <i class="fa fa-check-circle kit-icon"></i>
                                    <input class="kit-check" type="checkbox" id="baju">
                                    <span class="kit-label">Baju</span>
                                </label>
                            </div>

                        </div>


                    </form>

                </div>

                <!-- Footer -->
                <div class="modal-footer bg-light rounded-bottom-4">
                    <button class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        Cancel
                    </button>

                    <button class="btn btn-primary px-4" type="button" id="update">
                        <i class="fa fa-save me-1"></i> Update
                    </button>
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
    <script src="{{ asset('own_assets/scripts/kit.js') }}"></script>
@endsection
