<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public static $data,$image,$imageName,$directory,$imageUrl;

    public static function save_product($request)
    {
        self::$data = new Product();
        self::$data->name = $request->name??null;
        self::$data->price = $request->price??null;
        self::$data->discount_price = $request->discount_price??null;
        self::$data->category_id = $request->category_id??null;
        self::$data->details1 = $request->details1??null;
        self::$data->details2 = $request->details2??null;
        self::$data->add_home = $request->add_home??null;
        if($request->image1) {
            self::$data->image1 = self::saveImage1($request);
        }
        if($request->image2) {
            self::$data->image2 = self::saveImage2($request);
        }
        if($request->image3) {
            self::$data->image3 = self::saveImage3($request);
        }
        self::$data->save();
    }
    public static function update_product($request)
    {
        self::$data = Product::find($request->id);
        self::$data->name = $request->name??null;
        self::$data->price = $request->price??null;
        self::$data->discount_price = $request->discount_price??null;
        self::$data->details1 = $request->details1??null;
        self::$data->details2 = $request->details2??null;
        self::$data->category_id = $request->category_id??null;
        self::$data->add_home = $request->add_home??null;
        self::$data->status = $request->status??null;
        if($request->file('image1')){
            if(self::$data->image1){
                if(file_exists(self::$data->image1)){
                    unlink(self::$data->image1);
                    self::$data->image1 = self::saveImage1($request);
                }
            }
            else{
                self::$data->image1 = self::saveImage1($request);
            }
        }
        if($request->file('image2')){
            if(self::$data->image2){
                if(file_exists(self::$data->image2)){
                    unlink(self::$data->image2);
                    self::$data->image2 = self::saveImage2($request);
                }
            }
            else{
                self::$data->image2 = self::saveImage2($request);
            }
        }
        if($request->file('image3')){
            if(self::$data->image3){
                if(file_exists(self::$data->image3)){
                    unlink(self::$data->image3);
                    self::$data->image3 = self::saveImage3($request);
                }
            }
            else{
                self::$data->image3 = self::saveImage3($request);
            }
        }
        self::$data->save();
    }

    private static function saveImage1($request){
        self::$image = $request->file('image1');
        self::$imageName = 'product_image-'.rand().'.'. self::$image->Extension();
        self::$directory = 'product/';
        self::$imageUrl = self::$directory.self::$imageName;
        self::$image->move(self::$directory,self::$imageName);
        return self::$imageUrl;
    }
    private static function saveImage2($request){
        self::$image = $request->file('image2');
        self::$imageName = 'product_image-'.rand().'.'. self::$image->Extension();
        self::$directory = 'product/';
        self::$imageUrl = self::$directory.self::$imageName;
        self::$image->move(self::$directory,self::$imageName);
        return self::$imageUrl;
    }
    private static function saveImage3($request){
        self::$image = $request->file('image3');
        self::$imageName = 'product_image-'.rand().'.'. self::$image->Extension();
        self::$directory = 'product/';
        self::$imageUrl = self::$directory.self::$imageName;
        self::$image->move(self::$directory,self::$imageName);
        return self::$imageUrl;
    }
    public function category()
    {
        return $this->belongsTo(Category::class);

    }

}
