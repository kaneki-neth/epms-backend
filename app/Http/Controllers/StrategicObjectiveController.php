<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Models\StrategicObjective;
use Symfony\Component\HttpFoundation\Response;

class StrategicObjectiveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): JsonResponse
    {
        $stratObj = StrategicObjective::all();

        return response()->json([
            'data' => $stratObj,
            'total' => $stratObj->count()
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): JsonResponse
    {
        StrategicObjective::create($request->validate([
            'description' => 'required'
        ]));

        return response()->json([
            'success' => true,
            'message' => 'Strategic objective created successfully',
        ], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return StrategicObjective::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id): JsonResponse
    {
        $stratObj = StrategicObjective::find($id);
        $stratObj->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Strategic objective updated Successfully'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id): JsonResponse
    {
        StrategicObjective::destroy($id);

        return response()->json([
            'success' => true,
            'message' => 'Strategic objective successfully deleted'
        ], 200);
    }
}
