<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class employee extends Model
{
    use HasFactory;
    protected $table = 'employees';
    protected $fillable = ['first_name','last_name','age','martial_status','nationality','religious','blood_group','designation','qualification','passport_no','aadhar_no','pan_no','employee_id','name_of_bank','salary_account_no','ifsc_code','email','employee_status','date_of_birth','date_of_joining','last_working_date','employee_image','employee_document','status','created_by','updated_by'];



}
