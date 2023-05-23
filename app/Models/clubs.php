<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class clubs extends Model
{
    use HasFactory;
    protected $table = 'clubs';

    public function players()
{
    return $this->hasMany(players::class, 'club_id');
}
}
