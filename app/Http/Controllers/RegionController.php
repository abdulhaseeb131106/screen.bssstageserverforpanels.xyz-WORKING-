<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Region;
use App\Models\Calendar;
use App\Models\DateId;

class RegionController extends Controller
{
    public function index()
    {
    	$regions = Region::get();
    	
    	$date_id = DateId::first();
        $calen_id = $date_id->date_id;
    	$hijri_date = Calendar::find($calen_id);
    	
        return view('region.index', compact('regions', 'hijri_date'));
    }
    
    public function skip($id)
    {
        $updated_id = $id + 1;
        $calendar = DateId::find($updated_id);
        
        DateId::all()->each(function ($record) use ($updated_id){
            $record->update(['date_id' => $updated_id]);
        });
        
        return redirect()->to('region');
    }
    
    public function back($id)
    {
        $updated_id = $id - 1;
        $calendar = DateId::find($updated_id);
        
        DateId::all()->each(function ($record) use ($updated_id){
            $record->update(['date_id' => $updated_id]);
        });
        
        return redirect()->to('region');
    }
    
    public function create()
    {
    	return view('region.create');
    }

    public function store(Request $request)
    {
    	$request->validate([
            'region_name' => ['required', 'unique:region'  ],
        ]);
        Region::create([
            'region_name' => $request->get('region_name'),
            
        ]);
        return redirect('region')->with('success', "Region Created Successfuly");
    }

    public function edit($id)
    {
    	$region = Region::find($id);
    	return view('region.edit', compact('region'));
    }

    public function update(Request $request, $id)
    {
    	$request->validate([
    		'region_name' => ['required'],	
    	]);
    	$region = Region::find($id);
    	$region->update([
			'region_name' => $request->get('region_name'),
    	]);
    	return redirect()->to('region');
    }

    public function delete($id)
    {
    	$region = Region::find($id);
    	$region->delete();
    	return redirect()->to('region');
    }
}