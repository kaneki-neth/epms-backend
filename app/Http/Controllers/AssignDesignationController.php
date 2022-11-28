<?php

namespace App\Http\Controllers;

use App\Models\Designation;
use Illuminate\Http\Request;

class AssignDesignationController extends Controller
{
    public function assign_Designation()
    {
        $designation = Designation::find(1);
        $designation->employees()->attach(1);

        return $designation->employees;
    }
}
