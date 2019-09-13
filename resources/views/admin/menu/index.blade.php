@extends('layouts.admin_master')

@section('content')

<table id="datatable" class="table table-responsive" id="users-table">
    <thead>
    <tr>
        <th>No</th>
        <th>Meal Rate Name</th>
        <th>Breakfast</th>
        <th>Breakfast Rate</th>
        <th>Lunch</th>
        <th>Lunch Rate</th>
        <th>Dinner</th>
        <th>Dinner Rate</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    @foreach($meal_rates as $key => $meal_rate)
        <tr>
            <td>{!! $key + 1 !!}</td>
            <td>{!! $meal_rate->meal_rate_name !!}</td>
            <td>{!! $meal_rate->breakfast_menu !!}</td>
            <td>{!! $meal_rate->breakfast_rate !!}</td>
            <td>{!! $meal_rate->lunch_menu !!}</td>
            <td>{!! $meal_rate->lunch_rate !!}</td>
            <td>{!! $meal_rate->dinner_menu !!}</td>
            <td>{!! $meal_rate->dinner_rate !!}</td>
            <td>
                {{--@if(!$meal_order->created_at->isPast())--}}
                <a href="#">Edit</a>
                {{--@endif--}}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
    @endsection