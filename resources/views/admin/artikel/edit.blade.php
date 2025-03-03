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
                <h1>Edit Artikel</h1>
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
                <form action="{{ route('admin.artikel.update', ['id' => Crypt::encrypt($artikel->id)]) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="row">
                        <div class="col">
                            <label class="form-label">Judul</label>
                            <input type="text" class="form-control" required name="title" placeholder="Nama artikel"
                                aria-label="Nama artikel" aria-describedby="basic-addon2" value="{{ $artikel->title }}">
                        </div>
                        <div class="col">
                            <label for="formFile" class="form-label">Input Gambar</label>
                            <input class="form-control" type="file" id="formFile" name="gambar"
                                value="{{ $artikel->gambar }}">
                        </div>
                    </div>
                    <div class="row py-3">
                        <div class="col">
                            <select class="form-select" aria-label="Default select example" name="category" required>
                                <option value="" disabled>Pilih Kategori</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ $artikel->category_id == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col">
                            <textarea class="form-control" required name="description" placeholder="deskripsi">{{ $artikel->description }}</textarea>
                        </div>
                    </div>
                    <div class="row pb-3">
                        <div class="col">
                            <textarea id="summernote" name="content" required>{{ $artikel->content }}</textarea>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <button class="btn btn-primary" type="submit">Simpan</button>
                        <a href="{{ route('admin.artikel') }}" class="btn btn-secondary">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        $('#summernote').summernote({
            placeholder: 'Artikel',
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
