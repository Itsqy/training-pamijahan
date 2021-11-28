@extends('layouts.template')

@section('tab')
    Halaman karyawan
@endsection


@section('title')
    Detail karyawan
@endsection



@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Detail karyawan
                    </div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <tr>
                                <th>nama karyawan : </th>
                                <td>{{ $karyawan->nama_karyawan }}</td>
                            </tr>
                            <tr>
                                <th>jabatan karyawan : </th>
                                <td> {{ $karyawan->jabatan->nama_jabatan }}</td>
                            </tr>

                            <tr>
                                <th>status : </th>
                                <td> {{ $karyawan->status }}</td>
                            </tr>

                            <tr>
                                <th>nomor hp : </th>
                                <td> {{ $karyawan->nomor_hp }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
