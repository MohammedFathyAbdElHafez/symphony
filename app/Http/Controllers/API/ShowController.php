<?php
   
namespace App\Http\Controllers\API;
   
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use Validator;
use App\Models\Show;
use App\Models\Artist;
use App\Models\Venue;


use App\Http\Resources\Show as ShowResource;
   
class ShowController extends BaseController
{

    public function index()
    {
        $shows = Show::all();
        $this->sendResponse(ShowResource::collection($shows), 'Shows fetched.');
   
        return view('show.index', ['shows' => $shows]);
   
   
    }

    public function create() {

        $artists = Artist::all();
        $venues = Venue::all();

        return view('show.create', ['artists' => $artists, 'venues' => $venues]);

    } 

    public function edit($id) {

        $artists = Artist::all();
        $venues = Venue::all();

        $show = Show::find($id);
        if (is_null($show)) {
            return $this->sendError('show does not exist.');
        }

        return view('show.edit', ['show' => $show, 'artists' => $artists, 'venues' => $venues]);

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
        $show = Show::create($input);
        
        $this->sendResponse(new ShowResource($show), 'Show created.');
    
        return redirect('shows');
    
    
    }

   
    public function show($id)
    {
        $show = Show::find($id);
        if (is_null($show)) {
            return $this->sendError('Show does not exist.');
        }
        $this->sendResponse(new ShowResource($show), 'Show fetched.');
   
        return view('show.show', ['show' => $show]);
   
    }
    

    public function update(Request $request, Show $show)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'title' => 'required',
            'description' => 'required'
        ]);

        if($validator->fails()){
            return $this->sendError($validator->errors());       
        }

        $show->title = $input['title'];
        $show->description = $input['description'];
        $show->artist_id = $input['artist_id'];
        $show->venue_id = $input['venue_id'];

        $show->save();
        
        $this->sendResponse(new ShowResource($show), 'Show updated.');
    
        return redirect('shows/'.$show->id);
    
    
    }
   
    public function destroy(Show $show)
    {
        $show->delete();
        return $this->sendResponse([], 'Show deleted.');
        return redirect('shows');

    }
}