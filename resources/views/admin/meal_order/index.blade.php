@extends('layouts.admin_master')

@section('content')

    <h1 class="pull-right">
        <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('admin.meal_order.create') !!}">Add New</a>
    </h1>

    <table id="datatable" class="table table-responsive" id="users-table">
        <thead>
        <tr>
            <th>id</th>
            <th>Breakfast</th>
            <th>Lunch</th>
            <th>Dinner</th>
            <th>Amount</th>
        </tr>
        </thead>
        <tbody>
        @foreach($meal_orders as $meal_order)
                <tr>
                    <td>{!! $meal_order->id !!}</td>
                    <td>{!! $meal_order->breakfast !!}</td>
                    <td>{!! $meal_order->lunch !!}</td>
                    <td>{!! $meal_order->dinner !!}</td>
                </tr>
        @endforeach
        </tbody>
    </table>
@endsection