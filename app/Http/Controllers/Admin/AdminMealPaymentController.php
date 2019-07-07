<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\MealOrder;
use App\Models\MealPayment;
use App\Models\MealRate;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Response;
use App\Models\Country;
use Validator;
use App\Helpers\Helper;
use Carbon\Carbon;

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
        $user->balance = $user->balance + $request->amount;
        $user->update();

        $date = Carbon::parse($meal_payment->meal_started_at);
        $now = Carbon::parse($meal_payment->meal_active_until);

        $diff = $date->diffInDays($now);

        $active_meal_date = MealRate::where('active', true)->first();

        $i = 1;
        for($i; $i <= $diff; $i++ ){
            $meal_order = new MealOrder();
            $meal_date = new Carbon($meal_payment->meal_started_at);
            $meal_date = $meal_date->addDays($i);

            $check_meal_order = MealOrder::where('created_at', $meal_date)->first();

            $get_meal_rate = MealRate::where('active', true)->first();

            $total_meal_cost = $get_meal_rate->breakfast_rate
                + $get_meal_rate->lunch_rate
                + $get_meal_rate->dinner_rate;

            if(empty($check_meal_order)){
                $meal_order->breakfast = 1;
                $meal_order->lunch = 1;
                $meal_order->dinner = 1;
                $meal_order->user_id = $meal_payment->user_id;
                $meal_order->meal_rate_id = $active_meal_date->id;
                $meal_order->created_at = $meal_date;
                $meal_order->save();
                $user->balance = $user->balance - $total_meal_cost;
                $user->update();
            }
        }

        return redirect(route('admin.meal_payment.index'));
    }
}