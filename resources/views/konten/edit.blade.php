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
                        <strong>Edit konten</strong>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <form action="{{ route('konten.update', $konten->id) }}" method="POST">
                                @csrf
                                @method('put')
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="" class="form-label">judul konten :</label>
                                        <input type="text" name="judul_konten" required="required"
                                            value="{{ $konten->judul_konten }}" id="" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="form-label">penerbit : </label>
                                        <input type="text" name="penerbit" id="" required="required"
                                            value="{{ $konten->penerbit }}" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="form-label">isi_konten : </label>

                                        <textarea name="isi_konten" rows="5" class="form-control"
                                            required="required">{{ $konten->isi_konten }}</textarea>

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
