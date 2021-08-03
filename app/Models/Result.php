<?php

namespace App\Models;

// use App\Observers\AdminObserver;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Result extends Model
{
    public static function boot()
    {
        parent::boot();

        $class = get_called_class();
        // $class::observe(new AdminObserver());

    }

    public function teammatesResults()
    {
        return $this->hasMany(TeammatesResult::class, 'battle_number', 'battle_number')->orderBy('battle_number');
    }


    public static function getAllResults()
    {
        return self::orderBy("battle_number", "ASC")
            ->get();
    }

    public static function get50Result()
    {
        return self::orderBy("battle_number", "DESC")
            ->limit(50)
            ->get();
    }

    public static function getResult($battle_number)
    {
        return self::where("battle_number", $battle_number)
            ->first();
    }

    public static function getResultByBattleNumber($battle_number)
    {
        $results = self::where("battle_number", $battle_number)
            ->first();
        if($results){
            return $results;
        }
        
        return false;
    }

    public static function getTotalResult(){
        return self::orderBy("battle_number", "DESC")
            ->first();
    }

}
