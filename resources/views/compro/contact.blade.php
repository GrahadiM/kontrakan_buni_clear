@extends('layouts.compro.app')
@section('title', 'Contact Us')

@section('content')

                <div class="row">
                    <div class="col-12">   
                        <div class="card mb-5">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 mb-5 text-center">
                                        <h3>
                                            <u>Untuk lebih jelas mengenai pemesanan atau berkonsultasi mengenai kamar dan kebutuhan anda, Silahkan hubungi :</u>
                                        </h3>
                                    </div>
                                    <div class="col-lg-6 col-12">
                                        <div class="mb-4">
                                            <iframe
                                                {{-- src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.6431688334474!2d106.74134041476891!3d-6.178496495526936!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNsKwMTAnNDIuNiJTIDEwNsKwNDQnMzYuNyJF!5e0!3m2!1sid!2sid!4v1628179877659!5m2!1sid!2sid" --}}
                                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d495.8782233603187!2d106.7175279113627!3d-6.127232161782588!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6a02b18addd74d%3A0x48c87122ec0b134!2sJl.%20Trisula%20Ujung%2C%20RW.10%2C%20Tegal%20Alur%2C%20Kec.%20Kalideres%2C%20Kota%20Jakarta%20Barat%2C%20Daerah%20Khusus%20Ibukota%20Jakarta!5e0!3m2!1sid!2sid!4v1632294204251!5m2!1sid!2sid"
                                                width="500" height="280" style="border:0;" allowfullscreen="" loading="lazy">
                                            </iframe>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-12 mb-1">
                                        <h4>Email :
                                            <a href="mailto:kontrakanbuni@gmail.com" target="_blank" rel="noopener noreferrer" class="text-dark text-decoration-none">
                                                <small>{{ __('kontrakanbuni@gmail.com') }}</small>
                                            </a>
                                        </h4>
                                        <h4>WhatsApp :
                                            {{-- <a href="whatsapp://send?text=Hello&phone=+628********1">
                                                <img src="{{ asset('images/website/wa-logo.png') }}">
                                            </a> --}}
                                            <a href="https://wa.me/085767113554" target="_blank" rel="noopener noreferrer" class="text-dark text-decoration-none">
                                                <small>085767113554</small>
                                            </a>
                                        </h4>
                                        <h4>Facebook :
                                            <a href="" target="_blank" rel="noopener noreferrer" class="text-dark text-decoration-none">
                                                <small>Nama Akun</small>
                                            </a>
                                        </h4>
                                        <h4>Instagram :
                                            <a href="" target="_blank" rel="noopener noreferrer" class="text-dark text-decoration-none">
                                                <small>Nama Akun</small>
                                            </a>
                                        </h4>
                                        <h4>Alamat :
                                            <small>
                                                <u>
                                                    Jl. Joglo Raya No.21 E, RT.8/RW.3, Joglo, Kec. Kembangan, Kota Jakarta Barat, Daerah Khusus Ibukota Jakarta 11640
                                                </u>
                                            </small>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
@endsection