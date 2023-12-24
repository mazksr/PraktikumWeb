@extends('layout/template')

@section('content')
    <style>
        .container {
            height: 50vh;
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>

<div class="container" style="display: flex; flex-direction: column; align-items: center; text-align: center;">
    <h1>DATABASE CLASSICMODELS</h1>
    <p><strong>Database "classicmodels" adalah contoh basis data yang umumnya digunakan dalam dunia pengembangan perangkat lunak dan 
        manajemen basis data untuk tujuan demonstrasi, pembelajaran, dan latihan. Basis data ini memodelkan perusahaan yang memproduksi 
        dan menjual model mobil klasik. Database ini mencakup tabel yang menyimpan informasi tentang pelanggan, pesanan, produk, karyawan, 
        dan banyak aspek lainnya yang terkait dengan bisnis model mobil klasik tersebut.</strong></p>
    <br>
    <a href="/products" class="btn btn-success">SELAMAT DATANG!!!</a>
</div>

@endsection