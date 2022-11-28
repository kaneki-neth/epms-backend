<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StratPlanType;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class StratPlanTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): JsonResponse
    {
        $stratPlanType = StratPlanType::all();

        return response()->json([
            'data' => $stratPlanType,
            'total' => $stratPlanType->count()
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
        StratPlanType::create($request->validate([
            'name' => 'required'
        ]));

        return response()->json([
            'success' => true,
            'message' => 'Strat Plan type created successfully'
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
        return StratPlanType::find($id);
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
        $stratPlanType = StratPlanType::find($id);
        $stratPlanType->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Strat Plan type updated successfully.'
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
        StratPlanType::destroy($id);

        return response()->json([
            'success' => true,
            'message' => 'Strat Plan type deleted successfully.'
        ], 200);
    }
}
