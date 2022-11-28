<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Models\IpcrSuccessIndicator;
use Symfony\Component\HttpFoundation\Response;

class IpcrSuccessIndicatorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): JsonResponse
    {
        $successIndicator = IpcrSuccessIndicator::all();

        return response()->json([
            'data' => $successIndicator,
            'total' => $successIndicator->count()
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
        IpcrSuccessIndicator::create($request->validate([
            'success_indicator' => 'required'
        ]));

        return response()->json([
            'success' => true,
            'message' => 'Success Indicator added successfully',
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
        return IpcrSuccessIndicator::find($id);
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
        $successIndicator = IpcrSuccessIndicator::find($id);
        $successIndicator->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Success Indicator updated successfully'
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
        IpcrSuccessIndicator::destroy($id);

        return response()->json([
            'success' => true,
            'message' => 'Success Indicator successfully deleted'
        ], 200);
    }
}
