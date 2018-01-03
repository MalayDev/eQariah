@extends('layouts.app')

@section('content')
<div class="container">
    <a class="btn btn-default btn-sm" href="{{ url('admin/qariah') }}">Back</a>
         <div class="page-header"><h1>Add Qariah</h1></div>
        {!! Form::open(['action' => 'AdminController@store', 'method' => 'POST']) !!}
       
            <div class="row">
                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">Part A: Qariah Details</div>
                        <div class="panel-body">
                        
                            <div class="form-group">
                                {{Form::label('fullname', 'Full Name')}}
                                {{Form::text('fullname', '', ['class' => 'form-control', 'placeholder' => 'Full Name'])}}
                            </div>
                            <div class="form-group">
                                {{Form::label('ic', 'IC. Number')}}
                                {{Form::number('ic', '', ['class' => 'form-control', 'placeholder' => 'IC. Number'])}}
                            </div>
                            <div class="form-group">
                                {{Form::label('age', 'Age')}}
                                {{Form::number('age', '', ['class' => 'form-control', 'placeholder' => 'Age'])}}
                            </div>
                            <div class="form-group">
                                {{Form::label('pnumber', 'Phone Number')}}
                                {{Form::number('pnumber', '', ['class' => 'form-control', 'placeholder' => 'Phone Number'])}}
                            </div>   
                            <div class="form-group">
                                {{Form::label('hnumber', 'Home Number')}}
                                {{Form::number('hnumber', '', ['class' => 'form-control', 'placeholder' => 'Home Number'])}}
                            </div> 
                            
                            <div class="form-group">
                                {{Form::label('martial', 'Martial Status', ['class' => 'radio'])}}
                            
                                {{Form::radio('married', 'Married')}}
                                {{Form::label('married', 'Married', ['class' => 'radio-inline'])}}
                                &nbsp;
                                {{Form::radio('notmarried', 'Not Married')}}
                                {{Form::label('notmarried', 'Not Married', ['class' => 'radio-inline'])}}
                            
                            </div>
                            <div class="form-group">
                                {{Form::label('email', 'Email (if any)')}}
                                {{Form::text('email', '', ['class' => 'form-control', 'placeholder' => 'Email'])}}
                            </div>
                            <div class="form-group">
                                {{Form::label('address', 'Address')}}
                                {{Form::textarea('fullname', '', ['class' => 'form-control', 'placeholder' => 'Address...'])}}
                            </div>
                            <div class="form-group">
                                {{Form::label('postcode', 'Postcode')}}
                                {{Form::number('postcode', '', ['class' => 'form-control', 'placeholder' => 'Postcode'])}}
                            </div>
                            <div class="form-group">
                                {{Form::label('state', 'State')}}
                                {{Form::select('state', ['Selangor' => 'Selangor'], null, ['class' => 'form-control', 'placeholder' => 'Select State...'])}}
                            </div>
                            <div class="form-group">
                                {{Form::label('city', 'City')}}
                                {{Form::select('city', ['Shah Alam' => 'Shah Alam'], null, ['class' => 'form-control', 'placeholder' => 'Select City...'])}}
                            </div>
                            <div class="form-group">
                                {{Form::label('residenceperiod', 'Residence Period')}}
                                {{Form::text('rperiod', '', ['class' => 'form-control', 'placeholder' => 'Year + Month'])}}
                            </div>

                        </div>
                    </div>
                </div> 
                <div class="col-md-6">
                    <div class="panel panel-default">
                    <div class="panel-heading">Part B: Qariah Verification</div>
                        <div class="panel-body">
                            <div class="form-group">
                                {{Form::label('nremarks', 'Nazir Remarks')}}
                                {{Form::textarea('nremarks', '', ['class' => 'form-control', 'placeholder' => 'Nazir Remarks...'])}}
                            </div>
                            <div class="form-group">
                                {{Form::label('nazir_verify_date', 'Verify Date (Nazir)')}}
                                {{Form::date('nazir_verify_date', \Carbon\Carbon::now(), ['class' => 'form-control'])}}
                            </div>
                            <hr>
                            <div class="form-group">
                                {{Form::label('hvremarks', 'Head Village Remarks')}}
                                {{Form::textarea('hvremarks', '', ['class' => 'form-control', 'placeholder' => 'Head Village Remarks...'])}}
                            </div>
                            <div class="form-group">
                                {{Form::label('hv_verify_date', 'Verify Date (Head Village)')}}
                                {{Form::date('hv_verify_date', \Carbon\Carbon::now(), ['class' => 'form-control'])}}
                            </div>
                            <hr>
                            {{Form::submit('Register Qariah', ['class' => 'btn btn-primary btn-lg btn-block'])}}
                        </div>
                    </div>
                    
                </div>



            </div>
        {!! Form::close() !!}    
</div>
@endsection