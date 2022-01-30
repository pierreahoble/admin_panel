<?php

namespace App\Http\Controllers;

use Session;
use App\Models\Companie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;

class CompanieController extends Controller
{

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Companie::paginate(5);

        return view('admin.company.index',[
            'companies' =>$companies
        ]);
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate(request(),[
            'name' => 'required',
            'email' => 'email|unique:companies,email',
            'website' => 'required|url',
            'logo' =>'required|mimes:png,jpg|dimensions:width=100,height=100'
        ],[
            'dimensions' => 'The logo has invalid image dimensions.(minimum 100x100)'
        ]);

        if ($request->file('logo')) {
            $logo = $request->file('logo');
            $filename =time().'_'.$logo->getClientOriginalName(); //file name

            $filepath = $request->file('logo')->storeAs('public',$filename);

            # code...
            $company = Companie::create([
                'name' =>$request['name'],
                'email' =>$request['email'],
                'logo'=>'storage/'.$filename,
                'website' => $request['website']
            ]);
        }

        Session::flash('succes','Company create with success');
        return redirect('companies');
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
        $company = Companie::find($id);
        return view('admin.company.show',[
            'company' =>$company
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
        $company = Companie::find($id);
        return view('admin.company.edit',[
            'company' =>$company
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

        $this->validate(request(),[
            'name' => 'required',
            'email' => 'email|',
            'website' => 'required|url',
            // 'logo' =>'required|mimes:png,jpg|dimensions:width=100,height=100'
        ],[
            // 'dimensions' => 'The logo has invalid image dimensions.(minimum 100x100)'
        ]);

        if ($request->file('logo')) {
            $company_logo = Companie::find($id)->logo;
            $company_logo = str_replace('storage/','',$company_logo);
            if (Storage::disk('public')->exists($company_logo)) {
                Storage::disk('public')->delete($company_logo);
            }
            $logo = $request->file('logo');
            $filename =time().'_'.$logo->getClientOriginalName(); //file name

            $filepath = $request->file('logo')->storeAs('public',$filename);

            # code...
            $company = Companie::find($id)->update([
                'name' =>$request['name'],
                'email' =>$request['email'],
                'logo'=>'storage/'.$filename,
                'website' => $request['website']
            ]);
        }else{
            
                   $company = Companie::find($id)->update([
                       'name' => $request['name'],
                       'email' => $request['email'],
                       'website' => $request['website'],
                   ]);

        }

    Session::flash('succes','Company update with success');

    return redirect('companies');


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
        $employee_company = Companie::find($id)->employees;
        if (count($employee_company) > 0) {
            Session::flash('error','This company is attached to an employee');
            return redirect()->back();
        }else{
            $company = Companie::find($id)->delete();    
            Session::flash('succes','Company delete with success');
           return redirect('companies');

        }
    }
}
