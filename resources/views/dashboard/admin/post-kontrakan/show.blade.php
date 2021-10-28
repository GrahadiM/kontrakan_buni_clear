@extends('layouts.dashboard.app')
@section('title','Detail Post')

@push('css')
<!-- summernote -->
<link rel="stylesheet" href="{{ asset('plugins') }}/summernote/summernote-bs4.min.css">
<!-- Select2 -->
<link rel="stylesheet" href="{{ asset('plugins') }}/select2/css/select2.min.css">
<link rel="stylesheet" href="{{ asset('plugins') }}/select2-bootstrap4-theme/select2-bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="{{ asset('plugins/dropify') }}/dist/css/dropify.min.css">
@endpush

@section('content_title','Detail Post')
@section('content')

                    <div class="row">
                        <div class="col-lg">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <a href="{{ route('posts.index') }}" class="btn btn-danger btn-sm">
                                        <i class="fas fa-times"></i>
                                        BACK TO LIST
                                    </a>
                                </div>  
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="title">Nama :</label>
                                                <input disabled type="text" required="" name="title" id="title" class="form-control" value="{{ $post->title }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="price">Harga :</label>
                                                <input disabled type="number" required="" name="price" id="price" class="form-control" value="{{ $post->price }}">
                                            </div>
                                            <div class="form-group">
                                                <label>Thumbnail :</label>
                                                <input type="file" name="thumbnail" class="dropify form-control" data-height="200" data-allowed-file-extensions="png jpg gif jpeg svg webp jfif" value="{{ old('thumbnail') }}" data-default-file="{{ asset('/images/thumbnail/'.$post->thumbnail) }}">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="body">Asset :</label>
                                                <textarea disabled name="content" required="" id="body" class="form-control summernote">{!! $post->content !!}</textarea>
                                            </div>
                                        </div>
                                    </div>
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
    $(".summernote").on("summernote.enter", function(we, e) {
        $(this).summernote("pasteHTML", "<br><br>");
        e.preventDefault();
    });
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