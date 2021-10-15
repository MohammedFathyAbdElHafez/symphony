<?php
   
namespace App\Http\Controllers\API;
   
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use Validator;
use App\Models\Show;
use App\Http\Resources\Show as ShowResource;
   
class ShowController extends BaseController
{

    public function index()
    {
        $shows = Show::all();
        return $this->sendResponse(ShowResource::collection($shows), 'Shows fetched.');
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
        return $this->sendResponse(new ShowResource($show), 'Show created.');
    }

   
    public function show($id)
    {
        $show = Show::find($id);
        if (is_null($show)) {
            return $this->sendError('Show does not exist.');
        }
        return $this->sendResponse(new ShowResource($show), 'Show fetched.');
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
        $show->save();
        
        return $this->sendResponse(new ShowResource($show), 'Show updated.');
    }
   
    public function destroy(Show $show)
    {
        $show->delete();
        return $this->sendResponse([], 'Show deleted.');
    }
}