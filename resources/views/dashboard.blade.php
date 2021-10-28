@extends('layouts.dashboard.app')
@section('title', 'Dashboard')
@section('content_title', 'Dashboard')

@push('css')
    <!-- Custom styles for dataTables -->
    <link href="{{ asset('templates/dashboard/sb-admin-2') }}/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endpush

@section('content')

@if (auth()->user()->role == 'admin')
<div class="row">
    <!-- Data Kontrakan -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            {{ __('Data Seluruh Kamar') }}
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $r->count() }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            {{ __('Data Kamar Terisi') }}
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $rc->count() }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                            {{ __('Data Transaksi') }}
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $t->count() }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            {{ __('Data Penyewa') }}
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $p->count() }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif

<div class="row">
    <!-- Reminder -->
    <div class="col-lg-12">
        <div class="card mb-4 text-center">
            <div class="card-header">
                Hari Tanggal Bulan Tahun untuk hari ini
            </div>
            <div class="card-body">
                {{ \Carbon\Carbon::now()->format('l, j F Y') }}
            </div>
        </div>
    </div>
</div>

@if (auth()->user()->role == 'admin')
<div class="row">
    <!-- Pendapatan yang sudah bayar -->
    <div class="col-lg-6">
        <div class="card mb-4 text-center">
            <div class="card-header text-white bg-success">
                Jumlah pemasukan yang sudah bayar
            </div>
            <div class="card-body">
                {{ __('Rp.'.$sb) }}
            </div>
        </div>
    </div>
    <!-- Pendapatan yang belum bayar -->
    <div class="col-lg-6">
        <div class="card mb-4 text-center">
            <div class="card-header text-white bg-danger">
                Jumlah pemasukan yang belum bayar
            </div>
            <div class="card-body">
                {{ __('Rp.'.$bb) }}
            </div>
        </div>
    </div>
</div>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data pengajuan sewa kontrakan</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Kamar</th>
                        <th>WhatsApp</th>
                        <th>Status</th>
                        <th>Handle</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Kamar</th>
                        <th>WhatsApp</th>
                        <th>Status</th>
                        <th>Handle</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($sewas as $sewa)
                    @if ($sewa->user->status == 'active')
                    @else
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $sewa->user->name }}</td>
                            <td>{{ $sewa->user->email }}</td>
                            <td>{{ $sewa->room->title }}</td>
                            <td>{{ $sewa->user->phone }}</td>
                            <td>
                                <a href="{{ route('penyewa.edit', $sewa->id) }}" class="btn btn-sm @if ($sewa->user->status == 'active') btn-success @elseif($sewa->user->status == 'pending') btn-warning @else btn-danger @endif">{{ ucfirst($sewa->user->status) }}</a>
                            </td>
                            <td>
                                <form action="{{ route('penyewa.destroy', $sewa->id) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <a href="{{ route('penyewa.show', $sewa->id) }}" class="btn btn-sm btn-info mb-1"><i class="fas fa-search"></i></a>
                                    <a href="https://wa.me/{{ $sewa->user->phone }}" target="_blank" class="btn btn-sm btn-success mb-1"><i class="fab fa-whatsapp"></i></a>
                                    {{-- <button type="submit" class="btn btn-sm btn-danger mb-1" onclick="return confirm('Do you want to delete this data?')"><i class="fas fa-trash"></i></button> --}}
                                </form>
                            </td>
                        </tr>
                    @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endif


@if (auth()->user()->role == 'penyewa')
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Notifikasi Pembayaran</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Kamar</th>
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
                        <th>Kamar</th>
                        <th>Harga</th>
                        <th>Bulan & Tahun</th>
                        <th>Catatan</th>
                        <th>Status</th>
                        <th>Handle</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($transaksis as $transaksi)
                    @if ($transaksi->status == 'BB')
                    @if ($transaksi->sewa->user->id == auth()->user()->id)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $transaksi->sewa->room->title }}</td>
                            <td>{{ $transaksi->sewa->room->price }}</td>
                            <td>{{ $transaksi->bulan.' '.$transaksi->tahun }}</td>
                            <td>{!! $transaksi->note !!}</td>
                            <td>
                                <a href="{{ route('pembayaran.edit', $transaksi->id) }}" class="btn btn-sm @if ($transaksi->status == 'BB') btn-danger @elseif ($transaksi->status == 'SB') btn-success @endif">
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
                                <a href="{{ route('pembayaran.show', $transaksi->id) }}" class="mb-1 btn btn-sm btn-info"><i class="fas fa-search"></i></a>
                                {{-- <a href="{{ route('pembayaran.edit', $transaksi->id) }}" class="mb-1 btn btn-sm btn-primary"><i class="fas fa-pencil-alt"></i></a> --}}
                            </td>
                        </tr>
                    @endif
                    @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endif

@endsection

@push('js')
    <!-- Page level plugins -->
    <script src="{{ asset('templates/dashboard/sb-admin-2') }}/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ asset('templates/dashboard/sb-admin-2') }}/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('templates/dashboard/sb-admin-2') }}/js/demo/datatables-demo.js"></script>
@endpush