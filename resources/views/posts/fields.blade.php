<!-- Post Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('post_title', 'Post Title:') !!}
    {!! Form::text('post_title', null, ['class' => 'form-control']) !!}
</div>

<!-- Post Category Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('post_category_id', 'Post Category Id:') !!}
    {!! Form::text('post_category_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Post Content Field -->
<div class="form-group col-sm-6">
    {!! Form::label('post_content', 'Post Content:') !!}
    {!! Form::text('post_content', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('posts.index') }}" class="btn btn-secondary">Cancel</a>
</div>
