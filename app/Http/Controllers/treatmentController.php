<?php

namespace App\Http\Controllers;

use App\Models\treatment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class treatmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $katakunci = $request->katakunci;
        $jumlahbaris = 5;
        if (strlen($katakunci)) {
            $data = treatment::where('batch', 'like', "%$katakunci%")
                ->orWhere('jenis_vaksinvitamin', 'like', "%$katakunci%")
                ->orWhere('umur', 'like', "%$katakunci%")
                ->orWhere('jml_ayam', 'like', "%$katakunci%")
                ->orWhere('tanggal', 'like', "%$katakunci%")
                ->paginate($jumlahbaris);
        } else {

            $data = treatment::orderBy('tanggal', 'desc')->paginate($jumlahbaris);
        }
        return view('treatment.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('treatment.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session::flash('batch', $request->batch);
        Session::flash('jenis_vaksinvitamin', $request->jenis_vaksinvitamin);
        Session::flash('umur', $request->umur);
        Session::flash('jml_ayam', $request->jml_ayam);
        Session::flash('tanggal', $request->tanggal);

        $request->validate([
            'batch' => 'required',
            'jenis_vaksinvitamin' => 'required',
            'umur' => 'required',
            'jml_ayam' => 'required',
            'tanggal' => 'required',
        ], [
            'batch.required' => 'batch wajib di isi',
            'jenis_vaksinvitamin.required' => 'Harga pakan wajib di isi',
            'umur.required' => 'Harga pakan wajib di isi',
            'jml_ayam.required' => 'jml_ayam wajib di isi',
            'tanggal.required' => 'Tanggal wajib di isi',
        ]);
        $data = [
            'batch' => $request->batch,
            'jenis_vaksinvitamin' => $request->jenis_vaksinvitamin,
            'umur' => $request->umur,
            'jml_ayam' => $request->jml_ayam,
            'tanggal' => $request->tanggal,
        ];
        treatment::create($data);
        return redirect()->to('treatment')->with('success', 'Berhasil menambahkan data');
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
        $data = treatment::where('id', $id)->first();
        return view('treatment.edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'batch' => 'required',
            'jenis_vaksinvitamin' => 'required',
            'umur' => 'required',
            'jml_ayam' => 'required',
            'tanggal' => 'required',
        ], [
            'batch' => 'Batch wajib di isi',
            'jenis_vaksinvitamin' => 'Jenis wajib di isi',
            'umur' => 'Umur wajib di isi',
            'jml_ayam' => 'Jumlah ayam wajib di isi',
            'tanggal' => 'Tanggal wajib di isi',
        ]);
        $data = [
            'batch' => $request->batch,
            'jenis_vaksinvitamin' => $request->jenis_vaksinvitamin,
            'umur' => $request->umur,
            'jml_ayam' => $request->jml_ayam,
            'tanggal' => $request->tanggal,
        ];
        treatment::where('id', $id)->update($data);
        return redirect()->to('treatment')->with('success', 'Berhasil update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        treatment::where('id', $id)->delete();
        return redirect()->to('treatment')->with('success', 'Data telah dihapus');
    }
}
