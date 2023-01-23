@extends('front.template')
@section('content')

<div class="container">
    <div class="my-3 mx-3">

        <div class="col-lg-12 mb-5">
            <div class="text-center">
                <h1>Antrian Transaksi</h1>
                <h1>{{ $min }}</h1>
                <a href="/transaksi" class="btn btn-primary btn-sm">refresh</a>
            </div>
        </div>
        <hr>

        <div class="row col-lg-12">
            <div class="col-lg-4">
                <h4>Antrian Transaksi</h4>
                    @if (session()->has('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    @if (session()->has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                <p>Masukan nama dan nomor telepon untuk mendapatkan nomor antrian</p>
                    <form method="post" action="/store-transaksi">
                        @csrf
                        <input type="hidden" value="transaksi" name="layanan">
                        <div class="mb-3">
                        <label for="name" class="form-label">Nama </label>
                        <input type="text" class="form-control" id="name" name="name" minlength="3" required>
                        </div>
                        <div class="mb-3">
                        <label for="telp" class="form-label">Nomor Telepon</label>
                        <input type="text" class="form-control" id="telp" name="telp" minlength="10" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Dapatkan Antrian</button>
                    </form>
            </div>
            <div class="col-lg-8">
                <h4 class="text-center">Antrian Transaksi</h4>
                <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th scope="col">Nomor Antrian</th>
                        <th scope="col">Nama</th>
                        <th scope="col">No Telepon</th>
                        <th scope="col">Cetak Antrian</th>
                      </tr>
                    </thead>
                    @foreach ($transaksi as $item)
                        <tbody>
                        <tr>
                            <td class="text-center">{{ $item->no_antrian }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->telp }}</td>
                            @if ($item->no_antrian == $max)
                                <td class="text-center">
                                    <form action="/cetak-transaksi/{{ $item->id }}" method="post">
                                        @csrf
                                        <button type="submit" class="btn btn-danger"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer-fill" viewBox="0 0 16 16">
                                            <path d="M5 1a2 2 0 0 0-2 2v1h10V3a2 2 0 0 0-2-2H5zm6 8H5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1z"/>
                                            <path d="M0 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-1v-2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2H2a2 2 0 0 1-2-2V7zm2.5 1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/>
                                        </svg></button>
                                    </form>
                                </td>
                            @else 
                                <td class="text-center">Expired</td>
                            @endif
                        </tr>
                        </tbody>
                    @endforeach
                  </table>
            </div>
        </div>
    </div>
</div>

    
@endsection
