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
                                    <th>Tunjangan</th>
                                    <th>Nomial</th>
                                    <th>action</th>
                                </tr>

                            </thead>
                            @foreach ($tunjangan as $row)
                                <tr>
                                    <td>{{ $loop->iteration + $tunjangan->perpage() * ($tunjangan->currentPage() - 1) }}
                                    </td>
                                    <td>{{ $row->nama_tunjangan }}</td>
                                    <td> RP. {{ number_format($row->nominal) }}</td>
                                    <td>
                                        <form action="{{ route('tunjangan.destroy', $row->id) }}" method="POST"
                                            onsubmit="return confirm('hapus tunjangan {{ $row->nama_tunjangan }} ? ')">
                                            @csrf
                                            @method('delete')
                                            <a href="{{ route('tunjangan.show', $row->id) }}" class="btn btn-primary"><i
                                                    class="fa fa-eye"> detail </i></a>
                                            <a href="{{ route('tunjangan.edit', $row->id) }}" class="btn btn-warning"><i
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
                        {{ $tunjangan->appends(Request::all())->links() }}
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
                        <h5 class="modal-title" id="exampleModalLabelLogout">halaman tunjangan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('tunjangan.store') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="" class="form-label">Nama Tunjangan :</label>
                                <input type="text" name="nama_tunjangan" required="required"
                                    value="{{ old('nama_tunjangan') }}" id="" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label">nominal : </label>
                                <input type="text" name="nominal" id="" required="required" value="{{ old('nominal') }}"
                                    class="form-control">
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
