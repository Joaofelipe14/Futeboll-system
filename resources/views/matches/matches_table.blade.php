<div id="matchesContainer">
    @if(isset($matches['error']))
    <div class="alert alert-danger" role="alert">
        {{ $matches['error'] }}
    </div>
    @else
    <div class="mb-4">
    </div>

    <div class="row">
        @foreach($matches['matches'] as $match)
        @php
            // Verifica qual time ganhou
            $homeWon = $match['score']['fullTime']['home'] > $match['score']['fullTime']['away'];
            $awayWon = $match['score']['fullTime']['away'] > $match['score']['fullTime']['home'];
        @endphp
        <div class="col-12 mb-4">
            <div class="card">
                <div class="card-header">
                    {{ \Carbon\Carbon::parse($match['utcDate'])->format('d M Y H:i') }}
                </div>
                <div class="card-body">
                    <div class="competition-info d-flex align-items-center mb-2">
                        <img src="{{ $match['competition']['emblem'] }}" alt="{{ $match['competition']['name'] }} logo" style="width: 15px; height: 15px;">
                        <span class="competition-name ms-2" style="font-size: 0.5rem; color: #555;">{{ $match['competition']['name'] }} ({{ $match['competition']['code'] }})</span>
                    </div>

                    <div class="d-flex justify-content-between align-items-center">
                        <!-- Time da Casa e Visitante na esquerda -->
                        <div class="team-info d-flex flex-column">
                            <!-- Time da Casa -->
                            <div class="home-team d-flex flex-row align-items-center mb-2 g-5">
                                <img src="{{ $match['homeTeam']['crest'] }}" alt="{{ $match['homeTeam']['name'] }} logo" style="width: 30px; height: 30px;">
                                <span>{{ $match['homeTeam']['name'] }}</span>
                            </div>
                            <!-- Time Visitante -->
                            <div class="away-team d-flex flex-row align-items-center g-5">
                                <img src="{{ $match['awayTeam']['crest'] }}" alt="{{ $match['awayTeam']['name'] }} logo" style="width: 30px; height: 30px;">
                                <span>{{ $match['awayTeam']['name'] }}</span>
                            </div>
                        </div>

                        <!-- Placar Centralizado com Faixa -->
                        <div class="score d-flex flex-column justify-content-center" style="display: flex; flex-direction:row">
                            <div class="score-container d-flex align-items-center">
                                <!-- Faixa Verde Lateral -->
                                @if($homeWon)
                                    <div class="winner-indicator bg-success"></div>
                                @elseif($awayWon)
                                    <div class="winner-indicator bg-success"></div>
                                @endif
                                
                                <div>
                                    <div>{{ $match['score']['fullTime']['home']}}</div>
                                    <div>-</div>
                                    <div>{{ $match['score']['fullTime']['away'] }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @endif
</div>



<style>
    .winner-indicator {
    width: 5px;
    height: 50px; /* Ajuste conforme necessário */
    background-color: #28a745;
    margin-right: 10px;
}

</style>