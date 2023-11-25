@extends('layouts.main')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Pengeluaran Owner</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Pengeluaran Owner</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header border-0">
                        <div class="my-2 p-0 bg-body">
                            <!-- FORM PENCARIAN -->
                            <div class="pb-3">
                                <form class="d-flex" action="{{ url('pengeluaran_admin') }}" method="get">
                                    <input class="form-control me-1" type="search" name="katakunci"
                                        value="{{ Request::get('katakunci') }}" placeholder="Masukkan kata kunci"
                                        aria-label="Search">
                                    <button class="btn btn-secondary" type="submit">Cari</button>
                                </form>
                            </div>

                            <!-- TOMBOL TAMBAH DATA -->
                            <div class="pb-3">
                                <a href='{{ url('pengeluaran_admin/create') }}' class="btn btn-primary">+ Tambah Data</a>
                            </div>

                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th class="col-md-1">No</th>
                                        <th class="col-md-2">Harga</th>
                                        <th class="col-md-1">Jenis</th>
                                        <th class="col-md-2">Catatan</th>
                                        <th class="col-md-3">Mitra</th>
                                        <th class="col-md-2"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = $data->firstItem(); ?>
                                    @foreach ($data as $item)
                                        <tr>
                                            <td> {{ $i }}</td>
                                            <td>{{ $item->harga }}</td>
                                            <td>{{ $item->jenis }}</td>
                                            <td>{{ $item->catatan }}</td>
                                            <td>{{ $item->mitra }}</td>
                                            <td>
                                                <a href='{{ url('pengeluaran_admin/' . $item->id . '/edit') }}'
                                                    class="btn btn-warning btn-sm">Edit</a>
                                                <form onsubmit="return confirm('Yakin akan menghapus data?')"
                                                    class="d-inline" action="{{ url('pengeluaran_admin/' . $item->id) }}"
                                                    method="post">
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
                    </div>
                </div>
                <!-- /.row (main row) -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
