<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use Illuminate\Http\Request;

class DepanController extends Controller
{
    public function index()
    {
        $artikel = \App\Models\Artikel::latest()->first();
        $lt = Artikel::latest()->limit(1)->first();
        $order = Artikel::orderBy('id', 'desc')->limit(4)->get();
        return view('depan.index', compact('artikel', 'lt', 'order'));
    }
}
