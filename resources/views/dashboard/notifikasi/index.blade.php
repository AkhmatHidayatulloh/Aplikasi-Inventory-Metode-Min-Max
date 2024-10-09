@extends('dashboard.layouts.app')
@section('title')
    {{ $title }}
@endsection
@section('content')
    <section class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-12">
                    <h5 class="mb-2">Notifikasi Info Box</h5>
                    <div class="row">

                        @forelse ($notif as $item)
                            <div class="col-md-3 col-sm-6 col-12">
                                <div class="shadow info-box bg-gradient-warning">
                                    <span class="info-box-icon"><i class="fa fa-bell" aria-hidden="true"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">{{ $item->title }}</span>
                                        <span class="progress-description"
                                            style="white-space: normal; word-wrap: break-word;">
                                            {{ $item->message }}
                                        </span>
                                        <span>
                                            Tanggal : {{ $item->created_at }}
                                        </span>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <form action="{{ route('baca.notif') }}" method="POST">
                                        @csrf
                                        <input type="text" value="{{ $item->id }}" name="id" hidden>
                                        <button type="submit" class="btn btn-warning btn-block btn-flat"><i
                                                class="fa fa-bell"></i>
                                            Tandai Telah Dibaca
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @empty
                            <div class="col-md-3 col-sm-6 col-12">
                                <div class="shadow info-box bg-gradient-warning">
                                    <span class="info-box-icon"><i class="fa fa-bell" aria-hidden="true"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">Belum Ada Notifikasi</span>

                                    </div>
                                </div>
                            </div>
                        @endforelse

                    </div>
                </div>
            </div>
            <hr>

            <div class="row">
                <div class="col-md-12">
                    <h5 class="mb-2">Notifikasi Yang Sudah Dibaca</h5>
                    <div class="row">

                        @forelse ($notifbaca as $item)
                            <div class="col-md-3 col-sm-6 col-12">
                                <div class="info-box bg-gradient-success">
                                    <span class="info-box-icon"><i class="fa fa-bell" aria-hidden="true"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">{{ $item->title }}</span>
                                        <span class="progress-description"
                                            style="white-space: normal; word-wrap: break-word;">
                                            {{ $item->message }}
                                        </span>
                                        <span>
                                            Tanggal : {{ $item->created_at }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-md-3 col-sm-6 col-12">
                                <div class="info-box bg-gradient-success">
                                    <span class="info-box-icon"><i class="fa fa-bell" aria-hidden="true"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">Belum Ada Notifikasi Yang Sudah Dibaca</span>
                                    </div>
                                </div>
                            </div>
                        @endforelse

                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
