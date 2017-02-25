<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Image;
use Storage;
use App\Holding;
use App\HoldingImage;
use App\Utility\Slim;

class ImageController extends Controller
{
    public function addImagesForm()
    {
        $holding = Holding::find(session()->get('active_holding'));
        return view('images.new', compact('holding'));
    }

    public function showImage($user_id, $image_id)
    {
        return HoldingImage::find($image_id)->link();
    }

    public function showThumb($user_id, $image_id)
    {
        return HoldingImage::find($image_id)->thumbnail();
    }

    public function saveImage(Request $request)
    {
        $holding = Holding::find($request->holding_id);

        // Check if holding belongs to user
        if (Gate::denies('add-image', $holding))
        {
            // Make this something better later.
            return back();
        }

        $images = Slim::getImages();


        foreach($images as $image)
        {
            // return dd(storage_path('app/holding-images/'.auth()->user()->id.'/'.$image['input']['name']));
            $fileName = $image['input']['name'];
            $fileHash = md5($image['input']['name']);
            $storagePath = storage_path('app/holding-images/'.auth()->user()->id);

            $file = Slim::saveFile($image['output']['data'], $fileName, $storagePath);

            // Fit image to site preferred size.
            $img = Image::make($image['output']['data']);

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

            HoldingImage::create(['holding_id' => $holding->id, 'file_hash' => $fileHash]);
        }
    }
}
