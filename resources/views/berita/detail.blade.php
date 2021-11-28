@extends('layouts.template')

@section('tab')
    Halaman berita
@endsection


@section('title')
    Detail berita
@endsection



@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Detail berita
                    </div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <tr>
                                <th>judul berita : </th>
                                <td>{{ $berita->judul_berita }}</td>
                            </tr>
                            <tr>
                                <th>isi berita : </th>
                                <td> {{ $berita->isi_berita }}</td>
                            </tr>

                            <tr>
                                <th>tanggal Terbit : </th>
                                <td> {{ $berita->tanggal_terbit }}</td>
                            </tr>

                            <tr>
                                <th>penerbit : </th>
                                <td> {{ $berita->penerbit }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
