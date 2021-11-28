<?php

namespace App\Http\Controllers;

use App\Tunjangan;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TunjanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tunjangan = Tunjangan::paginate(3);
        return view('tunjangan.index', compact('tunjangan'));
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
            'nama_tunjangan' => 'max:50',
            'nominal' => 'max:50',
        ]);

        if ($validator->fails()) {
            //kalo back ketika salah balik lagi tapi g bawa data apa2
            return back()->withInput();
        }

        Tunjangan::create($input);
        //balik tapi udh bawa data
        return redirect('/tunjangan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tunjangan  $tunjangan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //buat detail
        $tunjangan = Tunjangan::find($id);
        return view('tunjangan.detail', compact('tunjangan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tunjangan  $tunjangan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    { // buat ke halaman edit
        $tunjangan = Tunjangan::find($id);
        return view('tunjangan.edit', compact('tunjangan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tunjangan  $tunjangan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    { // buat update data ny
        $tunjangan = Tunjangan::find($id);
        $input = $request->all();
        $validator = Validator::make($input, [
            'nama_tunjangan' => 'max:50',
            'nominal' => 'max:50',
        ]);

        if ($validator->fails()) {
            //kalo back ketika salah balik lagi tapi g bawa data apa2
            return back()->withInput();
        }

        $tunjangan->update($input);
        //balik tapi udh bawa data
        return redirect('/tunjangan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tunjangan  $tunjangan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Tunjangan::find($id);
        $data->delete();
        return back();
    }
}
