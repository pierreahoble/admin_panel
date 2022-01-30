<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Companie;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $company = Companie::count();
        $user = User::count();
        $employe = Employee::count();
        return view('admin.home',[
            'user' => $user,
            'employe'=> $employe,
            'company'=>$company
        ]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('login');
    }






    
}
