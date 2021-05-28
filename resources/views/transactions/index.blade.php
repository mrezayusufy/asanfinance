@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Transactions</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
             @include('flash::message')
             <div class="row">
                 <div class="col-lg-12">
                     <div class="card">
                         <div class="card-header">
                             <i class="fa fa-align-justify"></i>
                             Transactions
                             <a class="pull-right" href="{{ route('transactions.create') }}"><i class="fa fa-plus-square fa-lg"></i></a>
                         </div>
                         <div class="card-body">
                              <div class="row">
                                 
                                <div class="col-md-12">
                                <div class="table-responsive no-padding ">
                                <table id="dataTable" class="table table-striped table-hover">
                                <thead style="border:0.5px solid gray;">
                                    <tr>
                                        <th class="" rowspan="2" style="border:0.5px solid gray;">{{__('ID')}}</th>
                                        <th colSpan="3" class="">{{__('Transaction')}}</th>
                                        <th class="" colspan="2">{{__('Total')}}</th>
                                        <th class="" colspan="2">{{__('Cash')}}</th>
                                        <th class="" colspan="2">{{__('Account')}}</th>
                                        <th class="" colspan="2">{{__('Customer')}}</th>
                                        <th class=""></th>
                                        <th class=""></th>
                                        
                                    </tr>
                                    <tr>
                                        <th class="">{{__('Type')}}</th>
                                        <th class="">{{__('Amount')}}</th>
                                        <th class="">{{__('Coin')}}</th>
                                        <th class="">{{__('Percentage')}}</th>
                                        <th class="">{{__('Total')}}</th>
                                        <th class="">{{__('Cash')}}</th>
                                        <th class="">{{__('Amount')}}</th>
                                        <th class="">{{__('Account')}}</th>
                                        <th class="">{{__('Amount')}}</th>
                                        <th class="">{{__('Custotmer')}}</th>
                                        <th class="">{{__('Amount')}}</th>
                                        <th class="" rowspan="2">{{__('Date')}}</th>
                                        <th class="" rowspan="2">{{__('Action')}}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($transactions as $transaction)
                                <tr>
                                    <td>{{$transaction->id}}</td>
                                    <td>{{$transaction->type}}</td>
                                    <td>{{$transaction->amount}}</td>
                                    <td>{{$transaction->coin}}</td>
                                    <td>{{$transaction->percentage}}%</td>
                                    <td>{{$transaction->total}}</td>
                                    <td>{{$transaction->cash->name ?? '-'}}</td>
                                    <td>{{$transaction->cash->currency ?? '-'}}{{$transaction->cash_amount}}</td>
                                    <td>{{$transaction->account->Name ?? "-"}}</td>
                                    <td>{{$transaction->account->Currency ?? '-'}} {{$transaction->account_amount ?? '-'}}</td>
                                    <td>{{$transaction->customer->Name ?? ''}}</td>
                                    <td>{{$transaction->customer->Amount ?? ''}}</td>
                                    <td>{{date('M d, Y',strtotime($transaction->date))}}</td>
                                    <td>
                                    <div class="col-md-12">
                                        <div class="row">
                                        <div class="mx-1">
                                            <a href="/transactions/{{$transaction->id}}"><button class="btn btn-info" data-toggle="tooltip"  data-placement="bottom" title="{{__('app.view_transaction')}}"/><i class="fa fa-eye text-white"></i></button></a>
                                        </div>
                                        <div class="mx-1">
                                            <a href="/transactions/{{$transaction->id}}/edit"><button class="btn btn-info" data-toggle="tooltip"  data-placement="bottom" title="{{__('app.edit_transaction')}}"/><i class="fa fa-edit text-white"></i></button></a>
                                        </div>
                                        <div class="mx-1">
                                            <form action="/transactions/{{$transaction->id}}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-danger" data-toggle="tooltip"  data-placement="bottom" title="{{__('app.delete_transaction')}}"/><i class='fa fa-trash text-white'></i></button>
                                            </form>
                                        </div>
                                        </div>
                                    </div>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                                </table>
                            </div>
                              <div class="pull-right mr-3">
                                     
                              </div>
                         </div>
                     </div>
                  </div>
             </div>
         </div>
    </div>
@endsection

