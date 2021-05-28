<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $expense->id }}</p>
</div>

<!-- Title Field -->
<div class="form-group">
    {!! Form::label('title', 'Title:') !!}
    <p>{{ $expense->title }}</p>
</div>

<!-- Amount Field -->
<div class="form-group">
    {!! Form::label('amount', 'Amount:') !!}
    <p>{{ $expense->amount }}</p>
</div>

<!-- Owner Field -->
<div class="form-group">
    {!! Form::label('owner', 'Owner:') !!}
    <p>{{ $expense->owner }}</p>
</div>
<!-- Owner Field -->
<div class="form-group">
    {!! Form::label('createdAt', 'Created At:') !!}
    <p>{{ $expense->createdAt }}</p>
</div>

