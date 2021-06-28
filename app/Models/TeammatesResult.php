<?php

namespace App\Models;

// use App\Observers\AdminObserver;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class TeammatesResult extends Model
{
    public static function boot()
    {
        parent::boot();

        $class = get_called_class();
        // $class::observe(new AdminObserver());

    }

    public static function result()
    {
        return $this->belongsTo(Result::class);
    }

    public static function getTeammatesResult($battle_number)
    {
        return self::where("battle_number", $battle_number)
            ->OrderBy('kill_count','DESC')
            ->get();
    }
}
