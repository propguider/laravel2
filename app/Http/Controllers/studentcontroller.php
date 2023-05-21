<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\student;
use Illuminate\Support\Facades\Validator;

class studentcontroller extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|max:50',
            'role_id' => 'required|max:50',
            'created_by'=>'required|integer',
            'updated_by'=>'required|integer'
        ]);

        if ($validator->fails()) {
          return response()->json($validator->errors(), 400);
        }
        $userid = $request->input('user_id');
        $roleid = $request->input('role_id');
        $createdby = $request->input('created_by');
        $updatedby = $request->input('updated_by');

        $student = new student;
        $student->user_id =$userid ;
        $student->role_id =$roleid ;
        $student->created_by = $createdby ;
        $student->updated_by = $updatedby ;
        $student->save();
        $message = 'Employee Data Stored Successfully. Employee Id:'. $student->id;
        return response()->json($message);

}

}
