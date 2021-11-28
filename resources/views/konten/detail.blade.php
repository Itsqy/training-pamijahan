@extends('layouts.template')

@section('tab')
    Halaman konten
@endsection


@section('title')
    Detail konten
@endsection



@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Detail konten
                    </div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <tr>
                                <th>judul konten : </th>
                                <td>{{ $konten->judul_konten }}</td>
                            </tr>
                            <tr>
                                <th>isi konten : </th>
                                <td> {{ $konten->isi_konten }}</td>
                            </tr>

                            <tr>
                                <th>tanggal Terbit : </th>
                                <td> {{ $konten->tanggal_terbit }}</td>
                            </tr>

                            <tr>
                                <th>penerbit : </th>
                                <td> {{ $konten->penerbit }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
