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
                        <div class="col-md-6">
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
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Tanggal Perhitungan</label>
                                                <input type="date" class="form-control" id=""
                                                    name="tgl_perhitungan" placeholder="" required>
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

                        <div class="col-md-6">
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
                                                    <td>{{ session('hasil')['safetystock'] ?? '0' }}</td>
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
                        </div>
                    </div>



                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Daftar Perhitungan Min Max</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal Perhitungan</th>
                                        <th>Alamat Supplier</th>
                                        <th>Kota Supplier</th>
                                        <th>Email Supplier</th>
                                        <th>No HP Supplier</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp

                                    <tr>
                                        <td>{{ $no }}</td>

                                    </tr>
                                    @php
                                        $no++;
                                    @endphp

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Supplier</th>
                                        <th>Alamat Supplier</th>
                                        <th>Kota Supplier</th>
                                        <th>Email Supplier</th>
                                        <th>No HP Supplier</th>
                                        <th>Action</th>
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
        $(function() {
            $('#example2').DataTable();
        });

        $('#barang').select2({
            placeholder: "Pilih sebuah opsi",
            allowClear: true
        });
    </script>
@endsection
