<?php

namespace App\Http\Controllers;

use App\Models\KeyFunction;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class KeyFunctionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): JsonResponse
    {
        $keyFunction = KeyFunction::all();

        return response()->json([
            'data' => $keyFunction,
            'total' => $keyFunction->count()
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
        KeyFunction::create($request->validate([
            'description' => 'required'
        ]));

        return response()->json([
            'success' => true,
            'message' => 'Key Function created successfully',
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
        return KeyFunction::find($id);
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
        $keyFunction = KeyFunction::find($id);
        $keyFunction->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Updated Key Function successfully'
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
        KeyFunction::destroy($id);

        return response()->json([
            'success' => true,
            'message' => 'Key Function successfully deleted'
        ], 200);
    }
}
