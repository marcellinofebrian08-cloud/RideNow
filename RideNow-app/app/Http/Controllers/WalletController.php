<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wallet;
use App\Models\History;
use Illuminate\Support\Facades\Auth;

class WalletController extends Controller
{
    public function index()
    {
        $userId = Auth::id();

        $wallet = Wallet::firstOrCreate(
            ['user_id' => $userId],
            ['balance' => 0]
        );

        return view('wallet.index', compact('wallet'));
    }

    public function topup(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:1000'
        ]);

        $userId = Auth::id();

        $wallet = Wallet::firstOrCreate(
            ['user_id' => $userId],
            ['balance' => 0]
        );

        $wallet->balance = $wallet->balance + $request->amount;
        $wallet->save();

        History::create([
            'user_id' => $userId,
            'transaction_type' => 'Top Up Wallet',
            'description' => 'Top up saldo wallet',
            'amount' => $request->amount,
            'status' => 'Success'
        ]);
        
        return redirect()->route('wallet.index')->with('success', 'Top up berhasil');
    }
}