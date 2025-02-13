<?php

namespace App\Services;

use Illuminate\Http\Client\RequestException;
use Illuminate\Support\Facades\Http;

class TeamService
{
    public function getTeamDetails($teamId)
    {
        $response = Http::withHeaders([
            'X-Auth-Token' => env('KEY_API'),
        ])->get("https://api.football-data.org/v4/teams/{$teamId}")->throw();

        return $response->json();
    }

    
}
