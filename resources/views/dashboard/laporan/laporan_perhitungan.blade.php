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
                            <h3 class="card-title">Daftar Perhitungan Min Max</h3>
                            <br><br>

                            <div class="row">
                                <div class="form-group col-md-3">
                                    <label for="filterYear">Cari Berdasarkan Tahun</label>
                                    <input type="number" id="filterYear" class="form-control" placeholder="Filter by Year"
                                        min="2023" max="2100">
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
                            </div>

                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="tabel-perhitungan" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama User</th>
                                        <th>Nama Barang</th>
                                        <th>Tanggal Perhitungan</th>
                                        <th>id barang</th>
                                        <th>Lead Time</th>
                                        <th>Permintaan Rata-rata</th>
                                        <th>Permintaan Maximal</th>
                                        <th>Safety Stock</th>
                                        <th>Min</th>
                                        <th>Max</th>
                                        <th>Order Quantity</th>
                                    </tr>
                                </thead>

                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama User</th>
                                        <th>Nama Barang</th>
                                        <th>Tanggal Perhitungan</th>
                                        <th>id barang</th>
                                        <th>Lead Time</th>
                                        <th>Permintaan Rata-rata</th>
                                        <th>Permintaan Maximal</th>
                                        <th>Safety Stock</th>
                                        <th>Min</th>
                                        <th>Max</th>
                                        <th>Order Quantity</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script>
        $('#barang').select2({
            placeholder: "Pilih sebuah opsi",
            allowClear: true
        });

        //Initialize Datatables Elements
        var table = $('#tabel-perhitungan').DataTable({
            ajax: "{!! route('index-laporan-perhitungan') !!}",
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
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'nama_barang',
                    name: 'nama_barang'
                },
                {
                    data: 'tgl_perhitungan',
                    name: 'tgl_perhitungan'
                },
                {
                    data: 'id_barang',
                    name: 'id_barang',
                    visible: false
                },
                {
                    data: 'leadtime',
                    name: 'leadtime'
                },
                {
                    data: 'permintaan_rata',
                    name: 'permintaan_rata'
                },
                {
                    data: 'permintaan_max',
                    name: 'permintaan_max'
                },
                {
                    data: 'safety_stock',
                    name: 'safety_stock'
                },
                {
                    data: 'min',
                    name: 'min'
                },
                {
                    data: 'max',
                    name: 'max'
                },
                {
                    data: 'order_quantity',
                    name: 'order_quantity'
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

        function applyFilter() {
            var selectedYear = $('#filterYear').val(); // Dapatkan nilai dari input tahun
            var barang = $('#barang').val(); // Dapatkan nilai dari input ID

            // Terapkan filter berdasarkan bulan dan ID
            table
                .columns(3).search(selectedYear) // Filter berdasarkan tanggal keluar (kolom ke-4)
                .columns(4).search(barang) // Filter berdasarkan ID Barang
                .draw();
        }

        // Event listener untuk filter tahun
        $('#filterYear').on('keyup change', function() {
            applyFilter();
        });

        $('#barang').on('change', function() {
            applyFilter();
        });
    </script>
@endsection
