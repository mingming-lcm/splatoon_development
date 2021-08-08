<?php

namespace App\Models;

// use App\Observers\AdminObserver;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Modes extends Model
{
    public static function boot()
    {
        parent::boot();

        $class = get_called_class();
        // $class::observe(new AdminObserver());

    }

    public static function getAllModes()
    {
        return self::orderBy("id", "ASC")
            ->get();
    }

    public static function getModeByCode($code)
    {
        return self::where("code", $code)
            ->first();
    }
}
