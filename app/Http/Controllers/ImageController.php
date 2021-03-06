<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRequest;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class ImageController extends Controller
{
    public function index()
    {
        $response = Http::get(env('API_URL') . "images");
        $images = json_decode($response->body());
        return view('welcome', compact('images'));
    }

    public function create()
    {
        return view('post.create');
    }

    public function show(Image $image)
    {
          return $image;
    }

  

    public function store(StoreRequest $request)
    {
        $request->validated();
        $res = Http::withToken(Cookie::get('token'))
            ->attach('image', file_get_contents($request->image), 'kurd.jpg')
            ->post(env('API_URL') . "store", [
                'title' => $request->title,
                'user_id' => auth()->id(),
            ]);
        return redirect('/');
    }

}
