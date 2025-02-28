<div class="container">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-3">
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">Search</h5>
                    <input type="text" class="form-control" placeholder="Search articles..." wire:model="searchartikel"
                        wire:input='resetArtikelPage'>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <!-- Main content -->
        <div class="col">
            <div class="row">
                @forelse ($artikels as $artikel)
                    <div class="col-12 mb-3">
                        <div class="card mb-3" style="max-width: 100%;">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="{{ asset('Artikelimages/' . $artikel->thumbnail) }}"
                                        class="img-fluid rounded-start"
                                        style="width: 100%; height: 200px; object-fit: cover;" alt="...">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $artikel->title }}</h5>
                                        <p class="card-text">
                                            {{ Str::limit(strip_tags(html_entity_decode($artikel->content)), 100) }}</p>
                                        <p class="card-text text-end"><small class="text-muted">Last updated
                                                {{ $artikel->updated_at->diffForHumans() }}</small></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <p>No articles available.</p>
                @endforelse
            </div>
            <div class="d-flex justify-content-center">
                {{ $artikels->links() }}
            </div>
        </div>
    </div>
</div>
