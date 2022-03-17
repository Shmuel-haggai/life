@section('css')
    @include('layouts.datatables_css')
@endsection

{!! $dataTable->table(['width' => '100%', 'class' => 'table table-striped table-bordered']) !!}

@push('scripts')
    @include('layouts.datatables_js')
    {!! $dataTable->scripts() !!}

    <script>
        $('#emplacement').on('change', function(e){
            $(this).closest('form').submit();
            document.location.href = "/admin/listes/"+this.value;
        });
    </script>
@endpush