<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Image;
use Storage;
use App\Holding;
use App\HoldingImage;
use App\Utility\Slim;
use Illuminate\Http\File;

class ImageController extends Controller
{
    public function addImagesForm()
    {
        $holding = Holding::find(1); // Holding::find(session()->get('active_holding'));
        return view('images.new', compact('holding'));
    }

    public function showImage($user_id, $image_id)
    {
        return response()->file(HoldingImage::find($image_id)->link);
    }

    public function showThumb($user_id, $image_id)
    {
        return response()->file(HoldingImage::find($image_id)->thumbnail);
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
            $user_id = auth()->user()->id;
            $storagePath = storage_path('app/holding-images/'.$user_id);

            // return dd($image['input']);
            // return dd(storage_path('app/holding-images/'.auth()->user()->id.'/'.$image['input']['name']));
            $fileName = $image['input']['name'];
            $fileData = $image['output']['data'];
            $fileHash = md5($fileData).'.'.substr($fileName, strrpos($fileName, '.') + 1);

            Slim::saveFile($fileData, $fileHash, $storagePath.'/originals');
            $file = new File($storagePath.'/originals/'.$fileHash);

            // Fit image to site preferred size.
            $img = Image::make($fileData);

            // resize image
            $img->resize(null, 768, function ($constraint) {
                $constraint->aspectRatio();
            });
            // save image fit for site views
            // Storage::makeDirectory('holding-images/'.$user_id.'/originals');
            $img->save(storage_path('app/holding-images/'.$user_id.'/'.$fileHash));

            // Make thumbnail
            $img->resize(null, 124, function ($constraint) {
                $constraint->aspectRatio();
            });

            Storage::makeDirectory('holding-images/'.$user_id.'/thumbnails');
            $path = $storagePath.'/thumbnails/'.$fileHash;
            $img->save($path);

            HoldingImage::create(['holding_id' => $holding->id, 'file_hash' => $fileHash]);
        }

        return redirect()->action('HoldingController@showMyHoldings');
    }
}
