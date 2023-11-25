<?php

namespace App\Http\Controllers;

use App\Models\monitoring;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class monitoringController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $katakunci = $request->katakunci;
        $jumlahbaris = 5;
        if (strlen($katakunci)) {
            $data = monitoring::where('batch', 'like', "%$katakunci%")
                ->orWhere('jenis_pejantan', 'like', "%$katakunci%")
                ->orWhere('jenis_betina', 'like', "%$katakunci%")
                ->orWhere('jml_hidup', 'like', "%$katakunci%")
                ->orWhere('jml_mati', 'like', "%$katakunci%")
                ->paginate($jumlahbaris);
        } else {

            $data = monitoring::orderBy('batch', 'desc')->paginate($jumlahbaris);
        }
        return view('monitoring.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('monitoring.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session::flash('batch', $request->batch);
        Session::flash('jenis_pejantan', $request->jenis_pejantan);
        Session::flash('jenis_betina', $request->jenis_betina);
        Session::flash('jml_hidup', $request->jml_hidup);
        Session::flash('jml_mati', $request->jml_mati);


        $request->validate([
            'batch' => 'required',
            'jenis_pejantan' => 'required',
            'jenis_betina' => 'required',
            'jml_hidup' => 'required',
            'jml_mati' => 'required'
        ], [
            'batch.required' => 'batch wajib di isi',
            'jenis_pejantan.required' => 'jenis_pejantan wajib di isi',
            'jenis_betina.required' => 'jenis_betina pakan wajib di isi',
            'jml_hidup.required' => 'jml_hidup wajib di isi',
            'jml_mati.required' => 'jml_mati wajib di isi',
        ]);
        $data = [
            'batch' => $request->batch,
            'jenis_pejantan' => $request->jenis_pejantan,
            'jenis_betina' => $request->jenis_betina,
            'jml_hidup' => $request->jml_hidup,
            'jml_mati' => $request->jml_mati,
        ];
        monitoring::create($data);
        return redirect()->to('monitoring')->with('success', 'Berhasil menambahkan data');
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
        $data = monitoring::where('id', $id)->first();
        return view('monitoring.edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'batch' => 'required',
            'jenis_pejantan' => 'required',
            'jenis_betina' => 'required',
            'jml_hidup' => 'required',
            'jml_mati' => 'required'
        ], [
            'batch' => 'Batch wajib di isi',
            'jenis_pejantan' => 'Jenis pejantan wajib di isi',
            'jenis_betina' => 'Jenis betina wajib di isi',
            'jml_hidup' => 'Jumlah ayam hidup wajib di isi',
            'jml_mati' => 'Jumlah ayam mati wajib di isi'
        ]);
        $data = [
            'batch' => $request->batch,
            'jenis_pejantan' => $request->jenis_pejantan,
            'jenis_betina' => $request->jenis_betina,
            'jml_hidup' => $request->jml_hidup,
            'jml_mati' => $request->jml_mati,
        ];
        monitoring::where('id', $id)->update($data);
        return redirect()->to('monitoring')->with('success', 'Berhasil update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        monitoring::where('id', $id)->delete();
        return redirect()->to('monitoring')->with('success', 'Data telah dihapus');
    }
}
