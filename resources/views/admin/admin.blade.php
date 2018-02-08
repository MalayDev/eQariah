@extends('layouts.app')

@section('content')
<div class="container">
    @component('components.breadcumb')
    @endcomponent

    <div class="row">


    @component('components.menu')
    @endcomponent
                


        <div class="col-md-9">

            <div class="row">
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-aqua">
                            <div class="inner">
                                <h3>150</h3>
                
                                <p>Mosque</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-moon-o"></i><i class="fa fa-star-o"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->

                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-green">
                            <div class="inner">
                                <h3>150</h3>
                
                                <p>Qariah</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-users"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->

                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-yellow">
                            <div class="inner">
                                <h3>150</h3>
                
                                <p>User Registration</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-user-plus"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->

                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-red">
                            <div class="inner">
                                <h3>150</h3>
                
                                <p>Unique Visitors</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-pie-chart"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->      
            </div>
            <!-- /.row -->


            <div class="panel panel-primary">
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
