<?php

namespace App\Models;

// use App\Observers\AdminObserver;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class PlayerMedalsStatus extends Model
{
    public static function boot()
    {
        parent::boot();

        $class = get_called_class();
        // $class::observe(new AdminObserver());

    }

    public static function getAllPlayerMedalsStatus()
    {
        return self::orderBy("id", "ASC")
            ->first();
    }
    
    public static function getMedalsByType($league_type, $medals_type)
    {
        return self::orderBy("id", "ASC")
            ->where('league_type', $league_type)
            ->where('medals_type', $medals_type)
            ->first();
    }
}
