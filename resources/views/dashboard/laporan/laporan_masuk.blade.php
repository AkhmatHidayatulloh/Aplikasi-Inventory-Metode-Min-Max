@extends('dashboard.layouts.app')

@section('title')
    {{ $title }}
@endsection

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">


                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Data Transaksi Masuk</h3>
                            <br><br>
                            <div class="row">

                                <div class="form-group col-md-3">
                                    <label for="exampleInputEmail1">Cari Berdasarkan Bulan</label>
                                    <input type="month" id="filterMonth" class="form-control"
                                        placeholder="Filter by Month">
                                </div>

                                <div class="form-group col-md-3">
                                    <label>Pilih Barang</label>
                                    <div class="select2-purple">
                                        <select class="select2" name="barang" id="barang"
                                            data-placeholder="Pilih Barang" data-dropdown-css-class="select2-purple"
                                            style="width: 100%;">
                                            <option value=" ">Semua Data</option>
                                            @foreach ($barang as $item)
                                                <option value="{{ $item->id }}">{{ $item->nama_barang }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group col-md-3">
                                    <label>Pilih Supplier</label>
                                    <div class="select2-purple">
                                        <select class="form-control select2" name="supplier" id="supplier"
                                            data-placeholder="Pilih Supplier" data-dropdown-css-class="select2-purple">
                                            <option value=" ">Semua Data</option>
                                            @foreach ($supplier as $item)
                                                <option value="{{ $item->id }}">{{ $item->nama_supplier }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                            </div>
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
                                        <th>Id Supplier</th>
                                        <th>Id barang</th>
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
                                        <th>Id Supplier</th>
                                        <th>Id barang</th>
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

        var table = $('#example2').DataTable({
            ajax: "{!! route('index-laporan-masuk') !!}",
            autoWidth: false,
            responsive: true,
            processing: true,
            serverSide: true, // Ubah ke false untuk memuat semua data sekaligus
            paging: false, // Matikan paginasi
            info: true,
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
                    data: 'id_supplier',
                    name: 'id_supplier',
                    // visible: false
                },
                {
                    data: 'id_barang',
                    name: 'id_barang',
                    // visible: false
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
            ],
            dom: 'Bfrtip', // Menambahkan tombol export
            buttons: [{
                    extend: 'print',
                    text: 'Print',
                    exportOptions: {
                        modifier: {
                            search: 'none'
                        }
                    }
                },
                {
                    extend: 'excel',
                    text: 'Excel',
                    exportOptions: {
                        modifier: {
                            search: 'none'
                        }
                    }
                },
                {
                    extend: 'pdf',
                    text: 'PDF',
                    exportOptions: {
                        modifier: {
                            search: 'none'
                        }
                    }
                }
            ]
        });

        // Fungsi untuk menerapkan multi-filter
        function applyFilter() {
            var selectedMonth = $('#filterMonth').val(); // Dapatkan nilai dari input bulan
            var barang = $('#barang').val(); // Dapatkan nilai dari input ID
            var supplier = $('#supplier').val();

            // Terapkan filter berdasarkan bulan dan ID
            table
                .columns(3).search(selectedMonth) // Filter berdasarkan tanggal keluar (kolom ke-4)
                .columns(5).search(barang) // Filter berdasarkan ID Barang
                .columns(4).search(supplier) // Filter berdasarkan ID custonmer
                .draw();
        }

        // Event listener untuk filter bulan
        $('#filterMonth').on('change', function() {
            applyFilter();
        });

        // Event listener untuk filter ID
        $('#barang').on('change', function() {
            applyFilter();
        });

        $('#supplier').on('change', function() {
            applyFilter();
        });
    </script>
@endsection
