<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\History;

class HistoryController extends Controller
{
    public function index()
    {
        $histories = History::latest()->get();
        return view('history.index', compact('histories'));
    }
}