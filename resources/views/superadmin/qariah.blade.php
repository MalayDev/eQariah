@extends('layouts.admin_home')

@section('content')

@component('components.breadcumb')
@endcomponent
<div class="grid-form">
    <div class="grid-form1">
        <div class="row">
            <div class="col-lg-12">
                <div class="white-box">
                        
                    <h3 class="box-title m-b-0">Qariah List</h3>
                    @if(session('success'))
                            <div class="alert alert-success alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                {{session('success')}}     
                            </div>
                    @endif
                    <div class="panel panel-default">
                            <div class="panel-heading">Qariah Information</div>
                            <div class="panel-body">
                    <table id="demo-foo-addrow" class="table table-bordered table-hover toggle-circle" data-page-size="7">
                        <thead>
                            <tr>
                                <th data-sort-initial="true" data-toggle="true">Name</th>
                                <th data-hide="phone, tablet">I/C</th>
                                <th>Phone No.</th>
                                <th data-hide="phone, tablet">Email</th>
                                <th data-hide="phone, tablet">Status</th>
                                <th data-sort-ignore="true" class="min-width">Action</th>
                            </tr>
                        </thead>
                        <div class="form-inline padding-bottom-15">
                            <div class="row">
                                <div class="col-sm-6 text-left m-b-20">
                                    <div class="form-group">
                                            <a href="{{ route('super.qariah_create') }}" class="btn btn-primary">Register Qariah</a>
                                            <a href="{{ url('admin/qariah/upload') }}" class="btn btn-success">Upload Excel</a>
                                    </div>
                                </div>
                                <div class="col-sm-6 text-right m-b-20">
                                    <div class="form-group">
                                        <input id="demo-input-search2" type="text" placeholder="Search" class="form-control" autocomplete="on">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <tbody>
                        @if(count($users) > 0)
                            @foreach($users as $user)
                                <tr>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->ic}}</td>
                                    <td>{{$user->phone_mobile   }}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->marital_status}}</td> 
                                    <td>
                                        <a href="{{ route('super.qariah_show',[$user->ic,str_slug($user->name,'-')])}}" class="btn btn-xs btn-warning">View</a>
                                        <a href="{{ route('super.qariah_edit',[$user->ic,str_slug($user->name,'-')])}}" class="btn btn-xs btn-success">Update</a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr><td colspan="6"><p align="center">No record founds</p></td></tr>
                        @endif
                            
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="6">
                                    <div class="text-right">
                                        <ul class="pagination"> </ul>
                                    </div>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div></div></div>
            </div>
        </div>
    </div>
    
</div>
@endsection

@section('script')
        <!-- Footable -->
        <script src="{{ asset('js/footable/footable.all.min.js') }}"></script>
        <script src="{{ asset('js/footable/bootstrap-select.min.js') }}" type="text/javascript"></script>
        <!--FooTable init-->
        <script src="{{ asset('js/footable/footable-init.js') }}"></script>
@endsection




