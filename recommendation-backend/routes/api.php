<?php

use App\Http\Controllers\RecommendationController;
use App\Http\Controllers\StatusController;
use App\Http\Resources\RecommendationResource;
use App\Models\Recommendation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/recommendation/iniciado', [StatusController::class, 'iniciado']);
Route::get('/recommendation/em-processo', [StatusController::class, 'emProcesso']);
Route::get('/recommendation/finalizado', [StatusController::class, 'finalizado']);

Route::get('/recommendations', function(){
    return RecommendationResource::collection(Recommendation::all());
});

Route::get('/recommendation/{id}', function($id){
    return RecommendationResource::make(Recommendation::find($id));
});

Route::post('/recommendation', [RecommendationController::class, 'store']);

Route::put('/recommendation/{id}', [RecommendationController::class, 'update']);

Route::put('/recommendation/{id}/evolution', [RecommendationController::class, 'evolution']);

Route::delete('/recommendation/{id}', [RecommendationController::class, 'destroy']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
