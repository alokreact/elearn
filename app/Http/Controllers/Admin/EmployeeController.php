<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CourseRequest;

use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;
use App\Models\Cour;

use App\Models\Employee;
 
class EmployeeController extends Controller
{
    public function index(){

        return view('admin.employee.index');


    }

    public function search (){

        $employees = Employee::orderby('id','asc')->select('*')->get(); 
        $userData['data'] = $employees;
        return response()->json($userData);
    }

    public function store(Request $request){
               
        $employee = Employee::find($request['id']);

        $employee->update($request->all());

        return true;
       
    }
}
