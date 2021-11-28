@extends('layouts.template')

@section('tab')
    Halaman Tunjangan
@endsection


@section('title')
    Detail Tunjangan
@endsection



@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong>Edit Tunjangan</strong>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <form action="{{ route('tunjangan.update', $tunjangan->id) }}" method="post">
                                @csrf
                                @method('put')
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="" class="form-label">Nama Tunjangan :</label>
                                        <input type="text" name="nama_tunjangan" required="required"
                                            value="{{ $tunjangan->nama_tunjangan }}" id="" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="form-label">nominal : </label>
                                        <input type="text" name="nominal" id="" required="required"
                                            value="{{ $tunjangan->nominal }}" class="form-control">
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
