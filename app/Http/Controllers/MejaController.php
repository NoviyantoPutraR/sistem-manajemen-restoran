<?php

namespace App\Http\Controllers;

use App\Meja;
use Illuminate\Http\Request;

class MejaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mejas = Meja::all(); // Ambil semua data menu
        return view('admin.meja.index', ['mejas' => $mejas]);
    }

    public function indexM()
    {
        $mejas = Meja::all(); // Ambil semua data menu
        return view('admin.meja.monitor', ['mejas' => $mejas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.meja.create');
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
            'no_meja' => 'required',
            'kapasitas' => 'required',
            'status' => 'required',
            'terakhir_kunjungan' => 'required',
        ])->validated();

        $meja = new Meja($validatedData);
        $meja->save();

        return redirect(route('daftarMeja'))->with('success', 'Data Berhasil Disimpan');
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
    public function edit(Meja $meja)
    {
        return view('admin.meja.edit', [
            'meja' => $meja
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Meja $meja)

    {
        $validatedData = validator($request->all(), [
            'no_meja' => 'required',
            'kapasitas' => 'required',
            'status' => 'required',
            'terakhir_kunjungan' => 'required',
        ])->validated();

        $meja->kapasitas = $validatedData['kapasitas'];
        $meja->status = $validatedData['status'];
        $meja->terakhir_kunjungan = $validatedData['terakhir_kunjungan'];
        $meja->save();

        return redirect(route('daftarMeja'))->with('success', 'Data Berhasil Diupdate');
    }

    public function updateM(Request $request, Meja $meja)

    {
        // dd($request->all());
        $validatedData = validator($request->all(), [
            'status' => 'required',
        ])->validated();

        $meja->status = $validatedData['status'];
        $meja->save();

        return redirect(route('daftarMejam'))->with('success', 'Status Meja Berhasil Diupdate');
        $request->validate([
            'status' => 'required|in:tidak tersedia,tersedia',
        ]);

        // $pesanan = Pesanan::findOrFail($pesanan);
        $meja->status = $request['status'];
        $meja->update(['status' => $request->status]);

        return redirect()->route('daftarMejam')->with('success', 'Status Meja berhasil diperbarui');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Meja $meja)
    {
        $meja->delete();
        return redirect(route('daftarMeja'))->with('success', 'Data Berhasil Di hapus');;
    }
}
