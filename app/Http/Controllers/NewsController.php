<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\news;
class NewsController extends Controller
{
    public function index()
    {
    $news = news::where('centre_id',auth()->user()->centre_id)->get();
     return view('news.index' ,compact('news'));
    }


    public function edit($id)
    {
    	$news = news::find($id);
    	return view('news.edit', compact('news'));
    }
    public function create()
    {
    	return view('news.create');


    }
    public function store(Request $request)
    {
    	$request->validate([
    'newi' => ['required'],
    'newii' => ['required'],
    'newiii' => ['required'],
    'newiv' => ['required'],
    'newv' => ['required'],
], [
    'newi.required' => 'News 1  is required.',
    'newii.required' => 'News 2  is required.',
    'newiii.required' => 'News 3  is required.',
    'newiv.required' => 'News 4  is required.',
    'newv.required' => 'News 5 is required.',
]);
 news::create([
    'newi' => $request->get('newi'),
    'newii' => $request->get('newii'),
    'newiii' => $request->get('newiii'),
    'newiv' => $request->get('newiv'),
    'newv' => $request->get('newv'),
    'centre_id' => auth()->user()->centre_id
        
]);
          
        return redirect()->route('news.index')->with('success', "Created Successfuly");

    }

    public function update(Request $request, $id)
    {
    	$request->validate([
            'newi' => ['required'],
            'newii' => ['required'],
            'newiii' => ['required'],
            'newiv' => ['required'],
            'newv' => ['required'],
    	]);

        $news = news::find($id);
    	$news->update([
            'newi' => $request->get('newi'),
            'newii' => $request->get('newii'),
            'newiii' => $request->get('newiii'),
            'newiv' => $request->get('newiv'),
            'newv' => $request->get('newv')
    	]);
    	
    	return redirect()->to('news');
    }

   public function delete($id)
{
    $news = News::find($id);

    if (!$news) {
        return redirect()->back()->with('error', 'News not found');
    }

    $news->delete();

    return redirect()->to('news')->with('success', 'News deleted successfully');
}

}
