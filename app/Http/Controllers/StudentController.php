<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Exports\StudentExport;
use App\Exports\StudentduplicateExport;
use Maatwebsite\Excel\Facades\Excel;

class StudentController extends Controller
{
    public function UpdateStudent($id)
    {
        $detail = Student::where('regid',$id)->first();      
        return view('edit',compact('detail'));             
        
    }

    public function EditStudent(Request $request)
    {
        $regid = $request->regid;
        $student = Student::where('regid',$regid)->update([
            'name' => $request->name,
            'class' => $request->class,
            'gender' => $request->gender,
            'dob' => $request->dob,
            'mobile' => $request->mobile,
            'address' => $request->address,
        ]);

        return redirect('/')->with('success','Updated Successfully');
    }

    public function DeleteStudent($id)
    {
        $delete = Student::where('regid',$id)->delete();
        return redirect('/')->with('danger','Deleted Successfully');
    }

    public function ExportStudent()
    {
        return Excel::download(new StudentExport, 'students.xlsx');
    }

    public function ExportallStudent()
    {
        return Excel::download(new StudentduplicateExport, 'studentsall.xlsx');
    }


    ////for api
    
    public function Details()
    {
        $students = Student::all();
        if (count($students) > 0) {
            return response()->json([
                'status' => 'success',
                'students' => $students,
            ],200);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'No Students Found',
            ],201);
        }
        
    }

    public function Update(Request $request,$regid)
    {
        $student = Student::where('regid',$regid)->first();
        if (!empty($student)) {
            $update = Student::where('regid',$student->regid)->update([
                'name' => isset($request->name)?$request->name:$student->name,
                'class' => isset($request->class)?$request->class:$student->class,
                'gender' => isset($request->gender)?$request->gender:$student->gender,
                'dob' => isset($request->dob)?$request->dob:$student->dob,
                'mobile' => isset($request->mobile)?$request->mobile:$student->mobile,
                'address' => isset($request->address)?$request->address:$student->address,
            ]);
            return response()->json([
                'status' => 'success',
                'message' => 'Updated Successfully',
            ],200);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'No Students Found to update',
            ],201);
        }
        
    }

    public function Delete(Request $request,$regid)
    {
        $student = Student::where('regid',$regid)->first();
        if (!empty($student) > 0) {
            $delete = Student::where('regid',$student->regid)->delete();
            return response()->json([
                'status' => 'success',
                'message' => 'Deleted Successfully',
            ],200);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'No Students Found to delete',
            ],201);
        }
        
    }
}
