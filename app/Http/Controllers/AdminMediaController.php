<?php

namespace App\Http\Controllers;

use App\Photo;
use Illuminate\Http\Request;

class AdminMediaController extends Controller
{
    //
    public function index()
    {
        $photos = Photo::all();
        return view('admin.media.index', compact('photos'));
    }

    public function create()
    {
        return view('admin.media.create');
    }

    public function store(Request $request)
    {
        $file = $request->file('file');
        $name = time() . $file->getClientOriginalName();
        $file->move('images', $name);

        Photo::create(['file' => $name]);
        
    }

    public function destroy($id)
    {   
        $photo = Photo::findOrFail($id);
        //لحذف الصورة من مجلد الصور في المجلد العام، حيث أن 
        // public_path() <==> /var/www/html/blog/public
        unlink(public_path(). $photo->file);
        $photo->delete();//delete the image from the database table
        return redirect(route('media.index'));
    }
}
