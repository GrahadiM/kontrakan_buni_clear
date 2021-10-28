@extends('layouts.dashboard.app')
@section('title','Detail Penyewa')

@push('css')
<!-- summernote -->
<link rel="stylesheet" href="{{ asset('plugins') }}/summernote/summernote-bs4.min.css">
<!-- Select2 -->
<link rel="stylesheet" href="{{ asset('plugins') }}/select2/css/select2.min.css">
<link rel="stylesheet" href="{{ asset('plugins') }}/select2-bootstrap4-theme/select2-bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="{{ asset('plugins/dropify') }}/dist/css/dropify.min.css">
@endpush

@section('content_title','Detail Penyewa')
@section('content')

                    <div class="row">
                        <div class="col-lg">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <a href="{{ route('penyewa.index') }}" class="btn btn-info btn-sm">
                                        <i class="fas fa-search fa-fw"></i> VIEW LIST PENYEWA
                                    </a>
                                    <a href="{{ route('penyewa.edit', $sewa->id) }}" class="btn btn-primary btn-sm">
                                        <i class="fas fa-pencil-alt fa-fw"></i> Update
                                    </a>
                                </div>
                                <div class="card-body">
                                    <form action="" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="user_id">Nama Pelanggan :</label>
                                                    <select name="user_id" id="user_id" class="custom-select">
                                                        <option value="{{ $sewa->user->id }}" selected>{{ $sewa->user->name }}</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="room_id">Nama Kamar :</label>
                                                    <select name="room_id" id="room_id" class="custom-select">
                                                        <option value="{{ $sewa->room->id }}" selected>{{ $sewa->room->title }}</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="status">Status :</label>
                                                    <select name="status" id="status" class="custom-select">
                                                        <option value="{{ $sewa->user->status }}" selected>
                                                            @if ($sewa->user->status == 'active')
                                                                {{ __('Active') }}
                                                            @elseif ($sewa->user->status == 'pending')
                                                                {{ __('Pending') }}
                                                            @else
                                                                {{ __('Tidak ada Pesanan') }}
                                                            @endif
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="nik">Nomer Induk Keluarga :</label>
                                                    <input type="number" id="nik" class="form-control" value="{{ $sewa->nik }}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="total_family">Total Keluarga :</label>
                                                    <input type="number" id="total_family" class="form-control" value="{{ $sewa->total_family }}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="rental_date">Tanggal Pesanan :</label>
                                                    <select name="rental_date" id="rental_date" class="custom-select">
                                                        <option value="{{ $sewa->rental_date }}" selected>{{ \Carbon\Carbon::parse($sewa->rental_date)->format('l, j F Y') }}</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Thumbnail :</label>
                                                    <input type="file" name="thumbnail" class="dropify form-control" data-height="450" data-allowed-file-extensions="png jpg gif jpeg svg webp jfif" value="{{ old('thumbnail') }}" data-default-file="{{ asset('/images/thumbnail/'.$sewa->room->thumbnail) }}">
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