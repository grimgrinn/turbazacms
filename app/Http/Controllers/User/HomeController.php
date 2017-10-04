<?php

namespace App\Http\Controllers\User;

use App\Model\user\TextPage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        return view('user.home', compact('bgcolor'));
    }

    public function contacts()
    {
        $page = TextPage::where('id',1)->first();
        return view('user.techpage', compact('page'));
    }

    public function collabs()
    {
        $page = TextPage::where('id',2)->first();
        return view('user.techpage', compact('page'));
    }

    public function info()
    {
        $page = TextPage::where('id',3)->first();
        return view('user.techpage', compact('page'));
    }
}
