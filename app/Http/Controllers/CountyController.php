<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\County;
use App\Models\Region;

class CountyController extends Controller
{
    public function index()
    {
    	$counties = County::join('region', 'region.id' , "=", 'county.region_id')
    	->select('county.*', 'region.region_name as region_name')->get();
    	// $counties = County::get();
        return view('county.index', compact('counties'));
    }

    public function create()
    {
    	$regions = Region::get();
    	return view('county.create', compact('regions'));
    }

    public function store(Request $request)
    {
    	$request->validate([
            'county_name' => ['required' ,'unique:county'],
            'region_id' => ['required'],          
        ]);
        
        County::create([
            'county_name' => $request->get('county_name'),
            'region_id' => $request->get('region_id'),
        ]);
            
        return redirect('county')->with('success', "County Created Successfuly");
    }

    public function edit($id)
    {
        $regions = Region::get();
    	$county = County::find($id);
    	return view('county.edit', compact('county', 'regions'));
    }

    public function update(Request $request, $id)
    {
    	$request->validate([
    		'county_name' => ['required'],
            'region_id' => ['required'],    		
    	]);

    	$county = County::find($id);
    	$county->update([
			'county_name' => $request->get('county_name'),
            'region_id' => $request->get('region_id')
    	]);
    	return redirect()->to('county');
    }

    public function delete($id)
    {
    	$county = County::find($id);
    	$county->delete();
    	return redirect()->to('county');
    }
    
  
}
