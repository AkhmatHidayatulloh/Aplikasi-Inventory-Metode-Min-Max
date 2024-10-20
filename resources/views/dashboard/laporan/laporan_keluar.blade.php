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
                            <h3 class="card-title">Data Transaksi Keluar</h3>
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
                                        <select class="select2" name="id_barang" id="barang"
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
                                    <label>Pilih Customer</label>
                                    <div class="select2-purple">
                                        <select class="select2" name="id_customer" id="customer"
                                            data-placeholder="Pilih Customer" data-dropdown-css-class="select2-purple"
                                            style="width: 100%;">
                                            <option value=" ">Semua Data</option>
                                            @foreach ($customer as $item)
                                                <option value="{{ $item->id }}">{{ $item->nama_customer }}</option>
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
                                        <th>No</th>
                                        <th>Nama customer</th>
                                        <th>Nama Barang</th>
                                        <th>Tanggal Keluar</th>
                                        <th>Id Barang</th>
                                        <th>Id customer</th>
                                        <th>Jumlah Barang Keluar</th>
                                        <th>Stok Awal Keluar</th>
                                        <th>Stok Akhir Keluar</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>

                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama customer</th>
                                        <th>Nama Barang</th>
                                        <th>Tanggal Keluar</th>
                                        <th>Id Barang</th>
                                        <th>Id customer</th>
                                        <th>Jumlah Barang Keluar</th>
                                        <th>Stok Awal Keluar</th>
                                        <th>Stok Akhir Keluar</th>
                                        <th>Status</th>
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
            $('#example2').DataTable();

            $('.select2').select2();

        });


        var table = $('#example2').DataTable({
            ajax: "{!! route('index-laporan-keluar') !!}",
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
                    data: 'nama_customer',
                    name: 'nama_customer'
                },
                {
                    data: 'nama_barang',
                    name: 'nama_barang'
                },
                {
                    data: 'tanggal_keluar',
                    name: 'tanggal_keluar'
                },
                {
                    data: 'id_barang',
                    name: 'id_barang',
                    visible: false
                },
                {
                    data: 'id_customer',
                    name: 'id_customer',
                    visible: false
                },
                {
                    data: 'jumlah_barang_keluar',
                    name: 'jumlah_barang_keluar'
                },
                {
                    data: 'stok_awal_keluar',
                    name: 'stok_awal_keluar'
                },
                {
                    data: 'stok_akhir_keluar',
                    name: 'stok_akhir_keluar'
                },
                {
                    data: 'status',
                    name: 'status'
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
            var customer = $('#customer').val();

            // Terapkan filter berdasarkan bulan dan ID
            table
                .columns(3).search(selectedMonth) // Filter berdasarkan tanggal keluar (kolom ke-4)
                .columns(4).search(barang) // Filter berdasarkan ID Barang
                .columns(5).search(customer) // Filter berdasarkan ID custonmer
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

        $('#customer').on('change', function() {
            applyFilter();
        });
    </script>
@endsection
