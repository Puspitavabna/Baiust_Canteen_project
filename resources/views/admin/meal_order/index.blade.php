@extends('layouts.admin_master')

@section('content')
    <h1>
        Meal Orders
    </h1>

    <form action="{{route('admin.report.index')}}" accept-charset="UTF-8" method="get"><input name="utf8" type="hidden" value="✓">
        From:
        <input size="16" type="text" name="from_date" value="{{ empty(request()->get('from_date'))? \Carbon\Carbon::now()->startOfMonth()->format('d-m-Y') : request()->get('from_date')->format('d-m-Y') }}" class="form_datetime">

        End:
        <input size="16" type="text" name="to_date" value="{{ empty(request()->get('to_date'))? \Carbon\Carbon::now()->endOfMonth()->format('d-m-Y') : request()->get('to_date')->format('d-m-Y') }}" class="form_datetime">
        <input type="submit" value="Submit">
    </form>

    <table id="datatable" class="table table-responsive" id="users-table">
        <thead>
        <tr>
            <th>Date</th>
            <th>Breakfast</th>
            <th>Lunch</th>
            <th>Dinner</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($meal_orders as $meal_order)
                <tr>
                    <td>{!! $meal_order->created_at->format('d/m/Y') !!}</td>
                    <td>{!! $meal_order->breakfast !!}</td>
                    <td>{!! $meal_order->lunch !!}</td>
                    <td>{!! $meal_order->dinner !!}</td>
                    <td>
                        <a href="{!! route('admin.meal_order.edit', $meal_order->id) !!}">Edit</a>
                    </td>
                </tr>
        @endforeach
        </tbody>
    </table>
@endsection