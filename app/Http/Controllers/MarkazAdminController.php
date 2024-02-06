<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\prayers_timing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use DateTime;
use DateInterval;


class MarkazAdminController extends Controller
{
    
        public function m_index()
        {    
            $prayer = prayers_timing::where('centre_id',auth()->user()->centre_id)
             ->whereMonth('date', date('m'))
             ->whereDay('date', date('d'))
             ->first();
            
            return view('markaz_admin.m_index',compact('prayer'));
        }


    public function m_create()
    {
    	return view('markaz_admin.m_create');

    }

    public function AzanTimings()
    {
    	return view('markaz_admin.azan');
    }
    
    public function double_update(Request $request)
    {
        $request->validate([
            
            'fajar_azan' => ['required'],          
            'zuhr_azan' => ['required'],          
            'asr_azan' => ['required'],   
            'maghrib_azan' => ['required'],          
            'isha_azan' => ['required'],
            'jumah_azan' => ['required'],
        ]);
        
        $center = auth()->user()->centre_id;
        $checkcenter = prayers_timing::where('centre_id', $center)->get();
        
        $fajar = 'PT' . $request->fajar_azan . 'M';
        $zuhar = 'PT' . $request->zuhr_azan . 'M';
        $asar = 'PT' . $request->asr_azan . 'M';
        $maghrib = 'PT' . $request->maghrib_azan . 'M';
        $isha = 'PT' . $request->isha_azan . 'M';
        $jumma = 'PT' . $request->jumah_azan . 'M';
    
        // Iterate through each record and update
        foreach ($checkcenter as $record) {
        // Convert string to DateTime
            $fajarDateTime = Carbon::createFromFormat('H:i:s', $record->fajar_jamat);
            $zuharDateTime = Carbon::createFromFormat('H:i:s', $record->zuhr_jamat);
            $asrDateTime = Carbon::createFromFormat('H:i:s', $record->asr_jamat);
            $maghribDateTime = Carbon::createFromFormat('H:i:s', $record->maghrib_jamat);
            $ishaDateTime = Carbon::createFromFormat('H:i:s', $record->Isha_jamat);
            $jummaDateTime = Carbon::createFromFormat('H:i:s', $record->jumua);
    
            // Update records
            $record->update([
                'fajar_azan' => $fajarDateTime->sub(new DateInterval($fajar))->format('H:i:s'),
                'zuhr_azan' => $zuharDateTime->sub(new DateInterval($zuhar))->format('H:i:s'),
                'asr_azan' => $asrDateTime->sub(new DateInterval($asar))->format('H:i:s'),
                'maghrib_azan' => $maghribDateTime->sub(new DateInterval($maghrib))->format('H:i:s'),
                'isha_azan' => $ishaDateTime->sub(new DateInterval($isha))->format('H:i:s'),
                'jumah_azan' => $jummaDateTime->sub(new DateInterval($jumma))->format('H:i:s'),
                ]);
            }
    
        return redirect()->back()->with('success', 'Uploaded successfully!');
        }
        public function upload(Request $request)
        {
          
          $validator = Validator::make($request->all(), [
            'csv_file' => 'required|mimes:csv,txt|max:2048', // Validate CSV file
            // Add the image file validation rules here as per your previous validation
            // ...
        ], [
            'csv_file.required' => 'CSV file is required.',
            'csv_file.mimes' => 'Only CSV files are allowed.',
            'csv_file.max' => 'CSV file should be less than 2MB.',
           
        ]);
        
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        try {
        $csv = $request->file('csv_file');
    
        if (!$csv->isValid()) {
            throw new \Exception('Invalid CSV file');
        }
    
        $csvname = $csv->getClientOriginalName();
        $csv->move(public_path('uploads'), $csvname);
        $filePath = public_path('uploads') . '/' . $csvname;
    
        if (!file_exists($filePath) || !is_readable($filePath)) {
            throw new \Exception('The specified CSV file does not exist or is not readable.');
        }
    
        $csvData = array_map('str_getcsv', file($filePath));
    
        $currentDay = date('d');
        $currentMonth = date('m');

 
        $isFirstRow = true; 
        foreach ($csvData as $row) {
            if ($isFirstRow) {
            $isFirstRow = false;
            continue; 
        }
        
        $inputDate = $row[0];
        $convertedDate = Carbon::createFromFormat('d/m/Y', $inputDate)->format('Y-m-d');

        $results = prayers_timing::whereMonth('date', '=', Carbon::createFromFormat('Y-m-d', $convertedDate)->month)
         ->whereDay('date', '=', Carbon::createFromFormat('Y-m-d', $convertedDate)->day)
             ->get();
              $results->each->delete();
             
                    
        prayers_timing::create([ 
            'date' => $convertedDate,
            'fajar_jamat' => $row[1] ?? null,
            'zuhr_jamat' => $row[2] ?? null,
            'asr_jamat' => $row[3] ?? null,
            'maghrib_jamat' => $row[4] ?? null,
            'Isha_jamat' => $row[5] ?? null,
            'sun_rise' => $row[6] ?? null,
            'chaasht' => $row[7] ?? null,
            'zawal' => $row[8] ?? null,
            'jumua' => $row[9] ?? null,
            'jumma_ijtimah' => $row[10] ?? null,
            'centre_id' => auth()->user()->centre_id       
        ]);
    }

        return redirect()->back()->with('success', 'CSV file uploaded successfully!');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', $e->getMessage());
    }
    
    }
    
    // public function importCSV()
    // {
    //   //upload 
       
    // }

    public function m_edit($id){

    	$prayer = prayers_timing::find($id);
    	return view('markaz_admin.m_edit', compact('prayer'));
    }

    public function m_update(Request $request, $id)
    {
    	$request->validate([
    		'fajar_jamat' => ['required'],
            'zuhr_jamat' => ['required'],
            'asr_jamat' => ['required'],
            'maghrib_jamat' => ['required'],
            'Isha_jamat' => ['required'],
            'sun_rise' => ['required'],
            'chaasht' => ['required'],
            'zawal' => ['required'],
            'jumua' => ['required'],
            'jumma_ijtimah' => ['required']
    	]);

    	$prayer = prayers_timing::find($id);
    	$prayer->update([
	'fajar_jamat' => $request->get('fajar_jamat'),
    'zuhr_jamat' => $request->get('zuhr_jamat'),
    'asr_jamat' => $request->get('asr_jamat'),
    'maghrib_jamat' => $request->get('maghrib_jamat'),
    'Isha_jamat' => $request->get('Isha_jamat'),
    'sun_rise' => $request->get('sun_rise'),
    'chaasht' => $request->get('chaasht'),
    'zawal' => $request->get('zawal'),
    'jumua' => $request->get('jumua'),
    'jumma_ijtimah' => $request->get('jumma_ijtimah'),
    	]);
    	return redirect()->to('markaz_admin');
    }
    

    public function delete($id)
    {
    	$prayer = prayers_timing::find($id);
    	$prayer->delete();
    	return redirect()->back();
    }
    
    public function ViewTiming(){
        
        $prayer = prayers_timing::where('centre_id', auth()->user()->centre_id)->get();
        return view ('markaz_admin.dashboard',compact('prayer')); 
    }
}
