@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">User Dashboard</div>

                <!-- <div class="panel-body">
                    @component('components.who')
                    @endcomponent 
                </div> -->
                @if(count($user) > 0)
                <table class="table">
                    <tr>
                        <th>Name</th>
                        <td>{{ $user->name }}</td>
                    </tr>
                    <tr>
                        <th>Ic</th>
                        <td>{{ $user->ic }}</td>
                    </tr>
                    <tr>
                        <th>Age</th>
                        <td>{{ $user->age }}</td>
                    </tr>
                    <tr>
                        <th>Address</th>
                        <td>{{ $user->address }}, {{ $user->postcode }}, {{ $user->city }}, {{ $user->state }}</td>
                    </tr>
                    <tr>
                        <th>Marital Status</th>
                        <td>{{ $user->marital_status }}</td>
                    </tr>   
                    <tr>
                        <th>Phone No.</th>
                        <td>{{ $user->phone_mobile }}</td>
                    </tr>
                    <tr>
                        <th>Home No.</th>
                        <td>{{ $user->phone_home }}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{ $user->email }}</td>
                    </tr>
                    <tr>
                        <th>Residence Period</th>
                        <td>{{ $user->residence_period }}</td>
                    </tr>
                    <tr>
                        <th>Account Created</th>
                        <td>{{ $user->created_at }}</td>
                    </tr>
                </table>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
