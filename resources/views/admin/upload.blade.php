@extends('layouts.admin_home')

@section('content')

@component('components.breadcumb')
@endcomponent

<div class="grid-form">
        <div class="grid-form1">


    @if(session('success'))
    <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        {{session('success')}}     
    </div>
    @elseif(session('warning'))
    <div class="alert alert-warning alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        {{session('warning')}}     
    </div>
    @endif
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Upload Qariah Details</div>
                <div class="panel-body">
                {!! Form::open(array('route' => 'qariah.import', 'method' => 'POST' , 'files' => 'true'))  !!}    
                        <div class="row">
                            <div class="col-md-10"> 
                                    <div class="form-group">
                                        {!! Form::label('sample_file', 'Select File to Import: ', ['class' => 'col-md-3'])  !!}
                                        
                                        <div class="col-md-9">
                                        {!! Form::file('qariah', array('class' => 'form-control')) !!}
                                        {!! $errors->first('qariah', '<p class="alert alert-danger":message></p>') !!}
                                        </div>
                                    </div>
                            </div>
                            <div class="col-md-2">
                                {!! Form::submit('Upload', ['class' => 'btn btn-success']) !!}
                            </div>
                        </div>
                   {!! Form::close()  !!}

                        <divc class="row">
                            <div class="col-md-12">
                                <a class="btn btn-primary" href="{{ route('qariah.export', ['type' => 'xls']) }}" role="button">Download - Excel xls</a>
                                <a class="btn btn-primary" href="{{ route('qariah.export', ['type' => 'xlsx']) }}" role="button">Download - Excel xlsx</a>
                                <a class="btn btn-primary" href="{{ route('qariah.export', ['type' => 'csv']) }}" role="button">Download - Excel CSV</a>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection