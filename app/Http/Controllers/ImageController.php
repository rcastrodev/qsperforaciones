<?php

namespace App\Http\Controllers;

use App\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function destroy($id){
        $image = Image::find($id);
        
        if(Storage::disk('public')->exists($image->image))
            Storage::disk('public')->delete($image->image);

        $image->delete();
    }
}
