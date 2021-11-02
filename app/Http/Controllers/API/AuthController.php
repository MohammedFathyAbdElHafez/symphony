<?php
   
namespace App\Http\Controllers\API;
   
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\ValidateSignUp;
class AuthController extends BaseController
{

    public function signin(Request $request)
    {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){ 
            $authUser = Auth::user(); 
            $success['token'] =  $authUser->createToken('MyAuthApp')->plainTextToken; 
            $success['name'] =  $authUser->name;
            

            $tokenVal = explode('|', $success['token']);
            $token = trim($tokenVal[1]);

            $this->sendResponse($success, 'User signed in');

            return redirect('/home');


        } 
        else{ 
            return $this->sendError('Unauthorised.', ['error'=>'Unauthorised']);
        } 
    }

    public function signup(ValidateSignUp $request)
    {
   
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $input['confirm_password'] = bcrypt($input['confirm_password']);

        $user = User::create($input);
        $success['token'] =  $user->createToken('MyAuthApp')->plainTextToken;
        $success['name'] =  $user->name;

        $this->sendResponse($success, 'User created successfully.');

        return redirect('home');


    }
   
}