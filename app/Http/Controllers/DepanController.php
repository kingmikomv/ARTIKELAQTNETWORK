<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Artikel;
use Illuminate\Http\Request;

class DepanController extends Controller
{
    public function index()
    {
        $artikel = \App\Models\Artikel::latest()->first();
        $lt = Artikel::latest()->limit(1)->first();
        $order = Artikel::orderBy('id', 'desc')->limit(4)->get();

        $randartikel = Artikel::inRandomOrder()->limit(6)->get();
        $categories = Tag::all();

        return view('depan.index', compact('artikel', 'lt', 'order', 'randartikel', 'categories'));
    }
    function artikel($slug)
    {
        $artikel = Artikel::where('slug', $slug)->first();
        $tambah = Artikel::where('slug', $slug)->update([
            'view_artikel' => $artikel->view_artikel + 1
        ]);
        $randartikel = Artikel::inRandomOrder()->limit(6)->get();
     
        $categories = Tag::all();

        //dd($tags);

        return view('depan.artikel', compact('artikel', 'randartikel', 'categories'));
    }
}
