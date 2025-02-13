@extends('layouts.app')

@section('title', 'Competition')

@section('content')
    @if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    <h1 class="text-center mb-4">Competições</h1>
    <div class="row">
        @foreach ($competitions['competitions'] as $competition)
        <div class="col-md-4 mb-4">
            <a href="{{ route('competitions.show', ['code' => $competition['code']]) }}" style="text-decoration: none; color: inherit; cursor:pointer">
                <div class="card shadow-sm border-light rounded">
                    <img src="{{ $competition['emblem'] }}" class="card-img-top p-3" alt="{{ $competition['name'] }} Emblem" style="height: 200px; object-fit: contain;">
                    <div class="card-body text-center">
                        <h5 class="card-title">{{ $competition['name'] }}</h5>
                        <p class="card-text text-muted">{{ $competition['area']['name'] }}</p>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>
@endsection
