@extends('layouts.admin_master')

@section('content')
    <a class="btn btn-info pull-right" href="{{ route('admin.meal_payment.create') }}">Add New Payment</a>
    <h1>Meal Payments</h1>
    <div class="clearfix"></div>
    <form action="{{route('admin.meal_report.index')}}" accept-charset="UTF-8" method="get"><input name="utf8" type="hidden" value="✓">
        From:
        <input size="16" type="text" name="from_date" value="{{ empty(request()->get('from_date'))? \Carbon\Carbon::now()->startOfMonth()->format('d-m-Y') : request()->get('from_date')->format('d-m-Y') }}" class="form_datetime">

        End:
        <input size="16" type="text" name="to_date" value="{{ empty(request()->get('to_date'))? \Carbon\Carbon::now()->endOfMonth()->format('d-m-Y') : request()->get('to_date')->format('d-m-Y') }}" class="form_datetime">
        <input type="submit" value="Submit">
    </form>

    <table id="datatable" class="table table-responsive" id="users-table">
        <thead>
        <tr>
            <th>No</th>
            <th>Amount</th>
            <th>Meal Active Until</th>
            <th>Paid At</th>
            <th>User</th>
        </tr>
        </thead>
        <tbody>
            @foreach($meal_payments as $key => $meal_payment)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $meal_payment->amount }}</td>
                    <td>{{ $meal_payment->meal_active_until }}</td>
                    <td>{{ $meal_payment->created_at->format('Y-m-d') }}</td>
                    <td>{{ $meal_payment->user->full_name }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection