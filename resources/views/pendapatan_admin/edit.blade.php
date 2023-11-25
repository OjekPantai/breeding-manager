@extends('layouts.template')
@section('content')
    <!-- START FORM -->
    <form action='{{ url('pendapatan_admin/' . $data->id) }}' method='post'>
        @csrf
        @method('PUT')
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <a href="{{ url('pendapatan_admin') }}" class="btn btn-secondary">
                < Kembali</a>
                    <div class="mb-3 row">
                        <label for="tanggal" class="col-sm-2 col-form-label">Tanggal</label>
                        <div class="col-sm-10">
                            {{ $data->tanggal }}
                        </div>
                    </div>


                    <div class="mb-3 row">
                        <label for="jumlah" class="col-sm-2 col-form-label">Jumlah</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name='jumlah' value="{{ $data->jumlah }}"
                                id="jumlah">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="harga" class="col-sm-2 col-form-label">Harga</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name='harga' value="{{ $data->harga }}"
                                id="harga">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="catatan" class="col-sm-2 col-form-label">Catatan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name='catatan'
                                value="{{ $data->catatan }}"id="catatan">
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
