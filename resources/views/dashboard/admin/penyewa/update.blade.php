@extends('layouts.dashboard.app')
@section('title','Status Penyewa')

@push('css')
<!-- summernote -->
<link rel="stylesheet" href="{{ asset('plugins') }}/summernote/summernote-bs4.min.css">
<!-- Select2 -->
<link rel="stylesheet" href="{{ asset('plugins') }}/select2/css/select2.min.css">
<link rel="stylesheet" href="{{ asset('plugins') }}/select2-bootstrap4-theme/select2-bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="{{ asset('plugins/dropify') }}/dist/css/dropify.min.css">
@endpush

@section('content_title','Status Penyewa')
@section('content')

                    <div class="row">
                        <div class="col-lg">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <a href="{{ route('penyewa.index') }}" class="btn btn-info btn-sm">
                                        <i class="fas fa-search fa-fw"></i> VIEW LIST PENYEWA
                                    </a>
                                    <a href="{{ route('penyewa.show', $sewa->id) }}" class="btn btn-primary btn-sm">
                                        <i class="fas fa-search fa-fw"></i> Detail
                                    </a>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('penyewa.update', $sewa->id) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="user_id">Nama Pelanggan :</label>
                                                    <select name="user_id" id="user_id" class="custom-select">
                                                        <option value="{{ $sewa->user->id }}" selected>{{ $sewa->user->name }}</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="room_id">Nama Kamar :</label>
                                                    <select name="room_id" id="room_id" class="custom-select">
                                                        <option value="{{ $sewa->room->id }}" selected>{{ $sewa->room->title }}</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <div class="form-group">
                                                    <label for="status1">Status Penyewa :</label>
                                                    <select name="status1" id="status1" class="custom-select">
                                                        <option value="{{ $sewa->user->status }}" selected>{{ $sewa->user->status }}</option>
                                                        @if ($sewa->user->status == 'active')
                                                        <option value="pending">pending</option>
                                                        @elseif ($sewa->user->status == 'pending')
                                                        <option value="active">active</option>
                                                        @else
                                                        <option value="pending">pending</option>
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <div class="form-group">
                                                    <label for="status2">Status Kamar :</label>
                                                    <select name="status2" id="status2" class="custom-select">
                                                        <option value="{{ $sewa->room->status }}" selected>{{ $sewa->room->status }}</option>
                                                        @if ($sewa->room->status == 'isi')
                                                        <option value="kosong">kosong</option>
                                                        @elseif ($sewa->room->status == 'kosong')
                                                        <option value="isi">isi</option>
                                                        @else
                                                        <option value="kosong">kosong</option>
                                                        @endif
                                                    </select>
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