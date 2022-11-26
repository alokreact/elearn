<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CourseRequest;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;
use App\Models\Cour;

class CourseController extends Controller
{
    public function index()
    {
        return view('admin.course.create');
    }

    public function create(CourseRequest $request){

    
        $validated = $request->validated();

       // dd($validated);
   

    if ($request->file('image')) {

        $file = $request->file('image');
        $filename = date('YmdHi') . $file->getClientOriginalName();

        $file->move(public_path('Image'), $filename);
        $validated['image'] = $filename;
    }
  
    Cour::create($validated);

    return redirect()->back()->with('message', 'Record Created Successfully');
}

   
}
