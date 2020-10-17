<?php

namespace App\Http\Controllers\otentikasi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class OtentikasiController extends Controller
{
    public function index()
    {
        return view('otentikasi.login');
    }

    public function login(Request $request)
    {
        // dd($request->all());

        // $data = User::where('email', $request->email)->firstOrFail(); ->kalau data tidak ada maka 404
        $data = User::where('email', $request->email)->first();
        if ($data) {
            if (Hash::check($request->password, $data->password)) {
                session(['berhasil_login' => true]);
                return redirect()->route('home');
            }
        }
        return redirect()->route('index')->with('status', 'Email atau Password salah!');
    }

    public function logout(Request $request)
    {
        $request->session()->flush();

        return redirect()->route('index')->with('status', 'Anda telah berhasil logut');
    }
}
