<?php

namespace App\Http\Controllers\Admin;

use App\Model\user\TextPage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class SettingsController extends Controller
{

    public function index()
    {
        $contacts = TextPage::where('id',1)->first();
        $collabs = TextPage::where('id',2)->first();
        $info = TextPage::where('id',3)->first();
        $color = DB::table('settings')->where('key', 'app_background_color')->first();
        return view('admin/settings/settings', compact('contacts', 'collabs', 'info', 'color'));
    }

    public function setBg(Request $request)
    {
        $color = DB::table('settings')->where('key', 'app_background_color')->update(['value' => $request->color]);
        return redirect(route('settings.index'));
    }

    public function setContacts(Request $request)
    {
       // dd($request->сontacts);
        $contactsPage = TextPage::where('id', 1)->first();
        $contactsPage->text = $request->сontacts;
        $contactsPage->save();
        return redirect(route('settings.index'));
    }

    public function setCollabs(Request $request)
    {
        $page = TextPage::where('id', 2)->first();
        $page->text = $request->collabs;
        $page->save();
        return redirect(route('settings.index'));
    }

    public function setInfo(Request $request)
    {
        $page = TextPage::where('id', 3)->first();
        $page->text = $request->info;
        $page->save();
        return redirect(route('settings.index'));
    }
}
