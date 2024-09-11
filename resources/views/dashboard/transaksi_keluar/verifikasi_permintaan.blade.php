@extends('dashboard.layouts.app')

@section('title')
    {{ $title }}
@endsection

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    {{--
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
                    </div> --}}

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Verifikasi Transaksi Keluar</h3>
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
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($transaksikeluar as $data)
                                        <tr>
                                            <td>{{ $no }}</td>
                                            <td>{{ $data->nama_customer }}</td>
                                            <td>{{ $data->nama_barang }}</td>
                                            <td>{{ $data->tanggal_keluar }}</td>
                                            <td>{{ $data->jumlah_barang_keluar }}</td>
                                            <td>{{ $data->stok_awal_keluar }}</td>
                                            <td>{{ $data->stok_akhir_keluar }}</td>
                                            @if ($data->status == 'berhasil')
                                                <td>
                                                    <small class="badge badge-success">{{ $data->status }}</small>
                                                </td>
                                            @elseif ($data->status == 'ditolak')
                                                <td>
                                                    <small class="badge badge-danger">{{ $data->status }}</small>
                                                </td>
                                            @else
                                                <td>
                                                    <small class="badge badge-warning">{{ $data->status }}</small>
                                                </td>
                                            @endif

                                            <td>
                                                <button type="button" id="tombolverif" class="btn btn-success"
                                                    data-toggle="modal" data-target="#modalVerif"
                                                    data-id='{{ $data->id }}'
                                                    data-jumlah='{{ $data->jumlah_barang_keluar }}'
                                                    @if ($data->status == 'berhasil' || $data->status == 'ditolak') {{ 'disabled' }}
                                                    @else {{ '' }} @endif>
                                                    Verifikasi
                                                </button>

                                                <button type="button" id="tomboltolak" class="btn btn-danger"
                                                    data-toggle="modal" data-target="#modalTolak"
                                                    data-id='{{ $data->id }}'
                                                    @if ($data->status == 'berhasil' || $data->status == 'ditolak') {{ 'disabled' }}
                                                    @else {{ '' }} @endif>
                                                    Tolak
                                                </button>
                                            </td>
                                        </tr>
                                        @php
                                            $no++;
                                        @endphp
                                    @endforeach

                                </tbody>
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

    <!-- Modal -->
    <div class="modal fade" id="modalVerif" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Modal Verifikasi Pemintaan Barang Keluar</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('verif.update') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <p>Apakah Anda Yakin Untuk Verifikasi Transaksi Barang Keluar</p>
                        <input type="hidden" id="id" name="id">
                        <input type="hidden" id="jumlah_keluar" name="jumlah_keluar">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Verifikasi</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modalTolak" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Modal Tolak Pemintaan Barang Keluar</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('verif.tolak') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <p>Apakah Anda Yakin Untuk Menolak Transaksi Barang Keluar</p>
                        <input type="hidden" id="id" name="id">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Tolak</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(function() {
            $('#example2').DataTable();

            // $('.select2').select2();

        });

        $(document).on("click", "#tombolverif", function() {
            let id = $(this).data('id');
            let jumlah = $(this).data('jumlah');

            $("#modalVerif .modal-body #id").val(id);
            $(".modal-body #jumlah_keluar").val(jumlah);
        });

        $(document).on("click", "#tomboltolak", function() {
            let id = $(this).data('id');
            $("#modalTolak .modal-body #id").val(id);

        });



        // $(document).ready(function() {
        //     // Inisialisasi Select2
        //     $('#barang').select2({
        //         placeholder: "Pilih sebuah opsi",
        //         allowClear: true
        //     });


        //     // Event listener untuk perubahan nilai
        //     $('#barang').on('change', function() {
        //         var selectedValue = $(this).val();

        //         const selectedData = dataBarang.filter(item => item.id === parseInt(selectedValue));

        //         bulan = [...new Set(selectedData.map(item => item.bulan))];
        //         const nama_barang = [...new Set(selectedData.map(item => item.nama_barang))];
        //         const stok = [...new Set(selectedData.map(item => item.stok_barang))];
        //         document.getElementById("jumlah_barang").textContent = stok;
        //         document.getElementById("nama_barang").textContent = 'Jumlah Stok Barang ' + nama_barang;
        //     });
        // });


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
