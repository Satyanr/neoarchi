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
                    <h4>Kategori</h4>
                </div>
                <div class="col d-flex justify-content-end">
                    <div class="input-group mb-3 w-75">
                        <span class="input-group-text" id="basic-addon1"><i
                                class="fa-solid fa-magnifying-glass"></i></span>
                        <input type="text" class="form-control" placeholder="Cari Kategori"
                            aria-label="Cari Kategori" aria-describedby="basic-addon1" wire:model='searchkategori'
                            wire:input='resetKategoriPage'>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col w-75">
                    <form wire:submit.prevent='storeKategori'>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Nama Kategori"
                                aria-label="Nama Kategori" aria-describedby="basic-addon2" wire:model='nama_kategori'>
                            <button class="btn btn-primary" type="submit">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Hapus</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kategoris as $kategori)
                                <tr>
                                    <td>{{ $loop->index + 1 + 10 * ($kategoris->currentPage() - 1) }}</td>
                                    <td>{{ $kategori->name }}</td>
                                    <td class="text-danger"><a href="javascript:void(0)" class="text-danger"
                                            wire:click.prevent="destroyKategori('{{ Crypt::encrypt($kategori->id) }}')"
                                            wire:confirm="Hapus data ini ?"><svg xmlns="http://www.w3.org/2000/svg"
                                                width="24" height="24" viewBox="0 0 24 24" fill="currentColor"
                                                class="icon icon-tabler icons-tabler-filled icon-tabler-trash-x">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path
                                                    d="M20 6a1 1 0 0 1 .117 1.993l-.117 .007h-.081l-.919 11a3 3 0 0 1 -2.824 2.995l-.176 .005h-8c-1.598 0 -2.904 -1.249 -2.992 -2.75l-.005 -.167l-.923 -11.083h-.08a1 1 0 0 1 -.117 -1.993l.117 -.007h16zm-9.489 5.14a1 1 0 0 0 -1.218 1.567l1.292 1.293l-1.292 1.293l-.083 .094a1 1 0 0 0 1.497 1.32l1.293 -1.292l1.293 1.292l.094 .083a1 1 0 0 0 1.32 -1.497l-1.292 -1.293l1.292 -1.293l.083 -.094a1 1 0 0 0 -1.497 -1.32l-1.293 1.292l-1.293 -1.292l-.094 -.083z" />
                                                <path
                                                    d="M14 2a2 2 0 0 1 2 2a1 1 0 0 1 -1.993 .117l-.007 -.117h-4l-.007 .117a1 1 0 0 1 -1.993 -.117a2 2 0 0 1 1.85 -1.995l.15 -.005h4z" />
                                            </svg></a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    {{ $kategoris->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
