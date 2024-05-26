<?php

namespace App\Http\Controllers;

use App\Models\App\Client;
use App\Models\App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::paginate(10);

        return view('app.order.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clients = Client::all();

        return view('app.order.add', compact('clients'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validacao
        $regras = [
            'client_id' => 'required|exists:clients,id'
        ];

        $feedback = [
            'required' => 'O campo :attribute deve ser preenchida',
            'client_id.exists' => 'O campo cliente não existe',
        ];

        $request->validate($regras, $feedback);

        Order::create($request->all());

        return redirect()->route('orders.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
