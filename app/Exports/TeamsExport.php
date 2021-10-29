<?php

namespace App\Exports;

use App\Models\TeamMember;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Illuminate\Support\Facades\DB;

class TeamsExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $users = DB::table('teams')
        ->join('users', 'teams.author_id', '=', 'users.id')
        ->join('sports', 'teams.sport_id', '=', 'sports.id')
        ->join('team_members', 'teams.id', '=', 'team_members.team_id')
        ->select('sports.name', 'users.name', 'teams.name', 'team_members.')
        ->get();

        $users = DB::table('users')
        ->join('contacts', 'users.id', '=', 'contacts.user_id')
        ->join('orders', 'users.id', '=', 'orders.user_id')
        ->select('users.*', 'contacts.phone', 'orders.price')
        ->get();


        $collection = DB::table('teams')->join('users', 'users.id', '=', 'teams.author_id')->where('teams.sport_id', $id)->select('teams.id', 'teams.name', 'users.name as author')->get();
        return response()->json($teams);
        return TeamMember::all();
    }
}
