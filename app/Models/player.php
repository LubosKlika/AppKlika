<?php

namespace App\Models;

use App\Models\matches;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class player extends Model
{ 
    
    public $timestamps = false;
    use HasFactory;
    protected $table = 'players';
    protected $fillable = ['name','mobile','club_id','country','city','joined'];


        public function matchesPlayer1(){
            
            return $this->hasMany(matches::class, 'white_id');
        }

        public function matchesPlayer2(){

            return $this->hasMany(matches::class, 'black_id');
        }


            public function matches(){

                return $this->matchesPlayer1->count() + $this->matchesPlayer2->count();
        }

        public function match(){
            return $this->matchesPlayer1()->union($this->matchesPlayer2());
           
        }


        public function club(){

            return $this->belongsTo(clubs::class, 'club_id');
        }


        public function getWinLoseRatioAttribute(){




            $winsAsPlayer1 = $this->matchesPlayer1()->where('winner_id', $this->id)->count();
            $winsAsPlayer2 = $this->matchesPlayer2()->where('winner_id', $this->id)->count();
        
            $lossesAsPlayer1 = $this->matchesPlayer1()->where('loser_id', $this->id)->count();
            $lossesAsPlayer2 = $this->matchesPlayer2()->where('loser_id', $this->id)->count();
        
            $totalWins = $winsAsPlayer1 + $winsAsPlayer2;
            $totalLosses = $lossesAsPlayer1 + $lossesAsPlayer2;
        
            if ($totalLosses == 0) {
                return $totalWins;
            } else {
                return number_format($totalWins / $totalLosses, 2);
            }
        }


        public function getWinWhiteRatioAttribute(){

            $wins = $this->matchesPlayer1()->where('winner_id', $this->id)->count();
            $losses = $this->matchesPlayer1()->where('loser_id', $this->id)->count();
            if($losses == 0) {
                return $wins;
            } else {
                return number_format($wins / $losses, 2);
            }
        }
        public function getWinBlackRatioAttribute(){

      

            $wins = $this->matchesPlayer2()->where('winner_id', $this->id)->count();
            $losses = $this->matchesPlayer2()->where('loser_id', $this->id)->count();
            if($losses == 0) {
                return $wins;
            } else {
                return number_format($wins / $losses, 2);
            }
          
        }

        public function wins(){
        
            return $this->matchesPlayer1()->where('winner_id', $this->id)
            ->union($this->matchesPlayer2()->where('winner_id', $this->id))
            ->count();

        }
        public function getTotalMatchesAttribute(){
        
            return $this->matchesPlayer1()
            ->union($this->matchesPlayer2())
            ->count();

        }
        public function getTotalWinsAttribute(){
        
            return $this->matchesPlayer1()->where('winner_id', $this->id)
            ->union($this->matchesPlayer2()->where('winner_id', $this->id))
            ->count();

        }
        public function getTotalLossesAttribute(){


            return $this->matchesPlayer1()->where('loser_id', $this->id)
            ->union($this->matchesPlayer2()->where('loser_id', $this->id))
            ->count();
        }
        public function getTotalDrawsAttribute(){
        

            return $this->matchesPlayer1()->where('draw', 1)
            ->union($this->matchesPlayer2()->where('draw', 1))
            ->count();
        }

  

        public function matchesWhite() {

            return $this->matchesPlayer1()->where('winner_id', $this->id)->count();


        }
        public function matchesBlack() {

            return $this->matchesPlayer2()->where('winner_id', $this->id)->count();


        }



        public function getBestColorAttribute(){
        

       
                $matchesAsWhite = $this->matchesWhite();
                $matchesAsBlack = $this->matchesBlack();
            
                if ($matchesAsWhite > $matchesAsBlack) {
                    return 'white';
                } elseif ($matchesAsBlack > $matchesAsWhite) {
                    return 'black';
                } else {
                    return 'equal';
                }
           
            
        }
        public function getBestMatchAttribute(){

           
            return matches::query()
            ->where(function($query) {
                $query->where('white_id', $this->id)
                    ->orWhere('black_id', $this->id);
            })
            ->where('winner_id', $this->id)
            ->orderBy('moves', 'asc')
            ->first();

        }


        public function recentMatches(){


         
        
            return matches::query()
                ->where('white_id', $this->id)
                ->orWhere('black_id', $this->id)
                ->orderBy('date', 'desc')
                ->paginate(7);
        }



}
