<!-- Url Field -->
<div class="form-group col-md-6">
    {!! Form::label('url', 'Url:') !!}
    {!! Form::file('url', array('accept' => 'image/*')) !!}
</div>
<div class="clearfix"></div>

<!-- Liste Id Field -->
<div class="form-group col-md-6">
    {!! Form::label('liste_id', 'Liste:') !!}
    {!! Form::select('liste_id', $listes, null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-md-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('admin.photos.index') }}" class="btn btn-secondary">Cancel</a>
</div>
