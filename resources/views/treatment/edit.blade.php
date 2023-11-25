@extends('layouts.template')
@section('content')
    <!-- START FORM -->
    <form action='{{ url('treatment/' . $data->id) }}' method='post'>
        @csrf
        @method('PUT')
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <a href="{{ url('treatment') }}" class="btn btn-secondary">
                < Kembali</a>
                    <div class="mb-3 row">
                        <label for="batch" class="col-sm-2 col-form-label">Batch</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name='batch' value="{{ $data->batch }}"
                                id="batch">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="jenis_vaksinvitamin" class="col-sm-2 col-form-label">Jenis Vaksin & Vitamin</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name='jenis_vaksinvitamin'
                                value="{{ $data->jenis_vaksinvitamin }}" id="jenis_vaksinvitamin">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="umur" class="col-sm-2 col-form-label">Umur (Bulan)</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" name='umur' value="{{ $data->umur }}"
                                id="umur">
                        </div>

                    </div>

                    <div class="mb-3 row">
                        <label for="jml_ayam" class="col-sm-2 col-form-label">Jumlah Ayam</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" name='jml_ayam'
                                value="{{ $data->jml_ayam }}"id="jml_ayam">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="tanggal" class="col-sm-2 col-form-label">Tanggal</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" name='tanggal'
                                value="{{ $data->tanggal }}"id="tanggal">
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
