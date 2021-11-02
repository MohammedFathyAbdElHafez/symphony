<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Show;
class Venue extends Model
{
    use HasFactory;
        /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'title',
        'description',
    ];



    public function shows() {
        return $this->hasMany('App\Models\Show','venue_id','id');
    }


    public function artists(){ 
        return $this -> belongsToMany('App\Models\Artist','artist_venue','venue_id','artist_id','id','id');
    }

}
    
    
