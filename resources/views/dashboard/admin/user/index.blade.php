@extends('layouts.dashboard.app')
@section('title','Setting Users')

@push('css')
    <!-- Custom styles for dataTables -->
    <link href="{{ asset('templates/dashboard/sb-admin-2') }}/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endpush

@section('content_title','Setting Users')
@section('content')

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">List Users</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Username</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Gender</th>
                                            <th>Role</th>
                                            <th>Room</th>
                                            <th>Family Members</th>
                                            <th>WhatsApp</th>
                                            <th>Handle</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Username</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Gender</th>
                                            <th>Role</th>
                                            <th>Room</th>
                                            <th>Family Members</th>
                                            <th>WhatsApp</th>
                                            <th>Handle</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $user->username }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->gender }}</td>
                                                <td>{{ $user->role }}</td>
                                                <td>Kamar 1</td>
                                                <td>5 Orang</td>
                                                <td>{{ $user->phone }}</td>
                                                <td>
                                                    {{-- <a href="{{ route('setting-member.show', $user->id) }}" class="btn btn-sm btn-info">DETAIL</a> --}}
                                                    {{-- <a href="{{ route('setting-member.edit', $user->id) }}" class="btn btn-sm btn-primary">EDIT</a> --}}
                                                    <form action="{{ route('setting-member.destroy', $user->id) }}" method="post">
                                                        @csrf
                                                        @method('PUT')
                                                        <a href="https://wa.me/{{ $user->phone }}" target="_blank" class="btn btn-sm btn-success mb-1"><i class="fab fa-whatsapp"></i></a>
                                                        <button type="submit" class="btn btn-sm btn-danger mb-1" onclick="return confirm('Do you want to delete this data?')"><i class="fas fa-trash"></i></button>
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