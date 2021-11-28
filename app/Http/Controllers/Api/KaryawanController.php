<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\response;
use App\Http\Resources\KaryawanResource;
use App\karyawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;



class KaryawanController extends Controller
{
    public function login_karyawan(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'username' => $request->username,
            'password' => $request->password,

        ]);
        if ($validator->fails()) {
            return response()()->json([
                'status' => FALSE,
                'msg' => $validator,
            ], 400);
        }

        $username = $request->input('username');
        $password = $request->input('password');
        $karyawan = Karyawan::where([
            ['username', $username],

        ])->first();

        if (is_null($karyawan)) {
            return response()->json([
                'status' => FALSE,
                'msg' => 'username tidak ditemukan !!'
            ], 200);
        } else {
            if (password_verify($password, $karyawan->password)) {
                return response()->json([
                    'status' => TRUE,
                    'karyawan' => new KaryawanResource($karyawan)
                ], 200);
            } else {
                return response()->json([
                    'status' => FALSE,
                    'msg' => 'password salah'
                ], 200);
            }
        }
    }
}
