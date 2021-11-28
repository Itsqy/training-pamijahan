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
                                <td>{{ $karyawan->nama_karyawan }}</td>
                            </tr>
                            <tr>
                                <th>jabatan penggajian : </th>
                                <td> {{ $karyawan->jabatan->nama_jabatan }}</td>
                            </tr>

                            <tr>
                                <th>status : </th>
                                <td> {{ $karyawan->status }}</td>
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
                                <th>total tunjangan</th>
                                <th>Jumlah Potongan</th>
                                <th>Total Gaji</th>
                                <th></th>
                            </tr>
                            @foreach ($penggajian as $row)

                                <tr>
                                    <td>{{ $row->bulan_gajian }}/{{ $row->tahun_gajian }}</td>
                                    <td> Rp. {{ number_format($row->total_tunjangan) }}</td>
                                    <td> Rp. {{ number_format($row->potongan) }}</td>
                                    <td> Rp. {{ number_format($row->total_gajian) }}</td>
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
