@extends('layouts.dashboard.app')
@section('title','Create Laporan')

@push('css')
<!-- summernote -->
<link rel="stylesheet" href="{{ asset('plugins') }}/summernote/summernote-bs4.min.css">
<!-- Select2 -->
<link rel="stylesheet" href="{{ asset('plugins') }}/select2/css/select2.min.css">
<link rel="stylesheet" href="{{ asset('plugins') }}/select2-bootstrap4-theme/select2-bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="{{ asset('plugins/dropify') }}/dist/css/dropify.min.css">
@endpush

@section('content_title','Create Laporan')
@section('content')

                    <div class="row">
                        <div class="col-lg">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <a href="{{ route('laporan.index') }}" class="btn btn-info btn-sm">
                                        <i class="fas fa-search fa-fw"></i>
                                        VIEW LIST LAPORAN
                                    </a>
                                </div>  
                                <div class="card-body">
                                    <form action="{{ route('laporan.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="sewa_id">Nama Pelanggan :</label>
                                                    <select name="sewa_id" id="sewa_id" class="custom-select">
                                                        <option value="" selected disabled>Pilih Salah Satu</option>
                                                        @foreach ($sewas as $sewa)
                                                        <option value="{{ $sewa->id }}">{{ __('Nama: ').$sewa->user->name.(', ').$sewa->room->title }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Bukti Laporan :</label>
                                                    <input type="file" name="bukti_laporan" class="dropify form-control" data-height="500" data-allowed-file-extensions="png jpg gif jpeg svg webp jfif">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="status">Status Laporan :</label>
                                                    <select name="status" id="status" class="custom-select">
                                                        <option value="" selected disabled>Pilih Salah Satu</option>
                                                        <option value="B">
                                                            {{ __('Belum Selesai') }}
                                                        </option>
                                                        <option value="S">
                                                            {{ __('Sudah Selesai') }}
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="body">Catatan :</label>
                                                    <textarea name="keluhan" id="body" class="form-control summernote"></textarea>
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