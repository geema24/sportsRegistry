<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TeamController extends Controller
{
    public function getTeams($id)
    {
        $teams = DB::table('teams')->join('users', 'users.id', '=', 'teams.author_id')->where('teams.sport_id', $id)->select('teams.id', 'teams.name', 'users.name as author')->get();
        return response()->json($teams);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newUser = Team::create([
            'name' => $request->input('name', ''),
            'sport_id' => $request->input('sport_id', ''),
            'author_id' => $request->input('author_id', ''),
        ]);

        return response()->json($newUser);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Team::where('id', $id)->first();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $value = [];
        $value['id'] = $id;
        $value['name'] = $request->name;

        $updateUser = Team::updateOrCreate(['id'=> $id], $value);

        return response()->json($updateUser);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $response = Team::find($id)->delete();
        if ($response){
            $data=[
            'status'=>'1',
            'msg'=>'ユーザーレコードが正常に削除されました'
            ];
        }else{
            $data=[
            'status'=>'0',
            'msg'=>'ユーザーを削除できませんでした'
            ];
        }
        return response()->json($data);
    }
}
