@extends('layouts.compro.app')
@section('title', 'Home')

@section('content')

                <div class="card mb-5">
                    <div class="card-body text-center">
                        <h2>Selamat datang di kontrakan buni..</h2>
                    </div>
                </div>
                <div class="row">
                    @foreach ($posts as $post)
                        {{-- @if ($post->status == "kosong") --}}
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <a href="{{ route('list') }}" class="text-dark text-decoration-none">
                                    <div class="card mb-3">
                                        <div class="row g-0">
                                            <div class="col-md-4">
                                                <img src="{{ asset('images/thumbnail/'.$post->thumbnail) }}" class="img-fluid rounded-start" alt="thumbnail" width="250">
                                            </div>
                                            <div class="col-md-8">
                                                <div class="card-body">
                                                    <h5 class="card-title">{{ $post->title }}</h5>
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
                </div>
                <div class="card mb-5 mt-5">
                    <div class="card-body text-center">
                        <a href="{{ route('list') }}" class="text-dark text-decoration-none">
                            <h3>Lihat Daftar Lengkap Kamar..</h3>
                        </a>
                    </div>
                </div>

@endsection