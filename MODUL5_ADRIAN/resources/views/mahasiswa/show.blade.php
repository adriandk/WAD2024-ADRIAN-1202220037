@extends('layouts.app')

@section('content')
    {{-- Back Button --}}
    <div class="d-grid gap-2 d-md-flex justify-content-md-start mb-3">
        <a href="{{ route('mahasiswa.index') }}" class="btn btn-outline-primary d-flex gap-2">
            <div class="">
                <span class="material-symbols-rounded fs-6">
                    book
                </span>
            </div> Data Mahasiswa
        </a>
        <a href="{{ route('mahasiswa.edit', $mahasiswa->id) }}" class="btn btn-outline-primary">Edit</a>
        <form action="{{ route('mahasiswa.destroy', $mahasiswa->id) }}" method="post" class="d-inline">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-outline-danger">Hapus</button>
        </form>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="mb-3">
                <label for="nim" class="form-label">NIM</label>
                <input type="number" class="form-control" id="nim" name="nim" value="{{ $mahasiswa->nim }}"
                    disabled>
            </div>
            <div class="mb-3">
                <label for="nama_mahasiswa" class="form-label">Nama Mahasiswa</label>
                <input type="text" class="form-control" id="nama_mahasiswa" name="nama_mahasiswa" value="{{ $mahasiswa->nama_mahasiswa }}"
                    disabled>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $mahasiswa->email }}"
                    disabled>
            </div>
            <div class="mb-3">
                <label for="jurusan" class="form-label">Jurusan</label>
                <input type="text" class="form-control" id="jurusan" name="jurusan" value="{{ $mahasiswa->jurusan }}"
                    disabled>
            </div>
            <div class="mb-3">
                <label for="dosen_id" class="form-label">Kode Dosen</label>

                @foreach ($dosens as $dosen)
                    @if ($mahasiswa->dosen_id == $dosen->id)
                        <input type="text" class="form-control" id="dosen_id" name="dosen_id"
                        value="{{ $dosen->kode_dosen }}" disabled>
                        @break
                    @endif
                @endforeach
            </div>
        </div>
    </div>
@endsection
