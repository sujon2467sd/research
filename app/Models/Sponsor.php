<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sponsor extends Model
{
    use HasFactory;
    public static $data,$image,$imageName,$directory,$imageUrl;

    public static function save_sponsor($request)
    {
        self::$data = new Sponsor();
        self::$data->title = $request->title??null;
        self::$data->title_bangla = $request->title_bangla??null;
        self::$data->add_home = $request->add_home??null;
        self::$data->image = self::saveImage($request);
        self::$data->save();
    }
    public static function update_sponsor($request)
    {
        self::$data = Sponsor::find($request->id);
        self::$data->title = $request->title??null;
        self::$data->title_bangla = $request->title_bangla??null;
        self::$data->add_home = $request->add_home??null;
        self::$data->status = $request->status??null;
        if($request->file('image')){
            if(self::$data->image){
                if(file_exists(self::$data->image)){
                    unlink(self::$data->image);
                    self::$data->image = self::saveImage($request);
                }
            }
            else{
                self::$data->image = self::saveImage($request);
            }
        }

        self::$data->save();
    }

    private static function saveImage($request){
        self::$image = $request->file('image');
        self::$imageName = 'sponsor_image-'.rand().'.'. self::$image->Extension();
        self::$directory = 'Sponsor/';
        self::$imageUrl = self::$directory.self::$imageName;
        self::$image->move(self::$directory,self::$imageName);
        return self::$imageUrl;
    }

}
