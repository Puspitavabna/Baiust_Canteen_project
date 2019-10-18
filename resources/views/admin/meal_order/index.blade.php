@extends('layouts.admin_master')

@section('content')
    <div class="alert alert-info">
        <h1 align="center">
            Meal Order
        </h1>
    </div>
    <a class="btn btn-info pull-right" href="{{ route('admin.meal_order.create') }}">Add Meal Order</a>
    <form action="{{route('admin.meal_order.index')}}" accept-charset="UTF-8" method="get"><input name="utf8" type="hidden" value="✓">
        From:
        <input size="16" type="text" name="from_date" value="{{ empty(request()->get('from_date'))? \Carbon\Carbon::now()->startOfMonth()->format('d-m-Y') : request()->get('from_date') }}" class="form_datetime">

        End:
        <input size="16" type="text" name="to_date" value="{{ empty(request()->get('to_date'))? \Carbon\Carbon::now()->endOfMonth()->format('d-m-Y') : request()->get('to_date') }}" class="form_datetime">
        <input type="submit" value="Submit">
    </form>

    <table id="datatable" class="table table-responsive" id="users-table">
        <thead>
        <tr>
            <th>No</th>
            <th>Date</th>
            <th>Breakfast</th>
            <th>Lunch</th>
            <th>Dinner</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($meal_orders as $key => $meal_order)
                <tr>
                    <td>{!! $key + 1 !!}</td>
                    <td>{!! $meal_order->created_at->format('d/m/Y') !!}</td>
                    <td>{!! $meal_order->breakfast !!}</td>
                    <td>{!! $meal_order->lunch !!}</td>
                    <td>{!! $meal_order->dinner !!}</td>
                    <td>
                        {{--@if(!$meal_order->created_at->isPast())--}}
                            <a href="{!! route('admin.meal_order.edit', $meal_order->id) !!}">Edit</a>
                        {{--@endif--}}
                    </td>
                </tr>
        @endforeach
        </tbody>
    </table>
@endsection