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
                        <a href="javascript:void(0)" data-toggle="modal" data-target="#addModal" class="btn btn-success">
                            <i class="fa fa-plus">
                                Add
                            </i>
                        </a>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover">

                            <thead>
                                <tr>

                                    <th>no</th>
                                    <th>judul konten</th>
                                    <th>penerbit</th>
                                    <th>tanggal terbit</th>
                                    <th>action</th>
                                </tr>

                            </thead>
                            @foreach ($konten as $row)
                                <tr>
                                    <td>{{ $loop->iteration + $konten->perpage() * ($konten->currentPage() - 1) }}
                                    </td>
                                    <td>{{ $row->judul_konten }}</td>
                                    <td>{{ $row->penerbit }}</td>
                                    <td>{{ $row->tanggal_terbit }}</td>
                                    <td>
                                        <form action="{{ route('konten.destroy', $row->id) }}" method="POST"
                                            onsubmit="return confirm('hapus konten {{ $row->judul_konten }} ? ')">
                                            @csrf
                                            @method('delete')

                                            {{-- //buat liat detail --}}
                                            <a href="{{ route('konten.show', $row->id) }}" class="btn btn-primary"><i
                                                    class="fa fa-eye"> detail </i></a>

                                            {{-- buat edit --}}
                                            <a href="{{ route('konten.edit', $row->id) }}" class="btn btn-warning"><i
                                                    class="fa fa-edit"></i> edit </a>
                                            <button type="submit" class="btn btn-danger"><i class="fa fa-trash"> Hapus
                                                </i>
                                            </button>

                                        </form>
                                    </td>
                                </tr>

                            @endforeach

                            <tbody>

                            </tbody>
                        </table>
                        {{-- PAGINATE --}}
                        {{ $konten->appends(Request::all())->links() }}
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Logout -->
        <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabelLogout">HAlaman konten</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('konten.store') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="" class="form-label">judul konten :</label>
                                <input type="text" name="judul_konten" required="required"
                                    value="{{ old('judul_konten') }}" id="" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label">penerbit : </label>
                                <input type="text" name="penerbit" id="" required="required"
                                    value="{{ old('penerbit') }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label">isi_konten : </label>

                                <textarea name="isi_konten" rows="5" class="form-control"
                                    required="required">{{ old('isi_konten') }}</textarea>

                            </div>


                        </div>
                        <div class="modal-footer">
                            {{-- //jika menggunakan data-dismiss="modal" , maka ketika klik tombol nya maka modal nya ilang ,
                            biasa dipakai untuk cancel --}}
                            <button type="submit" class="btn btn-outline-primary">tambah</button>
                            <button type="submit" class="btn btn-outline-warning">reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>




@endsection
