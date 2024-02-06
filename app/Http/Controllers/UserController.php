<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\County;
use App\Models\Region;
use App\Models\Centre;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
  $users = User::join('region', 'region.id', '=', 'users.region_id')
        ->join('county', 'county.id', '=', 'users.county_id')
        ->join('centre', 'centre.id', '=', 'users.centre_id')
        ->select('users.*', 'region.region_name as region_name', 'county.county_name as county_name', 'centre.centre_name as centre_name')
        ->get();
        return view('user.index', compact('users'));
    }
    
    public function create()
    {
        $regions = Region::get();
        $counties = County::get();
        $centres = Centre::get();
    	$users = User::get();
    	return view('user.create', compact('users', 'regions', 'counties', 'centres'));


    }





public function getCounties($region_id)
{
    $counties = County::where('region_id', $region_id)->get();
    return response()->json($counties);
}



    public function store(Request $request)
    {
    $request->validate([
    'employ_id' => [
        'required',
        'regex:/^[0-9]+$/u',
        'unique:users'
    ],
    'name' => ['required'],
    'email' => ['required', 'email','unique:users'],
    'password' => ['required'],
    'region_id' => ['required'],
    'county_id' => ['required'],
    'centre_id' => ['required']
], [
    'employ_id.required' => 'The employee ID is required.',
    'employ_id.regex' => 'The employee ID should contain only numbers.',
    'employ_id.unique' => 'The employee ID has already been taken.',
    'name.required' => 'Please provide a name.',
    'email.required' => 'Email address is required.',
    'email.email' => 'Please provide a valid email address.',
    'password.required' => 'A password is required.',
    'region_id.required' => 'Region ID is required.',
    'county_id.required' => 'County ID is required.',
    'centre_id.required' => 'Centre ID is required.'
]);

    // Create the user
    User::create([
        'employ_id' => $request->get('employ_id'),
        'name' => $request->get('name'),
        'email' => $request->get('email'),
        'password' => bcrypt($request->input('password')),
        'role_as' => 0,
        'region_id' => $request->get('region_id'),
        'county_id' => $request->get('county_id'),
        'centre_id' => $request->get('centre_id'),
    ]);
           

   

        return redirect('user')->with('success', "User Created Successfuly");
    }

    public function edit($id)
    {
        $regions = Region::get();
        $counties = County::get();
        $centres = Centre::get();
    	$user = User::find($id);
    	return view('user.edit', compact('user', 'regions', 'counties', 'centres'));
    }

    public function update(Request $request, $id)
    {
    	$request->validate([
            'employ_id' => ['required'],
            'name' => ['required'],
            'email' => ['required'],
            'region_id' => ['required'],
            'county_id' => ['required'],
            'centre_id' => ['required']
        ]);

    	$user = User::find($id);
    	$user->update([
    		 'employ_id' => $request->get('employ_id'),
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
            'region_id' => $request->get('region_id'),
            'county_id' => $request->get('county_id'),
            'county_id' => $request->get('county_id'),
            'centre_id' => $request->get('centre_id'),
    	]);
    	return redirect()->to('user');
    }

    public function delete($id)
    {
    	$user = User::find($id);
    	$user->delete();
    	return redirect()->to('user');
    }
    public function dropdown(Request $request)
    {
       $countries = County::where('region_id', $request->region_id)->get();
       return response()->json(['countries' => $countries]);
    }
}
