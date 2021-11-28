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
                        <strong>Edit berita</strong>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <form action="{{ route('berita.update', $berita->id) }}" method="POST">
                                @csrf
                                @method('put')
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="" class="form-label">judul berita :</label>
                                        <input type="text" name="judul_berita" required="required"
                                            value="{{ $berita->judul_berita }}" id="" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="form-label">penerbit : </label>
                                        <input type="text" name="penerbit" id="" required="required"
                                            value="{{ $berita->penerbit }}" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="form-label">isi_berita : </label>

                                        <textarea name="isi_berita" rows="5" class="form-control"
                                            required="required">{{ $berita->isi_berita }}</textarea>

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
