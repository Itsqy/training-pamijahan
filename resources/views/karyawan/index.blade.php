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
                                    <th>nama karyawan</th>
                                    <th>jabatan</th>
                                    <th>status</th>
                                    <th>nomor_hp</th>
                                    <th>action</th>
                                </tr>

                            </thead>
                            @foreach ($karyawan as $row)
                                <tr>
                                    <td>{{ $loop->iteration + $karyawan->perpage() * ($karyawan->currentPage() - 1) }}
                                    </td>
                                    <td>{{ $row->nama_karyawan }}</td>
                                    <td>{{ $row->jabatan->nama_jabatan }}</td>
                                    <td>{{ $row->status }}</td>
                                    <td>{{ $row->nomor_hp }}</td>
                                    <td>
                                        <form action="{{ route('karyawan.destroy', $row->id) }}" method="POST"
                                            onsubmit="return confirm('hapus  {{ $row->nama_karyawan }} ? ')">
                                            @csrf
                                            @method('delete')

                                            {{-- //buat liat detail --}}
                                            <a href="{{ route('karyawan.show', $row->id) }}" class="btn btn-primary"><i
                                                    class="fa fa-eye"> detail </i></a>

                                            {{-- buat edit --}}
                                            <a href="{{ route('karyawan.edit', $row->id) }}" class="btn btn-warning"><i
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
                        {{ $karyawan->appends(Request::all())->links() }}
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
                        <h5 class="modal-title" id="exampleModalLabelLogout">HAlaman karyawan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('karyawan.store') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="" class="form-label">nama karyawan :</label>
                                <input type="text" name="nama_karyawan" required="required"
                                    value="{{ old('nama_karyawan') }}" id="" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="" class="form-label">username : </label>
                                <input type="text" name="username" id="" required="required"
                                    value="{{ old('username') }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label">password : </label>
                                <input type="password" name="password" id="" required="required"
                                    value="{{ old('password') }}" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="" class="form-label">jabatan : </label>
                                <select name="id_jabatan" class="form-control" required="required">
                                    <option value=""> pilih jabatan</option>
                                    @foreach ($jabatan as $row)
                                        <option value="{{ $row->id }}">{{ $row->nama_jabatan }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="" class="form-label">status : </label>
                                <select name="status" class="form-control" required="required">
                                    <option value=""> pilih status</option>

                                    <option value="kontrak">kontrak</option>
                                    <option value="magang">magang</option>
                                    <option value="tetap">tetap</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label">nomor_hp : </label>
                                <input type="text" name="nomor_hp" id="" required="required"
                                    value="{{ old('nomor_hp') }}" class="form-control">
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
