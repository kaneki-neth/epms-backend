<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Models\PerformanceMeasure;
use Symfony\Component\HttpFoundation\Response;

class PerformanceMeasureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): JsonResponse
    {
        $performanceMeasure = PerformanceMeasure::all();

        return response()->json([
            'data' => $performanceMeasure,
            'total' => $performanceMeasure->count()
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        PerformanceMeasure::create($request->validate([
            'year' => 'required',
            'nominal_target' => 'required',
        ]));

        return response()->json([
            'success' => true,
            'message' => 'Performance Measure created successfully',
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
        return PerformanceMeasure::find($id);
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
        $performanceMeasure = PerformanceMeasure::find($id);
        $performanceMeasure->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Updated Performance Measure successfully'
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
        PerformanceMeasure::destroy($id);

        return response()->json([
            'success' => true,
            'message' => 'Performance Measure successfully deleted'
        ], 200);
    }
}
