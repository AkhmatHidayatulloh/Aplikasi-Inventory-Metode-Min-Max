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
                    <form action="{{ route('barang.store') }}" method="POST">
                        @csrf
                        <div class="card">
                            <div class="card card-primary">

                                <div class="card-header">
                                    <h3 class="card-title">Form Tambah barang</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->

                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputbahan1">Nama barang</label>
                                        <input type="text" class="form-control" id="" name="nama_barang"
                                            placeholder="Nama barang" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">satuan barang</label>
                                        <input type="text" class="form-control" id="" name="satuan_barang"
                                            placeholder="Satuan barang" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">ukuran barang</label>
                                        <input type="text" class="form-control" id="" name="ukuran_barang"
                                            placeholder="Ukuran barang" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">bahan barang</label>
                                        <input type="bahan" class="form-control" id="" name="bahan_barang"
                                            placeholder="Bahan barang" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">stok barang</label>
                                        <input type="text" class="form-control" id="stok" name="stok_barang"
                                            placeholder="Stok barang" required>
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
                            <h3 class="card-title">Daftar Barang</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Nama Barang</th>
                                        <th>Satuan Barang</th>
                                        <th>Ukuran Barang</th>
                                        <th>Bahan Barang</th>
                                        <th>Stok Barang</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($barang as $data)
                                        <tr>
                                            <td>{{ $data->nama_barang }}</td>
                                            <td>{{ $data->satuan_barang }}</td>
                                            <td>{{ $data->ukuran_barang }}</td>
                                            <td>{{ $data->bahan_barang }}</td>
                                            <td>{{ $data->stok_barang }}</td>
                                            <td style="width: 180px">
                                                <button type="button" class="btn btn-success" data-toggle="modal"
                                                    data-target="#update" id="tombolubah" data-id="{{ $data->id }}"
                                                    data-nama="{{ $data->nama_barang }}"
                                                    data-satuan="{{ $data->satuan_barang }}"
                                                    data-ukuran="{{ $data->ukuran_barang }}"
                                                    data-bahan="{{ $data->bahan_barang }}"
                                                    data-stok="{{ $data->stok_barang }}">
                                                    Update
                                                </button>
                                                <a href="{{ route('barang.destroy', $data->id) }}" class="btn btn-danger" data-confirm-delete="true">Delete</a>
                                                
                                            </td>
                                        </tr>
                                    @endforeach




                                    <div class="modal fade" id="update">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Modal Update barang</h4>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="{{ route('barang.ubah') }}" method="POST">
                                                    @csrf
                                                    <div class="modal-body">
                                                        <div class="card">
                                                            <div class="card card-primary">
                                                                <div class="card-header">
                                                                    <h3 class="card-title">Form Update barang</h3>
                                                                </div>
                                                                <!-- /.card-header -->
                                                                <!-- form start -->

                                                                <div class="card-body">
                                                                    <input type="hidden" id="id" name="id">
                                                                    <div class="form-group">
                                                                        <label for="exampleInputbahan1">Nama
                                                                            barang</label>
                                                                        <input type="text" class="form-control"
                                                                            id="nama" name="nama_barang" placeholder="Nama bahan">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="exampleInputPassword1">satuan
                                                                            barang</label>
                                                                        <input type="text" class="form-control"
                                                                            id="satuan" name="satuan_barang" placeholder="Satuan barang">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="exampleInputPassword1">ukuran
                                                                            barang</label>
                                                                        <input type="text" class="form-control"
                                                                            id="ukuran" name="ukuran_barang" placeholder="Ukuran barang">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="exampleInputPassword1">bahan
                                                                            barang</label>
                                                                        <input type="bahan" class="form-control"
                                                                            id="bahan" name="bahan_barang" placeholder="Bahan barang">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="exampleInputPassword1">stok
                                                                            barang</label>
                                                                        <input type="text" class="form-control"
                                                                            id="stok" name="stok_barang" placeholder="Stok barang">
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer justify-content-between">
                                                        <button type="button" class="btn btn-default"
                                                            data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-success">Update</button>
                                                    </div>
                                                </form>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
                                    <!-- /.modal -->


                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Nama Barang</th>
                                        <th>Satuan Barang</th>
                                        <th>Ukuran Barang</th>
                                        <th>Bahan Barang</th>
                                        <th>Stok Barang</th>
                                        <th>Action</th>
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
        });

        $(document).ready(function() {
            // Hanya memperbolehkan input angka dan membatasi maksimal 14 karakter pada input nomor HP
            $("#stok").on('input', function() {
                this.value = this.value.replace(/[^0-9]/g, '').slice(0, 14);
            });

            // Alternatif lain untuk mencegah input non-numeric pada keypress event
            $("#stok").on('keypress', function(event) {
                if (!/^[0-9]$/.test(event.key) || $(this).val().length >= 14) {
                    event.preventDefault();
                }
            });
        });

        $(document).on("click", "#tombolubah", function() {

            let id = $(this).data('id');
            let nama = $(this).data('nama');
            let satuan = $(this).data('satuan');
            let ukuran = $(this).data('ukuran');
            let stok = $(this).data('stok');
            let bahan = $(this).data('bahan');

            $(".modal-body #id").val(id);
            $(".modal-body #nama").val(nama);
            $(".modal-body #satuan").val(satuan);
            $(".modal-body #ukuran").val(ukuran);
            $(".modal-body #stok").val(stok);
            $(".modal-body #bahan").val(bahan);

            $(".modal-body #stok").on('input', function() {
                this.value = this.value.replace(/[^0-9]/g, '').slice(0, 14);
            });

            // Alternatif lain untuk mencegah input non-numeric pada keypress event
            $(".modal-body #stok").on('keypress', function(event) {
                if (!/^[0-9]$/.test(event.key) || $(this).val().length >= 14) {
                    event.preventDefault();
                }
            });
        });
        // Hanya memperbolehkan input angka pada input nomor HP
    </script>
@endsection
