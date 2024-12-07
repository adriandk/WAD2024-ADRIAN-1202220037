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
    </div>

    <form action="{{ route('mahasiswa.update', $mahasiswa->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="card">
            <div class="card-body">
                <div class="mb-3">
                    <label for="nim" class="form-label">NIM</label>
                    <input type="number" class="form-control @error('nim') is-invalid @enderror" id="nim"
                        name="nim" value="{{ old('nim', $mahasiswa->nim) }}">
                    @error('nim')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="nama_mahasiswa" class="form-label">Nama Mahasiswa</label>
                    <input type="text" class="form-control @error('nama_mahasiswa') is-invalid @enderror" id="nama_mahasiswa"
                        name="nama_mahasiswa" value="{{ old('nama_mahasiswa', $mahasiswa->nama_mahasiswa) }}">
                    @error('nama_mahasiswa')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                        name="email" value="{{ old('email', $mahasiswa->email) }}">
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="jurusan" class="form-label">NIP</label>
                    <input type="text" class="form-control @error('nip') is-invalid @enderror" id="jurusan"
                        name="jurusan" value="{{ old('jurusan', $mahasiswa->jurusan) }}">
                    @error('jurusan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    @foreach ($dosens as $dosen)
                    @if ($mahasiswa->dosen_id == $dosen->id)
                    <label for="dosen_id" class="form-label">Dosen : {{ $dosen->kode_dosen }}</label>
                    @endif
                    @endforeach

                    <select class="form-select" id="dosen_id" name="dosen_id" required>
                        <option value="">-- Pilih Dosen --</option>
                        @foreach ($dosens as $dosen)
                            <option value="{{ $dosen->id }}" {{ old('dosen_id') == $mahasiswa->id ? 'selected' : '' }}>
                                {{ $dosen->kode_dosen }}
                            </option>
                        @endforeach
                    </select>

                    {{-- <input type="number" class="form-control @error('dosen_id') is-invalid @enderror" id="dosen_id"
                        name="dosen_id" value="{{ old('dosen_id', $mahasiswa->dosen_id) }}"> --}}
                    @error('dosen_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <a href="{{ route('dosen.index') }}" class="btn btn-danger">Batalkan</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </form>
@endsection
