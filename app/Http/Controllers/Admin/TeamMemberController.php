<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TeamMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TeamMemberController extends Controller
{
    public function getMembers($id)
    {
        $teams = DB::table('team_members')->where('team_id', $id)->get();
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

        $newMember = TeamMember::create([
            'name' => $request->input('name', ''),
            'player_number' => $request->input('player_number', ''),
            'age' => $request->input('age', 0),
            'position' => $request->input('position', ''),
            'team_id' => $request->input('teamId', 1),
        ]);

        return response()->json($newMember);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return TeamMember::where('id', $id)->first();
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
        $value['player_number'] = $request->player_number;
        $value['age'] = $request->age;
        $value['position'] = $request->position;

        $updateUser = TeamMember::updateOrCreate(['id' => $id], $value);

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
        $response = TeamMember::find($id)->delete();
        if ($response) {
            $data = [
                'status' => '1',
                'msg' => 'ユーザーレコードが正常に削除されました'
            ];
        } else {
            $data = [
                'status' => '0',
                'msg' => 'ユーザーを削除できませんでした'
            ];
        }
        return response()->json($data);
    }

    public function search($searchparameter, $searchWord)
    {
        switch ($searchparameter) {
            case 'プレイヤー名':
                $result = TeamMember::where('name', "LIKE", "%{$searchWord}%")->get();
                break;
            case 'プレイヤー番号':
                $result = TeamMember::where('player_number', "LIKE", "%{$searchWord}%")->get();
                break;
            case '年':
                $result = TeamMember::where('age', "LIKE", "%{$searchWord}%")->get();
                break;
        }

        return $result;
    }
}
