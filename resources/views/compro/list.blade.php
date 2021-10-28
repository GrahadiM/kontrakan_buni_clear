@extends('layouts.compro.app')
@section('title', 'List Kamar')

@push('css')
<style type="text/css">
    .pagination li{
        float: left;
        list-style-type: none;
        margin:5px;
    }
</style>
@endpush

@section('content')

                <div class="card mb-5">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-8 col-12">
                                <h2>Pilih kamar sesuai kebutuhan anda..</h2>
                            </div>
                            <div class="col-lg-4 col-12">
                                <div class="container-fluid">
                                    <form action="/list/search" class="d-flex" method="GET">
                                        <input name="cari" class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                                        <button class="btn btn-outline-success" type="submit">Search</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach ($posts as $post)
                        {{-- @if ($post->status == "kosong") --}}
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <a href="{{ route('detail', $post->id) }}" class="text-dark text-decoration-none">
                                    <div class="card mb-3">
                                        <div class="row g-0">
                                            <div class="col-md-4">
                                                <img src="{{ asset('images/thumbnail/'.$post->thumbnail) }}" class="img-fluid rounded-start" alt="thumbnail" width="250">
                                            </div>
                                            <div class="col-md-8">
                                                <div class="card-body">
                                                    <h5 class="card-title">{{ $post->title }}</h5>
                                                    <p class="card-text"><small class="text-muted">{{ $post->status }}</small></p>
                                                    <p class="card-text">{!! Str::limit($post->content, $limit, '...') !!}</p>
                                                    <p class="card-text">{{ __('Rp.'.$post->price) }}</p>
                                                    @if ($diff_date == NULL)
                                                        <p class="card-text"><small class="text-muted">NOT FOUND!</small></p>
                                                    @else
                                                        <p class="card-text"><small class="text-muted">{{ $diff_date }}</small></p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        {{-- @endif --}}
                    @endforeach
                    <div class="d-flex justify-content-center">
                        {!! $posts->links() !!}
                    </div>
                </div>

@endsection