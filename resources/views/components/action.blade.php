
<table>
        <tr>
            <?php $route = Request::path();?>
            @if ($route == 'superadmin/getQariah')
                <td><a href="{{ route('super.qariah_show',[$ic,str_slug($name,'-')])}}" class="btn btn-sm btn-success" title="View"><i class="fa fa-folder-open" aria-hidden="true"></i></a></td>
                <td>&nbsp;</td>
                <td><a href="{{ route('super.qariah_edit',[$ic,str_slug($name,'-')])}}" class="btn btn-sm btn-warning" title="Update"><i class="fa fa-gear" aria-hidden="true"></i></a></td>
                <td>&nbsp;</td>
                <td>
                        {!! Form::open(['action' => ['SuperAdminController@destroy', $id], 'method' => 'POST', 'class' =>'form-inline form-delete']) !!}
                        {!! Form::hidden('id', $id) !!}
                        {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i>', ['type' => 'submit','class' => 'btn btn-sm btn-danger', 'title'=>'Delete'])!!}
                        {!! Form::close() !!}
                </td>
            {{--  @elseif ($route == 'superadmin/getMosque')  --}}
            @else
                <td><a href="{{ route('super.mosque_show',[$id,str_slug($name,'-')])}}" class="btn btn-sm btn-success" title="View"><i class="fa fa-folder-open" aria-hidden="true"></i></a></td>
                <td>&nbsp;</td>
                <td><a href="{{ route('super.mosque_edit',[$id,str_slug($name,'-')])}}" class="btn btn-sm btn-warning" title="Update"><i class="fa fa-gear" aria-hidden="true"></i></a></td>
                <td>&nbsp;</td>
                <td>
                        {!! Form::open(['action' => ['SuperAdminController@mosque_delete', $id], 'method' => 'POST', 'class' =>'form-inline form-delete']) !!}
                        {!! Form::hidden('id', $id) !!}
                        {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i>', ['type' => 'submit','class' => 'btn btn-sm btn-danger', 'title'=>'Delete'])!!}
                        {!! Form::close() !!}
                </td>
                
            @endif
        </tr>
</table>


{{--  <td>
                {!! Form::open(['action' => 'SuperAdminController@show', 'method' => 'POST']) !!}
                    {{Form::hidden('qariah_id', $id, ['class' => 'form-control', 'id' => 'qariah_id'])}}
                {{Form::button('<i class="fa fa-folder-open" aria-hidden="true"></i>', ['type' => 'submit','class' => 'btn btn-success btn-sm', 'title'=>'View'])}}

            </td>  --}}