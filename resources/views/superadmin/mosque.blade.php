@extends('layouts.admin_home')

@section('content')

@component('components.breadcumb')
@endcomponent



<div class="grid-form">
    <div class="grid-form1">
        <div class="row">
            <div class="col-lg-12">
                <div class="white-box">
                        
                    <h3 class="box-title m-b-0">Mosque List</h3>
                    @if(session('success'))
                            <div class="alert alert-success alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                {{session('success')}}     
                            </div>
                    @endif
                    <div class="panel panel-default">
                            <div class="panel-heading">Mosque Information</div>
                            <div class="panel-body">
                    <table id="demo-foo-addrow" class="table table-bordered table-hover toggle-circle" data-page-size="7">
                        <thead>
                            <tr>
                                <th data-sort-initial="true" data-toggle="true">Name</th>
                                <th >Email</th>
                                <th data-sort-ignore="true" class="min-width">Action</th>
                            </tr>
                        </thead>
                        <div class="form-inline padding-bottom-15">
                            <div class="row">
                                <div class="col-sm-6 text-left m-b-20">
                                    <div class="form-group">
                                            <a href="{{ route('super.mosque_create') }}" class="btn btn-primary">Register Mosque</a>
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
                        @if(count($mosques) > 0)
                            @foreach($mosques as $mosque)
                                <tr>
                                    <td>{{$mosque->name}}</td>
                                    <td>{{$mosque->email}}</td>
                                    <td>
                                        <a href="{{ route('super.mosque_show',[$mosque->id,str_slug($mosque->name,'-')])}}" class="btn btn-xs btn-warning">View</a>
                    
                                        <a href="{{ route('super.mosque_edit',[$mosque->id,str_slug($mosque->name,'-')])}}" class="btn btn-xs btn-success">Update</a>
                                       
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





{{-- @extends('layouts.app')

@section('content')
<div class="container">
        @component('components.breadcumb')
        @endcomponent

        @if(session('success'))
                <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        {{session('success')}}     
                </div>
        @endif

        <div class="row">
            @component('components.menu')
            @endcomponent

            <div class="col-md-9">
                    <div class="panel panel-primary">
                        <div class="panel-heading clearfix">Mosque List
                                <div class="pull-right">
                                        <a class="btn btn-sm btn-default" href="{{route('super.mosque_create')}}" role="button"><i class="fa fa-plus"></i> Add Mosque</a>
                                </div>
                        </div>
        
                        <div class="panel-body">
                                <div class="table-responsive">
                                        <table class="table table-hover table-bordered table-striped datatable" style="width:100%">
                                                <thead>
                                                        <tr>
                                                                <th>Name</th>
                                                                <th>Email</th>
                                                                <th>Action</th> 
                                                        </tr>
                                                </thead>
                                        </table>
                                </div>
                        </div>
                    </div>
                </div>
        </div>
</div>

<div class="modal fade" id="confirm" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header bg-red">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><i class="fa fa-warning"></i> Delete Information</h4>
                </div>
                <div class="modal-body">
                        <p>Are you sure to delete?</p>
                </div>
                <div class="modal-footer">
                        <button type="button" class="btn btn-primary" id="delete-btn">Delete</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
                
                
                </div>
                </div>
               
        </div>
        
</div>

@endsection

@section('script')
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>

<script type="text/javascript">
        $(document).ready(function() {
            $('.datatable').DataTable({
                processing: true,
                serverSide: true,
                pageLength: 5,
                ajax: '{{ route('getMosque') }}',
                columns: [
                    {data: 'name', name: 'name'},
                    {data: 'email', name: 'email'},
                    {data: 'Action', name: 'Action', orderable: false, searchable: false}
                    
                ]
            });
        });

        //////////////////////*CALL MODAL-DELETE*///////////////////////////
        $(document).on('click', '.form-delete', function(e){
                e.preventDefault();
                var $form=$(this);
                $('#confirm').modal({ backdrop: 'static', keyboard: false })
                        .on('click', '#delete-btn', function(){
                        $form.submit();
                });
        });
        </script>
        </script>
@endsection --}}