@extends('layouts.admin')

@push('css')
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-lite.min.js"></script>
@endpush

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Edit Project</h1>
            </div>
        </div>
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
        <div class="row">
            <div class="col">
                <form action="{{ route('admin.projek.update', ['id' => Crypt::encrypt($project->id)]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="row">
                        <div class="col">
                            <label class="form-label">Judul</label>
                            <input type="text" class="form-control" required name="name" placeholder="Nama project" aria-label="Nama project" aria-describedby="basic-addon2" value="{{ $project->name }}">
                        </div>
                        <div class="col">
                            <label for="formFile" class="form-label">Input Gambar</label>
                            <input class="form-control" type="file" id="formFile" name="gambar" value="{{ $project->thumbnail }}">
                        </div>
                    </div>
                    <div class="row py-3">
                        <div class="col">
                            <select class="form-select" aria-label="Default select example" name="category" required>
                                <option value="" disabled>Pilih Kategori</option>
                                <option value="conventional-media" {{ $project->category == 'conventional-media' ? 'selected' : '' }}>Conventional Media</option>
                                <option value="indoor-media" {{ $project->category == 'indoor-media' ? 'selected' : '' }}>Indoor Media</option>
                                <option value="outdoor-media" {{ $project->category == 'outdoor-media' ? 'selected' : '' }}>Outdoor Media</option>
                            </select>
                        </div>
                    </div>
                    <div class="row pb-3">
                        <div class="col">
                            <textarea id="summernote" name="description" required>{{ $project->description }}</textarea>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <button class="btn btn-primary" type="submit">Simpan</button>
                        <a href="{{ route('admin.projek') }}" class="btn btn-secondary">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        $('#summernote').summernote({
            placeholder: 'Deskripsi Projek',
            tabsize: 2,
            height: 120,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });
    </script>
@endpush