<?php

namespace App\Http\Controllers;

use App\Models\player;
use App\Models\matches;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
  public function showProfile (Player $player){
    
    $recentMatches = $player->recentMatches();

    
    return view('main.profile', ['player' => $player,'recentMatches' => $recentMatches]);
  }
  public function createMatch (){
    
  

    
    return view('main.createMatch');
  }
  public function createPlayer (){
    
  

    
    return view('main.createPlayer');
  }



  public function showBoard (){


    $topPlayers = DB::table('players')
    ->join('clubs', 'clubs.id', '=', 'players.club_id')  
    ->leftJoin(DB::raw("(SELECT winner_id, COUNT(*) as total_wins FROM matches GROUP BY winner_id) as wins"), 'wins.winner_id', '=', 'players.id')
    ->leftJoin(DB::raw("(SELECT loser_id, COUNT(*) as total_losses FROM matches WHERE loser_id != 0 GROUP BY loser_id) as losses"), 'losses.loser_id', '=', 'players.id')
    ->leftJoin(DB::raw("(SELECT player_id, SUM(total_draws) as total_draws FROM 
      ((SELECT white_id as player_id, COUNT(*) as total_draws FROM matches WHERE winner_id = 0 AND loser_id = 0 GROUP BY white_id)
      UNION ALL
      (SELECT black_id as player_id, COUNT(*) as total_draws FROM matches WHERE winner_id = 0 AND loser_id = 0 GROUP BY black_id)) as draws_temp
      GROUP BY player_id) as draws"), 'draws.player_id', '=', 'players.id')
      ->leftJoin(DB::raw("(SELECT player_id, COUNT(*) as total_matches FROM 
      ((SELECT white_id as player_id FROM matches)
      UNION ALL
      (SELECT black_id as player_id FROM matches)) as matches_temp
   GROUP BY player_id) as total"), 'total.player_id', '=', 'players.id')
  ->select('players.*', 'clubs.name as club_name', DB::raw('IFNULL(wins.total_wins, 0) as total_wins'), DB::raw('IFNULL(losses.total_losses, 0) as total_losses'), DB::raw('IFNULL(draws.total_draws, 0) as total_draws'), DB::raw('IFNULL(total.total_matches, 0) as total_matches'))
    ->whereExists(function ($query) {
        $query->select(DB::raw(1))
            ->from('matches')
            ->whereColumn('matches.white_id', 'players.id')
            ->havingRaw('COUNT(*) >= 10');
    })
    ->whereExists(function ($query) {
        $query->select(DB::raw(1))
            ->from('matches')
            ->whereColumn('matches.black_id', 'players.id')
            ->havingRaw('COUNT(*) >= 10');
    })
    ->groupBy('players.id')
    ->orderBy('total_wins', 'desc')
    ->take(10)
    ->get();


    
    $leastMoves = matches::with('Player1.club', 'Player2.club')
    ->orderBy('moves')
    ->first();

    $mostMoves = matches::with('Player1.club', 'Player2.club')
    ->orderBy('moves', 'desc')
    ->first();

    return view('main.welcomePage', ['topPlayers' => $topPlayers,'leastMoves' => $leastMoves,'mostMoves' => $mostMoves]);
  }
}
