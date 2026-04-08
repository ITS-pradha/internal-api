<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;


class EmployeesController extends Controller
{
    public function employee($pin)
    {
        $data=Employee::where('pin',$pin)->first();
        

        return response()->json($data);
    }
}
