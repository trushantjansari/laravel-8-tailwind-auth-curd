<?php

namespace App\Http\Controllers;
use App\Models\Account;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Requests\CreateTransactionsRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::user()->id;
        $transactions = Transaction::where('accounts.user_id', '=', $id)
        ->leftJoin('accounts', 'accounts.id', '=', 'transactions.account_id')    
        ->paginate();
        return view('transactions.index', compact('transactions'))->with('no', 1);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id = Auth::user()->id;
        $accounts = Account::where('user_id', '=', $id)->get();
        return view('transactions.create', compact('accounts'));
        
    }

    public function store(CreateTransactionsRequest $request)
    {   
        //$request->user_id = Auth::id();

        $this->validate($request, [
           
            'account_id' => 'required|numeric',
            'transaction_title' => 'required',
            'transaction_amt' => 'required|numeric',
            'transaction_type' => 'required'
        ]);

        $input = $request->all();

        $balance = Account::where('id', '=',$input['account_id'])->first()->value('account_balance');
        
        if($request['transaction_amt'] > $balance && $request['transaction_type'] == 'debit' ){
            return redirect()->route('transactions.create')->withErrors(['errors' => 'Insufficient Balance.']);
        }
        if($request['transaction_type'] == 'debit' && $request['transaction_amt'] < $balance ){
            $new_balance = $balance - $request['transaction_amt'];
            Account::where('id', '=',$input['account_id'])->update(['account_balance' => $new_balance]);
        }
        if($request['transaction_type'] == 'credit' ){
            $new_balance = $balance + $request['transaction_amt'];
            Account::where('id', '=',$input['account_id'])->update(['account_balance' => $new_balance]);
        }
        $input['user_id'] = Auth::id();;
        
        Transaction::create($input);       

        return redirect()->route('transactions.create')->with('message', 'Transaction has been done '.$balance);
    }   

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
}
