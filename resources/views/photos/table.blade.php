<div class="table-responsive-sm">
    <table class="table table-striped" id="photos-table">
        <thead>
            <tr>
                <th>Url</th>
        <th>Liste Id</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($photos as $photo)
            <tr>
                <td>
                    <img src="/{{ $photo->url }}" height="50" alt="photo">
                </td>
                <td>{{ $photo->liste->nom }}</td>
                <td>
                    {!! Form::open(['route' => ['admin.photos.destroy', $photo->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('admin.photos.show', [$photo->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>

                        @if (Auth::user()->email == 'challengesh.info@gmail.com')
                            <a class="pull-right" href="{{ route('admin.photos.create') }}"><i class="fa fa-plus-square fa-lg"></i></a>

                            <a href="{{ route('admin.photos.edit', [$photo->id]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                            {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                        @endif

                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
