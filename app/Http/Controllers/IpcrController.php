<?php

namespace App\Http\Controllers;

use App\Models\ipcr;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class IpcrController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): JsonResponse
    {
        $ipcr = ipcr::all();

        return response()->json([
            'data' => $ipcr,
            'total' => $ipcr->count()
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
        ipcr::create($request->validate([
            'actual_accomplishment' => 'required',
            'distribution' => 'required',
            'rate_quality' => 'required',
            'rate_efficiency' => 'required',
            'rate_timeliness' => 'required',
            'rate_average' => 'required',
            'average_score' => 'required',
            'remarks' => 'required',
            'recommends' => 'required',
            'date_rated' => 'required',
            'date_reviewed' => 'required',
            'date_approved' => 'required'
        ]));

        return response()->json([
            'success' => true,
            'message' => 'IPCR added successfully',
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
        return ipcr::find($id);
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
        $ipcr = ipcr::find($id);
        $ipcr->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'IPCR updated successfully'
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
        ipcr::destroy($id);

        return response()->json([
            'success' => true,
            'message' => 'IPCR successfully deleted'
        ], 200);
    }
}
