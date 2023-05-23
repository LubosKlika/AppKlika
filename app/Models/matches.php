<?php

namespace App\Models;

use App\Models\player;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class matches extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected $table = 'matches';
    protected $fillable = ['white_id','black_id','moves','winner_id','loser_id','draw','date' ];

   
    public function Player1(){
            
        return $this->belongsTo(player::class, 'white_id');
    }

    public function Player2(){

        return $this->belongsTo(player::class, 'black_id');
    }


    
}
