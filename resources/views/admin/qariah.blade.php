@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @component('components.menu')
        @endcomponent
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">Qariah</div>
                <div class="panel-body">
                    <a href="{{ url('admin/qariah/create') }}" class="btn btn-primary">Add Qariah</a>
                    <a href="#" class="btn btn-success">Upload Excel</a>
                </div>

                <table class="table">
                        <tr>
                            <th>#</th>
                            <th>Code</th>
                            <th>Name</th>
                            <th>Region</th>
                            <th>Options</th>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>M838</td>
                            <td>Kerteh</td>
                            <td>Eastern</td>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a href="#" data-toggle="modal" data-target="#editqariah">Edit</a></li>
                                        <li><a href="#" data-toggle="modal" data-target="#removeqariah">Remove</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>M808</td>
                            <td>KVDT</td>
                            <td>Central</td>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a href="#" data-toggle="modal" data-target="#editqariah">Edit</a></li>
                                        <li><a href="#" data-toggle="modal" data-target="#removeqariah">Remove</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    </table>
            </div>
        </div>
    </div>
</div>

<!-- edit qariah -->
<div class="modal fade" data-keyboard="false" data-backdrop="static" id="editqariah" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h5 class="modal-title">Edit Qariah</h5>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

<!-- remove qariah -->
<div class="modal fade" data-keyboard="false" data-backdrop="static" id="removeqariah" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h5 class="modal-title">Remove Qariah</h5>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

@endsection