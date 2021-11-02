<?php
   
namespace App\Http\Controllers\API;
   
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use Validator;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\ValidateArtist;

use App\Models\Show;
use App\Models\Artist;
use App\Models\Venue;


use App\Http\Resources\Artist as ArtistResource;
   
class ArtistController extends BaseController
{

    public function index()
    {
        $artists = Artist::all();

        //$token = Session::get('_token');

        $this->sendResponse(ArtistResource::collection($artists), 'Artists fetched.');

        return view('artist.index', ['artists' => $artists]);
    }


    public function create() {

        $venues = Venue::all();

        return view('artist.create', [ 'venues' => $venues]);
    }

    
    public function edit($id) {

        $venues = Venue::all();

        $artist = Artist::find($id);

        $artist_venue = $artist->venues->pluck('id');

        if (is_null($artist)) {
            return $this->sendError('Artist does not exist.');
        }

        return view('artist.edit', ['artist' => $artist, 'venues' => $venues, 'artistvenues' => $artist_venue]);

    }


    public function store(ValidateArtist $request)
    {
        $input = $request->all();
        
        $artist = Artist::create($input);

        //dd($artist->id);
foreach($input['venue_id'] as $key => $val) {
    $art = Artist::findOrFail($artist->id);
    $art->venues()->attach([$val]);
}



       $this->sendResponse(new ArtistResource($artist), 'Artist created.');

       return redirect('artists');

    }

   
    public function show($id)
    {
        $artist = Artist::find($id);
        if (is_null($artist)) {
            return $this->sendError('Artist does not exist.');
        }

        $artist_venue = Artist::find($id)->venues()->get();

        $artist_show = Artist::find($id)->shows()->get();




        $this->sendResponse(new ArtistResource($artist), 'Artist fetched.');

        return view('artist.show', ['artist' => $artist, 'venues' => $artist_venue, 'shows'  => $artist_show]);


    }
    

    public function update(ValidateArtist $request, Artist $artist)
    {
        $input = $request->all();
        $artist->name = $input['name'];
        $artist->contact = $input['contact'];
        $artist->tool = $input['tool'];
        $artist->save();

        foreach($input['venue_id'] as $key => $val) {
            $art = Artist::findOrFail($artist->id);
            $art->venues()->attach([$val]);
        }


        
        $this->sendResponse(new ArtistResource($artist), 'Artist updated.');

        return redirect('artists/'.$artist->id);

    }
   
    public function destroy(Artist $artist)
    {
        $artist->delete();

        $this->sendResponse([], 'Artist deleted.');

        return redirect('artists');


    }
}