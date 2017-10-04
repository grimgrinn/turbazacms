<?php

namespace App\Model\user;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Image extends Model
{
    public function doImageUpload(Request $request)
    {
//        var_dump($request->all());
//        die();

//        dd($request->all());
        $files = $request->file('image');
//dd($files);
        foreach($files as $file) {
            $image = new $this();
            $filename = uniqid() . $file->getClientOriginalName();
            $file->move('gallery/images', $filename);

            $image->turbaza_id = $request->turbaza_id;
            $image->page_id = $request->page_id;
            $image->cottege_id = $request->cottege_id;
            $image->filename = $filename;
            $image->file_size = $file->getClientSize();
            $image->file_mime = $file->getClientMimeType();
            $image->path = 'gallery/images/' . $filename;
            //$image->created_by => Auth::user()->id;
         //   dd($image);
            $image->save();
        }

    }
}
