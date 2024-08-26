@extends('dashboard.layouts.app')

@section('style')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet" />
@endsection
@section('content')
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $supplier }}</h3>

                            <p>Jumlah Supplier</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="supplier" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{ $customer }}</h3>

                            <p>Jumlah Customer</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="customer" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>44</h3>

                            <p>Jumlah Barang</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="barang" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>65</h3>

                            <p>Unique Visitors</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
        </div><!-- /.container-fluid -->

        <div class="container-fluid">
            <div class="card">
                <div class="card card-primary">

                    <div class="card-header">
                        <h3 class="card-title">Grafik Transaksi</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-3">
                                <div class="form-group">
                                    <label>Pilih Barang</label>
                                    <div class="select2-purple">
                                        <select class="form-control" name="id_barang" id="barang" data-placeholder="Pilih Barang"
                                            data-dropdown-css-class="select2-purple" style="width: 100%;">
                                            @foreach ($namabarang as $item)
                                                <option value="{{ $item->nama_barang }}">{{ $item->nama_barang }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <div class="row">
                            <div class="col-6">
                                <div id="chartmasuk" style="width:100%; height:500px;"></div>
                            </div>
                            <div class="col-6">
                                <div id="chartkeluar" style="width:100%; height:500px;"></div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>
@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        $(function() {
            $('.select2').select2();

        });
        
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": true,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "2000",
            "timeOut": "2000", // 1 detik
            "extendedTimeOut": "2000", // 1 detik
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        };

        document.addEventListener('DOMContentLoaded', function() {
            const chartDataMasuk = @json($transaksi_masuk);
            const chartDatakeluar = @json($transaksi_keluar);
            const nama_barang_masuk = [...new Set(chartDataMasuk.map(item => item.nama_barang))];
            const nama_barang_keluar = [...new Set(chartDatakeluar.map(item => item.nama_barang))];
            let bulanmasuk = [];
            let bulankeluar = [];
            let jumlahmasuk = [];
            let jumlahkeluar = [];
            let judul = '';


            // Mendapatkan elemen select berdasarkan ID
            var selectElement = document.getElementById('barang');
            var validOptionsMasuk = nama_barang_masuk;
            var validOptionsKeluar = nama_barang_keluar;

            console.log(validOptionsMasuk);
            console.log(validOptionsKeluar);



            // Membuat grafik Highcharts
            var chartMasuk = Highcharts.chart('chartmasuk', {
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Chart Transaksi Barang Masuk ' + judul
                },
                xAxis: {
                    categories: bulanmasuk,
                },
                yAxis: {
                    title: {
                        text: 'Grafik'
                    }
                },
                series: [{
                    name: 'Transaksi Barang Masuk',
                    data: jumlahmasuk
                }],
                colors: ['#fa02bc']
            });

            // Membuat grafik Highcharts
            var chartKeluar = Highcharts.chart('chartkeluar', {
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Chart Transaksi Barang Keluar ' + judul
                },
                xAxis: {
                    categories: bulankeluar,
                },
                yAxis: {
                    title: {
                        text: 'Grafik'
                    }
                },
                series: [{
                    name: 'Transaksi Barang Keluar',
                    data: jumlahkeluar
                }],
                colors: ['#00ba44']
            });

            // Menambahkan event listener untuk event 'change'
            selectElement.addEventListener('change', function(event) {
                // Mendapatkan nilai yang dipilih
                var selectedValue = event.target.value;
                judul = selectedValue;
                // Mencari data yang cocok dengan ID yang dipilih

                //chart masuk
                const selectedDataMasuk = chartDataMasuk.filter(item => item.nama_barang === selectedValue);
                jumlahmasuk = selectedDataMasuk.map(item => parseInt(item.jumlah,
                    10)); // Pastikan ini adalah array angka
                bulanmasuk = [...new Set(selectedDataMasuk.map(item => item.bulan))];

                //chart keluar                
                const selectedDatakeluar = chartDatakeluar.filter(item => item.nama_barang ===
                    selectedValue);
                jumlahkeluar = selectedDatakeluar.map(item => parseInt(item.jumlah,
                    10)); // Pastikan ini adalah array angka
                bulankeluar = [...new Set(selectedDatakeluar.map(item => item.bulan))];

                // Memperbarui grafik
                if (validOptionsMasuk.includes(selectedValue)) {
                    chartMasuk.setTitle({
                        text: 'Chart Transaksi Masuk Barang ' + judul
                    });
                    chartMasuk.series[0].setData(jumlahmasuk,
                    true); // 'true' untuk mengaktifkan animasi pembaruan
                    chartMasuk.xAxis[0].setCategories(bulanmasuk,
                    true); // 'true' untuk mengaktifkan animasi pembaruan
                    chartMasuk.redraw(); // Memastikan grafik di-red raw

                } else {
                    toastr.warning('Data Transaksi Masuk Barang ' + judul + ' Tidak Ada');
                }

                if (validOptionsKeluar.includes(selectedValue)) {
                    chartKeluar.setTitle({
                        text: 'Chart Transaksi Keluar Barang ' + judul
                    });
                    chartKeluar.series[0].setData(jumlahkeluar,
                    true); // 'true' untuk mengaktifkan animasi pembaruan
                    chartKeluar.xAxis[0].setCategories(bulankeluar,
                    true); // 'true' untuk mengaktifkan animasi pembaruan
                    chartKeluar.redraw(); // Memastikan grafik di-red raw

                } else {
                    toastr.warning('Data Transaksi Keluar Barang ' + judul + ' Tidak Ada');
                }


            });
        });


        // document.addEventListener('DOMContentLoaded', function() {
        //     const chartData = @json($transaksi_masuk);
        //     const nama_barang = [...new Set(chartData.map(item => item.nama_barang))];
        //     const bulan = [...new Set(chartData.map(item => item.bulan))];
        //     let jumlahmasuk = [];
        //     let judul = 'hallo';
        //     // Mendapatkan elemen select berdasarkan ID
        //     var selectElement = document.getElementById('barang');
        //     var validOptions = nama_barang;

        //     // Menambahkan event listener untuk event 'change'
        //     selectElement.addEventListener('change', function(event) {
        //         // Mendapatkan nilai yang dipilih
        //         var selectedValue = event.target.value;

        //         // Mencari data yang cocok dengan ID yang dipilih

        //         const selectedData = chartData.filter(item => item.nama_barang === selectedValue);
        //         judul = selectedValue;
        //         jumlahmasuk = [...new Set(selectedData.map(item => item.jumlah))];
        //         // Logika kondisional menggunakan if
        //         if (validOptions.includes(selectedValue)) {
        //             //alert('You selected a valid option: ' + selectedValue);

        //             console.log(jumlahmasuk);
        //             console.log(judul);

        //         } else {
        //             alert('Unknown option selected');
        //         }
        //     });

        //     var chart = Highcharts.chart('chart', {
        //         chart: {
        //             type: 'column'
        //         },
        //         title: {
        //             text: 'Chart Transaksi Barang ' + judul
        //         },
        //         xAxis: {
        //             categories: bulan,
        //         },
        //         yAxis: {

        //             title: {
        //                 text: 'grafik'
        //             }
        //         },
        //         series: [{
        //             name: 'Transaksi Barang Masuk',
        //             data: jumlahmasuk
        //         }, {
        //             name: 'Transaksi Barang Keluar',
        //             data: [5, 7]
        //         }]
        //     });
        // });
    </script>
@endsection
