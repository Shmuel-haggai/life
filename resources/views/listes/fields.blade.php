<!-- Nom Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('nom', 'Nom:') !!}
    {!! Form::textarea('nom', null, ['class' => 'form-control']) !!}
</div>

<!-- Frequence Field -->
<div class="form-group col-sm-6">
    {!! Form::label('frequence', 'Frequence:') !!}
    {!! Form::text('frequence', null, ['class' => 'form-control']) !!}
</div>

<!-- Indication Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('indication', 'Indication:') !!}
    {!! Form::textarea('indication', null, ['class' => 'form-control']) !!}
</div>

<!-- Emplacement Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('emplacement', 'Emplacement:') !!}
    {!! Form::textarea('emplacement', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('admin.listes.index') }}" class="btn btn-secondary">Cancel</a>
</div>
