@extends('layouts.admin_master')

@section('content')
    <form method="POST" action="{{route('admin.meal_payment.store')}}">
        {{ csrf_field() }}
            <div class="row">
                <div class="col-lg-4">
                    <div class="form-group">
                        <label>Amount</label>
                        <input type="number" name="amount" value="1500" class="form-control" placeholder="amount" required="">
                    </div>

                    <div class="form-group">
                        <label>Meal Started At</label>
                        <input type="date" name="meal_started_at" value="{{ date('Y-m-d')}}" class="form-control" placeholder="meal started at" required="">
                    </div>

                    <div class="form-group">
                        <label>Meal Active Until</label>
                        <input type="date" name="meal_active_until" value="{{ date('Y-m-d', time() + 86400) }}" class="form-control" placeholder="meal active until" required="">
                    </div>

                    <div class="form-group">
                        <label>User</label>
                        <select class="form-control" id="user_id" name="user_id">
                            @foreach($users as $user)
                                <option value="{{ $user->id }}">{{ $user->full_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <button class="btn-nuploy" type="submit" value="Submit">Submit</button>
                </div>
            </div>
    </form>
@endsection