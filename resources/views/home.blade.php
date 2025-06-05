@extends('layout/template')

@section('content')
<div class="container mt-5">
    <!-- Header Informasi Praktikum -->
    <div class="text-center mb-4">
        <h1 class="fw-bold">Praktikum Pemrograman Geospasial Lanjut</h1>
        <p class="mb-1">Nama: Fildzah Hind Ihsamy</p>
        <p class="mb-1">NIM: 23/522655/SV/23746</p>
        <p class="mb-3">Kelas: B</p>
        <hr>
        <p class="lead">Selamat datang di aplikasi peta interaktif untuk mengelola dan menampilkan data spasial secara dinamis menggunakan titik, garis, dan poligon.</p>
    </div>

    <!-- Fitur Aplikasi -->
    <div class="row justify-content-center">
        <!-- Peta Interaktif -->
        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body text-center">
                    <h5 class="card-title">Peta Interaktif</h5>
                    <p class="card-text">Visualisasi dan pengelolaan fitur spasial secara langsung melalui antarmuka peta.</p>
                    <a href="{{ route('map') }}" class="btn btn-primary">Buka Peta</a>
                </div>
            </div>
        </div>

        <!-- Tabel Data -->
        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body text-center">
                    <h5 class="card-title">Tabel Data</h5>
                    <p class="card-text">Lihat seluruh data spasial dalam bentuk tabel yang terstruktur dan informatif.</p>
                    <a href="{{ route('table') }}" class="btn btn-success">Lihat Tabel</a>
                </div>
            </div>
        </div>

        <!-- Tentang Aplikasi -->
        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body text-center">
                    <h5 class="card-title">Tentang Aplikasi</h5>
                    <p class="card-text">Dibangun menggunakan Laravel dan Leaflet.js untuk mendukung analisis dan pengelolaan data geospasial.</p>
                    <a href="#" class="btn btn-secondary disabled">Versi 1.0</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
