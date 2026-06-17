<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{
    // Menampilkan daftar alamat
    public function index()
    {
        $addresses = Address::where('user_id', Auth::id())->get();
        return view('address.index', compact('addresses'));
    }

    // Menyimpan alamat baru
    public function store(Request $request)
    {
        $request->validate([
            'label' => 'required|string',
            'full_address' => 'required|string'
        ]);

        Address::create([
            'user_id' => Auth::id(),
            'label' => $request->label,
            'full_address' => $request->full_address
        ]);

        return back()->with('success', 'Alamat berhasil disimpan!');
    }

    // Menghapus alamat
    public function destroy($id)
    {
        $address = Address::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        $address->delete();

        return back()->with('success', 'Alamat berhasil dihapus!');
    }
}
