@extends('layouts.admin')

@push('css')
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-lite.min.js"></script>
@endpush

@section('content')
    <div class="row">
        <div class="col">
            <div class="row">
                <div class="col">
                    <form action="{{ route('admin.projek.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <label class="form-label">Judul</label>
                                <input type="text" class="form-control" name="name" placeholder="Nama artikel"
                                    aria-label="Nama artikel" aria-describedby="basic-addon2">
                            </div>
                            <div class="col">
                                <label for="formFile" class="form-label">Input Gambar</label>
                                <input class="form-control" type="file" id="formFile" name="gambar">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <select class="form-select" aria-label="Default select example" name="category">
                                    <option selected>Pilih Kategori</option>
                                    <option value="conventional-media">Conventional Media</option>
                                    <option value="indoor-media">Indoor Media</option>
                                    <option value="outdoor-media">Outdoor Media</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <textarea id="summernote" name="description"></textarea>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <button class="btn btn-primary" type="submit">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        $('#summernote').summernote({
            placeholder: 'Hello stand alone ui',
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
