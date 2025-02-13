<?php
namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\RequestException;

class CompetitionService
{
    public function getCompetitions()
    {
        $response = Http::withHeaders([
            'X-Auth-Token' => env('KEY_API'),
        ])->get('https://api.football-data.org/v4/competitions')->throw();

      
        return $response->json();
    }

    public function getCompetitionDetails($competitionCode)
    {
        $response = Http::withHeaders([
            'X-Auth-Token' => env('KEY_API'),
        ])->get("https://api.football-data.org/v4/competitions/{$competitionCode}")->throw();

    
        return $response->json();
    }

    public function getCompetitionStandings($competitionCode)
    {
        $response = Http::withHeaders([
            'X-Auth-Token' => env('KEY_API'),
        ])->get("https://api.football-data.org/v4/competitions/{$competitionCode}/standings",[
        ])->throw();

     
        return $response->json();
    }

    public function getTopScorers($competitionCode)
    {
        $response = Http::withHeaders([
            'X-Auth-Token' => env('KEY_API'),
        ])->get("https://api.football-data.org/v4/competitions/{$competitionCode}/scorers",[
        ])->throw();

     
        return $response->json();
    }
}