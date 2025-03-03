<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="sticky-top" style="top: 100px; z-index: 0;">
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Search</h5>
                        <input type="text" class="form-control" placeholder="Search articles..."
                            wire:model="searchartikel" wire:input='resetArtikelPage'>
                    </div>
                </div>
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Categories</h5>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="category" value="All" id="all"
                                wire:click="setCategory('All')" {{ $selectedCategory === 'All' ? 'checked' : '' }}>
                            <label class="form-check-label" for="all">
                                All
                            </label>
                        </div>
                        @foreach ($categories as $category)
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="category"
                                    value="{{ $category->name }}" id="{{ $category->name }}"
                                    wire:click="setCategory('{{ $category->name }}')"
                                    {{ $selectedCategory === $category->name ? 'checked' : '' }}>
                                <label class="form-check-label" for="{{ $category->name }}">
                                    {{ $category->name }}
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="row">
                @forelse ($artikels as $artikel)
                    <div class="col-12 mb-3">
                        <div class="card mb-3 custom-block bg-white shadow-lg" style="max-width: 100%;">
                            <a href="{{ route('showArticle', $artikel->id) }}">
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
                                                {{ Str::limit(strip_tags(html_entity_decode($artikel->content)), 100) }}
                                            </p>
                                            <p class="card-text text-end"><small class="text-muted">Last updated
                                                    {{ $artikel->updated_at->diffForHumans() }}</small></p>
                                        </div>
                                    </div>
                                </div>
                            </a>
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
</div>
