@extends('layouts.dashboard.app')
@section('title','Data Kamar')

@push('css')
    <!-- Custom styles for dataTables -->
    <link href="{{ asset('templates/dashboard/sb-admin-2') }}/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endpush

@section('content_title','Data Kamar')
@section('content')

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <a href="{{ route('list') }}" class="btn btn-info btn-sm" target="_blank">
                                <i class="fas fa-search fa-fw"></i>
                                VIEW MAIN WEBSITE
                            </a>
                            <a href="{{ route('posts.create') }}" class="btn btn-primary btn-sm">
                                <i class="fas fa-pencil-alt fa-fw"></i>
                                CREATE
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama</th>
                                            <th>Harga</th>
                                            <th>Asset Kamar</th>
                                            <th>Thumbnail</th>
                                            <th>Status</th>
                                            <th>Handle</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama</th>
                                            <th>Harga</th>
                                            <th>Asset Kamar</th>
                                            <th>Thumbnail</th>
                                            <th>Status</th>
                                            <th>Handle</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($posts as $post)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $post->title }}</td>
                                                <td>{{ __('Rp.'.$post->price) }}</td>
                                                <td>{!! $post->content !!}</td>
                                                <td>
                                                    <img src="{{ asset('images/thumbnail/'.$post->thumbnail) }}" alt="thumbnail" width="100" srcset="">
                                                </td>
                                                <td>{{ strtoupper($post->status) }}</td>
                                                <td>
                                                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <a href="{{ route('posts.show', $post->id) }}" class="mb-1 btn btn-sm btn-info"><i class="fas fa-search fa-fw"></i></a>
                                                        <a href="{{ route('posts.edit', $post->id) }}" class="mb-1 btn btn-sm btn-warning"><i class="fas fa-pencil-alt fa-fw"></i></a>
                                                        <button type="submit" class="mb-1 btn btn-sm btn-danger" onclick="return confirm('Do you want to delete this data?')"><i class="fas fa-trash"></i></button>
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