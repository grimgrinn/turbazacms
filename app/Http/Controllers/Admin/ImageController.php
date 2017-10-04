<?php

namespace App\Http\Controllers\Admin;

use App\Model\user\Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ImageController extends Controller
{
    public function doImageUpload(Request $request)
    {
        dd($request->all());
        $file = $request->file('images');
        $filename = uniqid() . $file->getClientOriginalName();
        $file->move('gallery/images' . $filename);


        $image = new Image();

        $image->create([

        ]);
        $image->turbaza_id = $request->turbaza_id;
        $image->page_id = $request->page_id;
        $image->cottege_id = $request->cottege_id;
        $image->filename = $filename;
        $image->file_size = $file->getClientSize();
        $image->path = 'gallery/images' . $filename;
        //$image->created_by => Auth::user()->id;
        $image->save();
    }

    public function getImageByEntity(Request $request)
    {
        if(!$request->page_id && !$request->cottege->id){
            $images = Image::where('turbaza_id', $request->turbaza_id)->where('deleted', '!=', 1)->get();
        } else {
            if($request->page_id){
                $images = Image::where('page_id', $request->page_id)->where('deleted', '!=', 1)->get();
            } elseif($request->cottege_id) {
                $images = Image::where('cottege_id', $request->cottege_id)->where('deleted', '!=', 1)->get();
            }
        }

        return $images;
    }

    public function destroy($id)
    {
        $image = Image::where('id', $id)->first();
        $image->deleted = 1;
        $image->save();
    }
}
