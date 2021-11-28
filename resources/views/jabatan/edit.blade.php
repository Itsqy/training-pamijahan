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
                        <strong>Edit Jabatan</strong>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <form action="{{ route('jabatan.update', $jabatan->id) }}" method="post">
                                @csrf
                                @method('put')
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="" class="form-label">Nama jabatan :</label>
                                        <input type="text" name="nama_jabatan" required="required"
                                            value="{{ $jabatan->nama_jabatan }}" id="" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="form-label">gaji_pokok : </label>
                                        <input type="text" name="gaji_pokok" id="" required="required"
                                            value="{{ $jabatan->gaji_pokok }}" class="form-control">
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    {{-- //jika menggunakan data-dismiss="modal" , maka ketika klik tombol nya maka modal nya ilang ,
                                    biasa dipakai untuk cancel --}}
                                    <button type="submit" class="btn btn-outline-primary">Edit</button>

                                </div>
                            </form>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
