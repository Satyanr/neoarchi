<div>
    <div class="row">
        <div class="col">
            @if (session()->has('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('message') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
        </div>
    </div>
    <div class="row justify-content-between">
        <div class="col text-center">
            <div class="row justify-content-between">
                <div class="col-auto px-3">
                    <h4>Artikel</h4>
                </div>
                <div class="col-md d-flex justify-content-end">
                    <div class="input-group mb-3 w-75">
                        <span class="input-group-text" id="basic-addon1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round"
                                class="icon icon-tabler icons-tabler-outline icon-tabler-search">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" />
                                <path d="M21 21l-6 -6" />
                            </svg>
                        </span>
                        <input type="text" class="form-control" placeholder="Cari artikel" aria-label="Cari artikel"
                            aria-describedby="basic-addon1" wire:model='searchArtikel' wire:input='resetArtikelPage'>
                    </div>
                </div>
                <div class="col-auto">
                    <a href="{{ route('admin.artikel.show') }}" class="btn btn-success">Tambah</a>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Gambar</th>
                                <th>Nama</th>
                                <th>Status</th>
                                <th>Option</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($artikels as $artikel)
                                <tr>
                                    <td>{{ $loop->index + 1 + 10 * ($artikels->currentPage() - 1) }}</td>
                                    <td>
                                        <img src="{{ asset('ArtikelImages/' . $artikel->thumbnail) }}"
                                            alt="{{ $artikel->title }}" width="100">
                                    </td>
                                    <td>{{ $artikel->title }}</td>
                                    <td>{{ $artikel->status }}</td>
                                    <td>
                                        <div class="btn-group dropend">
                                            <a href="javascript:void(0)" class="dropdown-toggle-no-caret"
                                                data-bs-toggle="dropdown" aria-expanded="true">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="icon icon-tabler icons-tabler-outline icon-tabler-dots-vertical">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path d="M12 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                                                    <path d="M12 19m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                                                    <path d="M12 5m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                                                </svg>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item"
                                                        href="{{ route('admin.artikel.edit', ['id' => Crypt::encrypt($artikel->id)]) }}">Edit</a>
                                                </li>
                                                <li><a href="javascript:void(0)" class="dropdown-item"
                                                        wire:click.prevent="destroyartikel('{{ Crypt::encrypt($artikel->id) }}')"
                                                        wire:confirm="Hapus data ini ?">Hapus</a></li>
                                                <li>
                                                    <a href="javascript:void(0)" class="dropdown-item"
                                                        wire:click.prevent="statusArtikel('{{ Crypt::encrypt($artikel->id) }}')">
                                                        Ubah Status
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    {{ $artikels->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
