@extends('layouts.dashboard.app')
@section('title','Data Penyewa')

@push('css')
    <!-- Custom styles for dataTables -->
    <link href="{{ asset('templates/dashboard/sb-admin-2') }}/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endpush

@section('content_title','Data Penyewa')
@section('content')

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Penyewa</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama</th>
                                            <th>Kamar</th>
                                            <th>Total Keluarga</th>
                                            <th>WhatsApp</th>
                                            <th>Status</th>
                                            <th>Handle</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama</th>
                                            <th>Kamar</th>
                                            <th>Total Keluarga</th>
                                            <th>WhatsApp</th>
                                            <th>Status</th>
                                            <th>Handle</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($sewas as $sewa)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $sewa->user->name }}</td>
                                                <td>{{ $sewa->room->title }}</td>
                                                <td>{{ $sewa->total_family.(' Orang') }}</td>
                                                {{-- <td>{{ \Carbon\Carbon::parse($sewa->rental_date)->format('l, j F Y') }}</td> --}}
                                                <td>{{ $sewa->user->phone }}</td>
                                                <td>
                                                    <a href="{{ route('penyewa.edit', $sewa->id) }}" class="btn btn-sm @if ($sewa->user->status == 'active') btn-success @elseif($sewa->user->status == 'pending') btn-warning @else btn-danger @endif">{{ ucfirst($sewa->user->status) }}</a>
                                                </td>
                                                <td>
                                                    <form action="{{ route('penyewa.destroy', $sewa->id) }}" method="POST">
                                                        @method('DELETE')
                                                        @csrf
                                                        <a href="{{ route('penyewa.show', $sewa->id) }}" class="btn btn-sm btn-info mb-1"><i class="fas fa-search"></i></a>
                                                        {{-- <a href="{{ route('penyewa.edit', $sewa->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-pencil-alt fa-fw"></i></i></a> --}}
                                                        <a href="https://wa.me/{{ $sewa->user->phone }}" target="_blank" class="btn btn-sm btn-success mb-1"><i class="fab fa-whatsapp"></i></a>
                                                        {{-- <button type="submit" class="btn btn-sm btn-danger mb-1" onclick="return confirm('Do you want to delete this data?')"><i class="fas fa-trash"></i></button> --}}
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