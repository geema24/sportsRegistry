<?php

namespace Database\Seeders;

use App\Models\TeamMember;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('team_members')->delete();
        $teamMembers = [
            ['id' => 1, 'team_id' => '1', 'name' => 'Member one', 'player_number' => '14', 'position' => 'front', 'age' => 24],
            ['id' => 2, 'team_id' => '2', 'name' => 'Member Two', 'player_number' => '54', 'position' => 'back', 'age' => 24],
            ['id' => 3, 'team_id' => '3', 'name' => 'Member Three', 'player_number' => '42', 'position' => 'front', 'age' => 24],
            ['id' => 4, 'team_id' => '4', 'name' => 'Member one', 'player_number' => '56', 'position' => 'back', 'age' => 24],
            ['id' => 5, 'team_id' => '5', 'name' => 'Member Two', 'player_number' => '87', 'position' => 'front', 'age' => 24],
            ['id' => 6, 'team_id' => '6', 'name' => 'Member Three', 'player_number' => '34', 'position' => 'back', 'age' => 24],
            ['id' => 7, 'team_id' => '7', 'name' => 'Member one', 'player_number' => '43', 'position' => 'front', 'age' => 24],
            ['id' => 8, 'team_id' => '8', 'name' => 'Member Two', 'player_number' => '34', 'position' => 'back', 'age' => 24],
            ['id' => 9, 'team_id' => '9', 'name' => 'Member Three', 'player_number' => '10', 'position' => 'front', 'age' => 24],
            ['id' => 10, 'team_id' => '1', 'name' => 'Member one', 'player_number' => '14', 'position' => 'front', 'age' => 24],
            ['id' => 11, 'team_id' => '2', 'name' => 'Member Two', 'player_number' => '54', 'position' => 'back', 'age' => 24],
            ['id' => 12, 'team_id' => '3', 'name' => 'Member Three', 'player_number' => '42', 'position' => 'front', 'age' => 24],
            ['id' => 13, 'team_id' => '4', 'name' => 'Member one', 'player_number' => '56', 'position' => 'back', 'age' => 24],
            ['id' => 14, 'team_id' => '5', 'name' => 'Member Two', 'player_number' => '87', 'position' => 'front', 'age' => 24],
            ['id' => 15, 'team_id' => '6', 'name' => 'Member Three', 'player_number' => '34', 'position' => 'back', 'age' => 24],
            ['id' => 16, 'team_id' => '7', 'name' => 'Member one', 'player_number' => '43', 'position' => 'front', 'age' => 24],
            ['id' => 17, 'team_id' => '8', 'name' => 'Member Two', 'player_number' => '34', 'position' => 'back', 'age' => 24],
            ['id' => 18, 'team_id' => '9', 'name' => 'Member Three', 'player_number' => '10', 'position' => 'front', 'age' => 24],
            ['id' => 19, 'team_id' => '1', 'name' => 'Member one', 'player_number' => '14', 'position' => 'front', 'age' => 24],
            ['id' => 20, 'team_id' => '2', 'name' => 'Member Two', 'player_number' => '54', 'position' => 'back', 'age' => 24],
            ['id' => 21, 'team_id' => '3', 'name' => 'Member Three', 'player_number' => '42', 'position' => 'front', 'age' => 24],
            ['id' => 22, 'team_id' => '4', 'name' => 'Member one', 'player_number' => '56', 'position' => 'back', 'age' => 24],
            ['id' => 23, 'team_id' => '5', 'name' => 'Member Two', 'player_number' => '87', 'position' => 'front', 'age' => 24],
            ['id' => 24, 'team_id' => '6', 'name' => 'Member Three', 'player_number' => '34', 'position' => 'back', 'age' => 24],
            ['id' => 25, 'team_id' => '7', 'name' => 'Member one', 'player_number' => '43', 'position' => 'front', 'age' => 24],
            ['id' => 26, 'team_id' => '8', 'name' => 'Member Two', 'player_number' => '34', 'position' => 'back', 'age' => 24],
            ['id' => 27, 'team_id' => '9', 'name' => 'Member Three', 'player_number' => '10', 'position' => 'front', 'age' => 24],
        ];
        TeamMember::insert($teamMembers);
    }
}
