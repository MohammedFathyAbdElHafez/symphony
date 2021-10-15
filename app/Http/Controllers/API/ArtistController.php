<?php
   
namespace App\Http\Controllers\API;
   
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use Validator;
use App\Models\Artist;
use App\Http\Resources\Artist as ArtistResource;
   
class ArtistController extends BaseController
{

    public function index()
    {
        $artists = Artist::all();
        $this->sendResponse(ArtistResource::collection($artists), 'Artists fetched.');

        return view('artist.index', ['artists' => $artists]);
    }

    
    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'name' => 'required',
            'contact' => 'required',
            'tool' => 'required',

        ]);
        if($validator->fails()){
            return $this->sendError($validator->errors());       
        }
        $artist = Artist::create($input);
        return $this->sendResponse(new ArtistResource($artist), 'Artist created.');
    }

   
    public function show($id)
    {
        $artist = Artist::find($id);
        if (is_null($artist)) {
            return $this->sendError('Artist does not exist.');
        }
        return $this->sendResponse(new ArtistResource($artist), 'Artist fetched.');
    }
    

    public function update(Request $request, Artist $artist)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'name' => 'required',
            'contact' => 'required',
            'tool' => 'required',
        ]);

        if($validator->fails()){
            return $this->sendError($validator->errors());       
        }

        $artist->name = $input['name'];
        $artist->contact = $input['contact'];
        $artist->tool = $input['tool'];
        $artist->save();
        
        return $this->sendResponse(new ArtistResource($artist), 'Artist updated.');
    }
   
    public function destroy(Artist $artist)
    {
        $artist->delete();
        return $this->sendResponse([], 'Artist deleted.');
    }
}