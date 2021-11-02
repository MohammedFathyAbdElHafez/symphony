<?php
   
namespace App\Http\Controllers\API;
   
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use Validator;
use App\Models\Show;
use App\Models\Artist;
use App\Models\Venue;
use App\Http\Resources\Venue as VenueResource;
   
class VenueController extends BaseController
{

    public function index()
    {
        $venues = Venue::all();
        $this->sendResponse(VenueResource::collection($venues), 'Venues fetched.');
        return view('venue.index', ['venues' => $venues]);
    
    
    }

    public function create() {
        $artists = Artist::all();
        return view('venue.create', [ 'artists' => $artists]);

    } 

    public function edit($id) {

        $artists = Artist::all();

        $venue = Venue::find($id);

        $artist_venue = $venue->artists->pluck('id');

        if (is_null($venue)) {
            return $this->sendError('venue does not exist.');
        }

        return view('venue.edit', ['venue' => $venue,'artists' => $artists, 'artistvenues' => $artist_venue]);

    }   

    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'title' => 'required',
            'description' => 'required'
        ]);
        if($validator->fails()){
            return $this->sendError($validator->errors());       
        }
        $venue = Venue::create($input);

        foreach($input['artist_id'] as $key => $val) {
            $art = Venue::findOrFail($venue->id);
            $art->artists()->attach([$val]);
        }


        $this->sendResponse(new VenueResource($venue), 'Venue created.');
    
        return redirect('venues');
    
    
    }

   
    public function show($id)
    {
        $venue = Venue::find($id);
        if (is_null($venue)) {
            return $this->sendError('Venue does not exist.');
        }
        $venue_artist = Venue::find($id)->artists()->get();

        $venue_show = Venue::find($id)->shows()->get();

        $this->sendResponse(new VenueResource($venue), 'Venue fetched.');
        return view('venue.show', ['venue' => $venue, 'artists' => $venue_artist, 'shows'  => $venue_show]);
    
    }
    

    public function update(Request $request, Venue $venue)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'title' => 'required',
            'description' => 'required'
        ]);

        if($validator->fails()){
            return $this->sendError($validator->errors());       
        }

        $venue->title = $input['title'];
        $venue->description = $input['description'];
        $venue->save();
        
        foreach($input['artist_id'] as $key => $val) {
            $art = Venue::findOrFail($venue->id);
            $art->artists()->attach([$val]);
        }

        $this->sendResponse(new VenueResource($venue), 'Venue updated.');
    
        return redirect('venues/'.$venue->id);
    
    
    }
   
    public function destroy(Venue $venue)
    {
        $venue->delete();
        $this->sendResponse([], 'Venue deleted.');
        return redirect('venue');

    }
}