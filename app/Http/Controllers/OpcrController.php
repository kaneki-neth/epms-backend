<?php

namespace App\Http\Controllers;

use App\Models\opcr;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class OpcrController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): JsonResponse
    {
        $opcr = opcr::all();

        return response()->json([
            'data' => $opcr,
            'total' => $opcr->count()
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
        opcr::create($request->validate([
            'accomplishment' => 'required',
            'rate_quality' => 'required',
            'rate_efficiency' => 'required',
            'rate_timeliness' => 'required',
            'average_score' => 'required',
            'remarks' => 'required',
            'date_rated' => 'required',
            'date_approved' => 'required'
        ]));

        return response()->json([
            'success' => true,
            'message' => 'OPCR added successfully',
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
        return opcr::find($id);
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
        $opcr = opcr::find($id);
        $opcr->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'OPCR updated successfully'
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
        opcr::destroy($id);

        return response()->json([
            'success' => true,
            'message' => 'OPCR successfully deleted'
        ], 200);
    }
}
