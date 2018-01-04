@extends('layouts.app')

@section('content')
<div class="container">
    @component('components.breadcumb')
    @endcomponent

    <div class="row">


    @component('components.menu')
    @endcomponent
                


        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">Admin Dashboard</div>

                <div class="panel-body">
                        @component('components.who')
                        @endcomponent
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
