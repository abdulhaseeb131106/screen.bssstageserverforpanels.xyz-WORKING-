<?php

namespace App\Http\Controllers;

use App\Models\Sideimage;
use Illuminate\Http\Request;
use App\Models\logo;
use App\Models\news;
use App\Models\prayers_timing;
use App\Models\slider;
use App\Models\Centre;
use App\Models\DateId;
use App\Models\Calendar;
use Alkoumi\LaravelHijriDate\Hijri;
use Carbon\Carbon;

class ScreenViewController extends Controller
{
    
    public function frontend(Request $request)
    {
        $centre_id = Centre::where('centre_slug',$request->slug)->value('id');
        $prayer = prayers_timing::where('centre_id',$centre_id)
        ->whereMonth('date', date('m'))
        ->whereDay('date', date('d'))
        ->first();
       
        $new = news::where('centre_id',$centre_id)->get();
        $side = Sideimage::first();
        $slider = slider::where('centre_id',$centre_id)->get();
        $logos = logo::where('centre_id',$centre_id)->get();
        
        $azan = $prayer->maghrib_azan;
        $time = Carbon::now('Asia/Karachi')->toDateTimeString();
        $date_id = DateId::first();
        $id = $date_id->date_id;
        $hijri_date = Calendar::find($id);
        
        // Check if the current time is after or equal to Maghrib Azan time
        if (strtotime($time) >= strtotime($azan)) {
            // Check if the flag is not set
            if(!$request->session()->has('date_incremented')) {
                // Increment the $id
            $updated_id = $id + 1;
            // Check if $id has reached 360, reset it to 1
            if($updated_id > 360) {
                $updated_id = 1;
            }
            // Fetch the updated hijri date record
            $hijri_date = Calendar::find($updated_id);
            // Update all records in the DateId model
            DateId::all()->each(function ($record) use ($updated_id){
                $record->update(['date_id' => $updated_id]);
            });
            // Set the flag to indicate that the date has been incremented
            $request->session()->put('date_incremented', true);
            }
        }
        else{
            // Reset the flag if the current time is before Maghrib Azan time
            $request->session()->forget('date_incremented');
        }

        $half_date = Carbon::now()->format('j F');
        $year = Carbon::now()->format(' Y');
        $eng_date = $half_date;
        return view('index', compact('prayer', 'new','slider','logos' ,'centre_id','side','hijri_date', 'eng_date', 'year'));
    }
}