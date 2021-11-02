<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'contact',
        'tool',
    ];

    public function shows() {
        return $this->hasMany('App\Models\Show','artist_id','id');
    }


    public function venues(){
        return $this -> belongsToMany('App\Models\Venue','artist_venue','artist_id','venue_id','id','id');
    }


}
