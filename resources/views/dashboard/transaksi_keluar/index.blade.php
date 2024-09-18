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
                        <div class="col-lg-3 col-12">
                            <!-- small box -->
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3 id="jumlah_barang">{{ $countbarang }}</h3>

                                    <p id="nama_barang">Jumlah Barang</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-bag"></i>
                                </div>
                                <a href="barang" class="small-box-footer">More info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <!-- general form elements -->
                    <form action="{{ route('transaksi_keluar.store') }}" method="POST">
                        @csrf
                        <div class="card">
                            <div class="card card-primary">

                                <div class="card-header">
                                    <h3 class="card-title">Form Produk keluar</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->

                                <div class="card-body">

                                    <div class="form-group">
                                        <label>Pilih Customer</label>
                                        <div class="select2-purple">
                                            <select class="select2" name="id_customer" data-placeholder="Pilih Customer"
                                                data-dropdown-css-class="select2-purple" style="width: 100%;">
                                                @foreach ($customer as $item)
                                                    <option value="{{ $item->id }}">{{ $item->nama_customer }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Pilih Barang</label>
                                        <div class="select2-purple">
                                            <select class="select2" name="id_barang" id="barang"
                                                data-placeholder="Pilih Barang" data-dropdown-css-class="select2-purple"
                                                style="width: 100%;">
                                                @foreach ($barang as $item)
                                                    <option value="{{ $item->id }}">{{ $item->nama_barang }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Jumlah Brang keluar</label>
                                        <input type="number" class="form-control" min="0" name="jumlah_keluar"
                                            placeholder="Jumlah Brang keluar" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Tanggal Barang keluar</label>
                                        <input type="date" class="form-control" id="" name="tanggal_keluar"
                                            placeholder="Tanggal Barang keluar" required>
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
                            <h3 class="card-title">Data Transaksi Keluar</h3>
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

        $('#example2').DataTable({
            ajax: "{!! route('transaksi_keluar.index') !!}",
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
                    data: 'jumlah_barang_keluar',
                    name: 'jumlah_barang_keluar'
                },
                {
                    data: 'stok_awal_keluar',
                    name: 'stok_awal_keluar'
                },
                {
                    data: 'stok_akhir_keluar',
                    name: 'stok_akhir_keluar',
                },
                {
                    data: 'status',
                    name: 'status',

                },
            ]
        });


        $(document).ready(function() {
            // Inisialisasi Select2
            $('#barang').select2({
                placeholder: "Pilih sebuah opsi",
                allowClear: true
            });

            const dataBarang = @json($barang);

            // Event listener untuk perubahan nilai
            $('#barang').on('change', function() {
                var selectedValue = $(this).val();

                const selectedData = dataBarang.filter(item => item.id === parseInt(selectedValue));

                bulan = [...new Set(selectedData.map(item => item.bulan))];
                const nama_barang = [...new Set(selectedData.map(item => item.nama_barang))];
                const stok = [...new Set(selectedData.map(item => item.stok_barang))];
                document.getElementById("jumlah_barang").textContent = stok;
                document.getElementById("nama_barang").textContent = 'Jumlah Stok Barang ' + nama_barang;
            });
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
