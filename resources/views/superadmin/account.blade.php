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
                <div class="panel-heading">Change Password</div>

                <div class="panel-body">
                    <div class="col-md-6">
                        <form>
                            <div class="form-group">
                                {{--  Old password  --}}
                                <label for="old_pwd" class="control-label">Old password</label>
                                <input id="old_pwd" type="password" class="form-control" name="old_pwd" required autofocus>
                                {{--  end Old password  --}}
                            </div>
                            
                            <div class="form-group">
                                {{--  New Password  --}}
                                <label for="new_pwd" class="control-label">New Password</label>
                                <input id="new_pwd" type="password" class="form-control" name="new_pwd" required>
                                {{--  end New Password  --}}
                            </div>

                            <div class="form-group">
                                {{--  Confirm New password  --}}
                                <label for="cnew_pwd" class="control-label">Confirm New password</label>
                                <input id="cnew_pwd" type="password" class="form-control" name="cnew_pwd" required>
                                {{--  end Confirm New password  --}}
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Update Password</button>
                            </div>
                            
                                    
                        </form>     
                    </div> 
                </div>
            </div>
        </div>

    </div>
</div>
@endsection