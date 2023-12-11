<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\State;
use App\Models\User;
use Illuminate\Http\Client\Events\ResponseReceived;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $country = Country::all();
        return view('welcome',compact(['country']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function login()
    {
        return view('login');
    }

    public function logincheck(Request $request)  {
        $validate = Validator::make($request->all(),[
            'email'=>"required",
            'password'=>"required",
        ]);
        if($validate->fails()){
            return response()->json(['error'=>$validate->errors()]);
        }

        $login = Auth::attempt(['email' => $request->email, 'password' => $request->password]);

        if($login){
            $request->session()->regenerate();
            return response()->json(['success'=>true,'msg'=>'Login success']);
        }

        
    }
    /**
     * Store a newly created resource in storage.
     */
    public function registration(Request $request)
    {
        // dd($request->firstName);
        $validator = Validator::make($request->all(),[
            'firstName'=>'required',
            'lastName'=>'required',
            'email'=>'required|email|unique:users',
            'gender'=>'required',
            'phoneNumber'=>'required|max:10',
            'hobbies'=>'required|array|min:1',
            'country'=>'required',
            'state'=>'required',
            'city'=>'required',
            'password' =>'required|min:6',
            'cpassword' =>'required|same:password',
        ],[
            'firstName.required'=>'Enter your first name',
            'lastName.required'=>'Enter your last name',
            'email.required'=>'Enter your E-mail',
            'email.email'=>'Formate does not valid',
            'email.unique'=>'Your email already added',
            'phoneNumber.required'=>'Enter your phoneNumber',
            'phoneNumber.max'=>'Mobile number must be 10 digit',
            'country.required'=>'Enter your country',
            'state.required'=>'Enter your state',
            'password.required'=>'Enter your password',
            'password.min'=>'Password min 6 character',
            'cpassword.required'=>'Enter your confirm password',
        ]);

        if($validator->fails()){
            return response()->json(['error'=>$validator->errors()]);
        }

        $reg = new User();
        $reg->name = $request->firstName . " " . $request->lastName;
        $reg->email  = $request->email;
        $reg->password = Hash::make($request->password);
        $reg->gender = $request->gender;
        $reg->hobbies = implode(', ', $request->hobbies);
        $reg->mobile = $request->phoneNumber;
        $reg->country = $request->country;
        $reg->state = $request->state;
        $reg->city = $request->city;
        if($reg->save()){
            return response()->json(['success'=>true,'msg'=>'You are registered!!']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function dashboard()
    {
        return view('dashboard');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
