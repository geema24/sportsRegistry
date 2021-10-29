<?php

namespace Database\Seeders;

use App\Models\Team;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('teams')->delete();
        $teams = [
            ['id' => 1, 'name' => 'Team one', 'author_id' => '1', 'sport_id' => '1'],
            ['id' => 2, 'name' => 'Team Two', 'author_id' => '1', 'sport_id' => '1'],
            ['id' => 3, 'name' => 'Team Three', 'author_id' => '1', 'sport_id' => '1'],
            ['id' => 4, 'name' => 'Team one', 'author_id' => '1', 'sport_id' => '2'],
            ['id' => 5, 'name' => 'Team Two', 'author_id' => '1', 'sport_id' => '2'],
            ['id' => 6, 'name' => 'Team Three', 'author_id' => '1', 'sport_id' => '2'],
            ['id' => 7, 'name' => 'Team one', 'author_id' => '1', 'sport_id' => '3'],
            ['id' => 8, 'name' => 'Team Two', 'author_id' => '1', 'sport_id' => '3'],
            ['id' => 9, 'name' => 'Team Three', 'author_id' => '1', 'sport_id' => '3'],
        ];
        Team::insert($teams);
    }
}
