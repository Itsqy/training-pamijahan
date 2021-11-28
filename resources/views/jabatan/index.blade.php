@extends('layouts.template')
@section('tab')
    Halaman jabatan
@endsection


@section('title')
    Detail jabatan
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
                                    <th>nama jabatan</th>
                                    <th>gaji_pokok</th>

                                    <th>action</th>
                                </tr>

                            </thead>
                            @foreach ($jabatan as $row)
                                <tr>
                                    <td>{{ $loop->iteration + $jabatan->perpage() * ($jabatan->currentPage() - 1) }}
                                    </td>
                                    <td>{{ $row->nama_jabatan }}</td>
                                    <td>{{ $row->gaji_pokok }}</td>
                                    <td>{{ $row->tanggal_terbit }}</td>
                                    <td>
                                        <form action="{{ route('jabatan.destroy', $row->id) }}" method="POST"
                                            onsubmit="return confirm('hapus jabatan {{ $row->nama_jabatan }} ? ')">
                                            @csrf
                                            @method('delete')
                                            <a href="{{ route('jabatan.show', $row->id) }}" class="btn btn-primary"><i
                                                    class="fa fa-eye"> detail </i></a>
                                            <a href="{{ route('jabatan.edit', $row->id) }}" class="btn btn-warning"><i
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
                        {{ $jabatan->appends(Request::all())->links() }}
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
                        <h5 class="modal-title" id="exampleModalLabelLogout">halaman jabatan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('jabatan.store') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="" class="form-label">nama jabatan :</label>
                                <input type="text" name="nama_jabatan" required="required"
                                    value="{{ old('nama_jabatan') }}" id="" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label">gaji_pokok : </label>
                                <input type="text" name="gaji_pokok" id="" required="required"
                                    value="{{ old('gaji_pokok') }}" class="form-control">
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
