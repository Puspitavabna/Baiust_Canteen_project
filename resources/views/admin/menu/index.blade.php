@extends('layouts.admin_master')

@section('content')
    <div class="alert alert-info">
        <h1 align="center">
            Menus
        </h1>
    </div>
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
        </tr>
    @endforeach
    </tbody>
</table>
    @endsection