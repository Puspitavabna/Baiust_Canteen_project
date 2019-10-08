@extends('layouts.admin_master')

@section('content')
    <form method="POST" action="{{route('admin.bazar_cost.store')}}">
        <input type="hidden" name="_method" value="post">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label>Daily Cost</label>
                    <input type="number" name="daily_cost"  class="form-control" placeholder="daily_cost" required="">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label>Cost Details</label>
                    <textarea type="text" name="cost_details" class="form-control" placeholder="cost_details" required=""></textarea>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="form-group">
                    <label>Active Meal Type</label>
                    <input type="number" name="active_meal_type"  min="0" max="1" class="form-control" placeholder="active_meal_type" required="">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="row bottom-row">
                <div class="col-lg-12 text-center">
                    <button class="btn-success" type="submit" value="Submit">Submit</button>
                </div>
            </div>
        </div>

    </form>
@endsection