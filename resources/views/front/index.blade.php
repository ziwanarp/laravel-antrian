@extends('front.template')

@section('content')
    <div class="container">
        <div class="col-lg-12">
            <div class="col-lg-4 text-center">
                <p class="font-monospace">Aplikasi-Antrian</p>
                <p class="font-monospace">Dibuat dengan menggunakan PHP 8, Laravel 9, dan menggunakan database MySQL, untuk Front-End Mengunakan Bootstrap 5.</p>
                <p class="font-monospace">oleh Ziwana Rizwan Pramudia</p>
            </div>
            <div class="col-lg-4 text-center">
                <h5 class="mb-2">Menu</h5>
                <a href="/transaksi" class="btn btn-primary">Antrian Transaksi</a>
                <a href="/cs" class="btn btn-danger">Antrian Customer Service</a>
                <a href="/panggil-antrian" class="mt-2 btn btn-success">Panggil Antrian</a>
            </div>
        </div>
        
    </div>
@endsection