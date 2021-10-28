@extends('layouts.compro.app')
@section('title', 'Detail Kamar')

@section('content')

                <div class="card mb-5">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-2">
                                <a href="{{ route('list') }}" class="btn btn-circle btn-outline-danger">
                                    <i class="fas fa-arrow-circle-left"></i> KEMBALI
                                </a>
                            </div>
                            <div class="col-8">
                                <h2>{{ $post->title }}</h2>
                            </div>
                            <div class="col-2">
                                @if ($post->status == "isi")
                                    <a href="{{ route('order') }}" class="btn btn-circle btn-danger disabled">
                                        SUDAH TERISI
                                    </a>
                                @else
                                    <a href="{{ route('order') }}" class="btn btn-circle btn-outline-success">
                                        PESAN SEKARANG
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card mb-5">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <a href="{{ url('images/thumbnail/'.$post->thumbnail) }}" target="_blank" rel="noopener noreferrer">
                                        <img src="{{ asset('images/thumbnail/'.$post->thumbnail) }}" class="img-fluid rounded-start" alt="thumbnail" width="350">
                                    </a>
                                </div>
                                <div class="col-md-7">
                                    <div class="card-body">

                                        <p class="card-text">{!! $post->content !!}</p>
                                        <p class="card-text">{{ __('Rp.'.$post->price) }}</p>
                                        <p class="card-text"><small class="text-muted">{{ $diff_date }}</small></p>
                                        
                                        @if ($post->status == "isi")
                                            <a href="{{ route('order') }}" class="btn btn-circle btn-danger disabled">
                                                SUDAH TERISI
                                            </a>
                                        @else
                                            <a href="{{ route('order') }}" class="btn btn-circle btn-outline-success">
                                                PESAN SEKARANG
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

@endsection