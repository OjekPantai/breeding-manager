@extends('layouts.main')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Monitoring</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Monitoring</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="my-3 p-3 bg-body rounded shadow-sm">
                    <!-- FORM PENCARIAN -->
                    <div class="pb-3">
                        <form class="d-flex" action="{{ url('monitoring') }}" method="get">
                            <input class="form-control me-1" type="search" name="katakunci"
                                value="{{ Request::get('katakunci') }}" placeholder="Masukkan kata kunci"
                                aria-label="Search">
                            <button class="btn btn-secondary" type="submit">Cari</button>
                        </form>
                    </div>

                    <!-- TOMBOL TAMBAH DATA -->
                    <div class="pb-3">
                        <a href='{{ url('monitoring/create') }}' class="btn btn-primary">+ Tambah Data</a>
                    </div>

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th class="col-md-1">Batch</th>
                                <th class="col-md-2">Jenis Pejantan</th>
                                <th class="col-md-1">Jenis Betina</th>
                                <th class="col-md-2">Jumlah Ayam Hidup</th>
                                <th class="col-md-3">Jumlah Ayam Mati</th>
                                <th class="col-md-2"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = $data->firstItem(); ?>
                            @foreach ($data as $item)
                                <tr>
                                    {{-- <td> {{ $i }}</td> --}}
                                    <td>{{ $item->batch }}</td>
                                    <td>{{ $item->jenis_pejantan }}</td>
                                    <td>{{ $item->jenis_betina }}</td>
                                    <td>{{ $item->jml_hidup }}</td>
                                    <td>{{ $item->jml_mati }}</td>
                                    <td>
                                        <a href='{{ url('monitoring/' . $item->id . '/edit') }}'
                                            class="btn btn-warning btn-sm">Edit</a>
                                        <form onsubmit="return confirm('Yakin akan menghapus data?')" class="d-inline"
                                            action="{{ url('monitoring/' . $item->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Del</button>
                                        </form>
                                    </td>
                                </tr>
                                <?php $i++; ?>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $data->withQueryString()->links() }}

                </div>
                <!-- /.row (main row) -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
