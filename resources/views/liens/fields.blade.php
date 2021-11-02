<!-- Url Field -->
<div class="form-group col-sm-6">
    {!! Form::label('url', 'Url:') !!}
    {!! Form::text('url', null, ['class' => 'form-control']) !!}
</div>

<!-- Nom Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nom', 'Nom:') !!}
    {!! Form::text('nom', null, ['class' => 'form-control']) !!}
</div>

<!-- Liste Id Field -->
<div class="form-group col-md-6">
    {!! Form::label('liste_id', 'Liste:') !!}

    <br />

    <label for="all-listes">Toutes les listes</label>
    <input type="checkbox" name="all_listes" class="checkbox" id="all-listes">

    {!! Form::select('liste_id', $listes, null, ['class' => 'form-control']) !!}
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('admin.liens.index') }}" class="btn btn-secondary">Cancel</a>
</div>
