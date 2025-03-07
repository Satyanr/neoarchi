<div>
    <div class="row justify-content-between">
        <div class="col-auto px-3">
            <h4>Pengguna</h4>
        </div>
        <div class="col-md d-flex justify-content-end">
            <div class="input-group mb-3 w-75">
                <span class="input-group-text" id="basic-addon1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="icon icon-tabler icons-tabler-outline icon-tabler-search">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" />
                        <path d="M21 21l-6 -6" />
                    </svg>
                </span>
                <input type="text" class="form-control" placeholder="Cari User" aria-label="Cari User"
                    aria-describedby="basic-addon1" wire:model='searchuser' wire:input='resetPage'>
            </div>
        </div>
        <div class="col-auto">
            <a href="javascript:void(0)" class="btn btn-success" data-bs-toggle="modal"
                data-bs-target="#ModalAkun">Tambah</a>
        </div>
    </div>
    @if (session()->has('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="row">
        <div class="col table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($penggunas as $pengguna)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $pengguna->name }}</td>
                            <td>{{ $pengguna->email }}</td>
                            <td>{{ $pengguna->role }}</td>
                            <td>
                                <div class="btn-group dropend">
                                    <a href="javascript:void(0)" class="dropdown-toggle-no-caret border-0"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="icon icon-tabler icons-tabler-outline icon-tabler-dots-vertical">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M12 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                                            <path d="M12 19m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                                            <path d="M12 5m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                                        </svg>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="javascript:void(0)" data-bs-toggle="modal"
                                                data-bs-target="#ModalAkun"
                                                wire:click='edit({{ $pengguna->id }})'>Edit</a>
                                        </li>
                                        <li><a class="dropdown-item text-danger" href="javascript:void(0)"
                                                wire:click.prevent="delete({{ $pengguna->id }})">Hapus</a></li>

                                    </ul>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-auto">
            {{ $penggunas->links() }}
        </div>
    </div>

    <div wire:ignore.self class="modal fade" id="ModalAkun">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form>
                    <div class="modal-header">
                        @if ($updateMode)
                            <h4 class="modal-title" id="myModalLabel">Edit Akun</h4>
                        @else
                            <h4 class="modal-title" id="myModalLabel">Tambahkan Akun</h4>
                        @endif
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text"
                                class="form-control @error('name') is-invalid
                            @enderror"
                                placeholder="Nama" wire:model='name'>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email"
                                class="form-control @error('email') is-invalid
                            @enderror"
                                placeholder="Email" wire:model='email'>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                @if ($updateMode)
                                    <label>Password Baru</label>
                                @else
                                    <label>Password</label>
                                @endif
                                <input type="password"
                                    class="form-control @error('password') is-invalid
                                @enderror"
                                    placeholder="Password" wire:model='password'>
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label>Konfirmasi Password</label>
                                <input type="password"
                                    class="form-control @error('password_confirmation') is-invalid
                                @enderror"
                                    placeholder="Konfirmasi Password" wire:model='password_confirmation'>
                                @error('password_confirmation')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row mb-5">
                            <div class="form-group col">
                                <label>Role</label>
                                <select id="role"
                                    class="form-select form-select-sm @error('role') is-invalid
                                @enderror"
                                    wire:model='role'>
                                    <option value=" ">Pilih</option>
                                    @if ($updateMode)
                                        <option value="Pengguna" {{ $role == 'Pengguna' ? 'selected' : '' }}>Pengguna
                                        </option>
                                        <option value="Admin" {{ $role == 'Admin' ? 'selected' : '' }}>Admin
                                        </option>
                                    @else
                                        @if (auth()->user()->role == 'Admin')
                                            <option value="0">Pengguna</option>
                                            <option value="1">Admin</option>
                                        @endif
                                    @endif
                                </select>
                                @error('role')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                            wire:click.prevent='cancel()'>Batal</button>
                        @if ($updateMode)
                            <button type="button" class="btn btn-primary"
                                wire:click.prevent="update()">Simpan</button>
                        @else
                            <button type="button" class="btn btn-primary"
                                wire:click.prevent="store()">Tambahkan</button>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
