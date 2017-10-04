<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\User\Turbaza;

class HomeController extends Controller
{
    public function index()
    {
        return redirect(route('turbaza.index'));
    }
}
