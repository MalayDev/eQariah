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
                        <div class="panel-heading">Qariah List</div>
        
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
                ajax: '{{ route('getQariah') }}',
                columns: [
                    {data: 'name', name: 'name'},
                    {data: 'email', name: 'email'},
                    {data: 'Action', name: 'Action', orderable: false, searchable: false}
                    
                ]
            });
        });
        </script>
@endsection