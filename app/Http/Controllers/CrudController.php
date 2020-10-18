<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CrudController extends Controller
{
    //validation
    private function _validation(Request $request)
    {
        $request->validate([
            'kode_barang' => 'required|unique:data_barang,kode_barang|max:10|min:3',
            'nama_barang' => 'required|max:100|min:3',
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_barang = DB::table('data_barang')->paginate(4);

        return view('crud', ['data_barang' => $data_barang]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('crud-tambah-data');
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

        // DB::insert('insert into data_barang (kode_barang, nama_barang) values (?, ?)', [$request->kode_barang, $request->nama_barang]);

        // query builder
        DB::table('data_barang')->insert([
            [
                'kode_barang' => $request->kode_barang,
                'nama_barang' => $request->nama_barang
            ],
            // ['email' => 'dayle@example.com', 'votes' => 0],
        ]);

        return redirect()->route('crud')->with('status', 'Data berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data_barang = DB::table('data_barang')->where('id', $id)->first();

        return view('crud-edit-data', compact('data_barang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->_validation($request);
        // dd($request->all());
        DB::table('data_barang')->where('id', $id)->update([
            'kode_barang' => $request->kode_barang,
            'nama_barang' => $request->nama_barang,
        ]);

        return redirect()->route('crud')->with('status', 'Data berhasil di ubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('data_barang')->where('id', $id)->delete();

        return redirect()->back()->with('status', 'Data berhasil dihapus!');
    }
}
