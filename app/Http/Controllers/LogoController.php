<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\logo;
use Illuminate\Support\Facades\Validator;
class LogoController extends Controller
{
    public function index()
    {
    $logo = logo::where('centre_id',auth()->user()->centre_id)->get();
     return view('logo.index',compact('logo'));
    }


    public function create()
    {
    $logo = logo::get();
     return view('logo.create',compact('logo'));
    }

    public function edit($id)
    {
    	$logo = logo::find($id);
    	return view('logo.edit', compact('logo'));
    }


    public function logoUploader(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'file.*' => 'required|image|dimensions:width=400,height=92|mimes:jpeg,png|max:2048', // Adjusted dimensions and added max size in KB (2MB)
            'file' => 'required|array|max:10',
        ], [
            'file.*.mimes' => 'Each image must be in JPEG or PNG format.',
            'file.*.dimensions' => 'Each image must be exactly 400x92 pixels.',
            'file.*.max' => 'Each image should be less than 2MB.',
            'file.*.required' => 'Each file field is required.',
            'file.max' => 'Maximum 10 images allowed.',
        ]);


    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

        foreach ($request->file('file') as $image) {
            $imageName = $image->getClientOriginalName();
            $image->move(public_path().'/logos/', $imageName);
            logo::create([
                'image_name' => $imageName,
                'centre_id' => auth()->user()->centre_id
                ]);
        }

        return redirect()->route('logo.index')->with('success', 'Images uploaded successfully');
    }
    // udpate
    public function update(Request $request, $id)
    {
        $request->validate([
        'image' => 'required|image|mimes:jpeg,png|dimensions:width=400,height=92',
    ], [
    'image.required' => 'The image is required.',
    'image.image' => 'Only JPEG and PNG files are allowed.',
    'image.mimes' => 'Only JPEG and PNG files are allowed.',
    'image.dimensions' => 'Each image must be exactly 400x92 pixels.',
    ]);

        $logo = Logo::find($id);

        if (!$logo) {
            return redirect()->route('logo.index')->with('error', 'Logo not found');
        }

        if ($request->hasFile('image')) {
            $newImage = $request->file('image');
            $newImageName = $newImage->getClientOriginalName();
            $newImage->move(public_path('images/'), $newImageName);

            $logo->update(['image_name' => $newImageName]);

            return redirect()->route('logo.index')->with('success', 'Logo image updated successfully');
        }

        return redirect()->route('logo.index')->with('error', 'No image uploaded');
    }


    public function delete($id)
    {
    	$logo = logo::find($id);
    	$logo->delete();
    	return redirect()->to('logo');
    }
}
