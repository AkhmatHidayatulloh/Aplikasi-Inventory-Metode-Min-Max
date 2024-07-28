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
                    <form action="{{ route('customer.store') }}" method="POST">
                        @csrf
                        <div class="card">
                            <div class="card card-primary">

                                <div class="card-header">
                                    <h3 class="card-title">Form Tambah customer</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->

                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nama Customer</label>
                                        <input type="text" class="form-control" id="" name="nama_customer"
                                            placeholder="Nama customer" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Alamat Customer</label>
                                        <input type="text" class="form-control" id="" name="alamat_customer"
                                            placeholder="Alamat customer" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Kota Customer</label>
                                        <input type="text" class="form-control" id="" name="kota_customer"
                                            placeholder="Kota customer" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Email Customer</label>
                                        <input type="email" class="form-control" id="" name="email_customer"
                                            placeholder="Email customer" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">nohp Customer</label>
                                        <input type="text" class="form-control" id="nohp" name="nohp_customer"
                                            placeholder="No Hp customer" required>
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
                            <h3 class="card-title">DataTable with minimal features & hover style</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Nama Customer</th>
                                        <th>Alamat Customer</th>
                                        <th>Kota Customer</th>
                                        <th>Email Customer</th>
                                        <th>No HP Customer</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($customer as $data)
                                        <tr>
                                            <td>{{ $data->nama_customer }}</td>
                                            <td>{{ $data->alamat_customer }}</td>
                                            <td>{{ $data->kota_customer }}</td>
                                            <td>{{ $data->email_customer }}</td>
                                            <td>{{ $data->nohp_customer }}</td>
                                            <td style="width: 180px">
                                                <button type="button" class="btn btn-success" data-toggle="modal"
                                                    data-target="#update" id="tombolubah" data-id="{{ $data->id }}"
                                                    data-nama="{{ $data->nama_customer }}"
                                                    data-alamat="{{ $data->alamat_customer }}"
                                                    data-kota="{{ $data->kota_customer }}"
                                                    data-email="{{ $data->email_customer }}"
                                                    data-nohp="{{ $data->nohp_customer }}">
                                                    Update
                                                </button>
                                                <a href="{{ route('customer.destroy', $data->id) }}" class="btn btn-danger" data-confirm-delete="true">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach

                                    <div class="modal fade" id="update">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Modal Update Customer</h4>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="{{ route('customer.ubah') }}" method="POST">
                                                    @csrf
                                                    <div class="modal-body">
                                                        <div class="card">
                                                            <div class="card card-primary">
                                                                <div class="card-header">
                                                                    <h3 class="card-title">Form Update Customer</h3>
                                                                </div>
                                                                <!-- /.card-header -->
                                                                <!-- form start -->

                                                                <div class="card-body">
                                                                    <input type="hidden" id="id" name="id">
                                                                    <div class="form-group">
                                                                        <label for="exampleInputEmail1">Nama
                                                                            Customer</label>
                                                                        <input type="text" class="form-control"
                                                                            id="nama" name="nama_customer" placeholder="Enter email">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="exampleInputPassword1">Alamat
                                                                            Customer</label>
                                                                        <input type="text" class="form-control"
                                                                            id="alamat" name="alamat_customer" placeholder="Alamat customer">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="exampleInputPassword1">Kota
                                                                            Customer</label>
                                                                        <input type="text" class="form-control"
                                                                            id="kota" name="kota_customer" placeholder="Kota customer">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="exampleInputPassword1">Email
                                                                            Customer</label>
                                                                        <input type="email" class="form-control"
                                                                            id="email" name="email_customer" placeholder="Email customer">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="exampleInputPassword1">No hp
                                                                            Customer</label>
                                                                        <input type="text" class="form-control"
                                                                            id="nohp" name="nohp_customer" placeholder="No Hp customer">
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
                                        <th>Nama Customer</th>
                                        <th>Alamat Customer</th>
                                        <th>Kota Customer</th>
                                        <th>Email Customer</th>
                                        <th>No HP Customer</th>
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
        $(document).ready(function() {
            // Hanya memperbolehkan input angka dan membatasi maksimal 14 karakter pada input nomor HP
            $("#nohp").on('input', function() {
                this.value = this.value.replace(/[^0-9]/g, '').slice(0, 14);
            });

            // Alternatif lain untuk mencegah input non-numeric pada keypress event
            $("#nohp").on('keypress', function(event) {
                if (!/^[0-9]$/.test(event.key) || $(this).val().length >= 14) {
                    event.preventDefault();
                }
            });
        });

        $(function() {
            $('#example2').DataTable();
        });
        $(document).on("click", "#tombolubah", function() {

            let id = $(this).data('id');
            let nama = $(this).data('nama');
            let alamat = $(this).data('alamat');
            let kota = $(this).data('kota');
            let nohp = $(this).data('nohp');
            let email = $(this).data('email');

            $(".modal-body #id").val(id);
            $(".modal-body #nama").val(nama);
            $(".modal-body #alamat").val(alamat);
            $(".modal-body #kota").val(kota);
            $(".modal-body #nohp").val(nohp);
            $(".modal-body #email").val(email);

            $(".modal-body #nohp").on('input', function() {
                this.value = this.value.replace(/[^0-9]/g, '').slice(0, 14);
            });

            // Alternatif lain untuk mencegah input non-numeric pada keypress event
            $(".modal-body #nohp").on('keypress', function(event) {
                if (!/^[0-9]$/.test(event.key) || $(this).val().length >= 14) {
                    event.preventDefault();
                }
            });
        });
        // Hanya memperbolehkan input angka pada input nomor HP
    </script>
@endsection
