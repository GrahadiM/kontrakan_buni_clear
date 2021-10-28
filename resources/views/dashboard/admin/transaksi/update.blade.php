@extends('layouts.dashboard.app')
@section('title','Update Transaksi')

@push('css')
<!-- summernote -->
<link rel="stylesheet" href="{{ asset('plugins') }}/summernote/summernote-bs4.min.css">
<!-- Select2 -->
<link rel="stylesheet" href="{{ asset('plugins') }}/select2/css/select2.min.css">
<link rel="stylesheet" href="{{ asset('plugins') }}/select2-bootstrap4-theme/select2-bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="{{ asset('plugins/dropify') }}/dist/css/dropify.min.css">
@endpush

@section('content_title','Update Transaksi')
@section('content')

                    <div class="row">
                        <div class="col-lg">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <a href="{{ route('transaksi.index') }}" class="btn btn-info btn-sm">
                                        <i class="fas fa-search fa-fw"></i>
                                        VIEW LIST TRANSAKSI
                                    </a>
                                </div>  
                                <div class="card-body">
                                    <form action="{{ route('transaksi.update', $transaksi->id) }}" method="post" enctype="multipart/form-data">
                                        @method('PUT')
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label for="sewa_id">Nama Pelanggan :</label>
                                                    <select name="sewa_id" required="" id="sewa_id" class="custom-select">
                                                        <option value="{{ $transaksi->sewa->id }}">{{ __('Nama: ').$transaksi->sewa->user->name.(', ').$transaksi->sewa->room->title }}</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="status">Status :</label>
                                                    <select name="status" id="status" class="custom-select">
                                                        <option value="{{ $transaksi->status }}" selected>
                                                            @if ($transaksi->status == 'BB')
                                                                {{ __('Belum Bayar') }}
                                                            @elseif ($transaksi->status == 'SB')
                                                                {{ __('Sudah Bayar') }}
                                                            @else
                                                                {{ __('Tidak diketahui') }}
                                                            @endif
                                                        </option>
                                                        <option value="BB">Belum Bayar</option>
                                                        <option value="SB">Sudah Bayar</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="bulan">Bulan :</label>
                                                    <select name="bulan" id="bulan" class="custom-select">
                                                        <option value="{{ $transaksi->bulan }}" selected>{{ $transaksi->bulan }}</option>
                                                        <option value="Januari">Januari</option>
                                                        <option value="Februari">Februari</option>
                                                        <option value="Maret">Maret</option>
                                                        <option value="April">April</option>
                                                        <option value="Mei">Mei</option>
                                                        <option value="Juni">Juni</option>
                                                        <option value="Juli">Juli</option>
                                                        <option value="Agustus">Agustus</option>
                                                        <option value="September">September</option>
                                                        <option value="Oktober">Oktober</option>
                                                        <option value="November">November</option>
                                                        <option value="Desember">Desember</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="tahun">Tahun :</label>
                                                    <input type="number" name="tahun" required="" id="tahun" class="form-control" value="{{ $transaksi->tahun }}">
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label for="body">Catatan :</label>
                                                    <textarea name="note" required="" id="body" class="form-control summernote">{!! $transaksi->note !!}</textarea>
                                                </div>
                                                <div class="form-group mt-5">
                                                    <button type="submit" class="btn btn-primary"><i class="fas fa-save fa-fw"></i> UPLOAD</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

@endsection

@push('js')
<!-- summernote -->
<script src="{{ asset('plugins') }}/summernote/summernote-bs4.min.js"></script>
<!-- Select2 -->
<script src="{{ asset('plugins') }}/select2/js/select2.full.min.js"></script>
<script type="text/javascript" src="{{ asset('plugins/dropify') }}/dist/js/dropify.min.js"></script>
<script type="text/javascript">
    $(".summernote").summernote({
        height:400,
        callbacks: {
        // callback for pasting text only (no formatting)
            onPaste: function (e) {
              var bufferText = ((e.originalEvent || e).clipboardData || window.clipboardData).getData('Text');
              e.preventDefault();
              bufferText = bufferText.replace(/\r?\n/g, '<br>');
              document.execCommand('insertHtml', false, bufferText);
            }
        }
    })
    // $(".summernote").on("summernote.enter", function(we, e) {
    //     $(this).summernote("pasteHTML", "<br><br>");
    //     e.preventDefault();
    // });
    //Initialize Select2 Elements
    $('.select2').select2()
    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
    $('.dropify').dropify({
        messages: {
            default: 'Pilih Gambar',
            replace: 'Ganti',
            remove:  'Hapus',
            error:   'error'
        }
    });
    $('.title').keyup(function(){
        var title = $(this).val().toLowerCase().replace(/[&\/\\#^, +()$~%.'":*?<>{}]/g,'-');
        $('.slug').val(title);
    });
</script>
@endpush