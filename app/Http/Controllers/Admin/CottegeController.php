<?php

namespace App\Http\Controllers\Admin;

use App\Model\user\Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\user\Cottege;

class CottegeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.cottege.show');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($turbaza)
    {
        return view('admin.cottege.cottege', compact('turbaza'));
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
            'price' => 'required',
            'persons' => 'required',
            'description' => 'required',
        ]);

        $cottege = new Cottege();

        $cottege->title = $request->title;
        $cottege->turbaza_id = $request->turbaza_id;
        $cottege->price = $request->price;
        $cottege->persons = $request->persons;
        $cottege->description = $request->description;
//        $cottege->turbaza_id = $request->turbaza_id;
        $cottege->save();

        $request->cottege_id = $cottege->id;

        $images = new Image();

        if($request->image)
            $images->doImageUpload($request);

        return redirect('admin/turbaza/'.$request->turbaza_id.'/edit#cotteges');
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
        $cottege  = Cottege::where('id', $id)->first();
        $images = Image::where('cottege_id', $id)->where('deleted', '!=', 1)->get();
        return view('admin.cottege.cottege', compact('cottege', 'images'));
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
            'price' => 'required',
            'persons' => 'required',
            'description' => 'required',
        ]);

        $cottege = Cottege::where('id', $id)->first();

        $cottege->title = $request->title;
        $cottege->turbaza_id = $request->turbaza_id;
        $cottege->price = $request->price;
        $cottege->persons = $request->persons;
        $cottege->description = $request->description;
        $cottege->save();

        $images = new Image();

        if($request->image)
            $images->doImageUpload($request);

        return redirect('admin/turbaza/'.$request->turbaza_id.'/edit#cotteges');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $target = Cottege::where('id', $id)->first();
        $target->deleted = 1;
        $target->save();
    }
}
