<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    use HasFactory;
    public static $data,$image,$imageName,$directory,$imageUrl;

    public static function save_receipt($request)
    {
        self::$data = new Receipt();
        self::$data->service_id = $request->service_id??null;
        self::$data->roll = $request->roll??null;
        self::$data->amount = $request->amount??null;
        self::$data->month = $request->month??null;
        self::$data->save();
    }
    public static function update_sponsor($request)
    {
        self::$data = Sponsor::find($request->id);
        self::$data->service_id = $request->service_id??null;
        self::$data->roll = $request->roll??null;
        self::$data->month = $request->month??null;
        self::$data->save();
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class,'roll_no','roll');
    }

}
