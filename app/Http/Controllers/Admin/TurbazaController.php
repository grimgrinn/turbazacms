<?php

namespace App\Http\Controllers\Admin;

use App\Model\user\Cottege;
use App\Model\user\Image;
use App\Model\user\TextPage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\User\Turbaza;
use Illuminate\Support\Facades\DB;

class TurbazaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $turbazas = DB::table('turbazas as t')
//            ->select(DB::raw('t.id, t.created_at, t.title, t.status, count(c.id) as cotteges, count(p.id) as pages'))
//            ->leftJoin('cotteges as c', function($join){
//                $join->on('t.id', '=', 'c.turbaza_id');
//                $join->on('c.deleted','!=',DB::raw(1));
//            })
//            ->leftJoin('text_pages as p', function($join){
//                $join->on('t.id', '=', 'p.turbaza_id');
//                $join->on('p.deleted','!=',DB::raw(1));
//            })
//            ->where('t.deleted','!=',1)
//            ->groupBy('t.id')
//            ->groupBy('t.title')
//            ->groupBy('t.status')
//            ->groupBy('t.created_at')
//            ->orderBy('t.id')
//            ->get();

        $turbazas = Turbaza::with('pages', 'cotteges')->where('deleted','!=',1)->get();

       // dd(count($turbazas[1]->pages));
        return view('admin.turbaza.show', compact('turbazas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.turbaza.turbaza');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $turbaza = new Turbaza();

        $this->validate($request, [
            'title'=>'required',
            'description'=>'required',
            'slug'=>'required'
        ]);

        $images = new Image();


        $turbaza->title = $request->title;
        $turbaza->slug = $request->slug;
//        $turbaza->image = $request->image;
        $turbaza->status = $request->status;
        $turbaza->description = $request->description;
        $turbaza->cols = $request->cols;
        $turbaza->save();

        $request->turbaza_id = $turbaza->id;

        if($request->image)
            $images->doImageUpload($request);

        return redirect(route('turbaza.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $turbaza  = Turbaza::where('id', $id)->first();
        $pages    = TextPage::where('turbaza_id', $id)->where('deleted','!=',1)->get();
        $cotteges = Cottege::where('turbaza_id',  $id)->where('deleted','!=',1)->get();
        $images   = Image::where('turbaza_id',  $id)->where('deleted','!=',1)->get();

        return view('admin.turbaza.turbaza', compact('turbaza', 'pages', 'cotteges', 'images'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $turbaza = Turbaza::where('id', $id)->first();
//        dd($request->all());
        $this->validate($request, [
           'title' => 'required',
           'description' => 'required',
           'slug' => 'required'
        ]);

        $images = new Image();

        $turbaza->title = $request->title;
        $turbaza->description = $request->description;
        $turbaza->status = $request->status;
        $turbaza->slug = $request->slug;
        $turbaza->cols = $request->cols;
        $turbaza->save();

        $request->turbaza_id = $turbaza->id;

        if($request->image)
            $images->doImageUpload($request);

        return redirect(route('turbaza.edit', $turbaza->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $target = Turbaza::where('id', $id)->first();
        $target->deleted = 1;
        $target->save();
    }
}
