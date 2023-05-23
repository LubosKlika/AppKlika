<?php

namespace App\Http\Livewire;

use App\Models\clubs;
use App\Models\player;
use Livewire\Component;

class CreatePlayer extends Component
{
    public $name;
    public $clubs;
    public $club_id;
    public $city;
    public $country;
    public $mobile;


    public function mount(){

        $this->clubs = clubs::all();
    }

    public function savePlayer()
    {

        $this->validate([
            'name' => 'required',
            'mobile' => 'required',
            'club_id' => 'required',
            'city' => 'required',
            'country' => 'required',

        ]);
     $player = player::create([
        'name' => $this->name,
        'mobile' => $this->mobile,
        'club_id' => $this->club_id,
        'city' => $this->city,
        'country' => $this->country,
        'joined' => now()
        
      
      ]);
      return redirect()->route('profile', ['player' => $player->id]);

    }
    public function render()
    {
  
        return view('livewire.create-player');
    }
}
