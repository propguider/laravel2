<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\employee;
use App\Models\image;
use Illuminate\Support\Facades\file;
use Illuminate\Support\Facades\Validator;

use function Ramsey\Uuid\v1;

class EmployeeController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|max:50',
            'last_name' => 'required|max:50',
            'age'=>'required|integer',
            'martial_status'=>'integer',
            'nationality'=>'max:50',
            'religious'=>'max:50',
            'blood_group'=>'max:50',
            'designation'=>'required|max:50',
            'qualification'=>'required|max:50',
            'passport_no'=>'required|max:50',
            'aadhar_no'=>'required|integer',
            'pan_no'=>'required|max:50',
            'employee_id'=>'required|max:50',
            'name_of_bank'=>'required|max:50',
            'salary_account_no'=>'required|integer',
            'ifsc_code'=>'required|max:50',
            'email'=>'required|max:50',
            'employee_status'=>'max:50',
            'employee_image' => 'required|required|mimes:doc,docx,pdf,txt,csv,jpg,png,jpeg|max:2048',
            $rules = array(
                'brochure'=>'mimes:pdf,doc,docx,txt'
            ),
            'status'=>'integer',
            'created_by'=>'required|integer',
            'updated_by'=>'required|integer'
        ]);

        if ($validator->fails()) {
          return response()->json($validator->errors(), 400);
        }

        $firstname = $request->input('first_name');
        $lastname = $request->input('last_name');
        $age = $request->input('age');
       $martialstatus = $request->input('martial_status');
        $nationality = $request->input('nationality');
        $religious = $request->input('religious');
        $bloodgroup = $request->input('blood_group');
        $designation = $request->input('designation');
        $qualification = $request->input('qualification');
       $passportno = $request->input('passport_no');
        $aadharno = $request->input('aadhar_no');
        $panno = $request->input('pan_no');
        $employeeid = $request->input('employee_id');
        $nameofbank = $request->input('name_of_bank');
        $salaryaccountno = $request->input('salary_account_no');
         $ifsccode = $request->input('ifsc_code');
        $email = $request->input('email');
        $employeestatus = $request->input('employee_status');
         $dateofbirth = $request->input('date_of_birth');
         $newdob = date('Y-m-d', strtotime($dateofbirth));
        $dateofjoining = $request->input('date_of_joining');
        $lastworkingdate = $request->input('last_working_date');
        $employeeimage = $request->input('employee_image');
        $employeeimage = $request->input('employee_document');
        $status = $request->input('status');
        $createdby = $request->input('created_by');
        $updatedby = $request->input('updated_by');

        // echo $createdby.','.$updatedby;

        $employee = new employee;
        $employee->first_name =$firstname ;
        $employee->last_name = $lastname;
        $employee->age = $age;
        $employee->martial_status =  $martialstatus;
        $employee->nationality =    $nationality;
        $employee->religious =   $religious;
        $employee->blood_group = $bloodgroup;
        $employee->designation =   $designation;
        $employee->qualification = $qualification;
        $employee->passport_no = $passportno;
        $employee->aadhar_no = $aadharno;
        $employee->pan_no = $panno;
        $employee->employee_id = $employeeid;
        $employee->name_of_bank = $nameofbank;
        $employee->salary_account_no =   $salaryaccountno;
        $employee->ifsc_code =$ifsccode ;
        $employee->email = $email;
        $employee->employee_status = $employeestatus;
        $employee->date_of_birth =    $newdob ;
        $employee->date_of_joining = date('Y-m-d', strtotime($dateofjoining));
        $employee->last_working_date =  date('Y-m-d', strtotime($lastworkingdate));

  if($request->hasfile('employee_image'))
  {
      $file=$request->file('employee_image');
      $extension= $file->getClientOriginalExtension();
      $filename = time().'.'.$extension;
      $file->move('images/',$filename);
      $employee->employee_image = $filename;
  }
          $employee->status = $status ;
          $employee->created_by = $createdby ;
          $employee->updated_by = $updatedby ;
          $employee->save();
          if($request->hasfile('employee_document'))
          {
              $file=$request->file('employee_document');
              $extension= $file->getClientOriginalExtension();
              $filename = time().'.'.$extension;
              $path= ('image/'. $filename);
              $file->move('image/',$filename);
                $image = new image;
                $image->parent_module = 'employee';
                $image->parent_id =$employee->id;
                $image->image_name=$filename;
                $image->path= $path;
                $image->file_name=$filename.'.'.$path;
                $image->save ();
                $employee->employee_document = $filename;
                  $message = 'Employee Data Stored Successfully. Employee Id:'. $employee->id;
                  return response()->json($message);

    }
}

    public function update(Request $request,$id)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|max:50',
            'last_name' => 'required|max:50',
            'age'=>'required|integer',
            'martial_status'=>'integer',
            'nationality'=>'max:50',
            'religious'=>'max:50',
            'blood_group'=>'max:50',
            'designation'=>'required|max:50',
            'qualification'=>'required|max:50',
            'passport_no'=>'required|max:50',
            'aadhar_no'=>'required|integer',
            'pan_no'=>'required|max:50',
            'employee_id'=>'required|max:50',
            'name_of_bank'=>'required|max:50',
            'salary_account_no'=>'required|integer',
            'ifsc_code'=>'required|max:50',
            'email'=>'required|max:50',
            'employee_status'=>'max:50',
            'employee_image' => 'required|mimes:doc,docx,pdf,txt,csv,jpg,png,jpeg|max:2048',
            $rules = array(
                'brochure'      => 'mimes:pdf,doc,docx,txt'
            ),
            'status'=>'integer',
            'created_by'=>'required|integer',
            'updated_by'=>'required|integer'

        ]);

        if ($validator->fails()) {
          return response()->json($validator->errors(), 400);
        }
        $firstname = $request->input('first_name');
        $lastname = $request->input('last_name');
        $age = $request->input('age');
       $martialstatus = $request->input('martial_status');
        $nationality = $request->input('nationality');
        $religious = $request->input('religious');
        $bloodgroup = $request->input('blood_group');
        $designation = $request->input('designation');
        $qualification = $request->input('qualification');
       $passportno = $request->input('passport_no');
        $aadharno = $request->input('aadhar_no');
        $panno = $request->input('pan_no');
        $employeeid = $request->input('employee_id');
        $nameofbank = $request->input('name_of_bank');
        $salaryaccountno = $request->input('salary_account_no');
         $ifsccode = $request->input('ifsc_code');
        $email = $request->input('email');
        $employeestatus = $request->input('employee_status');
         $dateofbirth = $request->input('date_of_birth');
         $newdob = date('Y-m-d', strtotime($dateofbirth));
        $dateofjoining = $request->input('date_of_joining');
        $lastworkingdate = $request->input('last_working_date');
        $status = $request->input('status');
        $createdby = $request->input('created_by');
        $updatedby = $request->input('updated_by');


        $employee = employee::find($id);
        $employee->first_name =$firstname;
        $employee->last_name = $lastname;
        $employee->age = $age;
        $employee->martial_status =  $martialstatus;
        $employee->nationality =    $nationality;
        $employee->religious =   $religious;
        $employee->blood_group = $bloodgroup;
        $employee->designation =   $designation;
        $employee->qualification = $qualification;
        $employee->passport_no = $passportno;
        $employee->aadhar_no = $aadharno;
        $employee->pan_no = $panno;
        $employee->employee_id = $employeeid;
        $employee->name_of_bank = $nameofbank;
        $employee->salary_account_no =   $salaryaccountno;
        $employee->ifsc_code =$ifsccode ;
        $employee->email = $email;
        $employee->employee_status = $employeestatus;
        $employee->date_of_birth =    $newdob ;
        $employee->date_of_joining = date('Y-m-d', strtotime($dateofjoining));
        $employee->last_working_date =  date('Y-m-d', strtotime($lastworkingdate));
        if($request->hasfile('employee_image'))
        {
            $destination = 'images/'.$employee->employee_image;
            if(file::exists($destination))
            {
              file::delete($destination);
            }
            $file=$request->file('employee_image');
            $extension= $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('images/',$filename);
            $employee->employee_image = $filename;
        }

        $employee->status = $status ;
        $employee->created_by = $createdby ;
        $employee->updated_by = $updatedby ;
        $employee->save();
        if($request->hasfile('employee_document'))
        {
            $destination = 'image/'.$employee->employee_document;
            if(file::exists($destination))
            {
              file::delete($destination);
            }
            $file=$request->file('employee_document');
            $extension= $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $path= ('image/'. $filename);
            $file->move('image/',$filename);

            $image = new image;
            $image->parent_module = 'employee';
            $image->parent_id =$employee->id;
            $image->image_name=$filename;
            $image->path= $path;
            $image->file_name=$filename.'.'.$path;
            $image->save ();
            $employee->employee_document = $filename;
        }
        $message = 'Employee Data updated Successfully. Employee Id:'. $employee->id;
        return response()->json($message);
    }
    }

