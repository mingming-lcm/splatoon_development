<?php

namespace App\Models;

// use App\Observers\AdminObserver;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Timetable extends Model
{
    public static function boot()
    {
        parent::boot();
        $class = get_called_class();
    }

    public static function getTimetable()
    {
        return self::OrderBy('id','DESC')
            ->get();
    }

    public static function getGachiTimetable()
    {
        return self::OrderBy('id','DESC')
            ->where('mode', 'gachi')
            ->limit(12)
            ->get()
            ->sortBy('start_time');
    }

    public static function getLeagueTimetable()
    {
        return self::OrderBy('id','DESC')
            ->where('mode', 'league')
            ->limit(12)
            ->get()
            ->sortBy('start_time');
    }

    public static function getRegularTimetable()
    {
        return self::OrderBy('id','DESC')
            ->where('mode', 'regular')
            ->limit(12)
            ->get()
            ->sortBy('start_time');
    }
    
    public static function checkTimetableExsist($start_time, $mode)
    {
        return self::where('start_time', $start_time)
            ->where('mode', $mode)
            ->first();
    }

    
}
