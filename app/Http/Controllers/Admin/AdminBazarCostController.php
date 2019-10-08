<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\BazarCost;
use App\Models\MealOrder;
use App\Models\MealRate;
use Auth;
use Illuminate\Http\Request;
use Response;
use Validator;
use App\Helpers\Helper;
use Carbon\Carbon;

class AdminBazarCostController extends Controller
{

    public function index()
    {
        $bazar_costs = BazarCost::all();
        return view('admin.bazar_cost.index', compact('bazar_costs'));
    }
    public function create(){
        $bazar_costs = BazarCost::all();
        return view('admin.bazar_cost.create', compact('bazar_costs'));
    }
    public function store(Request $request){
        $user_id = Auth::user()->id;
        $bazar_cost = new BazarCost();
        $bazar_cost->daily_cost = $request->daily_cost;
        $bazar_cost->cost_details = $request->cost_details;
        $bazar_cost->active_meal_type = $request->active_meal_type;
        $bazar_cost->save();
        return redirect(route('admin.bazar_cost.index'));
    }

    public function edit($id){
        $bazar_cost = BazarCost::find($id);
        return view('admin.bazar_cost.edit', compact('bazar_cost'));
    }

    public function update(Request $request, $id){
        $user_id = Auth::user()->id;
        $bazar_cost = BazarCost::find($id);
        $bazar_cost->daily_cost = $request->daily_cost;
        $bazar_cost->cost_details = $request->cost_details;
        $bazar_cost->active_meal_type = $request->active_meal_type;
        $bazar_cost->update();
        return redirect(route('admin.bazar_cost.index'));
    }
}