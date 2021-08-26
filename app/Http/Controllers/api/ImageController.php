<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ImageResource;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function index()
    {
        return ImageResource::collection(Image::all());
    }

    public function store(Request $request)
    {
        // Store Image
        $image = Image::create([
            'title' => $request->title,
            'image' => '',
            'user_id' => $request->user_id,
        ]);
        // Upload Image 
        $this->UploadImage($image);
    }

    public function UploadImage($model)
    {
        $image = request()->image;
        $imageName = rand() . $image->getClientOriginalName();
        $image->move('uploads', $imageName);
        $model->update([
            'image' => $imageName,
        ]);
    }
}
