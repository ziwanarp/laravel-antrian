@extends('front.template')
@section('content')

<div class="container">
    <div class="my-3 mx-3">
        <div class="row col-ld-12">
            <div class="col-lg-6 mb-5">
                <div class="text-center">
                    <h1>Antrian Transaksi</h1>
                @if (isset($min_trx))
                    <h1>{{ $min_trx }}</h1>
                    <p>Name: {{ $transaksi->name }}</p>
                    <p>Telepon: {{ $transaksi->telp }}</p>
                        <form method="post" action="/panggil-antrian/trx/{{ $min_trx }}">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-primary btn-sm">Panggil Antrian Selanjutnya</button>
                        </form>
                @else 
                    <h1>Null</h1>
                    <a href="/transaksi" class="btn btn-primary btn-sm">Buat Antrian Transaksi</a>
                @endif
                </div>
            </div>
            <div class="col-lg-6 mb-5">
                <div class="text-center">
                    <h1>Antrian CS</h1>
                @if (isset($min_cs))
                    <h1>{{ $min_cs }}</h1>
                    <p>Name: {{ $cs->name }}</p>
                    <p>Telepon: {{ $cs->telp }}</p>
                        <form method="post" action="/panggil-antrian/cs/{{ $min_cs }}">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm">Panggil Antrian Selanjutnya</button>
                        </form>
                @else 
                    <h1>Null</h1>
                    <a href="/cs" class="btn btn-danger btn-sm">Buat Antrian CS</a>
                @endif
                </div>
            </div>
        </div>
    </div>
</div>

    
@endsection
