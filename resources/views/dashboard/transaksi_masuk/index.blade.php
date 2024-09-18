@extends('dashboard.layouts.app')

@section('title')
    {{ $title }}
@endsection

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">

                    <!-- general form elements -->
                    <form action="{{ route('transaksi_masuk.store') }}" method="POST">
                        @csrf
                        <div class="card">
                            <div class="card card-primary">

                                <div class="card-header">
                                    <h3 class="card-title">Form Produk Masuk</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->

                                <div class="card-body">

                                    <div class="form-group">
                                        <label>Pilih Supplier</label>
                                        <div class="select2-purple">
                                            <select class="form-control select2" name="id_supplier"
                                                data-placeholder="Pilih Supplier" data-dropdown-css-class="select2-purple">
                                                @foreach ($supplier as $item)
                                                    <option value="{{ $item->id }}">{{ $item->nama_supplier }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Pilih Barang</label>
                                        <div class="select2-purple">
                                            <select class="select2" name="id_barang" data-placeholder="Pilih Barang"
                                                data-dropdown-css-class="select2-purple" style="width: 100%;">
                                                @foreach ($barang as $item)
                                                    <option value="{{ $item->id }}">{{ $item->nama_barang }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Jumlah Brang Masuk</label>
                                        <input type="number" class="form-control" min="0" name="jumlah_masuk"
                                            placeholder="Jumlah Brang Masuk" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Tanggal Barang Masuk</label>
                                        <input type="date" class="form-control" id="" name="tanggal_masuk"
                                            placeholder="Tanggal Barang Masuk" required>
                                    </div>

                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>

                            </div>
                        </div>
                    </form>

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Data Transaksi Masuk</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>No </th>
                                        <th>Nama Supplier</th>
                                        <th>Nama Barang</th>
                                        <th>Tanggal Masuk</th>
                                        <th>Jumlah Barang Masuk</th>
                                        <th>Stok Awal Masuk</th>
                                        <th>Stok Akhir Masuk</th>
                                    </tr>
                                </thead>

                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Supplier</th>
                                        <th>Nama Barang</th>
                                        <th>Tanggal Masuk</th>
                                        <th>Jumlah Barang Masuk</th>
                                        <th>Stok Awal Masuk</th>
                                        <th>Stok Akhir Masuk</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>

                </div>
            </div>
    </section>
@endsection

@section('script')
    <script>
        $(function() {

            $('.select2').select2();

        });

        $('#example2').DataTable({
            ajax: "{!! route('transaksi_masuk.index') !!}",
            autoWidth: false,
            responsive: true,
            processing: true,
            serverSide: true,
            lengthChange: false,
            language: {
                url: '//cdn.datatables.net/plug-ins/1.10.25/i18n/Indonesian.json'
            },
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'nama_supplier',
                    name: 'nama_supplier'
                },
                {
                    data: 'nama_barang',
                    name: 'nama_barang'
                },
                {
                    data: 'tanggal_masuk',
                    name: 'tanggal_masuk'
                },
                {
                    data: 'jumlah_barang_masuk',
                    name: 'jumlah_barang_masuk'
                },
                {
                    data: 'stok_awal_masuk',
                    name: 'stok_awal_masuk'
                },
                {
                    data: 'stok_akhir_masuk',
                    name: 'stok_akhir_masuk',
                },
            ]
        });
    </script>
@endsection
