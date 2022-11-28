<?php

namespace App\Http\Controllers;

use App\Models\Office;
use Illuminate\Http\Request;

class AssignOfficeController extends Controller
{
    public function assign_Office()
    {
        $office = Office::find(1);
        $office->employees()->attach(1);

        return $office->employees;
    }
}
