@extends('layouts.app')

@section('title', 'Competition')

@section('content')

@include('competitions.modal_score')

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

        <h1 class="text-center mb-4">{{ $competitionDetails['name'] }}</h1>



        <!-- Competition Details -->
        <div class="card mb-4">
            <div class="card-body d-flex align-items-center justify-content-center gap-2">
                <img src="{{ $competitionDetails['emblem'] }}" class="card-img-top" alt="{{ $competitionDetails['name'] }} Emblem" style="height: 250px; width:250px; object-fit: contain;">
                <div class="ms-3">
                    <h5 class="card-title">{{ $competitionDetails['name'] }}</h5>
                    <p class="card-text text-muted">{{ $competitionDetails['area']['name'] }} <img src="{{ $competitionDetails['area']['flag'] }}" style="width:30px" alt=""></p>

                    <p class="card-text">Start Date: {{ $competitionDetails['currentSeason']['startDate'] }}</p>
                    <p class="card-text">End Date: {{ $competitionDetails['currentSeason']['endDate'] }}</p>
                </div>
            </div>
        </div>

        <!-- Standings -->
        <h2>Standings</h2>

        @foreach($competitionStandings['standings'] ?? [] as $standing)
        @if(isset($standing['table']) && count($standing['table']) > 0)
        <div class="card mb-4">
            <div class="card-body">

                <!-- Standings Table -->
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Team</th>
                            <th scope="col">
                                <span data-bs-toggle="tooltip" data-bs-placement="top" title="Games Played">P</span>
                            </th>
                            <th scope="col">
                                <span data-bs-toggle="tooltip" data-bs-placement="top" title="Games Won">W</span>
                            </th>
                            <th scope="col">
                                <span data-bs-toggle="tooltip" data-bs-placement="top" title="Games Drawn">D</span>
                            </th>
                            <th scope="col">
                                <span data-bs-toggle="tooltip" data-bs-placement="top" title="Games Lost">L</span>
                            </th>
                            <th scope="col">Pts</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($standing['table'] as $index => $team)
                        <tr title="{{ isset($team['tooltip']) ? $team['tooltip'] : '' }}">
                            <td>
                                <div class="position-relative">
                                    <!-- Bar to the left of the position number -->
                                    @if(isset($team['highlight']))
                                    <div class="position-absolute" style="
                                        left: -10px;
                                        top: -9px;
                                        width: 5px;
                                        height: 44px;
                                        @if($team['highlight'] == 'top_4') background-color: #28a745; 
                                        @elseif($team['highlight'] == 'europa_league') background-color: #ffc107; 
                                        @elseif($team['highlight'] == 'conference_league') background-color: #17a2b8; 
                                        @elseif($team['highlight'] == 'relegation') background-color: #dc3545; 
                                        @endif
                                    "></div>
                                    @endif
                                    {{ $index + 1 }}
                                </div>
                            </td>
                            <td>
                                <a href="{{ route('team.show', ['id' => $team['team']['id']]) }}" style="text-decoration: none; color: inherit;">
                                    <img src="{{ $team['team']['crest'] }}" alt="{{ $team['team']['name'] }} Logo" style="height: 25px; width: 25px;" class="me-2">
                                    {{ $team['team']['name'] }}
                                </a>
                            </td>

                            <td>{{ $team['playedGames'] }}</td>
                            <td>{{ $team['won'] }}</td>
                            <td>{{ $team['draw'] }}</td>
                            <td>{{ $team['lost'] }}</td>
                            <td>{{ $team['points'] }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @endif
        @endforeach

        @if(empty($competitionStandings['standings']))
        <p class="text-muted">No standings data available for this competition.</p>
        @endif

    </div>

    @endsection