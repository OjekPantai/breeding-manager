<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pendapatan;
use Illuminate\Support\Facades\Session;

class pendapatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $katakunci = $request->katakunci;
        $jumlahbaris = 5;
        if (strlen($katakunci)) {
            $data = pendapatan::where('catatan', 'like', "%$katakunci%")
                ->orWhere('tanggal', 'like', "%$katakunci%")
                ->orWhere('jumlah', 'like', "%$katakunci%")
                ->orWhere('harga', 'like', "%$katakunci%")
                ->paginate($jumlahbaris);
        } else {

            $data = pendapatan::orderBy('tanggal', 'desc')->paginate($jumlahbaris);
        }
        return view('pendapatan.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pendapatan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session::flash('tanggal', $request->tanggal);
        Session::flash('jumlah', $request->jumlah);
        Session::flash('harga', $request->harga);
        Session::flash('catatan', $request->catatan);

        $request->validate([
            'tanggal' => 'required',
            'jumlah' => 'required',
            'harga' => 'required',
            'catatan' => 'required'
        ], [
            'tanggal.required' => 'Tanggal wajib di isi',
            'jumlah.required' => 'Jumlah wajib di isi',
            'harga.required' => 'Harga pakan wajib di isi',
            'catatan.required' => 'Catatan wajib di isi',
        ]);
        $data = [
            'tanggal' => $request->tanggal,
            'jumlah' => $request->jumlah,
            'harga' => $request->harga,
            'catatan' => $request->catatan,
        ];
        pendapatan::create($data);
        return redirect()->to('pendapatan')->with('success', 'Berhasil menambahkan data');
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
        $data = pendapatan::where('id', $id)->first();
        return view('pendapatan.edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'jumlah' => 'required',
            'harga' => 'required',
            'catatan' => 'required'
        ], [
            'jumlah.required' => 'Jumlah pakan wajib di isi',
            'harga.required' => 'Harga pakan wajib di isi',
            'catatan.required' => 'Catatan wajib di isi',
        ]);
        $data = [
            'jumlah' => $request->jumlah,
            'harga' => $request->harga,
            'catatan' => $request->catatan,
        ];
        pendapatan::where('id', $id)->update($data);
        return redirect()->to('pendapatan')->with('success', 'Berhasil update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        pendapatan::where('id', $id)->delete();
        return redirect()->to('pendapatan')->with('success', 'Data telah dihapus');
    }
}
