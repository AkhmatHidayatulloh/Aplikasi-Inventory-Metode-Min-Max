@extends('dashboard.layouts.app')
@section('title')
    {{ $title }}
@endsection
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">

                    <div class="row">
                        <div class="col-md-12">
                            <!-- general form elements -->
                            <form action="{{ route('perhitungan.store') }}" method="POST">
                                @csrf
                                <div class="card">
                                    <div class="card card-primary">

                                        <div class="card-header d-flex justify-content-center">
                                            <h3 class="card-title">Form Tambah Supplier</h3>
                                        </div>
                                        <!-- /.card-header -->
                                        <!-- form start -->

                                        <div class="card-body">
                                            <div class="form-group">
                                                <label>Pilih Barang</label>
                                                <div class="select2-purple">
                                                    <select class="select2" name="id_barang" id="barang"
                                                        data-placeholder="Pilih Barang"
                                                        data-dropdown-css-class="select2-purple" style="width: 100%;">
                                                        @foreach ($barang as $item)
                                                            <option value="{{ $item->id }}">{{ $item->nama_barang }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            {{-- <div class="form-group">
                                                <label for="exampleInputPassword1">Tanggal Perhitungan</label>
                                                <input type="date" class="form-control" id=""
                                                    name="tgl_perhitungan" placeholder="" required>
                                            </div> --}}

                                            <!-- Date -->
                                            <div class="form-group">
                                                <label>Pilih Tahun Perhitungan:</label>
                                                <div class="input-group date" id="reservationdate"
                                                    data-target-input="nearest">
                                                    <input type="text" name="tgl_perhitungan"
                                                        class="form-control datetimepicker-input"
                                                        data-target="#reservationdate" />
                                                    <div class="input-group-append" data-target="#reservationdate"
                                                        data-toggle="datetimepicker">
                                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <!-- /.card-body -->

                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>

                                    </div>
                                </div>
                            </form>
                        </div>

                        {{-- <div class="col-md-6">
                            <div class="card">
                                <div class="card card-primary">

                                    <div class="card-header d-flex justify-content-center">
                                        <h3 class="card-title">Hasil Perhitungan {{ session('hasil')['nama_barang'] ?? '' }}
                                        </h3>
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-bordered table-hover ">
                                            <thead class="bg-gray-dark">
                                                <tr>
                                                    <th>Permintaan Rata-rata</th>
                                                    <th>Permintaan Max</th>
                                                    <th>Lead Time</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>{{ session('hasil')['permintaan_rata'] ?? '0' }}</td>
                                                    <td>{{ session('hasil')['permintaan_max'] ?? '0' }}</td>
                                                    <td>{{ session('hasil')['leadtime'] ?? '0' }}</td>
                                                </tr>
                                            </tbody>
                                            <thead class="bg-gray">
                                                <tr>
                                                    <th>Perhitungan Min</th>
                                                    <th>Perhitungan Max</th>
                                                    <th>Safety Stock</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>{{ session('hasil')['min'] ?? '0' }}</td>
                                                    <td>{{ session('hasil')['max'] ?? '0' }}</td>
                                                    <td>{{ session('hasil')['safety_stock'] ?? '0' }}</td>
                                                </tr>
                                            </tbody>
                                            <thead class="bg-olive">
                                                <tr>
                                                    <th colspan="3">Orader Quantity</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td colspan="3">{{ session('hasil')['order'] ?? '0' }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                    </div>



                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Daftar Perhitungan Min Max</h3>
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

        $(function() {
            //Date picker
            $('#reservationdate').datetimepicker({
                format: 'YYYY',
                viewMode: 'years',
                minViewMode: 'years'
            });

            //Initialize Datatables Elements
            $('#tabel-perhitungan').DataTable({
                ajax: "{!! route('perhitungan.index') !!}",
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
                ]
            });
        });
    </script>
@endsection
