@extends('layouts.admin_master')

@section('content')
    <form method="POST" action="{{route('admin.meal_order.store')}}">
        {{ csrf_field() }}
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label>Breakfast</label>
                        <input type="number" name="breakfast" value="1" class="form-control" placeholder="Breakfast" required="">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label>Lunch</label>
                        <input type="number" name="lunch" value="1" class="form-control" placeholder="Lunch" required="">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <label>Dinner</label>
                        <input type="number" name="dinner" value="1" class="form-control" placeholder="Dinner" required="">
                    </div>
                </div>
            </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="form-group">
                    <label>Meal rate id</label>
                    <select class="form-control" id="meal_rate_id" name="meal_rate_id">
                        @foreach($meal_rates as $meal_rate)
                            <option value="{{ $meal_rate->id }}">{{ $meal_rate->meal_rate_name }}</option>
                        @endforeach
                    </select>
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