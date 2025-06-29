<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Photo;

class AppController extends Controller
{
    public function index()
    {
        return view('welcome', [
            'artikels' => Blog::orderBy('id', 'desc')->limit(3)->get(),
            'photos' => Photo::orderBy('id', 'desc')->limit(4)->get(),
        ]);
    }

    public function berita()
    {
        return view('berita.berita',[
            'artikels' => Blog::orderBy('id', 'desc')->get()
        ]);
    }

    public function detail($slug)
    {
        $artikel = Blog::where('slug', $slug)->firstOrFail();
        return view('berita.detail', [
        'artikel' => $artikel
        ]);
    }

    public function foto()
    {
    $photos = Photo::orderBy('id', 'desc')->get();
    return view('foto.foto', compact('photos'));
    }
}
