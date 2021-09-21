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

    public static function getMedalsByTeam()
    {
        return self::where('league_type', 'team')
            ->orderBy('sort_order')
            ->get();
    }
    public static function getMedalsByPair()
    {
        return self::where('league_type', 'pair')
            ->orderBy('sort_order')
            ->get();
    }
}
