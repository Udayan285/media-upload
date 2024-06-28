<?php

namespace App\Http\Controllers;

use App\Models\Upload;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $uploads = Upload::all();

        return view("media.upload",compact("uploads"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
        $request->validate([
            'image' => 'required|mimes:jpg,jpeg,png',
        ]);

     
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName);

        $upload = new Upload();

        $upload->file_name = $imageName;

        $upload->save();
        return redirect()->back()->with('status', 'Image Uploaded Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $singleUp = Upload::find($id);
        
        return view('media.edit',compact('singleUp'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $singleUp = Upload::find($id);

        $request->validate([
            'image' => 'required|mimes:jpg,jpeg,png',
        ]);

        //this part is for delete file from public folder while delete from database
        $del = public_path('images/'.$singleUp->file_name);
        if(file_exists($del)){
            unlink($del);
        }
        
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName);
        $singleUp->file_name = $imageName;
        $singleUp->save();


        return redirect()->route('home')->with('status', 'Image Updated Successfully');



    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $deleteImg = Upload::find($id);
        $deleteImg->delete();
        
        //this part is for delete file from public folder while delete from database
        $del = public_path('images/'.$deleteImg->file_name);
        if(file_exists($del)){
            unlink($del);
        }

        return redirect()->back()->with('status', 'Image Deleted Successfully');
    }
}
