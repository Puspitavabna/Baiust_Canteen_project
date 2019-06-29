@extends('layouts.admin_master')

@section('content')
    <form method="POST" action="{{route('admin.meal_order.index')}}">
        {{ csrf_field() }}
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label>Breakfast</label>
                        <input type="number" name="breakfast" class="form-control" placeholder="Breakfast" required="">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label>Lunch</label>
                        <input type="number" name="lunch" class="form-control" placeholder="Lunch" required="">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <label>Dinner</label>
                        <input type="number" name="dinner" class="form-control" placeholder="Dinner" required="">
                    </div>
                </div>
            </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="form-group">
                    <label>user_id</label>
                    <input type="number" name="user_id" class="form-control" placeholder="Dinner" required="">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="form-group">
                    <label>Meal rate id</label>
                    <input type="number" name="meal_rate_id" class="form-control" placeholder="meal_rate_id" required="">
                </div>
            </div>
            <div class="row bottom-row">
                <div class="col-lg-12 text-center">
                    <button class="btn-nuploy" type="submit" value="Submit">Submit</button>
                </div>
            </div>
        </div>

    </form>
@endsection