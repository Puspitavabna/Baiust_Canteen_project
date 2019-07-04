@extends('layouts.admin_master')

@section('content')

    <table id="datatable" class="table table-responsive" id="users-table">
        <thead>
        <tr>
            <th>id</th>
            <th>User</th>
            <th>Total Meal</th>
            <th>Total Cost</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{!! $user->id !!}</td>
                <td>{!! $user->full_name !!}</td>
                <td>{!! count($user->meal_orders) !!}</td>
                @php
                    $total_cost = 0;
                    foreach($user->meal_orders as $meal_order){
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
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection