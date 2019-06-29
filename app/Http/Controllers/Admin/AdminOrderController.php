<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\User;
use App\Models\RoleType;
use App\Models\UserType;
use App\Models\MealOrder;
use App\Models\Department;
use Auth;
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

class AdminOrderController extends Controller
{

    public function index()
    {
        dd("canteen");
//        $role_types = RoleType::all();
        $meal_orders = MealOrder::all();
        return view('admin.meal_order.index', compact('meal_orders'));
    }
    public function create(){
        return view('admin.meal_order.create');
    }
    public function store(Request $request){
        dd("canteen");
        $meal_order = new MealOrder();
        $meal_order->breakfast = $request->breakfast;
        $meal_order->lunch = $request->lunch;
        $meal_order->dinner = $request->dinner;
        $meal_order->user_id = $request->user_id;
        $meal_order->meal_rate_id = $request->user_id;
        $meal_order->save();
        $redirect_url = redirect()->route('admin.meal_order.index');

    }
}