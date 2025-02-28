<div>
    <div class="row">
        <div class="col">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link {{ $selectedCategory === 'All' ? 'active' : '' }}" href="javascript:void(0)"
                        wire:click="setCategory('All')">All</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $selectedCategory === 'Conventional Media' ? 'active' : '' }}"
                        href="javascript:void(0)" wire:click="setCategory('conventional-media')">Conventional Media</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $selectedCategory === 'Indoor Media' ? 'active' : '' }}"
                        href="javascript:void(0)" wire:click="setCategory('indoor-media')">Indoor Media</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $selectedCategory === 'Outdoor Media' ? 'active' : '' }}"
                        href="javascript:void(0)" wire:click="setCategory('outdoor-media')">Outdoor Media</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="row justify-content-center">
        @forelse ($projects as $project)
            <div class="col-auto p-3">
                <div class="custom-block bg-white shadow-lg" style="width: 18rem;">
                    <img src="{{ asset('ProjectImages/' . $project->thumbnail) }}" class="card-img-top"
                        style="min-height: 200px; max-height: 200px; object-fit: contain; width: 100%;" alt="...">
                    <div class="card-body">
                        <p class="card-text">{{ $project->name }}</p>
                    </div>
                </div>
            </div>
        @empty
            <p>No projects available.</p>
        @endforelse
    </div>
</div>
