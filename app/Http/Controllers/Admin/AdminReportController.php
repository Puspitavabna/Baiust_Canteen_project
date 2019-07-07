<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\User;
use Auth;
use Response;
use App\Models\Country;
use Validator;
use App\Helpers\Helper;
use Carbon\Carbon;
use App\Models\MealOrder;

class AdminReportController extends Controller
{

    public function index()
    {
        $users = User::all();

        $user_details = [];

        foreach($users as $user){
           $temp_details['full_name'] = $user->full_name;
           if(request()->get('from_date')){
               $from_date = request()->get('from_date');
               $to_date = request()->get('to_date');
           } else {
               $from_date =  Carbon::now()->startOfMonth();
               $to_date = Carbon::now()->endOfMonth();
           }

            $meal_orders = MealOrder::where('created_at', '>=', $from_date)
                ->where('created_at', '<=', $to_date)->where('user_id', $user->id)->get();

            $temp_details['total_meal'] = count($meal_orders);

            $total_cost = 0;
            $total_breakfast = 0;
            $total_lunch = 0;
            $total_dinner = 0;
            foreach($meal_orders as $meal_order){
                $breakfast_rate = $meal_order->meal_rate->breakfast_rate;
                $lunch_rate = $meal_order->meal_rate->lunch_rate;
                $dinner_rate = $meal_order->meal_rate->dinner_rate;
                $breakfast_cost = $meal_order->breakfast * $breakfast_rate;
                $lunch_cost = $meal_order->lunch * $lunch_rate;
                $dinner_cost = $meal_order->dinner * $dinner_rate;
                $total_cost = $breakfast_cost + $lunch_cost + $dinner_cost;

                $total_breakfast += $meal_order->breakfast;
                $total_lunch += $meal_order->lunch;
                $total_dinner += $meal_order->dinner;
            }

            $temp_details['total_cost'] = $total_cost;
            $temp_details['total_breakfast'] = $total_breakfast;
            $temp_details['total_lunch'] = $total_lunch;
            $temp_details['total_dinner'] = $total_dinner;

            array_push($user_details, $temp_details);
        }

        return view('admin.report.index', compact('user_details'));
    }
}