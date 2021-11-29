@extends('layouts.compro.index')
@section('title', 'Kontak Kami')

@section('content')

  <!--/ Intro Single star /-->
  <section class="intro-single">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-lg-8">
          <div class="title-single-box">
            <h1 class="title-single">Kontak Kami</h1>
            <span class="color-text-a">
              Untuk lebih jelas mengenai pemesanan atau berkonsultasi mengenai kamar dan kebutuhan anda, Silahkan hubungi :
            </span>
          </div>
        </div>
        <div class="col-md-12 col-lg-4">
          <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="{{ route('index') }}">Home</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">
                Kontak Kami
              </li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </section>
  <!--/ Intro Single End /-->

  <!--/ Contact Star /-->
  <section class="contact mb-5">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="contact-map box">
            <div id="map" class="contact-map">
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d495.8782233603187!2d106.7175279113627!3d-6.127232161782588!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6a02b18addd74d%3A0x48c87122ec0b134!2sJl.%20Trisula%20Ujung%2C%20RW.10%2C%20Tegal%20Alur%2C%20Kec.%20Kalideres%2C%20Kota%20Jakarta%20Barat%2C%20Daerah%20Khusus%20Ibukota%20Jakarta!5e0!3m2!1sid!2sid!4v1632294204251!5m2!1sid!2sid"
                width="100%" height="450" frameborder="0" style="border:0" loading="lazy" allowfullscreen></iframe>
            </div>
          </div>
        </div>
        <div class="col-sm-12 section-t8">
          <div class="row">
            <div class="col-md-7">
                <form class="form-a" action="{{ route('sendemail') }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="row">
                    <div class="col-md-12 col-lg-6 mb-1">
                      <div class="form-group">
                        <label for="name">Nama :</label>
                        <input name="name" type="text" class="form-control form-control-lg form-control-a" id="name"
                          placeholder="Nama Anda *" required>
                      </div>
                    </div>
                    <div class="col-md-12 col-lg-6 mb-1">
                      <div class="form-group">
                        <label for="email">Email :</label>
                        <input name="email" type="text" class="form-control form-control-lg form-control-a" id="email"
                          placeholder="Email Anda *" required>
                      </div>
                    </div>
                    <div class="col-md-12 col-lg-12 mb-1">
                      <div class="form-group">
                        <label for="subject">Subjek :</label>
                        <input name="subject" type="text" class="form-control form-control-lg form-control-a" id="subject"
                          placeholder="Subjek *" required>
                      </div>
                    </div>
                    <div class="col-md-12 col-lg-12 mb-1">
                      <div class="form-group">
                        <label for="message">Pesan :</label>
                        <textarea name="message" type="text" cols="45" rows="8" class="form-control" id="message"
                          placeholder="Pesan Anda *" required></textarea>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <button type="submit" class="btn btn-b">Pesan</button>
                    </div>
                  </div>
                </form>
            </div>
            <div class="col-md-5 section-md-t3">
              <div class="icon-box section-b2">
                <div class="icon-box-icon">
                  <span class="ion-ios-paper-plane"></span>
                </div>
                <div class="icon-box-content table-cell">
                  <div class="icon-box-title">
                    <h4 class="icon-title">Say Hello</h4>
                  </div>
                  <div class="icon-box-content">
                    <p class="mb-1">Email.
                      <a href="mailto:arifrhmn1999@gmail.com" target="_blank" rel="noopener noreferrer" class="text-decoration-none">
                        <span class="color-a">
                          {{ __('arifrhmn1999@gmail.com') }}
                        </span>
                      </a>
                    </p>
                    <p class="mb-1">Phone.
                      <a href="https://wa.me/081282341589" target="_blank" rel="noopener noreferrer" class="text-decoration-none">
                        <span class="color-a">
                          {{ __('081282341589') }}
                        </span>
                      </a>
                    </p>
                  </div>
                </div>
              </div>
              <div class="icon-box section-b2">
                <div class="icon-box-icon">
                  <span class="ion-ios-pin"></span>
                </div>
                <div class="icon-box-content table-cell">
                  <div class="icon-box-title">
                    <h4 class="icon-title">Find us in</h4>
                  </div>
                  <div class="icon-box-content">
                    <p class="mb-1">
                      {{-- Jl. Joglo Raya No.21 E, RT.8/RW.3, Joglo, Kec. Kembangan, Kota Jakarta Barat
                      <br>Daerah Khusus Ibukota Jakarta 11640 --}}
                      Jl. Trisula Ujung Tegal Alur, Kec. Kalideres, Kota Jakarta Barat,
                      Daerah Khusus Ibukota Jakarta 11820
                    </p>
                  </div>
                </div>
              </div>
              {{-- <div class="icon-box">
                <div class="icon-box-icon">
                  <span class="ion-ios-redo"></span>
                </div>
                <div class="icon-box-content table-cell">
                  <div class="icon-box-title">
                    <h4 class="icon-title">Social networks</h4>
                  </div>
                  <div class="icon-box-content">
                    <div class="socials-footer">
                      <ul class="list-inline">
                        <li class="list-inline-item">
                          <a href="#" class="link-one" target="_blank" rel="noopener noreferrer">
                            <i class="fa fa-facebook" aria-hidden="true"></i>
                          </a>
                        </li>
                        <li class="list-inline-item">
                          <a href="#" class="link-one" target="_blank" rel="noopener noreferrer">
                            <i class="fa fa-twitter" aria-hidden="true"></i>
                          </a>
                        </li>
                        <li class="list-inline-item">
                          <a href="#" class="link-one" target="_blank" rel="noopener noreferrer">
                            <i class="fa fa-instagram" aria-hidden="true"></i>
                          </a>
                        </li>
                        <li class="list-inline-item">
                          <a href="#" class="link-one" target="_blank" rel="noopener noreferrer">
                            <i class="fa fa-pinterest-p" aria-hidden="true"></i>
                          </a>
                        </li>
                        <li class="list-inline-item">
                          <a href="#" class="link-one" target="_blank" rel="noopener noreferrer">
                            <i class="fa fa-dribbble" aria-hidden="true"></i>
                          </a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div> --}}
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--/ Contact End /-->

@endsection