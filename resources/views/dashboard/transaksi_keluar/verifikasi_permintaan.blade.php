@extends('dashboard.layouts.app')

@section('title')
    {{ $title }}
@endsection

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">

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
                                        <th style="width: 160px;">Action</th>
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
        $('#example2').DataTable({
            ajax: "{!! route('verif.index') !!}",
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
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false

                },
            ]
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
    </script>
@endsection
