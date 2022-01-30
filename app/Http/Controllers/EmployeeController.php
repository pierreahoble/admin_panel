<?php

namespace App\Http\Controllers;

use App\Models\Companie;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Session;

class EmployeeController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $employees = Employee::paginate(10);
        return view('admin.employe.index',[
            'employees' => $employees
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Companie::all();
        return view('admin.employe.create',[
            'companies' =>$companies
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
           'name' =>'required |string',
           'email' => 'required|email|unique:employees,email',
           'last_name' => 'required|string',
           'phone'=>'required',
           'company'=>'required'
        ]);

        $employee = Employee::create([
            'name' =>$request['name'] ,
            'last_name' =>$request['last_name'],
            'email'=>$request['email'],
            'phone'=>$request['phone'],
            'company' =>$request['company'],
        ]);

        Session::flash('succes','Employe create with success');
        return redirect('employees');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $id = Crypt::decrypt($id);
        $employee = Employee::find($id);
        return view('admin.employe.show',[
            'employee' => $employee
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {


        $id = Crypt::decrypt($id);
        $employee = Employee::find($id);
        $companies = Companie::all();
        return view('admin.employe.edit',[
            'companies'=>$companies,
            'employee'=>$employee
        ]);
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
       
        $this->validate($request,[
            'name' =>'required |string',
            'email' => 'required|email',
            'last_name' => 'required|string',
            'phone'=>'required',
            'company'=>'required'
         ]);

         $employee = Employee::find($id)->update([
             'name' => $request['name'],
             'email' => $request['last_name'],
             'phone'=>$request['phone'],
             'company' =>$request['company']
         ]);

         Session::flash('succes','Employe update with success');
        return redirect('employees');
 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id = Crypt::decrypt($id);
        $employee = Employee::find($id)->delete();
        Session::flash('succes','Employe delete with success');
        return redirect('employees');
    }
}
