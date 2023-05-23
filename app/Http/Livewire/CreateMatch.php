<?php

namespace App\Http\Livewire;

use App\Models\matches;
use App\Models\player;
use Livewire\Component;

class CreateMatch extends Component
{   
        public $players;
        public $white_id = NULL;
        public $black_id = NULL;
        public $color_id;
        public $moves;
     

    public function mount()
    {
        $this->players = player::all();
    }

    public function updatedWhite($value)
    {
 
   
        $this->black_id = $value;
        if ($value == $this->white_id) {
            $this->white_id = null;
        }
    


    
    }

    public function saveMatch()
    {   
       
        $this->validate([
            'white_id' => 'required',
            'black_id' => 'required',
            'color_id' => 'required',
            'moves' => 'required'

            
        ]);


    if($this->white_id == $this->black_id){
        session()->flash('error', 'How can one player play for both figures???');
        return;
    }else {
        if($this->color_id == '1')
        {
            $winner_id = $this->white_id;
            $loser_id = $this->black_id;
            $draw = NULL;
        }elseif($this->color_id == '2'){

            $loser_id = $this->white_id;
            $winner_id = $this->black_id;
            $draw = NULL;

        }else {
            $winner_id = 0;
            $loser_id = 0;
            $draw = 1;
        }

        matches::create([
            'white_id' => $this->white_id,
            'black_id' => $this->black_id,
            'winner_id' => $winner_id,
            'loser_id' => $loser_id,
            'moves' => $this->moves,
            'draw' => $draw,
            'date' => now()
        

            
        ]);
        session()->flash('message', __('messages.matchAdded'));
        $this->reset(['moves']);
        $this->white_id = '';
        $this->black_id = '';
        $this->color_id = '';
    }
}
    public function render()
    {   
        return view('livewire.create-match');
    }
}
