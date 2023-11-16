<?php

namespace App\Http\Controllers;

use App\Models\pengeluaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class pengeluaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $katakunci = $request->katakunci;
        $jumlahbaris = 5;
        if (strlen($katakunci)) {
            $data = pengeluaran::where('catatan', 'like', "%$katakunci%")
                ->orWhere('tanggal', 'like', "%$katakunci%")
                ->orWhere('harga_pakan', 'like', "%$katakunci%")
                ->paginate($jumlahbaris);
        } else {

            $data = pengeluaran::orderBy('tanggal', 'desc')->paginate($jumlahbaris);
        }
        return view('pengeluaran.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pengeluaran.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session::flash('tanggal', $request->tanggal);
        Session::flash('harga_pakan', $request->harga_pakan);
        Session::flash('catatan', $request->catatan);

        $request->validate([
            'tanggal' => 'required',
            'harga_pakan' => 'required',
            'catatan' => 'required'
        ], [
            'tanggal.required' => 'Tanggal wajib di isi',
            'harga_pakan.required' => 'Harga pakan wajib di isi',
            'catatan.required' => 'Catatan wajib di isi',
        ]);
        $data = [
            'tanggal' => $request->tanggal,
            'harga_pakan' => $request->harga_pakan,
            'catatan' => $request->catatan,
        ];
        pengeluaran::create($data);
        return redirect()->to('pengeluaran')->with('success', 'Berhasil menambahkan data');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = pengeluaran::where('id', $id)->first();
        return view('pengeluaran.edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'harga_pakan' => 'required',
            'catatan' => 'required'
        ], [
            'harga_pakan.required' => 'Harga pakan wajib di isi',
            'catatan.required' => 'Catatan wajib di isi',
        ]);
        $data = [
            'harga_pakan' => $request->harga_pakan,
            'catatan' => $request->catatan,
        ];
        pengeluaran::where('id', $id)->update($data);
        return redirect()->to('pengeluaran')->with('success', 'Berhasil update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        pengeluaran::where('id', $id)->delete();
        return redirect()->to('pengeluaran')->with('success', 'Data telah dihapus');
    }
}
