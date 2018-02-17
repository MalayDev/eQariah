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
                                            <a href="{{ url('admin/qariah/create') }}" class="btn btn-primary">Register Qariah</a>
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
                                        <button type="button" class="btn btn-warning btn-xs try" id="{{ $user->id }}">Details</button>
                                        <a class="btn btn-success btn-xs" href="{{ route('admin.qariah_show', $user->id) }}" role="button">Update</a>
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

<div class="modal fade" data-keyboard="false" data-backdrop="static" id="showmodal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h5 class="modal-title">Qariah Details</h5>
                </div>
                <div class="modal-body">
    
    
                    <form class="form-horizontal">
                        <fieldset>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">Name</label>
                                    <input type="text" class="form-control" placeholder="null" id="name" readonly>    
                                </div>
                        
                                <div class="form-group">
                                    <label class="control-label">I/C</label>
                                    <input type="text" class="form-control" placeholder="null" id="ic" readonly>
                                </div>
                            
                                <div class="form-group">
                                    <label class="control-label">Home</label>
                                    <input type="text" class="form-control" placeholder="null" id="phone_home" readonly>
                                </div>
        
                                <div class="form-group">
                                    <label class="control-label">Mobile</label>
                                    <input type="text" class="form-control" placeholder="null" id="phone_mobile" readonly>
                                </div>
        
                                <div class="form-group">
                                    <label class="control-label">Marital Status</label>
                                    <input type="text" class="form-control" placeholder="null" id="marital_status" readonly>
                                </div>
                            </div>

                        </fieldset>
                    </form>
    
    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    
        
{{--  
<div class="container">
@component('components.breadcumb')
@endcomponent
    <div class="row">
        @component('components.menu')
        @endcomponent
        <div class="col-md-9">
            <div class="panel panel-primary">
                <div class="panel-heading">Qariah</div>
                <div class="panel-body">
                    
                    <div class="row">
                        
                        <div class="col-md-8">
                            <a href="{{ url('admin/qariah/create') }}" class="btn btn-primary">Add Qariah</a>
                            <a href="{{ url('admin/qariah/upload') }}" class="btn btn-success">Upload Excel</a>
                        </div>
                        
                        <div class="col-md-4">
                            <input class="form-control" id="myInput" type="text" placeholder="Search..">
                        </div>    
                        
                    </div>  
                  

                   
                </div>
                
                <table class="table" id="myTable">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>IC</th>
                            <th>Options</th>
                        </tr>
                @if(count($users) > 0)
                        <!--?php $counter = 1; ?-->
                        @foreach($users as $user)
                        <tr>
                            <td>{{$counter++}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->ic}}</td>
                            <td>
                                <button type="button" class="btn btn-warning btn-xs try" id="{{ $user->id }}">Details</button>
                                <a class="btn btn-success btn-xs" href="{{ route('admin.qariah_show', $user->id) }}" role="button">Update</a>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                @else
                    <tr><td colspan="4"><p align="center">No Record founds !!</p></td></tr>
                @endif
            </div>
        </div>
    </div>
</div>




<div class="modal fade" data-keyboard="false" data-backdrop="static" id="showmodal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h5 class="modal-title">Qariah Details</h5>
            </div>
            <div class="modal-body">


                <form class="form-horizontal">
                    <fieldset>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Name</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" placeholder="null" id="name" readonly>
                                </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label">Ic</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" placeholder="null" id="ic" readonly>
                                </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label">Home No.</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" placeholder="null" id="phone_home" readonly>
                                </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label">Mob No.</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" placeholder="null" id="phone_mobile" readonly>
                                </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label">Marital Status</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" placeholder="null" id="marital_status" readonly>
                                </div>
                        </div>

                    </fieldset>
                </form>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
   
    $(document).on('click','.try', function(){
        var id = $(this).attr('id');
        
            $.ajax({
            type: "POST",
            url: '{{ route('show_details') }}',
            data: {id:id},
            dataType:'json',
            success: function(data){
                
                console.log(data);
                $('#showmodal').modal('show');
                $('#name').val(data.name);
                $('#ic').val(data.ic);
                $('#marital_status').val(data.marital_status);
                $('#phone_home').val(data.phone_home);
                $('#phone_mobile').val(data.phone_mobile);
                
            }
        });
    });
    
    $(document).ready(function(){
        $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>--}}
@endsection

@section('script')
<script>
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(document).on('click','.try', function(){
    var id = $(this).attr('id');
    
        $.ajax({
        type: "POST",
        url: '{{ route('show_details') }}',
        data: {id:id},
        dataType:'json',
        success: function(data){
            
            console.log(data);
            $('#showmodal').modal('show');
            $('#name').val(data.name);
            $('#ic').val(data.ic);
            $('#marital_status').val(data.marital_status);
            $('#phone_home').val(data.phone_home);
            $('#phone_mobile').val(data.phone_mobile);
            
        }
    });
});

$(document).ready(function(){
    $("#myInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#myTable tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
});
        </script>

        <!-- Footable -->
        <script src="{{ asset('js/footable/footable.all.min.js') }}"></script>
        <script src="{{ asset('js/footable/bootstrap-select.min.js') }}" type="text/javascript"></script>
        <!--FooTable init-->
        <script src="{{ asset('js/footable/footable-init.js') }}"></script>
@endsection

