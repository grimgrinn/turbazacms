<?php

namespace App\Http\Controllers\User;

use App\Model\user\Image;
use App\Model\user\TextPage;
use App\Model\user\Turbaza;
use App\Model\user\Cottege;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TurbazaController extends Controller
{
    public function show(Turbaza $slug)
    {
        $pages = TextPage::with('availableImages')->where('turbaza_id', $slug->id)->get();
        $cotteges = Cottege::with('images')->where('turbaza_id', $slug->id)->get();
        return view('user.turbaza', compact('slug', 'pages', 'cotteges'));
    }

    public function about(Turbaza $slug)
    {
        $pages = TextPage::with('images')->where('turbaza_id', $slug->id)->get();
        $cotteges = Cottege::with('images')->where('turbaza_id', $slug->id)->get();
        $images = Image::where('turbaza_id', $slug->id)->where('deleted','!=',1)->get();

        return view('user.about', compact('slug', 'pages', 'cotteges', 'images'));
    }

    public function page($id)
    {
        $page = TextPage::with('availableImages')->where('id', $id)->first();
        $slug = Turbaza::where('id', $page->turbaza_id)->first();
        $pages = TextPage::whereHas('images', function($query){
                $query->where('deleted','!=',1);
            })->where('turbaza_id', $slug->id)->get();
        $cotteges = Cottege::with('images')->where('turbaza_id', $slug->id)->get();

        return view('user.page', compact('page', 'slug', 'pages', 'cotteges'));
    }
}
