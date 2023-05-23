<?php

namespace App\Http\Livewire;


use App\Models\clubs;
use App\Models\player;
use Livewire\Component;



class Players extends Component
{

    public Player $player;
    public $userId;
    public $name;
    public $country;
    public $clubs;
    public $club;
    public $clubId;
    public $city;
    public $originalName;
    public $originalClub;
    public $originalClubId;
    public $originalMobile;
    public $originalCity;
    public $originalCountry;
  
    public $club_id;
    public $mobile;
    public $joined;
    public $editable = false;

    public function mount(Player $player)
    {
        $this->userId = $player->id;
        $this->name = $player->name;
        $this->club = $player->club->name;
        $this->club_id = $player->club->id;
        $this->mobile = $player->mobile;
        $this->city = $player->city;
        $this->country = $player->country;
        $this->joined = $player->joined ;


        $this->originalName = $player->name;
        $this->originalClub = $player->club->name;
        $this->originalClubId = $player->club->id;
        $this->originalMobile = $player->mobile;
        $this->originalCity = $player->city;
        $this->originalCountry = $player->country;
        $this->clubs = clubs::all();
    }


    public function cancel()
    {
        $this->name = $this->originalName;
        $this->club = $this->originalClub;
        $this->mobile = $this->originalMobile;
        $this->city = $this->originalCity;
        $this->country = $this->originalCountry;
       
  
    
        $this->editable = false;
    }
    public function render()
    {   
      

        return view('livewire.players');
    }

    
    public function toggleEdit()
{
    $this->editable = !$this->editable;
}
    public function save()
{
   
    
    $this->validate([
        'name' => 'required',
        'city' => 'required',
        'country' => 'required',
        'mobile' => 'required'
        
    ]);
    $player = player::find($this->userId);
    $player->name = $this->name;

    if ($this->club_id != $this->originalClubId) {
        $player->club_id = $this->club_id;
        $player->joined = now();

        $this->joined = $player->joined;
        $this->club =  $player->club->name;
    }
    $player->city = $this->city;
    $player->mobile = $this->mobile;
    $player->country = $this->country;

  

    $player->save();

    $this->editable = false;
 
}
}
