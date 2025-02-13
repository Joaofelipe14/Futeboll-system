@extends('layouts.app')
@section('title', 'Team')

@section('content')
<body class="bg-light">
    <div class="container">
        @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        <h1 class="text-center mb-4">{{ $team['name'] }}</h1>

        <div class="row">
            <!-- Left Column: Team Information Card -->
            <div class="col-lg-4">
                <div class="card shadow-sm mb-4">
                <img src="{{ $team['crest'] }}" alt="{{ $team['name'] }} Crest" style="height: 250px; object-fit: contain; display: block; margin-left: auto; margin-right: auto;" class="card-img-top">
                <div class="card-body">
                        <h5 class="card-title">{{ $team['name'] }}</h5>
                        <p><strong>Founded:</strong> {{ $team['founded'] }}</p>
                        <p><strong>Address:</strong> {{ $team['address'] }}</p>
                        <p><strong>Stadium:</strong> {{ $team['venue'] }}</p>
                        <p><strong>Website:</strong> <a href="{{ $team['website'] }}" target="_blank" class="text-decoration-none">Visit</a></p>
                        <p><strong>Club Colors:</strong> {{ $team['clubColors'] }}</p>

                        @include('teams.table_squad')

                    </div>
                </div>

            </div>

            <!-- Right Column: Competitions and Coach Information -->
            <div class="col-lg-8">
                <!-- Competitions Card -->
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-dark text-white">
                        <h4>Competitions</h4>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            @foreach ($team['runningCompetitions'] as $competition)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                {{ $competition['name'] }}
                                <span class="badge badge-pill badge-primary">Active</span>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <!-- Coach Card -->
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-dark text-white">
                        <h4>Coach</h4>
                    </div>
                    <div class="card-body">
                        <p><strong>Name:</strong> {{ $team['coach']['name'] }}</p>
                        <p><strong>Nationality:</strong> {{ $team['coach']['nationality'] }}</p>
                        <p><strong>Contract:</strong> Start: {{ $team['coach']['contract']['start'] }} - End: {{ $team['coach']['contract']['until'] }}</p>
                    </div>
                </div>

                @include('matches.index', ['teamId' => $team['id']])
            </div>
        </div>
    </div>

</body>
@endsection
