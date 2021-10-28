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
                                    <a href="{{ route('pembayaran.index') }}" class="btn btn-info btn-sm">
                                        <i class="fas fa-search fa-fw"></i>
                                        VIEW LIST TRANSAKSI
                                    </a>
                                </div>  
                                <div class="card-body">
                                    <form action="{{ route('pembayaran.update', $transaksi->id) }}" method="POST" enctype="multipart/form-data">
                                        @method('PUT')
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="nominal">Nominal :</label>
                                                    <input type="number" name="nominal" id="nominal" class="form-control" value="{{ $transaksi->nominal }}">
                                                </div>
                                                <div class="form-group">
                                                    <label>Bukti Pembayaran :</label>
                                                    <input type="file" name="bukti_pembayaran" class="dropify form-control" data-height="400" data-allowed-file-extensions="png jpg gif jpeg svg webp jfif" value="{{ old('bukti_pembayaran') }}" data-default-file="{{ asset('/images/transaksi/'.$transaksi->bukti_pembayaran) }}">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
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