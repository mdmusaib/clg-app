<?php

namespace App\Http\Controllers;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\StudentDetail as StudentDetailResource;
class StudentDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $getAllRecord=Student::all();
        return new StudentDetailResource($getAllRecord);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'name'=>'required',
            'mobile'=>'required|numeric',
            'email'=>'required',
            'address'=>'required',
            'password'=>'required',
            'degree'=>'required',
            'semester'=>'required',
            'section'=>'required',
            'blood_group'=>'required',
            'parent_contact_detail'=>'required',
        ]);
    
        if ($validator->fails()) {
            // get all errors 
            $errors = $validator->errors()->all();
            return $errors;
        }
        $insertRecord = Student::create([
		
		'name'=>$request->name,
		'mobile'=>$request->mobile,
		'email'=>$request->email,
		'address'=>$request->address,
		'password'=>bcrypt($request->password),
		'degree'=>$request->degree,
		'semester'=>$request->semester,
		'section'=>$request->section,     
        'blood_group'=>$request->blood_group, 
        'parent_contact_detail'=>$request->parent_contact_detail,     
        ]);
        
        return new StudentDetailResource($insertRecord);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $showById=Student::findorfail($id);
        return new StudentDetailResource($showById);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            // 'name'=>'required',
            // 'mobile'=>'required|numeric',
            // 'email'=>'required',
            // 'address'=>'required',
            // 'role'=>'required',
        ]);
    
        
        if ($validator->fails()) {
            // get all errors 
            $errors = $validator->errors()->all();
            return $errors;
        }
        $findAndUpdateById=Student::findorfail($id);
        
        $findAndUpdateById->update($request->all());    
        return new StudentDetailResource($findAndUpdateById);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
