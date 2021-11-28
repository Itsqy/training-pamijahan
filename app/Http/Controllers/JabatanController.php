<?php

namespace App\Http\Controllers;

use App\Jabatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Alert;

class JabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $jabatan = Jabatan::paginate(3);
        return view('jabatan.index', compact('jabatan'));
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
        $input = $request->all();
        $validator = Validator::make($input, [
            'nama_jabatan' => 'max:50',
            'gaji_pokok' => 'max:50',
        ]);

        if ($validator->fails()) {
            //kalo back ketika salah balik lagi tapi g bawa data apa2
            return back()->withInput();
        }

        Jabatan::create($input);
        Alert::success('success', 'berhasil menambahkan jabatan ');
        //balik tapi udh bawa data
        return redirect('/jabatan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $jabatan = Jabatan::find($id);
        return view('jabatan.detail', compact('jabatan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jabatan = Jabatan::find($id);
        return view('jabatan.edit', compact('jabatan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $jabatan = Jabatan::find($id);
        $input = $request->all();
        $validator = Validator::make($input, [
            'nama_jabatan' => 'max:50',
            'gaji_pokok' => 'max:50',
        ]);

        if ($validator->fails()) {
            //kalo back ketika salah balik lagi tapi g bawa data apa2
            return back()->withInput();
        }

        $jabatan->update($input);
        //balik tapi udh bawa data
        return redirect('/jabatan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Jabatan::find($id);
        $data->delete();
        return back();
    }
}
