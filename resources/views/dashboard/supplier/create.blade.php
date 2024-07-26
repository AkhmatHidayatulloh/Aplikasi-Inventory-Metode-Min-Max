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
                    
                    <div class="card">
                        <div class="card card-primary">
                            
                            <div class="card-header">
                                <h3 class="card-title">Form Tambah Supplier</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{ route('supplier.store') }}" method="POST">
                            
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nama Supplier</label>
                                        <input type="text" class="form-control" id="nama_supplier" name="nama_supplier" placeholder="Nama Supplier">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Alamat Supplier</label>
                                        <input type="text" class="form-control" id="alamat_supplier" name="alamat_supplier"
                                            placeholder="Alamat Supplier">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Kota Supplier</label>
                                        <input type="text" class="form-control" id="kota_supplier" name="kota_supplier"
                                            placeholder="Kota Supplier">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Email Supplier</label>
                                        <input type="email" class="form-control" id="email_supplier" name="email_supplier"
                                            placeholder="Email Supplier">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">nohp Supplier</label>
                                        <input type="number" class="form-control" id="nohp_supplier" name="nohp_supplier"
                                            placeholder="No Hp Supplier">
                                    </div>
                                </div>
                                    
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                
                            </form>
                            
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
    </script>
@endsection
