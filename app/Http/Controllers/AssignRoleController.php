<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class AssignRoleController extends Controller
{
    public function assign_Role()
    {
        $role = Role::find(1);
        $role->employees()->attach(2);

        return $role->employees;
    }
}
