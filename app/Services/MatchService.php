<?php
namespace App\Services;

use Illuminate\Http\Client\RequestException;
use Illuminate\Support\Facades\Http;

class MatchService
{
    // Função para obter os jogos de um time com filtros dinâmicos
    public function getTeamMatches($teamId, $filters = [])
    {
        $response = Http::withHeaders([
            'X-Auth-Token' => env('KEY_API'),
        ])->get("https://api.football-data.org/v4/teams/{$teamId}/matches", $filters)
        ->throw(); 

        return $response->json();
    }

    public function getCompetitionMatches($competitionId, $filters = [])
    {
        $response = Http::withHeaders([
            'X-Auth-Token' => env('KEY_API'),
        ])->get("https://api.football-data.org/v4/competitions/{$competitionId}/matches", $filters)
        ->throw(); 

        return $response->json();
    }
}
