<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\IksmSession;
use App\Models\Map;
use App\Models\Result;
use App\Models\Schedule;
use App\Models\TeammatesResult;

class GetSplatoonApi extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'splatoon:get_api';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get Splatoon Api';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {


        //api links https://app.splatoon2.nintendo.net/api/records
        //api links https://app.splatoon2.nintendo.net/api/festivals/active
        //api links https://app.splatoon2.nintendo.net/api/schedules
        //api links https://app.splatoon2.nintendo.net/api/records
        //api links https://app.splatoon2.nintendo.net/api/timeline
        //api links https://app.splatoon2.nintendo.net/api/onlineshop/merchandises
        //api links https://app.splatoon2.nintendo.net/api/results


        $results = IksmSession::squidFishing("https://app.splatoon2.nintendo.net/api/results");

        foreach ($results->results as $key => $value) {
            if(Result::getResultByBattleNumber($value->battle_number)){
                continue;
            }            
            $result = new Result();

            $result->battle_number = $value->battle_number;
            $result->start_time = $value->start_time;
            if (isset($value->end_time)) {
                $result->end_time = $value->end_time;
            }else{
                $result->end_time = "";
            }

            if (isset($value->elapsed_time)) {
                $result->elapsed_time = $value->elapsed_time;
            }else{
                $result->elapsed_time = 300;
            }
            $result->map_id = $value->stage->id;
            $result->mode = $value->type;
            $result->rule = $value->rule->key;
            if (isset($value->my_team_count)) {
                $result->my_team_count = $value->my_team_count;
            }
            if (isset($value->other_team_count)) {
                $result->other_team_count = $value->other_team_count;
            }
            $result->my_team_result = $value->my_team_result->key;
            if (isset($value->estimate_gachi_power)) {
                $result->estimate_gachi_power = $value->estimate_gachi_power;
            }
            if (isset($value->league_point)) {
                $result->league_point = $value->league_point;
            }

            if (isset($value->my_estimate_league_point)) {
                $result->my_estimate_league_point = $value->my_estimate_league_point;
            }

            if (isset($value->other_estimate_league_point)) {
                $result->other_estimate_league_point = $value->other_estimate_league_point;
            }
            
            $result->save();

            $teammates_results = IksmSession::squidFishing("https://app.splatoon2.nintendo.net/api/results/".$value->battle_number);

            $teammates_result = new TeammatesResult();
            $teammates_result->result_id = "";
            $teammates_result->battle_number = $teammates_results->battle_number;
            $teammates_result->team = 'my_team';
            $teammates_result->player_name = $teammates_results->player_result->player->nickname;
            $teammates_result->kill_count = $teammates_results->player_result->kill_count;
            $teammates_result->assist_count = $teammates_results->player_result->assist_count;
            $teammates_result->death_count = $teammates_results->player_result->death_count;
            $teammates_result->special_count = $teammates_results->player_result->special_count;
            $teammates_result->game_paint_point = $teammates_results->player_result->game_paint_point;
            $teammates_result->save();


            for ($i=0; $i < count($teammates_results->my_team_members); $i++) { 
                // dump($teammates_results);
                $teammates_result = new TeammatesResult();
                $teammates_result->result_id = "";
                $teammates_result->battle_number = $teammates_results->battle_number;
                $teammates_result->team = 'my_team';
                $teammates_result->player_name = $teammates_results->my_team_members[$i]->player->nickname;
                $teammates_result->kill_count = $teammates_results->my_team_members[$i]->kill_count;
                $teammates_result->assist_count = $teammates_results->my_team_members[$i]->assist_count;
                $teammates_result->death_count = $teammates_results->my_team_members[$i]->death_count;
                $teammates_result->special_count = $teammates_results->my_team_members[$i]->special_count;
                $teammates_result->game_paint_point = $teammates_results->my_team_members[$i]->game_paint_point;
                $teammates_result->save();
            }

            for ($i=0; $i < count($teammates_results->other_team_members); $i++) { 
                $teammates_result = new TeammatesResult();
                $teammates_result->result_id = "";
                $teammates_result->battle_number = $teammates_results->battle_number;
                $teammates_result->team = 'other_team';
                $teammates_result->player_name = $teammates_results->other_team_members[$i]->player->nickname;
                $teammates_result->kill_count = $teammates_results->other_team_members[$i]->kill_count;
                $teammates_result->assist_count = $teammates_results->other_team_members[$i]->assist_count;
                $teammates_result->death_count = $teammates_results->other_team_members[$i]->death_count;
                $teammates_result->special_count = $teammates_results->other_team_members[$i]->special_count;
                $teammates_result->game_paint_point = $teammates_results->other_team_members[$i]->game_paint_point;
                $teammates_result->save();
            }

        }


        $schedules = IksmSession::squidFishing("https://app.splatoon2.nintendo.net/api/schedules");


        foreach ($schedules->results as $key => $value) {
            $schedule = new Schedule();
            $schedule->start_time = $value->start_time;
            $schedule->stage_a_id = $value->stage_a_id;
            $schedule->stage_b_id = $value->stage_b_id;
            $schedule->save();
        }
    }

}
