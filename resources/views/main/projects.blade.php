@extends('layouts.app')

@section('content')
    @component('components.main.header')
        @slot('pageTitle')
            {{ $pageTitle }}
        @endslot
    @endcomponent
    <div class="container-fluid py-3">
        @livewire('main.project-component')
    </div>
@endsection
