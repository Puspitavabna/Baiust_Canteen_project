<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\MealPayment;
use App\User;
use App\Models\RoleType;
use App\Models\UserType;
use App\Models\MealOrder;
use App\Models\MealRate;
use App\Models\Department;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Illuminate\Validation\Rule;
use phpDocumentor\Reflection\DocBlock\Tags\See;
use Response;
use App\Models\Country;
use Validator;
use Illuminate\Support\Facades\Session;
use App\Helpers\Helper;
use Illuminate\Support\Facades\Mail;

class AdminMealPaymentController extends Controller
{

    public function index()
    {
        $meal_payments = MealPayment::all();
        return view('admin.meal_payment.index', compact('meal_payments'));
    }
    public function create(){
        $users = User::all();
        return view('admin.meal_payment.create', compact('users'));
    }
    public function store(Request $request){
       $meal_payment = new MealPayment();
       $meal_payment->amount = $request->amount;
       $meal_payment->meal_started_at = $request->meal_started_at;
       $meal_payment->meal_active_until = $request->meal_active_until;
       $meal_payment->user_id = $request->user_id;
       $meal_payment->save();

       $user = User::find($request->user_id);
       $user->balance = $user->balance + $request->balance;
       $user->update();

       $date = Carbon::parse($meal_payment->meal_started_at);
       $now = Carbon::parse($meal_payment->meal_active_until);

       $dif = $date->diffInDays($now);

       $i = 1;
       for($i; $i < $dif; $i++){
           $meal_order = new MealOrder();
           $meal_date = new Carbon($meal_payment->meal_started_at);
           $meal_date = $meal_date->addDays($i);
           $meal_order->breakfast = 1;
           $meal_order->lunch = 1;
           $meal_order->dinner = 1;
           $meal_order->user_id = $meal_payment->user_id;
           $meal_order->meal_rate_id = $request->meal_rate_id;
           $meal_order->created_at = $meal_date;
           $meal_order->save();
       }
       return redirect(route('admin.meal_payment.index'));
    }
}