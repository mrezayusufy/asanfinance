<?php

namespace App\Http\Controllers;

use App\DataTables\TransactionDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateTransactionRequest;
use App\Http\Requests\UpdateTransactionRequest;
use App\Models\Transaction;
use Flash;
use Carbon\Carbon;
use Response;
use App\Http\Controllers\AppBaseController;
use Illuminate\Support\Facades\Http;
use Binance\API;
use DateTime;
use DateTimeZone;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the Transaction.
     *
     * @param TransactionDataTable $transactionDataTable
     * @return Response
     */
    
    protected $transaction;
    public function __construct(Transaction $transaction){
        if (setting('email_verification')) {
            $this->middleware(['verified']);
        }
        $this->transaction = $transaction;
        $this->middleware(['auth','web','role:admin','2fa']);
    }
    public function index() {
        $api = config('app.auth');
        $key = $api['key'];
        $secret = $api['secret'];
        $transactions = Transaction::all();
        $binance = new \Binance\API($key, $secret);
        $depositHistory = $binance->depositHistory();
        $withdrawHistory = $binance->withdrawHistory();
        
        // dd($binance->depositHistory());
        // dd($binance->accountSnapshot('SPOT'));
        // dd($transactions);
        $this->sync();
        return view('transactions.index', [
            'transactions' => $transactions
            ]);
        }
    public function sync(){
        $api = config('app.auth');
        $key = $api['key'];
        $secret = $api['secret'];
        $binance = new \Binance\API($key, $secret);
        $depositHistory = $binance->depositHistory();
        $withdrawHistory = $binance->withdrawHistory();
        $transactions = array();
        $format = 'Y-m-d H:i:s';
         
        // dd($withdrawHistory);
        foreach ($depositHistory['depositList'] as $i) {
            $time = $i['insertTime'];
            $date = new DateTime(Carbon::parse($time/1000));
            Transaction::firstOrCreate([
                'date' => $date, 
                'amount' => $i['amount'], 
                'address' => $i['address'],
                'coin' => $i['asset'], 
                'txId' => $i['txId'], 
                'type' => 'deposit', 
            ]);
        }
        foreach ($withdrawHistory['withdrawList'] as $i) {
            $applyTime = $i['applyTime'];
            $date = new DateTime(Carbon::parse($applyTime/1000));
            Transaction::firstOrCreate([
                'date' => $date, 
                'amount' => $i['amount'], 
                'address' => $i['address'],
                'coin' => $i['asset'], 
                'txId' => $i['txId'], 
                'type' => 'withdrawal', 
            ]);
        }
    } 
    /**
     * Show the form for creating a new Transaction.
     *
     * @return Response
     */
    public function create()
    {
        return view('transactions.create');
    }

    /**
     * Store a newly created Transaction in storage.
     *
     * @param CreateTransactionRequest $request
     *
     * @return Response
     */
    public function store(CreateTransactionRequest $request)
    {
        $input = $request->all();
        $input['date'] = Carbon::now();
        /** @var Transaction $transaction */
        $transaction = Transaction::create($input);

        Flash::success('Transaction saved successfully.');

        return redirect(route('transactions.index'));
    }

    /**
     * Display the specified Transaction.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Transaction $transaction */
        $transaction = Transaction::find($id);

        if (empty($transaction)) {
            Flash::error('Transaction not found');

            return redirect(route('transactions.index'));
        }

        return view('transactions.show')->with('transaction', $transaction);
    }

    /**
     * Show the form for editing the specified Transaction.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var Transaction $transaction */
        $transaction = Transaction::find($id);

        if (empty($transaction)) {
            Flash::error('Transaction not found');

            return redirect(route('transactions.index'));
        }

        return view('transactions.edit')->with('transaction', $transaction);
    }
 
    public function update(Request $request, $id)
    {
        /** @var Transaction $transaction */
        $transaction = Transaction::find($id);

        if (empty($transaction)) {
            Flash::error('Transaction not found');

            return redirect(route('transactions.index'));
        }

        $transaction->fill($request->all());
        $transaction->save();

        Flash::success('Transaction updated successfully.');

        return redirect(route('transactions.index'));
    }

    /**
     * Remove the specified Transaction from storage.
     *
     * @param  int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Transaction $transaction */
        $transaction = Transaction::find($id);

        if (empty($transaction)) {
            Flash::error('Transaction not found');

            return redirect(route('transactions.index'));
        }

        $transaction->delete();

        Flash::success('Transaction deleted successfully.');

        return redirect(route('transactions.index'));
    }
}
