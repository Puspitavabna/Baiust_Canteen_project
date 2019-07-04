<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Auth;

class AdminController extends Controller
{
    public function index()
    {
       return view('admin.dashboard');
    }

    public function getlogout()
    {
        Auth::logout();
        return redirect()->route('user.sign_in');
    }
    public function report(){
        $users = User::all();
        return view('admin.report.index', compact('users'));
    }
}