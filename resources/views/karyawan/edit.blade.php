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
                        <strong>Edit karyawan</strong>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <form action="{{ route('karyawan.update', $karyawan->id) }}" method="POST">
                                @csrf
                                @method('put')
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="" class="form-label">nama karyawan :</label>
                                        <input type="text" name="nama_karyawan" required="required"
                                            value="{{ $karyawan->nama_karyawan }}" id="" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label for="" class="form-label">username : </label>
                                        <input type="text" name="username" id="" required="required"
                                            value="{{ $karyawan->username }}" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="form-label">password : </label>
                                        <input type="password" name="password" id="" value="" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label for="" class="form-label">jabatan : </label>
                                        <select name="id_jabatan" class="form-control" required="required">
                                            <option value="">{{ $karyawan->jabatan->nama_jabatan }}</option>
                                            @foreach ($jabatan as $row)
                                                <option value="{{ $row->id }}">{{ $row->nama_jabatan }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="" class="form-label">status : </label>
                                        <select name="status" class="form-control" required="required">
                                            <option value="{{ $karyawan->status }}">{{ $karyawan->status }}</option>

                                            <option value="kontrak">kontrak</option>
                                            <option value="magang">magang</option>
                                            <option value="tetap">tetap</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="form-label">nomor_hp : </label>
                                        <input type="text" name="nomor_hp" id="" required="required"
                                            value="{{ $karyawan->nomor_hp }}" class="form-control">
                                    </div>



                                </div>
                                <div class="modal-footer">
                                    {{-- //jika menggunakan data-dismiss="modal" , maka ketika klik tombol nya maka modal nya ilang ,
                                    biasa dipakai untuk cancel --}}
                                    <button type="submit" class="btn btn-outline-primary">edit</button>

                                </div>
                            </form>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
