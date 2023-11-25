<?php

namespace App\Http\Controllers;

use App\Models\pengeluaran_admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class pengeluaran_adminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $katakunci = $request->katakunci;
        $jumlahbaris = 5;
        if (strlen($katakunci)) {
            $data = pengeluaran_admin::where('catatan', 'like', "%$katakunci%")
                ->orWhere('jenis', 'like', "%$katakunci%")
                ->orWhere('mitra', 'like', "%$katakunci%")
                ->orWhere('harga', 'like', "%$katakunci%")
                ->paginate($jumlahbaris);
        } else {

            $data = pengeluaran_admin::orderBy('mitra', 'desc')->paginate($jumlahbaris);
        }
        return view('pengeluaran_admin.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pengeluaran_admin.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session::flash('jenis', $request->jenis);
        Session::flash('mitra', $request->mitra);
        Session::flash('harga', $request->harga);
        Session::flash('catatan', $request->catatan);

        $request->validate([
            'jenis' => 'required',
            'mitra' => 'required',
            'harga' => 'required',
            'catatan' => 'required'
        ], [
            'jenis.required' => 'Jenis wajib di isi',
            'mitra.required' => 'Mitra wajib di isi',
            'harga.required' => 'Harga pakan wajib di isi',
            'catatan.required' => 'Catatan wajib di isi',
        ]);
        $data = [
            'jenis' => $request->jenis,
            'mitra' => $request->mitra,
            'harga' => $request->harga,
            'catatan' => $request->catatan,
        ];
        pengeluaran_admin::create($data);
        return redirect()->to('pengeluaran_admin')->with('success', 'Berhasil menambahkan data');
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
        $data = pengeluaran_admin::where('id', $id)->first();
        return view('pengeluaran_admin.edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'harga' => 'required',
            'jenis' => 'required',
            'catatan' => 'required',
            'mitra' => 'required',
        ], [
            'harga.required' => 'Harga pakan wajib di isi',
            'jenis.required' => 'Jenis wajib di isi',
            'catatan.required' => 'Catatan wajib di isi',
            'mitra.required' => 'Mitra wajib di isi',
        ]);
        $data = [
            'harga' => $request->harga,
            'jenis' => $request->jenis,
            'catatan' => $request->catatan,
            'mitra' => $request->mitra,
        ];
        pengeluaran_admin::where('id', $id)->update($data);
        return redirect()->to('pengeluaran_admin')->with('success', 'Berhasil update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        pengeluaran_admin::where('id', $id)->delete();
        return redirect()->to('pengeluaran_admin')->with('success', 'Data telah dihapus');
    }
}
