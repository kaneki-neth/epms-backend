<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): JsonResponse
    {
        $employee = Employee::all();

        return response()->json([
            'data' => $employee,
            'total' => $employee->count()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'first_name' => 'required',
            'middle_name',
            'last_name' => 'required',
            'suffix',
            'birthdate' => 'required',
            'sex' => 'required',
            'contact_number' => 'required',
            'address' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        $data = [
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'suffix' => $request->suffix,
            'birthdate' => $request->birthdate,
            'sex' => $request->sex,
            'contact_number' => $request->contact_number,
            'address' => $request->address,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ];
        Employee::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Employee successfully added.'
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
        return Employee::find($id);
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
        $employee = Employee::find($id);
        $employee->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Employee updated successfully'
        ], 200);
    }

    /**
     * Search for a name.
     *
     * @param  str  $name
     * @return \Illuminate\Http\Response
     */
    public function search($name)
    {
        return Employee::where('last_name', 'like', '%' . $name . '%')->get();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id): JsonResponse
    {
        Employee::destroy($id);

        return response()->json([
            'success' => true,
            'message' => 'Employee successfully deleted.'
        ], 200);
    }
}
