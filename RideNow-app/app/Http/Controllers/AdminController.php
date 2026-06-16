<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\History;

class AdminController extends Controller
{
    public function index()    
    {
        $users = User::all();
        $histories = History::with('user')->orderBy('created_at', 'desc')->get();
        return view('admin.dashboard', compact('users', 'histories'));
    }
}
