<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Staff;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\StaffDetail as StaffDetailResource;

class StaffDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $getAllRecord=Staff::all();
        return new StaffDetailResource($getAllRecord); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'role'=>'required',
        ]);
    
        if ($validator->fails()) {
            // get all errors 
            $errors = $validator->errors()->all();
            return $errors;
        }
            $insertRecord = Staff::create([
                'name'=>$request->name,
                'mobile'=>$request->mobile,
                'email'=>$request->email,
                'address'=>$request->address,
                'password'=>bcrypt($request->password),
                'role'=>$request->role,
                    
                ]);
                
                return new StaffDetailResource($insertRecord); 
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $showById=Staff::findorfail($id);
        return new StaffDetailResource($showById);
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
        $findAndUpdateById=Staff::findorfail($id);
        
        $findAndUpdateById->update($request->all());    
        return new StaffDetailResource($findAndUpdateById);
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
