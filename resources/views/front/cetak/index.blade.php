<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="google" value="notranslate">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Cetak Tiket Antrian</title>
    <head>
        <style>
        .ticket {
            border: 1px solid black;
            padding: 10px;
            width: 250px;
            text-align: center;
        }
        .ticket h1 {
            font-size: 100px;
            margin: 0;
        }
        .ticket p {
            margin: 10px 0;
        }
        </style>
        </head>
        <body>
        <div class="ticket">
            <p>Layanan: <strong>{{ $antrian->layanan }}</strong></p>
            <p>No Antrian:</p>
            <h1>{{ $antrian->no_antrian }}</h1>
            <p>Name: {{ $antrian->name }}</p>
            <p>Telepon: {{ $antrian->telp }}</p>
            <p>Antrian dibuat: {{ $antrian->created_at }} </p>
        </div>
        </body>
        </html>
</body>
</html>