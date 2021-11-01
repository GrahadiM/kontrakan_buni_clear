@extends('layouts.dashboard.app')
@section('title','Data Laporan')

@push('css')
    <!-- Custom styles for dataTables -->
    <link href="{{ asset('templates/dashboard/sb-admin-2') }}/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endpush

@section('content_title','Data Laporan')
@section('content')

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6>{{ \Carbon\Carbon::now()->format('l, j F Y') }}</h6>
                            {{-- <a href="{{ route('laporan.create') }}" class="btn btn-success btn-sm">
                                CREATE NOTIFICATION
                                <i class="fas fa-bullhorn fa-fw"></i>
                            </a> --}}
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama Pelapor</th>
                                            <th>Nama Kamar</th>
                                            <th>Bukti Laporan</th>
                                            <th>Tanggal Laporan</th>
                                            <th>Isi Laporan</th>
                                            <th>Status</th>
                                            <th>Handle</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama Pelapor</th>
                                            <th>Nama Kamar</th>
                                            <th>Bukti Laporan</th>
                                            <th>Tanggal Laporan</th>
                                            <th>Isi Laporan</th>
                                            <th>Status</th>
                                            <th>Handle</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($laporans as $laporan)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $laporan->sewa->user->name }}</td>
                                                <td>{{ $laporan->sewa->room->title }}</td>
                                                <td>
                                                    <a href="{{ asset('images/laporan/'.$laporan->bukti_laporan) }}" target="_blank" rel="noopener noreferrer">
                                                        <img src="{{ asset('images/laporan/'.$laporan->bukti_laporan) }}" alt="laporan" width="150">
                                                    </a>
                                                </td>
                                                <td>{{ $laporan->created_at }}</td>
                                                <td>{!! $laporan->keluhan !!}</td>
                                                <td>
                                                    <a href="{{ route('laporan.edit', $laporan->id) }}" class="btn btn-sm @if ($laporan->status == 'B') btn-danger @elseif ($laporan->status == 'S') btn-success @endif">
                                                        @if ($laporan->status == 'B')
                                                            {{ __('Belum Selesai') }}
                                                        @elseif ($laporan->status == 'S')
                                                            {{ __('Sudah Selesai') }}
                                                        @else
                                                            {{ __('Tidak diketahui') }}
                                                        @endif
                                                    </a>
                                                </td>
                                                <td>
                                                    <form action="{{ route('laporan.destroy', $laporan->id) }}" method="POST">
                                                        @method('DELETE')
                                                        @csrf
                                                        <a href="{{ route('laporan.show', $laporan->id) }}" class="mb-1 btn btn-sm btn-info"><i class="fas fa-search"></i></a>
                                                        {{-- <a href="{{ route('laporan.edit', $laporan->id) }}" class="mb-1 btn btn-sm btn-primary"><i class="fas fa-pencil-alt"></i></a> --}}
                                                        <a href="https://wa.me/{{ $laporan->sewa->user->phone }}" target="_blank" class="mb-1 btn btn-sm btn-success mb-1"><i class="fab fa-whatsapp"></i></a>
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