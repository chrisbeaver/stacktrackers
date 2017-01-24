<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;
use Storage;
use App\Holding;
use App\HoldingImage;

class ImageController extends Controller
{
    public function addImagesForm()
    {
        $holding = Holding::find(session()->get('active_holding'));
        return view('images.new', compact('holding'));
    }

    public function store(Request $request)
    {
        // Store in storage/app/holding-images/originals
        $request->image->store('holding-images/'.auth()->user()->id .'/originals/');
        $file_name = md5_file($request->image).'.'.$request->image->extension();

        // Fit image to site preferred size.
        $img = Image::make($request->image);

        // resize image
        $img->resize(null, 768, function ($constraint) {
            $constraint->aspectRatio();
        });
        // save image fit for site views
        $img->save(storage_path('app/holding-images/'.auth()->user()->id.'/'.$file_name));

        // Make thumbnail
        $img->resize(null, 124, function ($constraint) {
            $constraint->aspectRatio();
        });

        Storage::makeDirectory('holding-images/'.auth()->user()->id.'/thumbnails');
        $path = storage_path('app/holding-images/'.auth()->user()->id.'/thumbnails/'.$file_name);
        $img->save($path);
        
        HoldingImage::create(['holding_id' => $request->holding_id, 'path' => $path]);
    }
}
