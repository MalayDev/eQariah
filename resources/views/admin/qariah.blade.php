@extends('layouts.app')

@section('content')
<div class="container">

    @component('components.breadcumb')
    @endcomponent
        <div class="row">
            @component('components.menu')
            @endcomponent
        </div>
</div>
@endsection