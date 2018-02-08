@extends('layouts.app')

@section('content')
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
                        <?php $counter = 1; ?>
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



<!-- shoe qariah -->
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
</script>
@endsection

