<?php

namespace App\Http\Controllers;

use App\Http\Requests\RecommendationRequest;
use App\Models\Recommendation;
use App\Models\Status;
use Error;
use Exception;
use Illuminate\Http\Request;

class RecommendationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Recommendation::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RecommendationRequest $request)
    {
        try {
            $recommendation = new Recommendation($request->all());
            $recommendation->status_id = 1;
            $recommendation->save();

            return $recommendation;
        } catch(Exception $error) {
            return $error->getMessage();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            if(Recommendation::where('id', $id)->exists()){
                return Recommendation::find($id);
            }
        } catch(Exception $error) {
            return $error->getMessage();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function evolution($id){
        try {
            $recommendation = Recommendation::find($id);
            if($recommendation->status_id === 3){
                return response()->json([
                    "message" => "Record finished!"
                ], 200);
            } else {
                $recommendation->status_id++;
                $recommendation->save();
                return response()->json([
                    "message" => "Record evolution!"
                ], 200);
            }
        } catch(Exception $error) {
            return $error->getMessage();
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            if(Recommendation::where('id', $id)->exists()){
                $recommendation = Recommendation::find($id);

                $recommendation->delete();

                return response()->json([
                    "message" => "Record destroyed successfully!"
                ], 200);
            } else {
                return response()->json([
                    "message" => "Error! Not destroyed!"
                ], 404);
            }
        } catch(Exception $error) {
            return $error->getMessage();
        }

    }
}
