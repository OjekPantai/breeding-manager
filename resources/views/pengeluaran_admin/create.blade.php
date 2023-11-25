@extends('layouts.template')
@section('content')
    <!-- START FORM -->
    <form action='{{ url('pengeluaran_admin') }}' method='post'>
        @csrf
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <a href="{{ url('pengeluaran_admin') }}" class="btn btn-secondary">
                < Kembali</a>
                    <div class="mb-3 row">
                        <label for="harga" class="col-sm-2 col-form-label">Harga</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name='harga' value="{{ Session::get('harga') }}"
                                id="harga">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="jenis" class="col-sm-2 col-form-label">Jenis</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name='jenis' value="{{ Session::get('jenis') }}"
                                id="jenis">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="catatan" class="col-sm-2 col-form-label">Catatan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name='catatan' value="{{ Session::get('catatan') }}"
                                id="catatan">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="mitra" class="col-sm-2 col-form-label">Mitra</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name='mitra'
                                value="{{ Session::get('mitra') }}"id="mitra">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="action" class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button>
                        </div>
                    </div>
        </div>
    </form>

    <!-- AKHIR FORM -->
@endsection
