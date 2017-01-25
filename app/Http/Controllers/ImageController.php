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

    public function saveImage(Request $request)
    {
        // Store in storage/app/holding-images/originals
        $file = $request->file->store('holding-images/'.auth()->user()->id .'/originals');
        $fileHash = substr($file, strrpos($file, '/') + 1);

        // Fit image to site preferred size.
        $img = Image::make($request->file);

        // resize image
        $img->resize(null, 768, function ($constraint) {
            $constraint->aspectRatio();
        });
        // save image fit for site views
        $img->save(storage_path('app/holding-images/'.auth()->user()->id.'/'.$fileHash));

        // Make thumbnail
        $img->resize(null, 124, function ($constraint) {
            $constraint->aspectRatio();
        });

        Storage::makeDirectory('holding-images/'.auth()->user()->id.'/thumbnails');
        $path = storage_path('app/holding-images/'.auth()->user()->id.'/thumbnails/'.$fileHash);
        $img->save($path);
        if ($holding_id = session()->get('active_holding'))
            return HoldingImage::create(['holding_id' => $holding_id, 'file_hash' => $fileHash]);
    }
}
