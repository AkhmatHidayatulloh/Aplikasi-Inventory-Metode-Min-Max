@extends('dashboard.layouts.app')
@section('title')
    {{ $title }}
@endsection
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">

                    {{-- tampilan eror --}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

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
                                        <input type="text" class="form-control" id="nama" name="nama_barang"
                                            placeholder="Nama barang" value="{{ old('nama_barang') }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">satuan barang</label>
                                        <input type="text" class="form-control" id="satuan" name="satuan_barang"
                                            placeholder="Satuan barang" value="{{ old('satuan_barang') }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">ukuran barang</label>
                                        <input type="text" class="form-control" id="ukuran" name="ukuran_barang"
                                            placeholder="Ukuran barang" value="{{ old('ukuran_barang') }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">bahan barang</label>
                                        <input type="text" class="form-control" id="bahan" name="bahan_barang"
                                            placeholder="Bahan barang" value="{{ old('bahan_barang') }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">stok barang</label>
                                        <input type="text" class="form-control" id="stok" name="stok_barang"
                                            placeholder="Stok barang" value="{{ old('stok_barang') }}" required>
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
                                        <th>No </th>
                                        <th>Nama Barang</th>
                                        <th>Satuan Barang</th>
                                        <th>Ukuran Barang</th>
                                        <th>Bahan Barang</th>
                                        <th>Stok Barang</th>
                                        <th style="width: 150px;">Action</th>
                                    </tr>
                                </thead>

                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Barang</th>
                                        <th>Satuan Barang</th>
                                        <th>Ukuran Barang</th>
                                        <th>Bahan Barang</th>
                                        <th>Stok Barang</th>
                                        <th style="width: 150px;">Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>

                    <div class="modal fade" id="update">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Modal Update barang</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
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
                                                        <input type="text" class="form-control" id="nama"
                                                            name="nama_barang" placeholder="Nama bahan"
                                                            value="{{ old('nama_barang') }}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">satuan
                                                            barang</label>
                                                        <input type="text" class="form-control" id="satuan"
                                                            name="satuan_barang" placeholder="Satuan barang"
                                                            value="{{ old('satuan_barang') }}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">ukuran
                                                            barang</label>
                                                        <input type="text" class="form-control" id="ukuran"
                                                            name="ukuran_barang" placeholder="Ukuran barang"
                                                            value="{{ old('ukuran_barang') }}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">bahan
                                                            barang</label>
                                                        <input type="bahan" class="form-control" id="bahan"
                                                            name="bahan_barang" placeholder="Bahan barang"
                                                            value="{{ old('bahan_barang') }}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">stok
                                                            barang</label>
                                                        <input type="text" class="form-control" id="stok"
                                                            name="stok_barang" placeholder="Stok barang"
                                                            value="{{ old('stok_barang') }}" required>
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

                </div>
            </div>
    </section>
@endsection

@section('script')
    <script>
        $('#example2').DataTable({
            ajax: "{!! route('barang.index') !!}",
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
                    data: 'nama_barang',
                    name: 'nama_barang'
                },
                {
                    data: 'satuan_barang',
                    name: 'satuan_barang'
                },
                {
                    data: 'ukuran_barang',
                    name: 'ukuran_barang'
                },
                {
                    data: 'bahan_barang',
                    name: 'bahan_barang'
                },
                {
                    data: 'stok_barang',
                    name: 'stok_barang'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },
            ]
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

            // Allow decimal input and restrict to 14 characters
            $("#ukuran").on('input', function() {
                // Replace anything that is not a digit or decimal point, and ensure only one decimal point is allowed
                this.value = this.value.replace(/[^0-9.]/g, '');

                // Ensure only one decimal point is allowed
                if (this.value.indexOf('.') != -1) {
                    this.value = this.value.substring(0, this.value.indexOf('.') + 1) +
                        this.value.substring(this.value.indexOf('.') + 1).replace(/\./g, '');
                }

                // Restrict the input to a maximum length of 14 characters
                this.value = this.value.slice(0, 14);
            });

            // Alternative to prevent non-numeric input and limit input length
            $("#ukuran").on('keypress', function(event) {
                // Allow digits and one decimal point, and ensure length is within 14 characters
                if (!/^[0-9.]$/.test(event.key) ||
                    (event.key === '.' && $(this).val().indexOf('.') !== -1) ||
                    $(this).val().length >= 14) {
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

            // Allow decimal input and restrict to 14 characters
            $("#ukuran").on('input', function() {
                // Replace anything that is not a digit or decimal point, and ensure only one decimal point is allowed
                this.value = this.value.replace(/[^0-9.]/g, '');

                // Ensure only one decimal point is allowed
                if (this.value.indexOf('.') != -1) {
                    this.value = this.value.substring(0, this.value.indexOf('.') + 1) +
                        this.value.substring(this.value.indexOf('.') + 1).replace(/\./g, '');
                }

                // Restrict the input to a maximum length of 14 characters
                this.value = this.value.slice(0, 14);
            });

            // Alternative to prevent non-numeric input and limit input length
            $("#ukuran").on('keypress', function(event) {
                // Allow digits and one decimal point, and ensure length is within 14 characters
                if (!/^[0-9.]$/.test(event.key) ||
                    (event.key === '.' && $(this).val().indexOf('.') !== -1) ||
                    $(this).val().length >= 14) {
                    event.preventDefault();
                }
            });
        });
        // Hanya memperbolehkan input angka pada input nomor HP
    </script>
@endsection
