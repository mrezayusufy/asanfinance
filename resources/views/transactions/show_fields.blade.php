<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $transaction->id }}</p>
</div>

<!-- Date Field -->
<div class="form-group">
    {!! Form::label('date', 'Date:') !!}
    <p>{{ $transaction->date }}</p>
</div>

<!-- Transaction Type Field -->
<div class="form-group">
    {!! Form::label('transaction_type', 'Transaction Type:') !!}
    <p>{{ $transaction->transaction_type }}</p>
</div>

<!-- Amount Field -->
<div class="form-group">
    {!! Form::label('amount', 'Amount:') !!}
    <p>{{ $transaction->amount }}</p>
</div>

<!-- Asset Field -->
<div class="form-group">
    {!! Form::label('asset', 'Asset:') !!}
    <p>{{ $transaction->asset }}</p>
</div>

<!-- Percentage Field -->
<div class="form-group">
    {!! Form::label('percentage', 'Percentage:') !!}
    <p>{{ $transaction->percentage }}</p>
</div>

<!-- Total Field -->
<div class="form-group">
    {!! Form::label('total', 'Total:') !!}
    <p>{{ $transaction->total }}</p>
</div>

<!-- Account Id Field -->
<div class="form-group">
    {!! Form::label('account_id', 'Account Id:') !!}
    <p>{{ $transaction->account_id }}</p>
</div>

<!-- Customer Id Field -->
<div class="form-group">
    {!! Form::label('customer_id', 'Customer Id:') !!}
    <p>{{ $transaction->customer_id }}</p>
</div>

<!-- Status Field -->
<div class="form-group">
    {!! Form::label('status', 'Status:') !!}
    <p>{{ $transaction->status }}</p>
</div>

