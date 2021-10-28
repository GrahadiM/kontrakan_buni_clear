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
                            {{-- <h6>{{ \Carbon\Carbon::now()->format('l, j F Y') }}</h6> --}}
                            <a href="{{ route('transaksi.create') }}" class="btn btn-success btn-sm">
                                CREATE NOTIFICATION
                                <i class="fas fa-bullhorn fa-fw"></i>
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama</th>
                                            <th>Kamar</th>
                                            {{-- <th>Nominal Pembayaran</th> --}}
                                            {{-- <th>Bukti Pembayaran</th> --}}
                                            {{-- <th>Tanggal Sewa</th> --}}
                                            <th>Waktu Pembayaran</th>
                                            {{-- <th>WhatsApp</th> --}}
                                            <th>Status</th>
                                            <th>Handle</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama</th>
                                            <th>Kamar</th>
                                            {{-- <th>Nominal Pembayaran</th> --}}
                                            {{-- <th>Bukti Pembayaran</th> --}}
                                            {{-- <th>Tanggal Sewa</th> --}}
                                            <th>Waktu Pembayaran</th>
                                            {{-- <th>WhatsApp</th> --}}
                                            <th>Status</th>
                                            <th>Handle</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($transaksis as $transaksi)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $transaksi->sewa->user->name }}</td>
                                                <td>{{ $transaksi->sewa->room->title }}</td>
                                                {{-- <td>{{ $transaksi->nominal }}</td> --}}
                                                {{-- <td>
                                                    <a href="{{ asset('images/transaksi/'.$transaksi->bukti_pembayaran) }}" target="_blank" rel="noopener noreferrer">
                                                        <img src="{{ asset('images/transaksi/'.$transaksi->bukti_pembayaran) }}" alt="bukti_pembayaran" width="150">
                                                    </a>
                                                </td> --}}
                                                {{-- <td>{{ \Carbon\Carbon::parse($transaksi->sewa->rental_date)->format('l, j F Y') }}</td> --}}
                                                {{-- <td>{{ \Carbon\Carbon::parse($transaksi->sewa->updated_at)->format('l, j F Y') }}</td> --}}
                                                <td>{{ $transaksi->bulan.' '.$transaksi->tahun }}</td>
                                                <td>
                                                    <a href="{{ route('transaksi.edit', $transaksi->id) }}" class="btn btn-sm @if ($transaksi->status == 'BB') btn-danger @elseif ($transaksi->status == 'SB') btn-success @endif">
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
                                                    <form action="{{ route('transaksi.destroy', $transaksi->id) }}" method="POST">
                                                        @method('DELETE')
                                                        @csrf
                                                        <a href="{{ route('transaksi.show', $transaksi->id) }}" class="mb-1 btn btn-sm btn-info"><i class="fas fa-search"></i></a>
                                                        <a href="{{ route('transaksi.edit', $transaksi->id) }}" class="mb-1 btn btn-sm btn-primary"><i class="fas fa-pencil-alt"></i></a>
                                                        <a href="https://wa.me/{{ $transaksi->sewa->user->phone }}" target="_blank" class="mb-1 btn btn-sm btn-success mb-1"><i class="fab fa-whatsapp"></i></a>
                                                        {{-- <button type="submit" class="mb-1 btn btn-sm btn-danger mb-1" onclick="return confirm('Do you want to delete this data?')"><i class="fas fa-trash"></i></button> --}}
                                                    </form>
                                                </td>
                                            </tr>
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