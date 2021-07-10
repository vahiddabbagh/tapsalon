<?php

namespace App\Http\Controllers\API;


use App\Image;
use App\Place;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Image as ImageResize;
use Str;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Image::paginate(10);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		
        if($request->hasFile('photo')){
            
            $title = $request->title;
            $complex_id = $request->complex_id;
            $place_id = $request->place_id;
            $extension = $request->file('photo')->extension();
            $str_rand = Str::random(20);
            // $storage_name = $title.'_'.$str_rand;
            $storage_name = $str_rand;
            Storage::disk('photos')->makeDirectory($complex_id.'/'.$place_id);
            $storage_path = Storage::disk('photos')->path($complex_id.'/'.$place_id).'/';
            

            // width = 1280
            ImageResize::make($request->file('photo'))->resize(1280, null, function($constraint){
                $constraint->aspectRatio();
            })->save($storage_path.$storage_name.'.'.$extension);

            // width = 300
            ImageResize::make($request->file('photo'))->resize(300, null, function($constraint){
                $constraint->aspectRatio();
            })->save($storage_path.$storage_name.'_300'.'.'.$extension);
            
            // 300*300
            // $image = Image::make($request->file('photo'))->fit(300)->save($storage_path.$storage_name.'_300_300'.'.'.$extension);

            // 150*150
            ImageResize::make($request->file('photo'))->fit(150)->save($storage_path.$storage_name.'_150_150'.'.'.$extension);

            return Image::create([
                'place_id' => $place_id,
                'complex_id' => $complex_id,
                'title' => $title,
                'filename' => $storage_name,
                'extension' => $extension,
            ]);
        }

        return response('photo not attached', 401);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\media  $media
     * @return \Illuminate\Http\Response
     */
    public function show(Image $image)
    {
        return $image;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\media  $media
     * @return \Illuminate\Http\Response
     */
    public function destroy(Image $image)
    {     
        $complex_id = $image->complex_id;
        $place_id = $image->place_id;
        $path = $complex_id.'/'.$place_id;
        $filename = $image->filename;
        $extension = $image->extension;
        if(Storage::disk('photos')->delete($path.'/'.$filename.'.'.$extension) &&
        Storage::disk('photos')->delete($path.'/'.$filename.'_300.'.$extension) &&
        Storage::disk('photos')->delete($path.'/'.$filename.'_150_150.'.$extension)
        ){
            if($image->delete()){
                return response(['status'=>'Successfully deleted'], 400); 
            }
        }
        return response(['error'=>'A problem occured'], 400); 
    }
}
