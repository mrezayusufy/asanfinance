<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $post->id }}</p>
</div>

<!-- Post Title Field -->
<div class="form-group">
    {!! Form::label('post_title', 'Post Title:') !!}
    <p>{{ $post->post_title }}</p>
</div>

<!-- Post Category Id Field -->
<div class="form-group">
    {!! Form::label('post_category_id', 'Post Category Id:') !!}
    <p>{{ $post->post_category_id }}</p>
</div>

<!-- Post Content Field -->
<div class="form-group">
    {!! Form::label('post_content', 'Post Content:') !!}
    <p>{{ $post->post_content }}</p>
</div>

