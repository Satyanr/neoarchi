@extends('layouts.admin')

{{-- @push('css')
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-lite.min.js"></script>
@endpush --}}

@section('content')
    <div class="row">
        <div class="col">
            @livewire('admin.artikel-komponent')
        </div>
    </div>
    {{-- <div class="row">
        <div class="col">
            <div class="row">
                <div class="col">
                    <form>
                        <div class="row">
                            <div class="col">
                                <label class="form-label">Judul</label>
                                <input type="text" class="form-control" placeholder="Nama artikel"
                                    aria-label="Nama artikel" aria-describedby="basic-addon2">
                            </div>
                            <div class="col">
                                <label for="formFile" class="form-label">Input Gambar</label>
                                <input class="form-control" type="file" id="formFile">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <textarea id="summernote"></textarea>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <button class="btn btn-primary" type="submit">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> --}}
@endsection

{{-- @push('script')
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
@endpush --}}
