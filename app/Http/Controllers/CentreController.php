<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Centre;
use App\Models\County;
use App\Models\Region;
use App\Models\prayers_timing;
use  App\Models\news;
use Illuminate\Support\Str;


class CentreController extends Controller
{
    public function index()
    {
    	$centres = Centre::join('region', 'region.id', '=', 'centre.region_id')
    	->select('centre.*', 'region.region_name as region_name', 'county.county_name as county_name')
    	->join('county', 'county.id', '=', 'centre.county_id')->get();
        return view('centre.index', compact('centres'));
    }

    public function create()
    {
    	$counties = County::get();
    	$regions = Region::get();
    	return view('centre.create', compact('regions', 'counties'));
    }

    public function store(Request $request)
    {
    	$request->validate([
            'centre_name' => ['required','unique:centre'],
            'county_id' => ['required'],
            'region_id' => ['required'],          
        ]);
        
        $slug = Str::slug($request->centre_name);
        $counter = 2;
        while (Centre::where('centre_slug', $slug)->exists()) {
            $slug = $slug . '-' . $counter;
            $counter++;
        }
        
       $centre = Centre::create([
            'centre_name' => $request->get('centre_name'),
            'centre_slug' => $slug,
            'region_id' => $request->get('region_id'),
            'county_id' => $request->get('county_id')
        ]);
        
        
        prayers_timing::create
        ([
            'fajar_jamat' => "00:00:00",
            'zuhr_jamat' => "00:00:00",
            'asr_jamat' => "00:00:00",
            'maghrib_jamat' => "00:00:00",
            'Isha_jamat' => "00:00:00",
            'sun_rise' => "00:00:00",
            'chaasht' => "00:00:00",
            'zawal' => "00:00:00",
            'jumua' => "00:00:00",
            'jumma_ijtimah' => "00:00:00",
            'date' => date('Y-m-d'),
             'centre_id' => $centre->id       
        ]);
        
            
        return redirect('centre')->with('success', "Centre Created Successfuly");
    }

    public function edit($id)
    {
        $counties = County::get();
    	$regions = Region::get();
    	$centre = Centre::find($id);
    	return view('centre.edit', compact('centre', 'counties', 'regions'));
    }

    public function update(Request $request, $id)
    {
    	$request->validate([
    		'centre_name' => ['required'],
            'region_id' => ['required'],    		
            'county_id' => ['required']
    	]);

    	$centre = Centre::find($id);
    	$centre->update([
			'centre_name' => $request->get('centre_name'),
            'region_id' => $request->get('region_id'),
            'county_id' => $request->get('county_id')
    	]);
    	return redirect()->to('centre');
    }

    public function delete($id)
    {
    	$centre = Centre::find($id);
    	$centre->delete();
    	return redirect()->to('centre');
    }
      public function dropdown(Request $request)
    {
       $countries = County::where('region_id', $request->region_id)->get();
       return response()->json(['countries' => $countries]);
    }
}
