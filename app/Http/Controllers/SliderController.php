<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use App\Models\slider;
use Illuminate\Support\Facades\Validator;


class SliderController extends Controller
{
    public function index()
    {
     $slider = slider::where('centre_id',auth()->user()->centre_id)->get();
     return view('slider.index',compact('slider') );
    }
    public function create()
    {
     return view('slider.create');
    }
    public function edit($id)
    {
    	$slider = slider::find($id);
    	return view('slider.edit', compact('slider'));
    }

    public function imageUploader(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'file.*' => 'required|image|mimes:jpeg,png|dimensions:width=1105,height=840',
            'file' => 'required|array|max:10',
        ], [
            'file.*.mimes' => 'Only JPEG and PNG files are allowed.',
            'file.*.dimensions' => 'Each image must be exactly 1105x840 pixels.',
            'file.*.max' => 'Each image should be less than 2MB.',
            'file.max' => 'Maximum 10 images allowed.',
        ]);


    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

        foreach ($request->file('file') as $image) {
            $imageName = $image->getClientOriginalName();
            $image->move(public_path().'/images/', $imageName);
            slider::create([
                'image_name' => $imageName,
                'centre_id' => auth()->user()->centre_id
                
                ]);
            
        }

        return redirect()->route('slider.index')->with('success', 'Images uploaded successfully');
    }


    public function update(Request $request, $id)
    {
        $request->validate([
        'image' => 'required|image|mimes:jpeg,png|dimensions:width=1105,height=840',
    ], [
    'image.required' => 'The image is required.',
    'image.image' => 'Only JPEG and PNG files are allowed.',
    'image.mimes' => 'Only JPEG and PNG files are allowed.',
    'image.dimensions' => 'Each image must be exactly 1105x840 pixels.',
    ]);


        $slider = Slider::find($id);

        if (!$slider) {
            return redirect()->route('slider.index')->with('error', 'Slider not found');
        }

        if ($request->hasFile('image')) {
            $newImage = $request->file('image');
            $newImageName = $newImage->getClientOriginalName();
            $newImage->move(public_path('images/'), $newImageName);
            
            $slider->update(['image_name' => $newImageName]);

            return redirect()->route('slider.index')->with('success', 'Slider image updated successfully');
        }

        return redirect()->route('slider.index')->with('error', 'No image uploaded');
    }



    public function delete($id)
    {
    	$sliders = slider::find($id);
    	$sliders->delete();
    	return redirect()->to('slider');
    }


}
