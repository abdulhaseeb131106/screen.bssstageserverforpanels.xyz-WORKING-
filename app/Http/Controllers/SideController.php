<?php

namespace App\Http\Controllers;

use App\Models\Sideimage;
use Illuminate\Http\Request;
use Validator;

class SideController extends Controller
{
    
        public function index()
        {
         $slider = Sideimage::get();
         return view('sideimage.index', compact('slider'));
        }
        public function create()
        {
         return view('sideimage.create');
        }
        public function edit($id)
        {
            $slider = Sideimage::find($id);
            return view('sideimage.edit', compact('slider'));
        }
    
        public function store(Request $request)
        {
            $validator = Validator::make($request->all(), [
                'file' => ['required'],
                
            ]);
    
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
         $color1 = $request->input('color1');
         $color2 = $request->input('color2');
         $gradientColor = "$color1,$color2";
        
            foreach ($request->file('file') as $image) {
                $imageName = $image->getClientOriginalName();
                $image->move(public_path().'/images/', $imageName);
                Sideimage::create([
                    'image_name' => $imageName,
                    'theme' => $gradientColor

                    ]);
                
            }
    
            return redirect()->route('sideimage.index')->with('success', 'Images uploaded successfully');
        }
            public function update(Request $request, $id)
            {
                $request->validate([
                    'image' => ['image'], // Validate if an image is uploaded (optional)
                ]);
            
                $slider = Sideimage::find($id);
            
                if (!$slider) {
                    return redirect()->route('slider.index')->with('error', 'Slider not found');
                }
            
                $color1 = $request->input('color1');
                $color2 = $request->input('color2');
                $gradientColor = "$color1,$color2";
            
                if ($request->hasFile('image')) {
                    $newImage = $request->file('image');
                    $newImageName = $newImage->getClientOriginalName(); // Get the original file name
                    
                    // Move the image to the desired location
                    $newImage->move(public_path('images/'), $newImageName);   
                    
                    // Update the image_name in the database
                    $slider->update([
                        'image_name' => $newImageName,
                    ]);
            
                    return redirect()->route('sideimage.index')->with('success', 'Slider image updated successfully');
                }
            
                // If no new image is uploaded, update the theme
                $slider->update([
                    'theme' => $gradientColor,
                ]);
            
                return redirect()->route('sideimage.index')->with('success', 'Slider theme updated successfully');
            }

        
    
    
    
        public function delete($id)
        {
            $sliders = Sideimage::find($id);
            $sliders->delete();
            return redirect()->back()->with('success' , 'deleted succesfully');
        }
    
    
    }

