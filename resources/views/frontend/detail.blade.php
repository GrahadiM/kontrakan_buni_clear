@extends('layouts.compro.index')
@section('title', 'Home')

@section('content')

  <!--/ Intro Single star /-->
  <section class="intro-single">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-lg-8">
          <div class="title-single-box">
            <h1 class="title-single">{{ $post->title }}</h1>
            <a href="{{ route('contact-us') }}">
              <span class="color-text-a">
                Jakarta Barat
              </span>
            </a>
          </div>
        </div>
        <div class="col-md-12 col-lg-4">
          <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="{{ route('index') }}">Home</a>
              </li>
              <li class="breadcrumb-item">
                <a href="{{ route('list') }}">List Kamar</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">
                {{ $post->title }}
              </li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </section>
  <!--/ Intro Single End /-->

  <!--/ Property Single Star /-->
  <section class="property-single nav-arrow-b mb-5">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div id="property-single-carousel" class="owl-carousel owl-arrow gallery-property">
            <div class="carousel-item-b">
              <a href="{{ url('images/thumbnail/'.$post->thumbnail) }}" target="_blank" rel="noopener noreferrer">
                <img src="{{ asset('images/thumbnail/'.$post->thumbnail) }}" alt="thumbnail">
              </a>
            </div>
            {{-- <div class="carousel-item-b">
              <img src="img/slide-2.jpg" alt="">
            </div>
            <div class="carousel-item-b">
              <img src="img/slide-3.jpg" alt="">
            </div>
            <div class="carousel-item-b">
              <img src="img/slide-1.jpg" alt="">
            </div> --}}
          </div>
          <div class="row justify-content-between">
            <div class="col-md-5 col-lg-4">
              <div class="property-price d-flex justify-content-center foo">
                <div class="card-header-c d-flex">
                  <div class="card-box-ico">
                    <span class="ion-money">{{ __('Rp.') }}</span>
                  </div>
                  <div class="card-title-c align-self-center">
                    <h5 class="title-c">{{ $post->price }}</h5>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-7 col-lg-7 section-md-t3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="title-box-d">
                    <h3 class="title-d">Asset Kamar</h3>
                  </div>
                </div>
              </div>
              <div class="property-description">
                <p class="description color-text-a">
                  {!! $post->content !!}
                </p>
                {{-- <p class="description color-text-a no-margin">
                  Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Donec rutrum congue leo eget
                  malesuada. Quisque velit nisi,
                  pretium ut lacinia in, elementum id enim. Donec sollicitudin molestie malesuada.
                </p> --}}
              </div>
            </div>
          </div>
        </div>
        @auth
        <div class="col-md-12">
          <div class="row section-t3">
            <div class="col-sm-12">
              <div class="title-box-d">
                <h3 class="title-d">Pesan Sekarang</h3>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 col-lg-12">
              <div class="property-contact">
                <form class="form-a" action="{{ route('order') }}" method="POST" enctype="multipart/form-data">
                @csrf
                  <div class="row">
                    <div class="col-md-12 col-lg-6 mb-1">
                      <div class="form-group">
                        <label for="inputUserId">Email Anda :</label>
                        <select name="user_id" id="inputUserId" class="custom-select form-control-lg form-control-a">
                            <option value="{{ auth()->user()->id }}" selected>{{ auth()->user()->email }}</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-12 col-lg-6 mb-1">
                      <div class="form-group">
                        <label for="inputRoomId">Nama Kamar :</label>
                        <select name="room_id" id="inputRoomId" class="custom-select form-control-lg form-control-a">
                            <option value="{{ $post->id }}" selected>{{ $post->id }}</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-12 col-lg-6 mb-1">
                      <div class="form-group">
                        <label for="inputNIK">Nomer Induk Keluarga (NIK) :</label>
                        <input name="nik" type="number" class="form-control form-control-lg form-control-a" id="inputNIK"
                          placeholder="Nomer Induk Keluarga (NIK) *" required>
                      </div>
                    </div>
                    <div class="col-md-12 col-lg-3 mb-1">
                      <div class="form-group">
                        <label for="inputTotalFamily">Jumlah Keluarga :</label>
                        <select name="total_family" id="inputTotalFamily" class="custom-select form-control-lg form-control-a">
                            <option value="1" selected>1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                      </div>
                    </div>
                    @if ($post->status == "isi")
                    <div class="col-md-12">
                      <button type="submit" class="btn btn-a" disabled>SUDAH TERISI</button>
                    </div>
                    @else
                    <div class="col-md-12">
                      <button type="submit" class="btn btn-b">Pesan</button>
                    </div>
                    @endif
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        @else
        <div class="row section-t3">
          <div class="col-sm-4">
            <div class="title-box-d">
              <h3 class="title-d">Pesan Sekarang</h3>
            </div>
          </div>
          <div class="col-8 section-md-t3">
            <div class="title-box-d">
              <h3 class="title-d">Silahkan log in atau register terlebih dahulu untuk memesan kamar kontrakan..</h3>
            </div>
          </div>
        </div>
        @endauth
      </div>
    </div>
  </section>
  <!--/ Property Single End /-->


@endsection