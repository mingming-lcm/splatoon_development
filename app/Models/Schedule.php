<?php

namespace App\Models;

// use App\Observers\AdminObserver;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Schedule extends Model
{
    public static function boot()
    {
        parent::boot();
        $class = get_called_class();
    }

    public static function getSchedule()
    {
        return self::OrderBy('id','DESC')
            ->get();
    }
}
