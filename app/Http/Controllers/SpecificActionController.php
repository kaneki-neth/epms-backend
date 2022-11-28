<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SpecificAction;
use Illuminate\Http\JsonResponse;
use PharIo\Version\SpecificMajorVersionConstraint;
use Symfony\Component\HttpFoundation\Response;

class SpecificActionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): JsonResponse
    {
        $specificAction = SpecificAction::all();

        return response()->json([
            'data' => $specificAction,
            'total' => $specificAction->count()
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
        SpecificAction::create($request->validate([
            'description' => 'required',
            'output_indicator' => 'required',
            'budget' => 'required'
        ]));

        return response()->json([
            'success' => true,
            'message' => 'Specific Acation created successfully',
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
        return SpecificAction::find($id);
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
        $specificAction = SpecificAction::find($id);
        $specificAction->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Updated Specific Action successfully'
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
        SpecificAction::destroy($id);

        return response()->json([
            'success' => true,
            'message' => 'Specific Action successfully deleted'
        ], 200);
    }
}
