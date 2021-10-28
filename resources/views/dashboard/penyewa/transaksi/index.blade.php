@extends('layouts.dashboard.app')
@section('title','Data Transaksi')

@push('css')
    <!-- Custom styles for dataTables -->
    <link href="{{ asset('templates/dashboard/sb-admin-2') }}/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endpush

@section('content_title','Data Transaksi')
@section('content')

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Transaksi</h6>
                        </div>
                        {{-- <div class="card-header py-3">
                            <a href="{{ route('pembayaran.create') }}" class="btn btn-primary btn-sm">
                                <i class="fas fa-pencil-alt fa-fw"></i>
                                CREATE
                            </a>
                        </div> --}}
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama Kamar</th>
                                            <th>Harga</th>
                                            <th>Bulan & Tahun</th>
                                            <th>Catatan</th>
                                            <th>Status</th>
                                            <th>Handle</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama Kamar</th>
                                            <th>Harga</th>
                                            <th>Bulan & Tahun</th>
                                            <th>Catatan</th>
                                            <th>Status</th>
                                            <th>Handle</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($transaksis as $transaksi)
                                        {{-- @if ($transaksi->status == 'BB') --}}
                                        @if ($transaksi->sewa->user->id == auth()->user()->id)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $transaksi->sewa->room->title }}</td>
                                                <td>{{ $transaksi->sewa->room->price }}</td>
                                                <td>{{ $transaksi->bulan.' '.$transaksi->tahun }}</td>
                                                <td>{!! $transaksi->note !!}</td>
                                                <td>
                                                    <a href="{{ route('pembayaran.show', $transaksi->id) }}" class="btn btn-sm @if ($transaksi->status == 'BB') btn-danger @elseif ($transaksi->status == 'SB') btn-success @endif">
                                                        @if ($transaksi->status == 'BB')
                                                            {{ __('Belum Bayar') }}
                                                        @elseif ($transaksi->status == 'SB')
                                                            {{ __('Sudah Bayar') }}
                                                        @else
                                                            {{ __('Tidak diketahui') }}
                                                        @endif
                                                    </a>
                                                </td>
                                                <td>
                                                    {{-- <a href="{{ route('pembayaran.show', $transaksi->id) }}" class="mb-1 btn btn-sm btn-info"><i class="fas fa-search"></i></a> --}}
                                                    <a href="{{ route('pembayaran.edit', $transaksi->id) }}" class="mb-1 btn btn-sm btn-primary"><i class="fas fa-pencil-alt"></i></a>
                                                </td>
                                            </tr>
                                        @endif
                                        {{-- @endif --}}
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
@endsection

@push('js')
    <!-- Page level plugins -->
    <script src="{{ asset('templates/dashboard/sb-admin-2') }}/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ asset('templates/dashboard/sb-admin-2') }}/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('templates/dashboard/sb-admin-2') }}/js/demo/datatables-demo.js"></script>
@endpush