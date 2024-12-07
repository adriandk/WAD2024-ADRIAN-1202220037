<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMahasiswaRequest;
use App\Http\Requests\UpdateMahasiswaRequest;
use App\Models\Mahasiswa;
use App\Models\Dosen;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index()
    {
        
        $mahasiswas = Mahasiswa::all();
        $dosens = Dosen::all();
        $nav = 'Data mahasiswa';

        return view('mahasiswa.index', compact('mahasiswas', 'nav', 'dosens'));
    }

    public function show(Mahasiswa $mahasiswa){
        $dosens = Dosen::all();
        $nav = 'Detail mahasiswa - ' . $mahasiswa->nama_mahasiswa;
        return view('mahasiswa.show', compact('nav', 'mahasiswa', 'dosens'));
    }

    public function getCreateForm(){
        $dosens = Dosen::all();
        $nav = 'Tambah mahasiswa';
        return view('mahasiswa.create', compact('nav', 'dosens'));
    }

    public function store(StoreMahasiswaRequest $request){
        $validateData = $request->validate([
            'nim' => 'required|string|max:100',
            'nama_mahasiswa'=> 'required|string|max:100',
            'email'=> 'required|string|max:100',
            'jurusan'=> 'required|string|max:100',
            'dosen_id'=> 'required|integer|max:100'
        ]);

        Mahasiswa::create($validateData);

        return redirect()->route('mahasiswa.index')->with('success', 'Mahasiswa berhasil ditambahkan');
    }

    public function getEditForm(Mahasiswa $mahasiswa){
        $dosens = Dosen::all();
        $nav = 'Edit mahasiswa - ' . $mahasiswa->nama_mahasiswa;
        return view('mahasiswa.edit', compact('mahasiswa', 'nav', 'dosens'));
    }

    public function update(UpdateMahasiswaRequest $request, Mahasiswa $mahasiswa){
        $validateData = $request->validate([
            'nim' => 'required|string|max:100',
            'nama_mahasiswa'=> 'required|string|max:100',
            'email'=> 'required|string|max:100',
            'jurusan'=> 'required|string|max:100',
            'dosen_id'=> 'required|integer|max:100'
        ]);

        $mahasiswa->update($validateData);

        return redirect()->route('mahasiswa.index')->with('success', 'Mahasiswa berhasil diperbarui');
    }

    public function destroy(Mahasiswa $mahasiswa){
        $mahasiswa->delete();
        return redirect()->route('mahasiswa.index')->with('success', 'Mahasiswa berhasil dihapus');
    }

    
}
