<?php

namespace App\Http\Controllers;

use App\Karyawan;
use App\Jabatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Arr;

use Symfony\Component\Console\Input\Input;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $karyawan = Karyawan::paginate(3);
        $jabatan = Jabatan::all();
        return view('karyawan.index', compact('karyawan', 'jabatan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pesan = [
            'nama_karyawan.max' => "kelebihan coo namanya ",

            'nomor_hp.min' => "dikit banget si nomernya ",
            'username.min' => "dikit banget si namanya ",

            'password.min' => "password minimal 4 cuyy (bu yuyun mode) "
        ];
        $input = $request->all();
        $validator = Validator::make($input, [
            'nama_karyawan' => 'max:20',
            'nomor_hp' => 'min:6',
            'username' => 'min:3',
            'password' => 'min:4',

        ], $pesan);

        if ($validator->fails()) {
            return back()->withInput();
        }
        $input['password'] = password_hash($request->input('password'), PASSWORD_DEFAULT);
        $input['tanggal_masuk'] = date('Y-m-d');
        Karyawan::create($input);

        return redirect('/karyawan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $karyawan = Karyawan::find($id);
        $jabatan = Jabatan::all();
        return view('karyawan.detail', compact('jabatan', 'karyawan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $karyawan = Karyawan::find($id);
        $jabatan = Jabatan::all();
        return view('karyawan.edit', compact('jabatan', 'karyawan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $karyawan = Karyawan::find($id);
        $input = $request->all();

        $validator = Validator::make($input, [
            'judul_konten' => 'max:50',

        ]);

        if ($validator->fails()) {
            //kalo back ketika salah balik lagi tapi g bawa data apa2
            return back()->withInput();
        }
        if ($request->input('password')) {
            $input['password'] = password_hash($request->input('password'), PASSWORD_DEFAULT);
        } else {
            $input['password'] = Arr::except($input, ['password']);
        }
        $input['tanggal_masuk'] = date('Y-m-d');
        $karyawan->update($input);
        //balik tapi udh bawa data
        return redirect('/karyawan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Karyawan::find($id);
        $data->delete();
        return back();
    }
}
