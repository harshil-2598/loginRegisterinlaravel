<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\State;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('country');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function state()
    {
        $country = Country::all();
        return view('state',compact(['country']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(['country_name'=>'required',['country_name.required'=>'Enter Country Name']]);
        
        $country = new Country();
        $country->country_name = $request->country_name;
        if($country->save()){
            return redirect('/country')->with('success','Country Saved');
        }
        
    }

    /**
     * Display the specified resource.
     */
    public function savestate(Request $request)
    {
        $request->validate(['state_name'=>'required','country'=>'required'],['country.required'=>'Enter Country Name','state_name.required'=>'Enter State Name']);
        
        $state = new State();
        $state->state_name = $request->state_name;
        $state->country_id = $request->country;
        if($state->save()){
            return redirect('/state')->with('success','State Saved');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function selectstate(Request $request)
    {
        $data['states'] = State::where("country_id", $request->country_id)->get(["state_name", "id"]);
  
        return response()->json($data);
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
