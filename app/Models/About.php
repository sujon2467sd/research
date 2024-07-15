<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;

    public static  $data,$image, $imageName, $directory, $imageUrl;

    public static function save_service($request)
    {


        self::$data = new About();
        self::$data->image1 = self::saveAboutImage1($request);
        self::$data->image2 = self::saveAboutImage2($request);
        self::$data->banner_image = self::saveBannerImage($request);
        self::$data->title = $request->title;
        self::$data->details1 = $request->details1;

        self::$data->save();
    }

    // update about

    public static function update_service($request)
    {
        self::$data = About::find($request->id);
        self::$data->title = $request->title;
        self::$data->details1 = $request->details1;
        if ($request->file('image1')) {
            if (self::$data->image1) {
                if (file_exists(self::$data->image1)) {
                    unlink(self::$data->image1);
                    self::$data->image1 = self::saveAboutImage1($request);
                }
            } else {
                self::$data->image1 = self::saveAboutImage1($request);
            }
        }
        if ($request->file('image2')) {
            if (self::$data->image2) {
                if (file_exists(self::$data->image2)) {
                    unlink(self::$data->image2);
                    self::$data->image2 = self::saveAboutImage2($request);
                }
            } else {
                self::$data->image2 = self::saveAboutImage2($request);
            }
        }


        if ($request->file('banner_image')) {
            if (self::$data->banner_image) {
                if (file_exists(self::$data->banner_image)) {
                    unlink(self::$data->banner_image);
                    self::$data->banner_image = self::saveBannerImage($request);
                }
            } else {
                self::$data->banner_image = self::saveBannerImage($request);
            }
        }

        self::$data->save();
    }


    //delete about
    public static function about_delete($request)
    {
        // Retrieve the About model instance
        self::$data = About::find($request->id);

        // Delete image1
        if (self::$data->image1) {
            $imagePath1 = public_path('About/' . self::$data->image1);
            if (file_exists($imagePath1)) {
                unlink($imagePath1);
            }
        }

        // Delete image2
        if (self::$data->image2) {
            $imagePath2 = public_path('About/' . self::$data->image2);
            if (file_exists($imagePath2)) {
                unlink($imagePath2);
            }
        }

        // Delete banner_image
        if (self::$data->banner_image) {
            $bannerImagePath = public_path('About/' . self::$data->banner_image);
            if (file_exists($bannerImagePath)) {
                unlink($bannerImagePath);
            }
        }

        // Delete the About model instance from the database
        self::$data->delete();
    }



    // image upload

    private static function saveAboutImage1($request)
    {
        self::$image = $request->file('image1');
        self::$imageName = 'about_image-' . rand() . '.' . self::$image->Extension();
        self::$directory = 'About/';
        self::$imageUrl = self::$directory . self::$imageName;
        self::$image->move(self::$directory, self::$imageName);
        return self::$imageUrl;
    }

    private static function saveAboutImage2($request)
    {
        self::$image = $request->file('image2');
        self::$imageName = 'about_image-' . rand() . '.' . self::$image->Extension();
        self::$directory = 'About/';
        self::$imageUrl = self::$directory . self::$imageName;
        self::$image->move(self::$directory, self::$imageName);
        return self::$imageUrl;
    }

    private static function saveBannerImage($request)
    {
        self::$image = $request->file('banner_image');
        self::$imageName = 'about_banner_image-' . rand() . '.' . self::$image->Extension();
        self::$directory = 'About/';
        self::$imageUrl = self::$directory . self::$imageName;
        self::$image->move(self::$directory, self::$imageName);
        return self::$imageUrl;
    }
}
