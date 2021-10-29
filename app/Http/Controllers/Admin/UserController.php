<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Log;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('/admin');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/admin/createUser');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newUser = User::create([
            'name' => $request->input('name', ''),
            'email' => $request->input('email', ''),
            'phone' => $request->input('phone', ''),
            'dob' => $request->input('dob', ''),
            'type' => $request->input('userType', ''),
            'password' => Hash::make($request->input('password', ''))
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
        return User::where('id', $id)->first();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('/admin/createUser', compact('user'));
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
        $value['email'] = $request->email;
        $value['phone'] = $request->phone;
        $value['dob'] = $request->dob;
        $value['type'] = $request->type;
        $value['password'] = Hash::make($request->password);

        $updateUser = User::updateOrCreate(['id' => $id], $value);

        return response()->json($updateUser);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if ($request->authUserId == $id) {
            $data = [
                'status' => '0',
                'msg' => "自分を削除することはできません"
            ];
            return response()->json($data);
        }

        $response = User::find($id)->delete();
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

    public function getUsers()
    {
        $users = User::get();
        return response()->json($users);
    }

    public function search($searchparameter, $searchWord)
    {
        switch ($searchparameter) {
            case 'ユーザー名':
                $result = User::where('name', "LIKE", "%{$searchWord}%")->get();
                break;
            case 'メール':
                $result = User::where('email', "LIKE", "%{$searchWord}%")->get();
                break;
            case '電話番号':
                $result = User::where('phone', "LIKE", "%{$searchWord}%")->get();
                break;
        }

        return $result;
    }
}
