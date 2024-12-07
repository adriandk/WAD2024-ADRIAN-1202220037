@extends('layouts.app')
@section('content')
    
    <div class="d-grid gap-2 d-md-flex justify-content-md-start mb-3">
        <a href="{{ route('mahasiswa.create') }}" class="btn btn-primary d-flex gap-2">
            <div class=""><span class="material-symbols-rounded fs-6">add</span></div> Tambah Mahasiswa
        </a>
    </div>

    {{-- Success Alert --}}
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">NIM</th>
                        <th scope="col">Nama Mahasiswa</th>
                        <th scope="col">Email</th>
                        <th scope="col">Jurusan</th>
                        <th scope="col">Kode Dosen</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($mahasiswas as $mahasiswa)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $mahasiswa->nim }}</td>
                            <td>{{ $mahasiswa->nama_mahasiswa }}</td>
                            <td>{{ $mahasiswa->email }}</td>
                            <td>{{ $mahasiswa->jurusan }}</td>

                            @foreach ($dosens as $dosen)
                                @if ($mahasiswa->dosen_id == $dosen->id)
                                    <td>{{ $dosen->kode_dosen }}</td>
                                    @break
                                @endif
                            @endforeach
                            <td>
                                <a href="{{ route('mahasiswa.show', $mahasiswa->id) }}" class="btn btn-info">Detail</a>
                                <form action="{{ route('mahasiswa.destroy', $mahasiswa->id) }}" method="post" class="d-inline">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
@endsection
