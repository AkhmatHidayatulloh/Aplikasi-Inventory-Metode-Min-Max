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
                    <form action="{{ route('supplier.store') }}" method="POST">
                        @csrf
                    <div class="card">
                        <div class="card card-primary">
                            
                            <div class="card-header">
                                <h3 class="card-title">Form Tambah Supplier</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nama Supplier</label>
                                        <input type="text" class="form-control" id="" name="nama_supplier" placeholder="Nama Supplier">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Alamat Supplier</label>
                                        <input type="text" class="form-control" id="" name="alamat_supplier"
                                            placeholder="Alamat Supplier">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Kota Supplier</label>
                                        <input type="text" class="form-control" id="" name="kota_supplier"
                                            placeholder="Kota Supplier">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Email Supplier</label>
                                        <input type="email" class="form-control" id="" name="email_supplier"
                                            placeholder="Email Supplier">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">nohp Supplier</label>
                                        <input type="number" class="form-control" id="" name="nohp_supplier"
                                            placeholder="No Hp Supplier">
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
                                        <th>Nama Supplier</th>
                                        <th>Alamat Supplier</th>
                                        <th>Kota Supplier</th>
                                        <th>Email Supplier</th>
                                        <th>No HP Supplier</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($supplier as $data)
                                        <tr>
                                            <td>{{ $data->nama_supplier }}</td>
                                            <td>{{ $data->alamat_supplier }}</td>
                                            <td>{{ $data->kota_supplier }}</td>
                                            <td>{{ $data->email_supplier }}</td>
                                            <td>{{ $data->nohp_supplier }}</td>
                                            <td>
                                                <button type="button" class="btn btn-success" data-toggle="modal"
                                                    data-target="#modal-default">
                                                    Update
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach




                                    <div class="modal fade" id="modal-default">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Modal Update Supplier</h4>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form>
                                                    <div class="modal-body">
                                                        <div class="card">
                                                            <div class="card card-primary">
                                                                <div class="card-header">
                                                                    <h3 class="card-title">Form Update Supplier</h3>
                                                                </div>
                                                                <!-- /.card-header -->
                                                                <!-- form start -->

                                                                <div class="card-body">
                                                                    <div class="form-group">
                                                                        <label for="exampleInputEmail1">Nama
                                                                            Supplier</label>
                                                                        <input type="text" class="form-control"
                                                                            id="" placeholder="Enter email">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="exampleInputPassword1">Alamat
                                                                            Supplier</label>
                                                                        <input type="text" class="form-control"
                                                                            id="" placeholder="Alamat Supplier">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="exampleInputPassword1">Kota
                                                                            Supplier</label>
                                                                        <input type="text" class="form-control"
                                                                            id="" placeholder="Kota Supplier">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="exampleInputPassword1">Email
                                                                            Supplier</label>
                                                                        <input type="email" class="form-control"
                                                                            id="" placeholder="Email Supplier">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="exampleInputPassword1">nohp
                                                                            Supplier</label>
                                                                        <input type="number" class="form-control"
                                                                            id="" placeholder="No Hp Supplier">
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
    </section>
@endsection

@section('script')
    <script>
        $(function() {
            $('#example2').DataTable();



        });
    </script>
@endsection
