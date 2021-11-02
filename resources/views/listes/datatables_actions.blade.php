{!! Form::open(['route' => ['admin.listes.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>
    <a href="{{ route('admin.listes.show', $id) }}" class='btn btn-ghost-success'>
       <i class="fa fa-eye"></i>
    </a>
    @if (Auth::user()->email == 'challengesh.info@gmail.com')

    <a href="{{ route('admin.listes.edit', $id) }}" class='btn btn-ghost-info'>
        <i class="fa fa-edit"></i>
    </a>
    {!! Form::button('<i class="fa fa-trash"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-ghost-danger',
        'onclick' => "return confirm('Are you sure?')"
    ]) !!}

@endif
</div>
{!! Form::close() !!}
