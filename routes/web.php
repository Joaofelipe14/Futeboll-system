<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompetitionController;
use App\Http\Controllers\MatchController;
use App\Http\Controllers\TeamController;

Route::get('/', [CompetitionController::class, 'index']);

Route::get('/competitions', [CompetitionController::class, 'index'])->name('competitions.index');

Route::get('/competitions/{code}', [CompetitionController::class, 'show'])->name('competitions.show');


Route::get('/team/{id}', [TeamController::class, 'show'])->name('team.show');

Route::get('/team/{teamId}/matches', [MatchController::class, 'showTeamMatches'])->name('team.matches');
Route::get('/competition/{competitionId}/matches', [MatchController::class, 'showCompetitionMatches'])->name('competition.matches');

Route::get('/competition/{id}/top-scorers', [CompetitionController::class, 'getTopScorers']);
