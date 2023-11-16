@extends('layouts.template')
@section('content')
    <!-- START FORM -->
    <form action='{{ url('pengeluaran') }}' method='post'>
        @csrf
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <a href="{{ url('pengeluaran') }}" class="btn btn-secondary">
                < Kembali</a>
                    <div class="mb-3 row">
                        <label for="tanggal" class="col-sm-2 col-form-label">Tanggal</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" name='tanggal' value="{{ Session::get('tanggal') }}"
                                id="tanggal">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="harga_pakan" class="col-sm-2 col-form-label">Harga Pakan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name='harga_pakan'
                                value="{{ Session::get('harga_pakan') }}" id="harga_pakan">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="catatan" class="col-sm-2 col-form-label">Catatan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name='catatan'
                                value="{{ Session::get('catatan') }}"id="catatan">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="jurusan" class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button>
                        </div>
                    </div>
        </div>
    </form>

    <!-- AKHIR FORM -->
@endsection
