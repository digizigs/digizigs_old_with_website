<?php

namespace App\Http\Controllers\Admin\Gallery;

use App\Http\Controllers\Controller;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Symfony\Component\HttpFoundation\File\getClientOriginalName;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        /*$image_path = public_path(). '/uploads/1553603622_img.jpg';
        dd($image_path);*/
        $media = Media::orderby('created_at','desc')->paginate(10);
        return view('admin.pages.gallery.gallery',compact('media'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $media = Media::orderby('created_at','desc')->paginate(10);
        return request()->json(200,$media);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
        $image = $request->file('file');
        $imageName = time() . '_' . $image->getClientOriginalName();
        $image->move(public_path('uploads'),$imageName);
        
        $imageUpload = new Media();
        $imageUpload->user_id = Auth::user()->id;
        $imageUpload->filename = $imageName;
        $imageUpload->uri = url('/public/uploads') . '/' . $imageName;
        $imageUpload->save();
        
        $media = Media::orderby('created_at','desc')->paginate(10);
        return request()->json(200,$media);

        
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $media = Media::find($id);
        //dd($media);
        $image_path = public_path(). '/uploads/' .$media->filename;

        \File::delete($image_path);

        $is_deleted = $media->delete();

        if($is_deleted){
            $media = Media::orderby('created_at','desc')->paginate(8);
            return request()->json(200,$media);
        }
    }
}
