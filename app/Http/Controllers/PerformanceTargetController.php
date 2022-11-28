<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PerformanceTarget;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class PerformanceTargetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): JsonResponse
    {
        $performanceTarget = PerformanceTarget::all();

        return response()->json([
            'data' => $performanceTarget,
            'total' => $performanceTarget->count()
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
        PerformanceTarget::create($request->validate([
            'description' => 'required'
        ]));

        return response()->json([
            'success' => true,
            'message' => 'Performance Target added successfully',
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
        return PerformanceTarget::find($id);
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
        $performanceTarget = PerformanceTarget::find($id);
        $performanceTarget->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Performance Target updated successfully'
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
        PerformanceTarget::destroy($id);

        return response()->json([
            'success' => true,
            'message' => 'Performance Target successfully deleted'
        ], 200);
    }
}
