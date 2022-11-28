<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MajorFinalOutput;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class MajorFinalOutputController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): JsonResponse
    {
        $mfo = MajorFinalOutput::all();

        return response()->json([
            'data' => $mfo,
            'total' => $mfo->count()
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
        MajorFinalOutput::create($request->validate([
            'description' => 'required'
        ]));

        return response()->json([
            'success' => true,
            'message' => 'MFO added successfully',
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
        return MajorFinalOutput::find($id);
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
        $mfo = MajorFinalOutput::find($id);
        $mfo->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'MFO updated successfully'
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
        MajorFinalOutput::destroy($id);

        return response()->json([
            'success' => true,
            'message' => 'MFO successfully deleted'
        ], 200);
    }
}
