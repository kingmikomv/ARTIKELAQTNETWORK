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
        $order = Artikel::orderBy('id', 'desc')->limit(4)->paginate(4);
        $randartikel = Artikel::inRandomOrder()->limit(6)->get();
        $categories = Tag::all();
        //HALAMAN
        // Ambil semua menu
        $menus = \App\Models\Menu::all();

        $submenu =[];
        // Ambil submenu terkait untuk setiap menu
        foreach ($menus as $menu) {
            $submenu[$menu->menu] = \App\Models\Submenu::where('menu', $menu->menu)->get() ?? null;
        }

        //dd($submenu);
        return view('depan.index', compact('artikel', 'lt', 'order', 'randartikel', 'categories', 'submenu', 'menus'));
    }
  

    function artikel($slug)
    {
        $artikel = Artikel::where('slug', $slug)->first();
        $tambah = Artikel::where('slug', $slug)->update([
            'view_artikel' => $artikel->view_artikel + 1
        ]);
        $randartikel = Artikel::inRandomOrder()->limit(6)->get();

        $categories = Tag::all();
        $menus = \App\Models\Menu::all();

        $submenu =[];
        // Ambil submenu terkait untuk setiap menu
        foreach ($menus as $menu) {
            $submenu[$menu->menu] = \App\Models\Submenu::where('menu', $menu->menu)->get() ?? null;
        }

        return view('depan.artikel', compact('artikel', 'randartikel', 'categories', 'submenu', 'menus'));
    }
    function kategori($slug_tag)
    {
        // Cari artikel di mana kolom 'tag' mengandung "Mikrotik Dasar"
        $artikel = Artikel::whereJsonContains('tag', $slug_tag)->paginate(6);

        $datatag = Tag::where('tag', $slug_tag)->first();
        $tambah = Tag::where('tag', $slug_tag)->update([
            'view_tag' => $datatag->view_tag + 1
        ]);
        $randartikel = Artikel::inRandomOrder()->limit(6)->get();
        $categories = Tag::all();
        $menus = \App\Models\Menu::all();

        $submenu =[];
        // Ambil submenu terkait untuk setiap menu
        foreach ($menus as $menu) {
            $submenu[$menu->menu] = \App\Models\Submenu::where('menu', $menu->menu)->get() ?? null;
        }

        return view('depan.kategori', compact('artikel', 'randartikel', 'categories', 'slug_tag', 'submenu', 'menus'));
    }
    function handle($menu, $submenu)
    {
        $sm = $submenu;
        $artikel = \App\Models\Artikel::latest()->first();
        $randartikel = Artikel::inRandomOrder()->limit(6)->get();
        $categories = Tag::all();
        $menus = \App\Models\Menu::all();
        
        $submenu =[];
        // Ambil submenu terkait untuk setiap menu
        foreach ($menus as $menu) {
            $submenu[$menu->menu] = \App\Models\Submenu::where('menu', $menu->menu)->get() ?? null;
        }
        //dd($sm);
       $datasubmenu = \App\Models\Submenu::where('submenu', $sm)->first();
        return view('depan.handle', compact('artikel', 'randartikel', 'categories', 'submenu', 'menus', 'datasubmenu'));
    }
}
