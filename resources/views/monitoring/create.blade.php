@extends('layouts.template')
@section('content')
    <!-- START FORM -->
    <form action='{{ url('monitoring') }}' method='post'>
        @csrf
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <a href="{{ url('monitoring') }}" class="btn btn-secondary">
                < Kembali</a>
                    <div class="mb-3 row">
                        <label for="batch" class="col-sm-2 col-form-label">Batch</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name='batch' value="{{ Session::get('batch') }}"
                                id="batch">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="jenis_pejantan" class="col-sm-2 col-form-label">Jenis Pejantan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name='jenis_pejantan'
                                value="{{ Session::get('jenis_pejantan') }}" id="jenis_pejantan">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="jenis_betina" class="col-sm-2 col-form-label">Jenis Betina</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name='jenis_betina'
                                value="{{ Session::get('jenis_betina') }}" id="jenis_betina">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="jml_hidup" class="col-sm-2 col-form-label">Jumlah Ayam Hidup</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" name='jml_hidup'
                                value="{{ Session::get('jml_hidup') }}"id="jml_hidup">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="jml_mati" class="col-sm-2 col-form-label">Jumlah Ayam Mati</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" name='jml_mati'
                                value="{{ Session::get('jml_mati') }}"id="jml_mati">
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
