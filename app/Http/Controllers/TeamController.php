<?php

namespace App\Http\Controllers;

use App\Services\MatchService;
use App\Services\TeamService;
use Illuminate\Http\Request;


class TeamController extends Controller
{
    protected $teamService;
    protected $matchService;


    public function __construct(TeamService $teamService, MatchService $matchService)
    {
        $this->teamService = $teamService;
        $this->matchService = $matchService;
    }
    public function show(Request $request, $teamId)
    {
        try {
            $team = $this->teamService->getTeamDetails($teamId);

            $filters = $request->all();
            $matches = $this->matchService->getTeamMatches($teamId, $filters);

            if ($request->ajax()) {
                return view('matches.matches_table', compact('matches'));
            }

            $playersPerPage = 15;
            $totalPlayers = count($team['squad']);
            $totalPages = ceil($totalPlayers / $playersPerPage);
            $playersChunks = array_chunk($team['squad'], $playersPerPage);
        


            return view('teams.show', compact(['team', 'matches', 'playersChunks'


        ]));
        } catch (\Illuminate\Http\Client\RequestException $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
