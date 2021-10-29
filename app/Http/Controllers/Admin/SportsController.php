<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Sport;
use Illuminate\Http\Request;

class SportsController extends Controller
{
    public function getSports()
    {
        $sports = Sport::get();
        return response()->json($sports);
    }

    public function getSportsById($id)
    {
        $response = Sport::find($id);
        if ($response) {
            $data = [
                'status' => '1',
                'name' => $response->name,
            ];
        } else {
            $data = [
                'status' => '0',
                'name' => ''
            ];
        }
        return response()->json($data);
    }
}
