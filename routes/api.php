<?php

use App\Http\Middleware\CheckStatus;
use App\Http\Controllers\Admin\SportsController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\TeamMemberController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ExcelController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route for export/download tabledata to .csv, .xls or .xlsx
Route::get('exportExcel/{type}', [ExcelController::class, 'exportExcel'])->name('exportExcel');

// Users Routes
Route::get('/admin/geteditableuser/{userid}', [UserController::class, 'show']);
Route::put('/admin/updateuser/{userid}', [UserController::class, 'update']);
Route::delete('/admin/deleteuser/{userid}', [UserController::class, 'destroy']);
Route::post('/admin/saveuser', [UserController::class, 'store']);
Route::get('/admin/getusers', [UserController::class, 'getUsers']);
Route::get('/admin/searchusers/{searchparameter}/{searchword}', [UserController::class, 'search']);

// Sports Routes
Route::get('/admin/getSports', [SportsController::class, 'getSports']);


// Teams Routes
Route::get('/admin/getSportsById/{sportId}', [SportsController::class, 'getSportsById']);
Route::get('/admin/getTeams/{sportId}', [TeamController::class, 'getTeams']);
Route::post('/admin/saveTeam', [TeamController::class, 'store']);
Route::get('/admin/getTeamByID/{teamId}', [TeamController::class, 'show']);
Route::put('/admin/updateTeam/{teamId}', [TeamController::class, 'update']);
Route::delete('/admin/deleteTeam/{teamId}', [TeamController::class, 'destroy']);

// Members Routes
Route::get('/admin/getMembers/{teamId}', [TeamMemberController::class, 'getMembers']);
Route::post('/admin/saveMember', [TeamMemberController::class, 'store']);
Route::get('/admin/getMemberById/{memberId}', [TeamMemberController::class, 'show']);
Route::put('/admin/updateMember/{memberId}', [TeamMemberController::class, 'update']);
Route::delete('/admin/deleteMember/{memberId}', [TeamMemberController::class, 'destroy']);
Route::get('/admin/searchMembers/{searchParameter}/{searchWord}', [TeamMemberController::class, 'search']);
