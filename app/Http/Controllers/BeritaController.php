<?php

namespace App\Http\Controllers;

use App\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $berita = Berita::paginate(3);
        return view('berita.index', compact('berita'));
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
        //karna kalo date harus live  waktunya maka menggunakan functiion dibawah
        $input['tanggal_terbit'] = date('Y-m-d');
        Berita::create($input);

        // return dd($input);
        return redirect('/berita');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $berita = Berita::find($id);
        return view('berita.detail', compact('berita'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $berita = Berita::find($id);
        return view('berita.edit', compact('berita'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $berita = Berita::find($id);
        $input = $request->all();
        $input['tanggal_terbit'] = date('Y-m-d');
        $validator = Validator::make($input, [
            'judul_berita' => 'max:50',

        ]);

        if ($validator->fails()) {
            //kalo back ketika salah balik lagi tapi g bawa data apa2
            return back()->withInput();
        }

        $berita->update($input);
        //balik tapi udh bawa data
        return redirect('/berita');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Berita::find($id);
        $data->delete();
        return back();
    }
}
