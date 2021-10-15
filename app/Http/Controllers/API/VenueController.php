<?php
   
namespace App\Http\Controllers\API;
   
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use Validator;
use App\Models\Venue;
use App\Http\Resources\Venue as VenueResource;
   
class VenueController extends BaseController
{

    public function index()
    {
        $venues = Venue::all();
        return $this->sendResponse(VenueResource::collection($venues), 'Venues fetched.');
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
        return $this->sendResponse(new VenueResource($venue), 'Venue created.');
    }

   
    public function show($id)
    {
        $venue = Venue::find($id);
        if (is_null($venue)) {
            return $this->sendError('Venue does not exist.');
        }
        return $this->sendResponse(new VenueResource($venue), 'Venue fetched.');
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
        
        return $this->sendResponse(new VenueResource($venue), 'Venue updated.');
    }
   
    public function destroy(Venue $venue)
    {
        $venue->delete();
        return $this->sendResponse([], 'Venue deleted.');
    }
}