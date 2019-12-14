<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;
use App\TransactionDetails;

class TransactionsController extends Controller
{
  /**
   * Display a listing of the transaction.
   *
   * @return \Illuminate\Http\Response
   */
  public function index() {
    $transactions = Transaction::all();
//    $transaction = $transactions->load('transactionDetails');
//    $transactionDetails = $transaction->transactionDetails;
    $transactionDetails = TransactionDetails::all();
    return view('transactions.index')->with(compact('transactions', 'transactionDetails'));
  }
}
