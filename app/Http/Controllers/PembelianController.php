<?php

namespace App\Http\Controllers;

use App\PembelianModel;
use Illuminate\Http\Request;


class PembelianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tbl_pembelians = PembelianModel::all();
        // return view('admin.pembelian.index', compact('tbl_pembelians'));
        return view('admin.pembelian.index', [
            'tbl_pembelians' => $tbl_pembelians
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pembelian.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = validator($request->all(), [
            'kategori' => 'required',
            'total_item' => 'required',
            'total_nominal' => 'required',
        ])->validate();

        $tbl_pembelians = new PembelianModel($validatedData);
        $tbl_pembelians->save();

        return redirect(route('daftarPembelian'))->with('success', 'Data Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \app\PembelianModel $tbl_pembelians
     * @return \Illuminate\Http\Response
     */
    public function show(PembelianModel $tbl_pembelians)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \app\PembelianModel $tbl_pembelians
     * @return \Illuminate\Http\Response
     */
    public function edit(PembelianModel $tbl_pembelians)
    {
        return view('admin.pembelian.edit', [
            'tbl_pembelians' => $tbl_pembelians,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \app\PembelianModel $tbl_pembelians
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PembelianModel $tbl_pembelians)
    {

        $validatedData = validator($request->all(), [
            'kategori' => 'required',
            'total_item' => 'required',
            'total_nominal' => 'required',
        ])->validate();

        $tbl_pembelians->kategori = $validatedData['kategori'];
        $tbl_pembelians->total_item = $validatedData['total_item'];
        $tbl_pembelians->total_nominal = $validatedData['total_nominal'];
        $tbl_pembelians->save();

        return redirect(route('daftarPembelian'))->with('success', 'Data Berhasil Disimpan');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \app\PembelianModel $tbl_pembelians
     * @return \Illuminate\Http\Response
     */
    public function destroy(PembelianModel $tbl_pembelians)
    {
        $tbl_pembelians->delete();
        return redirect(route('daftarPembelian'))->with('success', 'Data Berhasil Di hapus');
    }
}
