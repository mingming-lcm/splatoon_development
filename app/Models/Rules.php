<?php

namespace App\Models;

// use App\Observers\AdminObserver;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Rules extends Model
{
    public static function boot()
    {
        parent::boot();

        $class = get_called_class();
        // $class::observe(new AdminObserver());

    }

    public static function getAllRules()
    {
        return self::orderBy("id", "ASC")
            ->get();
    }

    public static function getRuleByCode($code)
    {
        return self::where("code", $code)
            ->first();
    }
}
