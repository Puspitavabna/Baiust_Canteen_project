@extends('layouts.admin_master')

@section('content')
    <form action="{{route('admin.report.index')}}" accept-charset="UTF-8" method="get"><input name="utf8" type="hidden" value="✓">
        From:
        <input size="16" type="text" name="from_date" value="" class="form_datetime">

        End:
        <input size="16" type="text" name="to_date" value="" class="form_datetime">
        <input type="submit" value="Submit">
    </form>

    <table id="datatable" class="table table-responsive" id="users-table">
        <thead>
        <tr>
            <th>id</th>
            <th>User</th>
            <th>Total Meal</th>
            <th>Total Cost</th>
            <th>Overall Cost</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{!! $user->id !!}</td>
                <td>{!! $user->full_name !!}</td>
                @php
                   if(request()->get('from_date')){
                    $from_date = request()->get('from_date');
                    $to_date = request()->get('to_date');
                   }else {
                    $from_date =  \Carbon\Carbon::now()->startOfMonth();
                    $to_date = \Carbon\Carbon::now()->endOfMonth();
                   }
                    $meal_orders = \MealOrder::where('created_at', '>=', $from_date)
                           ->where('created_at', '<=', $to_date)->get();
                dd($meal_orders);
                @endphp
                <td>{!! count($meal_orders) !!}</td>
                @php
                    $total_cost = 0;
                    foreach($meal_orders as $meal_order){
                        $breakfast_rate = $meal_order->meal_rate->breakfast_rate;
                        $lunch_rate = $meal_order->meal_rate->lunch_rate;
                        $dinner_rate = $meal_order->meal_rate->dinner_rate;
                        $breakfast_cost = $meal_order->breakfast * $breakfast_rate;
                        $lunch_cost = $meal_order->lunch * $lunch_rate;
                        $dinner_cost = $meal_order->dinner * $dinner_rate;
                        $total_cost = $breakfast_cost + $lunch_cost + $dinner_cost;
                    }
                @endphp
                <td>{!! $total_cost !!}</td>
                <td></td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection