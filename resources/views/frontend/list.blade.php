@extends('layouts.compro.index')
@section('title', 'List')

@section('content')

  <!--/ Intro Single star /-->
  <section class="intro-single">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-lg-8">
          <div class="title-single-box">
            <h1 class="title-single">Daftar Kamar</h1>
            <span class="color-text-a">Grid Properties</span>
          </div>
        </div>
        <div class="col-md-12 col-lg-4">
          <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="{{ route('index') }}">Home</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">
                List Kamar
              </li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </section>
  <!--/ Intro Single End /-->

  <!--/ Property Grid Star /-->
  <section class="property-grid grid">
    <div class="container">
      <div class="row">
        <div class="col-sm-2">
          <div class="grid-option">
            <form>
              <select class="custom-select">
                <option selected>All</option>
                <option value="isi">Isi</option>
                <option value="kosong">Kosong</option>
              </select>
            </form>
          </div>
        </div>
        <div class="col-sm-10 ">
            <div class="container-fluid ml-5">
                <form action="/list/search" class="d-flex" method="GET">
                    <input name="cari" class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success ml-3" type="submit">Search</button>
                </form>
            </div>
        </div>
        @foreach ($posts as $post)
        <div class="col-md-4">
          <div class="card-box-a card-shadow">
            <div class="img-box-a">
              {{-- <img src="{{ asset('templates/frontend') }}/img/property-6.jpg" alt="" class="img-a img-fluid"> --}}
              <img src="{{ asset('images/thumbnail/'.$post->thumbnail) }}" alt="thumbnail" class="img-a img-fluid">
            </div>
            <div class="card-overlay">
              <div class="card-overlay-a-content">
                <div class="card-header-a">
                  <h2 class="card-title-a">
                      <a href="{{ route('detail', $post->id) }}">
                        {{ $post->title }}
                        <br>
                        {{-- <sup>{{ $diff_date }}</sup> --}}
                      </a>
                  </h2>
                </div>
                <div class="card-body-a">
                  <div class="price-box d-flex">
                        <span class="price-a">Harga | {{ __('Rp.'.$post->price) }}</span>
                  </div>
                  <a href="{{ route('detail', $post->id) }}" class="link-a">Lihat Detail
                    <span class="ion-ios-arrow-forward"></span>
                  </a>
                </div>
                <div class="card-footer-a">
                  {{-- <ul class="card-info d-flex justify-content-around"> --}}
                  <ul class="card-info">
                      <li class="ml-3">
                          <h4 class="card-info-title">Deskripsi</h4>
                          <span>
                            {!! Str::limit($post->content, $limit, '...') !!}
                          </span>
                      </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
      <div class="d-flex justify-content-center">
          {!! $posts->links() !!}
      </div>
      {{-- <div class="row">
        <div class="col-sm-12">
          <nav class="pagination-a">
            <ul class="pagination justify-content-end">
              <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1">
                  <span class="ion-ios-arrow-back"></span>
                </a>
              </li>
              <li class="page-item">
                <a class="page-link" href="#">1</a>
              </li>
              <li class="page-item active">
                <a class="page-link" href="#">2</a>
              </li>
              <li class="page-item">
                <a class="page-link" href="#">3</a>
              </li>
              <li class="page-item next">
                <a class="page-link" href="#">
                  <span class="ion-ios-arrow-forward"></span>
                </a>
              </li>
            </ul>
          </nav>
        </div>
      </div> --}}
    </div>
  </section>
  <!--/ Property Grid End /-->

@endsection