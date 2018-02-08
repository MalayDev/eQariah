@extends('layouts.app')

@section('content')
<div class="container">
    @component('components.breadcumb')
    @endcomponent
    <div class="row">
        @component('components.menu')
        @endcomponent

        <div class="col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">Profile</div>

                <div class="panel-body">
                    <form>
                        <div class="form-group">
                            {{--  name  --}}
                            <label for="name" class="control-label">Name</label>
                            <input id="name" type="text" class="form-control" name="name" value="{{$admin->name}}" required autofocus disabled>
                            {{--  end name  --}}
                        </div>
                        
                        <div class="form-group">
                            {{--  email  --}}
                            <label for="email" class="control-label">E-Mail Address</label>
                            <input id="email" type="email" class="form-control" name="email" value="{{$admin->email}}" required disabled>
                            {{--  end email  --}}
                        </div>

                        <div class="form-group">
                            {{--  address  --}}
                            <label for="address" class="control-label">Address</label>
                            <input id="address" type="text" class="form-control" name="address" value="{{$admin->address}}" required disabled>
                            {{--  end address  --}}
                        </div>
                        
                        <div class="form-group">
                            {{--  postcode  --}}
                            <label for="postcode" class="control-label">Postcode</label>
                            <input id="postcode" type="text" class="form-control" name="postcode" value="{{$admin->postcode}}" required disabled>
                            {{--  end postcode  --}}
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                {{--  city  --}}
                                <label for="city" class="control-label">City</label>
                                <input id="city" type="text" class="form-control" name="city" value="{{$admin->city}}" required disabled>
                                {{--  end city  --}}
                            </div>

                            <div class="form-group col-md-6">
                                {{--  state  --}}
                                <label for="state" class="control-label">State</label>
                                <input id="state" type="text" class="form-control" name="state" value="{{$admin->state}}" required disabled>
                                {{--  end state  --}}
                            </div>
                            
                            
                        </div>
                                
                    </form>      
                </div>
            </div>
        </div>

        <div class="col-md-3">
                <div class="panel panel-primary">
                    <div class="panel-heading">Profile Picture</div>
                        
                    <div class="panel-body">
                            <div class="row">
                                <img  class="col-md-12" style="width:100%" src="{{ asset('storage/admin_images/'.$admin->image) }}">
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-12">
                                    <a href="#" class="col-md-12 btn btn-default">Upload Picture</a>
                                </div>
                            </div>
                            
                    </div>
                <div>
        <div>
    </div>
</div>
@endsection