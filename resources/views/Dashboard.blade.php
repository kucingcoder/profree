@extends('layouts.User')

@section('judul')
Profree - Programer Terbaik
@endsection

@section('konten')
<div class="card">
    <h5 class="card-header">Pencarian</h5>
</div>

<div class="card mt-4">
    <h5 class="card-header">Daftar Programer Dari Yang Terbaik</h5>
    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Pengalaman</th>
                    <th>Projek</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
            </tbody>
        </table>
    </div>
</div>
@endsection