<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    // BAGIAN USER BIASA
    public function index()
    {
        $tickets = Ticket::where('user_id', Auth::id())->orderBy('created_at', 'desc')->get();
        return view('support.index', compact('tickets'));   
    }

    public function store(Request $request)
    {
        $request->validate([
            'subject' => 'required|string',
            'message' => 'required|string'
        ]);

        Ticket::create([
            'user_id' => Auth::id(),
            'subject' => $request->subject,
            'message' => $request->message,
            'status' => 'open'
        ]);

        return back()->with('success', 'Laporan berhasil dikirim! Tim kami akan segera menindaklanjutinya.');
    }

    // BAGIAN KHUSUS ADMIN
    public function adminIndex()
    {
        if (Auth::user()->role !== 'admin') {
            return redirect('/home')->with('error', 'Unauthorized');
        }


        $all_tickets = Ticket::with('user')->orderBy('created_at', 'desc')->get();
        return view('support.admin', compact('all_tickets'));
    }

    public function resolve($id)
    {

        if (Auth::user()->role !== 'admin') {
            return back()->with('error', 'Unauthorized');
        }

        $ticket = Ticket::findOrFail($id);
        $ticket->status = 'resolved';
        $ticket->save();

        return back()->with('success', 'Ticket berhasil diselesaikan!');
    }
}