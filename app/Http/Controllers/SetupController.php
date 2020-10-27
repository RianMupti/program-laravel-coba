<?php

namespace App\Http\Controllers;

use App\Models\Setup;
use Illuminate\Http\Request;

class SetupController extends Controller
{
    // validation
    private function _validation(Request $request)
    {
        $request->validate([
            'nama_aplikasi' => 'required|max:100|min:3',
            'jumlah_hari_kerja' => 'required|min:10|max:999|numeric',
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $setup = Setup::get();

        return view('konfigurasi/setupAplikasi', compact('setup'));
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
        $this->_validation($request);
        // dd($request->all());
        // $setup = new Setup;
        // $setup->nama_aplikasi = $request->nama_aplikasi;
        // $setup->jumlah_hari_kerja = $request->jumlah_hari_kerja;
        // $setup->save();

        Setup::create($request->all());

        return redirect()->route('setup.index')->with('status', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Models\Setup  $setup
     * @return \Illuminate\Http\Response
     */
    public function show(Setup $setup)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Models\Setup  $setup
     * @return \Illuminate\Http\Response
     */
    public function edit(Setup $setup)
    {
        // $data = Setup::find(setup);
        return view('konfigurasi/setup-edit', compact('setup'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Models\Setup  $setup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Setup $setup)
    {
        $this->_validation($request);
        // dd($request->all());

        Setup::where('id', $setup->id)
            ->update([
                'nama_aplikasi' => $request->nama_aplikasi,
                'jumlah_hari_kerja' => $request->jumlah_hari_kerja
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Models\Setup  $setup
     * @return \Illuminate\Http\Response
     */
    public function destroy(Setup $setup)
    {
        //
    }
}
