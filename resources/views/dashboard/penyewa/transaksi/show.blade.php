@extends('layouts.dashboard.app')
@section('title','Detail Transaksi')

@push('css')
<!-- summernote -->
<link rel="stylesheet" href="{{ asset('plugins') }}/summernote/summernote-bs4.min.css">
<!-- Select2 -->
<link rel="stylesheet" href="{{ asset('plugins') }}/select2/css/select2.min.css">
<link rel="stylesheet" href="{{ asset('plugins') }}/select2-bootstrap4-theme/select2-bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="{{ asset('plugins/dropify') }}/dist/css/dropify.min.css">
@endpush

@section('content_title','Detail Transaksi')
@section('content')

                    <div class="row">
                        <div class="col-lg">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <a href="{{ route('pembayaran.index') }}" class="btn btn-info btn-sm">
                                        <i class="fas fa-search fa-fw"></i> VIEW LIST TRANSAKSI
                                    </a>
                                    <a href="{{ route('pembayaran.edit', $transaksi->id) }}" class="btn btn-primary btn-sm">
                                        <i class="fas fa-pencil-alt fa-fw"></i> Update
                                    </a>
                                </div>
                                <div class="card-body">
                                    <form action="" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label for="sewa_id">Nama Pelanggan :</label>
                                                    <select name="sewa_id" id="sewa_id" class="custom-select">
                                                        <option value="{{ $transaksi->sewa->id }}" selected>{{ __('Nama: ').$transaksi->sewa->user->name.(', ').$transaksi->sewa->room->title }}</option>
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
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="bulan">Bulan :</label>
                                                    <select name="bulan" id="bulan" class="custom-select">
                                                        <option value="{{ $transaksi->bulan }}" selected>{{ $transaksi->bulan }}</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="tahun">Tahun :</label>
                                                    <input type="number" id="tahun" class="form-control" value="{{ $transaksi->tahun }}">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="nominal">Nominal :</label>
                                                    <input type="number" id="nominal" class="form-control" value="{{ $transaksi->nominal }}">
                                                </div>
                                                <div class="form-group">
                                                    <label>Bukti Pembayaran :</label>
                                                    <input type="file" name="bukti_pembayaran" class="dropify form-control" data-height="400" data-allowed-file-extensions="png jpg gif jpeg svg webp jfif" value="{{ old('bukti_pembayaran') }}" data-default-file="{{ asset('/images/transaksi/'.$transaksi->bukti_pembayaran) }}">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="body">Catatan :</label>
                                                    <textarea id="body" class="form-control summernote">{!! $transaksi->note !!}</textarea>
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