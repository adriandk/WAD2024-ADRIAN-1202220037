<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDosenRequest;
use App\Http\Requests\UpdateDosenRequest;
use App\Models\Dosen;

class DosenController extends Controller
{
    public function index()
    {
        $dosens = Dosen::all();
        $nav = 'Data Dosen';

        return view('dosen.index', compact('dosens', 'nav'));

    }

    public function show(Dosen $dosen){
        $nav = 'Detail Dosen - ' . $dosen->nama_dosen;
        return view('dosen.show', compact('dosen', 'nav'));
    }

    public function getCreateForm(){
        $nav = 'Tambah dosen';
        return view('dosen.create', compact('nav'));
    }

    public function store(StoreDosenRequest $request){
        $validateData = $request->validate([
            'kode_dosen' => 'required|string|max:3',
            'nama_dosen'=> 'required|string|max:100',
            'nip'=> 'required|string|max:100',
            'email'=> 'required|string|max:100',
            'no_telepon'=> 'required|string|max:100'
        ]);

        Dosen::create($validateData);

        return redirect()->route('dosen.index')->with('success', 'Dosen berhasil ditambahkan');
    }

    public function getEditForm(Dosen $dosen){
        $nav = 'Edit dosen - ' . $dosen->nama_dosen;
        return view('dosen.edit', compact('dosen', 'nav'));
    }

    public function update(UpdateDosenRequest $request, Dosen $dosen){
        $validateData = $request->validate([
            'kode_dosen' => 'required|string|max:3',
            'nama_dosen'=> 'required|string|max:100',
            'nip'=> 'required|string|max:100',
            'email'=> 'required|string|max:100',
            'no_telepon'=> 'required|string|max:100'
        ]);

        $dosen->update($validateData);

        return redirect()->route('dosen.index')->with('success', 'Dosen berhasil diperbarui');
    }

    public function destroy(Dosen $dosen){
        $dosen->delete();
        return redirect()->route('dosen.index')->with('success', 'Dosen berhasil dihapus');
    }

    


}
