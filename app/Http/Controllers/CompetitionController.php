<?php

namespace App\Http\Controllers;

use App\Services\CompetitionService;
use Exception;

class CompetitionController extends Controller
{
    protected $competitionService;

    public function __construct(CompetitionService $competitionService)
    {
        $this->competitionService = $competitionService;
    }

    public function index()
    {
        try {
            $competitions = $this->competitionService->getCompetitions();
            return view('competitions.index', compact('competitions'));
        } catch (\Illuminate\Http\Client\RequestException $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function show($competitionCode)
    {
        try {
            // Get competition details and standings
            $competitionDetails = $this->competitionService->getCompetitionDetails($competitionCode);
            $competitionStandings = $this->competitionService->getCompetitionStandings($competitionCode);

            // Apply specific rules if the competition code is "PD"
            if ($competitionCode == 'PD') {
                // Loop through the standings and apply conditions based on position
                foreach ($competitionStandings['standings'] as $index => &$standing) {
                    foreach ($standing['table'] as $teamIndex => &$team) {
                        // Rule for Champions League Group Stage (Top 4 teams)
                        if ($teamIndex < 4) {
                            $team['highlight'] = 'top_4';
                            $team['tooltip'] = 'Champions League Group Stage';
                        }

                        // Rule for Europa League Group Stage (5th place)
                        elseif ($teamIndex == 4) {
                            $team['highlight'] = 'europa_league';
                            $team['tooltip'] = 'Europa League Group Stage';
                        }

                        // Rule for Conference League Qualifiers (6th place)
                        elseif ($teamIndex == 5) {
                            $team['highlight'] = 'conference_league';
                            $team['tooltip'] = 'Conference League Qualifiers';
                        }

                        // Rule for relegation (Bottom 3 teams)
                        elseif ($teamIndex >= count($standing['table']) - 3) {
                            $team['highlight'] = 'relegation';
                            $team['tooltip'] = 'Relegation Zone';
                        }
                    }
                }
            }

            return view('competitions.show', [
                'competitionDetails' => $competitionDetails,
                'competitionStandings' => $competitionStandings
            ]);
        } catch (\Illuminate\Http\Client\RequestException $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function getTopScorers($competitionCode)
    {
        try {
            // Buscar os artilheiros
            $topScorers = $this->competitionService->getTopScorers($competitionCode);

            // Retornar os dados no formato JSON
            return response()->json([
                'success' => true,
                'topScorers' => $topScorers
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to fetch top scorers.'
            ]);
        }
    }
}
