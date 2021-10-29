<?php

namespace Database\Seeders;

use App\Models\Sport;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SportsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sports')->delete();
        $sports = [
            ['id' => 1, 'name' => 'バスケットボール',],
            ['id' => 2, 'name' => 'サッカー',],
            ['id' => 3, 'name' => '野球',],
        ];
        Sport::insert($sports);
    }
}
