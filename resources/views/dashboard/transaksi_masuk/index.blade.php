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
                    <form action="{{ route('transaksi_masuk.store') }}" method="POST">
                        @csrf
                        <div class="card">
                            <div class="card card-primary">

                                <div class="card-header">
                                    <h3 class="card-title">Form Produk Masuk</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->

                                <div class="card-body">

                                    <div class="form-group">
                                        <label>Pilih Supplier</label>
                                        <div class="select2-purple">
                                            <select class="form-control select2" name="id_supplier"  data-placeholder="Pilih Supplier"
                                                data-dropdown-css-class="select2-purple" >
                                                @foreach ($supplier as $item)
                                                    <option value="{{ $item->id }}">{{ $item->nama_supplier }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Pilih Barang</label>
                                        <div class="select2-purple">
                                            <select class="select2" name="id_barang"  data-placeholder="Pilih Barang"
                                                data-dropdown-css-class="select2-purple" style="width: 100%;">
                                                @foreach ($barang as $item)
                                                    <option value="{{ $item->id }}">{{ $item->nama_barang }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Jumlah Brang Masuk</label>
                                        <input type="number" class="form-control" min="0" name="jumlah_masuk"
                                            placeholder="Jumlah Brang Masuk" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Tanggal Barang Masuk</label>
                                        <input type="date" class="form-control" id="" name="tanggal_masuk"
                                            placeholder="Tanggal Barang Masuk" required >
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
                            <h3 class="card-title">Data Transaksi Masuk</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Nama Supplier</th>
                                        <th>Nama Barang</th>
                                        <th>Tanggal Masuk</th>
                                        <th>Jumlah Barang Masuk</th>
                                        <th>Stok Awal Masuk</th>
                                        <th>Stok Akhir Masuk</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($transaksimasuk as $data)
                                        <tr>
                                            <td>{{ $data->nama_supplier }}</td>
                                            <td>{{ $data->nama_barang }}</td>
                                            <td>{{ $data->tanggal_masuk }}</td>
                                            <td>{{ $data->jumlah_barang_masuk }}</td>
                                            <td>{{ $data->stok_awal_masuk }}</td>
                                            <td>{{ $data->stok_akhir_masuk }}</td>
                                        </tr>
                                    @endforeach

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Nama Supplier</th>
                                        <th>Nama Barang</th>
                                        <th>Tanggal Masuk</th>
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
            $('#example2').DataTable();

            $('.select2').select2();

        });




        // //Initialize Select2 Elements
        // $('.select2bs4').select2({
        //     theme: 'bootstrap4'
        // })

        // $(document).ready(function() {
        //     // Hanya memperbolehkan input angka dan membatasi maksimal 14 karakter pada input nomor HP
        //     $("#nohp").on('input', function() {
        //         this.value = this.value.replace(/[^0-9]/g, '').slice(0, 14);
        //     });

        //     // Alternatif lain untuk mencegah input non-numeric pada keypress event
        //     $("#nohp").on('keypress', function(event) {
        //         if (!/^[0-9]$/.test(event.key) || $(this).val().length >= 14) {
        //             event.preventDefault();
        //         }
        //     });
        // });


        // $(document).on("click", "#tombolubah", function() {

        //     let id = $(this).data('id');
        //     let nama = $(this).data('nama');
        //     let alamat = $(this).data('alamat');
        //     let kota = $(this).data('kota');
        //     let nohp = $(this).data('nohp');
        //     let email = $(this).data('email');

        //     $(".modal-body #id").val(id);
        //     $(".modal-body #nama").val(nama);
        //     $(".modal-body #alamat").val(alamat);
        //     $(".modal-body #kota").val(kota);
        //     $(".modal-body #nohp").val(nohp);
        //     $(".modal-body #email").val(email);

        //     $(".modal-body #nohp").on('input', function() {
        //         this.value = this.value.replace(/[^0-9]/g, '').slice(0, 14);
        //     });

        //     // Alternatif lain untuk mencegah input non-numeric pada keypress event
        //     $(".modal-body #nohp").on('keypress', function(event) {
        //         if (!/^[0-9]$/.test(event.key) || $(this).val().length >= 14) {
        //             event.preventDefault();
        //         }
        //     });
        // });
        // Hanya memperbolehkan input angka pada input nomor HP
    </script>
@endsection
