@extends('layouts.app')

@section('content')
    {{-- Back Button --}}
    <div class="d-grid gap-2 d-md-flex justify-content-md-start mb-3">
        <a href="{{ route('dosen.index') }}" class="btn btn-outline-primary d-flex gap-2">
            <div class="">
                <span class="material-symbols-rounded fs-6">
                    book
                </span>
            </div> Data Dosen
        </a>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('dosen.store') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="kode_dosen" class="form-label">Kode Dosen</label>
                    <input type="text" class="form-control @error('kode_dosen') is-invalid @enderror" id="kode_dosen"
                        name="kode_dosen" placeholder="Masukkan Kode Dosen" value="{{ old('kode_dosen') }}">
                    @error('kode_dosen')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="nama_dosen" class="form-label">Nama Dosen</label>
                    <input type="text" class="form-control @error('nama_dosen') is-invalid @enderror" id="nama_dosen" name="nama_dosen"
                        placeholder="Masukkan Nama Dosen">{{ old('nama_dosen') }}</input>
                    @error('nama_dosen')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="nip" class="form-label">NIP</label>
                    <input type="number" class="form-control @error('nip') is-invalid @enderror" id="nip"
                        name="nip" placeholder="Masukkan nip" value="{{ old('nip') }}">
                    @error('nip')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                        name="email" placeholder="Masukkan email" value="{{ old('email') }}">
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="no_telepon" class="form-label">No Telepon</label>
                    <input type="number" class="form-control @error('no_telepon') is-invalid @enderror" id="no_telepon"
                        name="no_telepon" placeholder="Masukkan no telpon" value="{{ old('no_telepon') }}">
                    @error('no_telepon')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
@endsection
