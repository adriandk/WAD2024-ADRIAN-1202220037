<nav class="">
    <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-3 text-white min-vh-100 ">
        <a href="/" class="d-flex align-items-center pb-3 mb-md-3 me-md-auto text-white text-decoration-none">
            <span class="fs-5 d-none d-sm-inline fw-bold">Panel Bang Deka</span>
        </a>
        <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
            <li class="nav-item mb-5 @if (Route::is('dashboard')) fw-bold @endif">
                <a href="/dashboard" class="nav-link px-0 align-middle text-white d-flex">
                    <div class="">
                        <span class="material-symbols-rounded">
                            dashboard
                        </span>
                    </div>
                    <div class="ms-3 d-none d-sm-inline fs-5">
                        <span>Dashboard</span>
                    </div>
                    @if (Route::is('dashboard'))
                        <div class="ms-3">
                            <span class="material-symbols-rounded fs-6 text-warning shadow">circle</span>
                        </div>
                    @endif
                </a>
            </li>
            <li class="mb-3 @if (Route::is('dosen.index')) fw-bold ms-3 @endif">
                <a href="/dosen" class="nav-link px-0 align-middle text-white d-flex">
                    <div class="">
                        <span class="material-symbols-rounded">
                            book_4
                        </span>
                    </div>
                    <div class="ms-3 d-none d-sm-inline ">
                        <span>Data Dosen</span>
                    </div>
                    @if (Route::is('dosen.index'))
                        <div class="ms-3">
                            <span class="material-symbols-rounded fs-6 text-warning shadow">circle</span>
                        </div>
                    @endif
                </a>
            </li>
            <li class="mb-3 @if (Route::is('mahasiswa.index')) fw-bold ms-3 @endif">
                <a href="/mahasiswa" class="nav-link px-0 align-middle text-white d-flex">
                    <div class="">
                        <span class="material-symbols-rounded">
                            book_4
                        </span>
                    </div>
                    <div class="ms-3 d-none d-sm-inline ">
                        <span>Data Mahasiswa</span>
                    </div>
                    @if (Route::is('mahasiswa.index'))
                        <div class="ms-3">
                            <span class="material-symbols-rounded fs-6 text-warning shadow">circle</span>
                        </div>
                    @endif
                </a>
            </li>

            <li class="mb-3 @if (Route::is('dosen.create')) fw-bold ms-3 @endif">
                <a href="/dosen/create" class="nav-link px-0 align-middle text-white d-flex">
                    <div class="">
                        <span class="material-symbols-rounded">
                            add
                        </span>
                    </div>
                    <div class="ms-3 d-none d-sm-inline ">
                        <span>Tambah Dosen</span>
                    </div>
                    @if (Route::is('dosen.create'))
                        <div class="ms-3">
                            <span class="material-symbols-rounded fs-6 text-warning shadow">circle</span>
                        </div>
                    @endif
                </a>
            </li>
            <li class="mb-3 @if (Route::is('mahasiswa.create')) fw-bold ms-3 @endif">
                <a href="/mahasiswa/create" class="nav-link px-0 align-middle text-white d-flex">
                    <div class="">
                        <span class="material-symbols-rounded">
                            add
                        </span>
                    </div>
                    <div class="ms-3 d-none d-sm-inline ">
                        <span>Tambah Mahasiswa</span>
                    </div>
                    @if (Route::is('mahasiswa.create'))
                        <div class="ms-3">
                            <span class="material-symbols-rounded fs-6 text-warning shadow">circle</span>
                        </div>
                    @endif
                </a>
            </li>
        </ul>
        <hr>
        @if (Auth::check())
            <div class="dropdown pb-4">
                <a href="#"
                    class="d-flex align-items-center text-white text-decoration-none dropdown-toggle text-white"
                    id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="{{ asset('storage/placeholder/no-avatar.png') }}" alt="hugenerd" width="30"
                        height="30" class="rounded-circle">
                    <span class="d-none d-sm-inline mx-1 ms-3">{{ Auth::user()->name }}</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                    <li><a class="dropdown-item" href="/shop">Sporta Cashier</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <form action="/logout" method="POST">
                            @csrf
                            <button type="submit" class="dropdown-item">Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
        @endif
    </div>
</nav>
