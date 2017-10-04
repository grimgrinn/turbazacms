<?php

namespace App\Http\Controllers\Admin;

use App\Model\user\Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\User\TextPage;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.page.show');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($turbaza)
    {

        return view('admin.page.page', compact('turbaza'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'text' => 'required'
        ]);

        $page = new TextPage();
        $page->title = $request->title;
        $page->turbaza_id = $request->turbaza_id;
        $page->pic_page = $request->picture_page;
        $page->text = $request->text;
        $page->cols = $request->cols;

        $page->save();
        $request->page_id = $page->id;

        $images = new Image();

        if($request->image)
            $images->doImageUpload($request);

        return redirect('admin/turbaza/'.$request->turbaza_id.'/edit#pages');

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
        $page  = TextPage::where('id', $id)->first();
        $images = Image::where('page_id', $id)->where('deleted', '!=', 1)->get();
      //  dd($images);
        return view('admin.page.page', compact('page', 'images'));
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
        $this->validate($request, [
            'title' => 'required',
            'text' => 'required'
        ]);

        $page = TextPage::where('id', $id)->first();

        $page->title = $request->title;
        $page->turbaza_id = $request->turbaza_id;
        $page->pic_page = $request->picture_page;
        $page->text = $request->text;
        $page->cols = $request->cols;

        $page->save();

        $images = new Image();

        if($request->image)
            $images->doImageUpload($request);

        return redirect('admin/turbaza/'.$request->turbaza_id.'/edit#pages');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $target = TextPage::where('id', $id)->first();
        $target->deleted = 1;
        $target->save();
    }
}
