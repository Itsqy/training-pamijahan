@extends('layouts.template')

@section('tab')
    Halaman penggajian
@endsection


@section('title')
    Detail penggajian
@endsection



@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Detail penggajian
                    </div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <tr>
                                <th>nama penggajian : </th>
                                <td>{{ $penggajian->nama_penggajian }}</td>
                            </tr>
                            <tr>
                                <th>jabatan penggajian : </th>
                                <td> {{ $penggajian->jabatan->nama_jabatan }}</td>
                            </tr>

                            <tr>
                                <th>status : </th>
                                <td> {{ $penggajian->status }}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="card-header">
                        Riwayat penggajian
                    </div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <tr>
                                <th>Periode Gaji</th>
                                <th>Jumlah gaji</th>
                                <th>Jumlah Potongan</th>
                                <th>Total Gaji</th>
                                <th></th>
                            </tr>
                            @foreach (@penggajian as $row)

                                <tr>
                                    <td>{{ $row->bulan_gajian }}/{{ $row->tahun_gajian }}</td>
                                    <td> Rp. {{ number_format($row->total_tunjangan) }}</td>
                                    <td></td>
                                    <td></td>
                                </tr>

                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
