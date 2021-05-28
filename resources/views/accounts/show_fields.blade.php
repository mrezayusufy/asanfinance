<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $account->id }}</p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('Name', 'Name:') !!}
    <p>{{ $account->Name }}</p>
</div>

<!-- Type Field -->
<div class="form-group">
    {!! Form::label('Type', 'Type:') !!}
    <p>{{ $account->Type }}</p>
</div>

<!-- Amount Field -->
<div class="form-group">
    {!! Form::label('Amount', 'Amount:') !!}
    <p>{{ $account->Amount }}</p>
</div>

<!-- Currency Field -->
<div class="form-group">
    {!! Form::label('Currency', 'Currency:') !!}
    <p>{{ $account->Currency }}</p>
</div>

