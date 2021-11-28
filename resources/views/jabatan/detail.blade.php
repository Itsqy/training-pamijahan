@extends('layouts.template')

@section('tab')
    Halaman Jabatan
@endsection


@section('title')
    Detail Jabatan
@endsection



@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Detail Jabatan
                    </div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <tr>
                                <th>nama Jabatan : </th>
                                <td>{{ $jabatan->nama_jabatan }}</td>
                            </tr>
                            <tr>
                                <th>gaji pokok : </th>
                                <td> Rp .{{ number_format($jabatan->gaji_pokok) }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
