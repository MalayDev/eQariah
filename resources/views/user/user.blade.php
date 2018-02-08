@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="panel panel-primary">
                    <div class="panel-heading">User Picture</div>
                    <div class="panel-body">
                        <div class="row">
                            <img  class="col-md-12" style="width:100%" src="{{ asset('storage/user_images/'.$user->image) }}">
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <a href="#" class="btn btn-default btn-block">Upload Picture</a>
                            </div>
                        </div>
                    </div>
                    
            </div>
        </div>

        <div class="col-md-9">
            <div class="panel panel-primary">
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
                        <td>{{ $user->created_at->format('d M Y | h:i A') }}</td>
                    </tr>
                    <tr>
                        <th>Account Updated</th>
                        <td>{{ $user->updated_at->format('d M Y | h:i A') }}</td>
                    </tr>
                </table>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
