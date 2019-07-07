<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\MealOrder;
use App\Models\MealRate;
use Auth;
use Illuminate\Http\Request;
use Response;
use App\Models\Country;
use Validator;
use App\Helpers\Helper;
use Carbon\Carbon;

class AdminMealOrderController extends Controller
{

    public function index()
    {
        if(request()->get('from_date')){
            $from_date = request()->get('from_date');
            $to_date = request()->get('to_date');
        } else {
            $from_date =  Carbon::now()->startOfMonth();
            $to_date = Carbon::now()->endOfMonth();
        }

        $meal_orders = MealOrder::where('created_at', '>=', $from_date)
            ->where('created_at', '<=', $to_date)->where('user_id', Auth::user()->id)->get();
        return view('admin.meal_order.index', compact('meal_orders'));
    }
    public function create(){
        $meal_rates = MealRate::all();
        return view('admin.meal_order.create', compact('meal_rates'));
    }
    public function store(Request $request){
        $user_id = Auth::user()->id;
        $meal_order = new MealOrder();
        $meal_order->breakfast = $request->breakfast;
        $meal_order->lunch = $request->lunch;
        $meal_order->dinner = $request->dinner;
        $meal_order->user_id = $user_id;
        $meal_order->meal_rate_id = $request->meal_rate_id;
        $meal_order->save();
        return redirect(route('admin.meal_order.index'));
    }

    public function edit($id){
        $meal_order = MealOrder::find($id);
        $meal_rates = MealRate::all();
        return view('admin.meal_order.edit', compact('meal_order', 'meal_rates'));
    }

    public function update(Request $request, $id){
        $user_id = Auth::user()->id;
        $meal_order = MealOrder::find($id);
        $meal_order->breakfast = $request->breakfast;
        $meal_order->lunch = $request->lunch;
        $meal_order->dinner = $request->dinner;
        $meal_order->user_id = $user_id;
        $meal_order->meal_rate_id = $request->meal_rate_id;
        $meal_order->update();
        return redirect(route('admin.meal_order.index'));
    }
}