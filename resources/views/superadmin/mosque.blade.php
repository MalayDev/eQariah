@extends('layouts.app')

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
                        <div class="panel-heading">Mosque List</div>
        
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
                <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
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
@endsection