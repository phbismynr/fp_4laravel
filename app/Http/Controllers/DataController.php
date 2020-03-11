<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mahasiswa;

class DataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $dataMhs = Mahasiswa::All();

        if($request->query('kelas')){
            $dataMhs = Mahasiswa::where('kelas', request()->kelas)->get();
        }
        return view('data', compact('dataMhs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('data-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|max:50',
            'nim' => 'required|max:8|min:8|unique:mahasiswas',
            'kelas' => 'required|max:2|min:2',
        ]);
        Mahasiswa::create([
            'nama' => $request->input('nama'),
            'nim' => $request->input('nim'),
            'kelas' => $request->input('kelas'),
            'role_id' => '1'
        ]);
        
        return redirect()->route('data.index')->with('message', 'Data anda telah diinputkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dataMhs = Mahasiswa::find($id);
        return view('data-detail', compact('dataMhs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dataMhs = Mahasiswa::find($id);
        return view('data-edit',compact('dataMhs'));
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
        $validasi = $request->validate([
            'nama' => 'required|max:50',
            'kelas' => 'required|max:2|min:2',
        ]);

        Mahasiswa::whereId($id)->update($validasi);
        return redirect()->route('data.index')->with('message', 'Data anda telah diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mahasiswas = Mahasiswa::findOrFail($id);
        $mahasiswas->delete();
        return redirect()->route('data.index')->with('message', 'Data anda telah dihapus!');
    }
}
