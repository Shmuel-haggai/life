<!--<div class="table-responsive-sm">
    <table class="table table-striped" id="liens-table">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Url</th>
                <th>Liste</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @@foreach($liens as $lien)
            <tr>
                <td>@{{ /*$lien->nom }}</td>
                <td>@{{ /*$lien->url }}</td>

                <td>@{{ /*$lien->liste->nom }}</td>
                <td>
                    @{!! Form::open(['route' => ['admin.liens.destroy', $lien->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="@{{ /*route('admin.liens.show', [$lien->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>

                        @@if (Auth::user()->isAdmin())

                            <a href="@{{ /*route('admin.liens.edit', [$lien->id]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                            @{!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}

                        @@endif

                    </div>
                    @{!! Form::close() !!}
                </td>
            </tr>
        @@endforeach
        </tbody>
    </table>
</div>-->

@section('css')
    @include('layouts.datatables_css')
@endsection

{!! $dataTable->table(['width' => '100%', 'class' => 'table table-striped table-bordered']) !!}

@push('scripts')
    @include('layouts.datatables_js')
    {!! $dataTable->scripts() !!}
@endpush
