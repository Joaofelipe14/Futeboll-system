<?php

namespace App\Http\Controllers;

use App\Services\MatchService;
use Illuminate\Http\Request;

class MatchController extends Controller
{
    protected $matchService;

    // Injeção de dependência para o MatchService
    public function __construct(MatchService $matchService)
    {
        $this->matchService = $matchService;
    }

    public function showTeamMatches(Request $request, $teamId)
    {

        $filters = $request->all();
        $matches = $this->matchService->getTeamMatches($teamId, $filters);

        if ($request->ajax()) {
            return view('matches.matches_table', compact('matches'));
        }

        return view('matches.index', compact(['matches', 'teamId']));
    }

    public function showCompetitionMatches(Request $request, $competitionId)
    {
        $filters = $request->all();
        $matches = $this->matchService->getCompetitionMatches($competitionId, $filters);

        if ($request->ajax()) {
            return view('matches.matches_table', compact('matches'));
        }

        return view('matches.index', compact('matches'));
    }
}
