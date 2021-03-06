<?php

namespace App\Models;

// use App\Observers\AdminObserver;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class PlayerWeaponsStatus extends Model
{
    public static function boot()
    {
        parent::boot();

        $class = get_called_class();
        // $class::observe(new AdminObserver());

    }

    public static function getAllPlayerWeaponsStatus()
    {
        return self::orderBy("id", "ASC")
            ->first();
    }
}
