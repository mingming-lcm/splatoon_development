<?php

namespace App\Models;

// use App\Observers\AdminObserver;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class PlayerGeneralStatus extends Model
{
    protected $fillable = ['nickname'];

    public static function boot()
    {
        parent::boot();

        $class = get_called_class();
        // $class::observe(new AdminObserver());

    }

    public static function getAllPlayerGeneralStatus()
    {
        return self::orderBy("id", "DESC")
            ->first();
    }

    public static function getRuleByCode($code)
    {
        return self::where("code", $code)
            ->first();
    }
}
