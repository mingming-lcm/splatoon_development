<?php

namespace App\Models;

// use App\Observers\AdminObserver;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Map extends Model
{
    public static function boot()
    {
        parent::boot();

        $class = get_called_class();
        // $class::observe(new AdminObserver());

    }

    public static function getAllMaps()
    {
        return self::orderBy("id", "ASC")
            ->get();
    }

    public static function getMap($id)
    {
        return self::where("id", $id)
            ->first();
    }
}
