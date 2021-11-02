<!-- Url Field -->
<div class="form-group">
    {!! Form::label('url', 'Url:') !!}
    <p><img src="/{{ $photo->url }}" height="400" alt=""></p>
</div>

<!-- Liste Id Field -->
<div class="form-group">
    {!! Form::label('liste_id', 'Liste Id:') !!}
    <p>{{ $photo->liste_id }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $photo->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $photo->updated_at }}</p>
</div>

