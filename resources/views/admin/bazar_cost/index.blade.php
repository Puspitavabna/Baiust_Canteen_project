@extends('layouts.admin_master')

@section('content')
    <div class="alert alert-info">
    <h1 align="center">
        Bazar  Cost
    </h1>
    </div>
    <a class="btn btn-info pull-right" href="{{ route('admin.bazar_cost.create') }}">Add Bazar Cost</a>
    <table id="datatable" class="table table-responsive" id="users-table">
        <thead>
        <tr>
            <th>No</th>
            <th>Daily Cost</th>
            <th>Cost Details</th>
            <th>Active Meal Type</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($bazar_costs as $key => $bazar_cost)
            <tr>
                <td>{!! $key + 1 !!}</td>
                <td>{!! $bazar_cost->daily_cost !!}</td>
                <td>{!! $bazar_cost->cost_details !!}</td>
                <td>{!! $bazar_cost->active_meal_type !!}</td>
                <td>
                    {{--@if(!$bazar_cost->created_at->isPast())--}}
                    <a href="{!! route('admin.bazar_cost.edit', $bazar_cost->id) !!}">Edit</a>
                    {{--@endif--}}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection