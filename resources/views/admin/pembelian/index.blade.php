@extends('layouts.master')

@section('addCss')
    <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sweetalert.min.css') }}">
@endsection

@section('addJavascript')
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('js/sweetalert.min.js') }}"></script>
    <script>
        $(function() {
            $("#data-table").DataTable();
        });


        confirmDelete = function(button) {
            var url = $(button).data('url');
            swal({
                'title': 'Konfirmasi Hapus',
                'text': 'Apakah kamu yakin ingin menghapus ?',
                'dangermode': true,
                'buttons': true
            }).then(function(value) {
                if (value) {
                    window.location = url;
                }
            })
        }
    </script>
@endsection

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            {{-- content header --}}
            <div class="page-header">
                <h3 class="page-title">
                    <span class="page-title-icon bg-gradient-primary text-white me-2">
                        <i class="mdi mdi-currency-usd"></i>
                    </span>
                    Pengeluaran {{ Str::upper(Auth::user()->role) }}
                </h3>
                <nav aria-label="breadcrumb">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">
                            <a href="{{ route('daftarPembelian') }}">Pengeluaran</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            <span>List Pembelian Bahan Baku</span>
                        </li>
                    </ul>
                </nav>
            </div>
            {{-- content header --}}

            {{-- tabel --}}
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{ route('addPembelian') }}" class="btn btn-outline-info btn-fw"
                                style="margin-bottom: 10px;" role="button">Tambah Pembelian</a>
                            <h4 class="card-title text-center">Daftar Pembelian Bahan Baku</h4>
                            <div class="table-responsive">
                                <table class="table table-hover table-striped text-center " id="data-table">
                                    <thead>
                                        <tr>
                                            <th>Id Pembelian</th>
                                            <th>Kategori</th>
                                            <th>Total Item</th>
                                            <th>Total Nominal</th>
                                            <th>Waktu</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($tbl_pembelians as $tbl_pembelian)
                                            <tr>
                                                <td>{{ $tbl_pembelian->id_pembelian }}</td>
                                                <td>{{ $tbl_pembelian->kategori }}</td>
                                                <td>{{ $tbl_pembelian->total_item }}</td>
                                                <td>{{ number_format($tbl_pembelian->total_nominal, 0, ',', '.') }}</td>
                                                <td>{{ \Carbon\Carbon::parse($tbl_pembelian->created_at)->setTimezone('Asia/Jakarta')->translatedFormat('j M Y') }}
                                                </td>
                                                </td>
                                                <td>
                                                    <a href="{{ route('editPembelian', ['id' => $tbl_pembelian->id_pembelian]) }}"
                                                        class="btn btn-gradient-warning btn-sm" role="button">Edit</a>
                                                    <a onclick="confirmDelete(this)"
                                                        data-url="{{ route('deletePembelian', ['id' => $tbl_pembelian->id_pembelian]) }}"
                                                        class="btn btn-gradient-danger btn-sm" role="button">Hapus</a>
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
            {{-- table --}}
        </div>
    </div>
@endsection
