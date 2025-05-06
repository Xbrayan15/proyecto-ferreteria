<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\User;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function index()
    {
        $addresses = Address::with('user')->get();
        return view('addresses.index', compact('addresses'));
    }

    public function create()
    {
        $users = User::all();
        return view('addresses.create', compact('users'));
    }

    public function store(Request $request)
    {
        \Log::info('Store method called with data: ', $request->all());

        $request->validate([
            'user_id' => 'required|exists:users,id',
            'nombre' => 'nullable|string|max:100',
            'calle' => 'required|string|max:255',
            'barrio' => 'required|string|max:255',
            'ciudad' => 'required|string|max:100',
            'departamento' => 'required|string|max:100',
            'codigo_postal' => 'required|string|max:10',
            'pais' => 'required|string|max:100',
        ]);

        $address = Address::create($request->all());

        \Log::info('Address created successfully: ', $address->toArray());

        return redirect()->route('addresses.index')->with('success', 'Dirección creada correctamente.');
    }

    public function show(Address $address)
    {
        return view('addresses.show', compact('address'));
    }

    public function edit(Address $address)
    {
        $users = User::all();
        return view('addresses.edit', compact('address', 'users'));
    }

    public function update(Request $request, Address $address)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'nombre' => 'nullable|string|max:100',
            'calle' => 'required|string|max:255',
            'barrio' => 'required|string|max:255',
            'ciudad' => 'required|string|max:100',
            'departamento' => 'required|string|max:100',
            'codigo_postal' => 'required|string|max:10',
            'pais' => 'required|string|max:100',
        ]);

        $address->update($request->all());

        return redirect()->route('addresses.index')->with('success', 'Dirección actualizada correctamente.');
    }

    public function destroy(Address $address)
    {
        $address->delete();

        return redirect()->route('addresses.index')->with('success', 'Dirección eliminada correctamente.');
    }
}