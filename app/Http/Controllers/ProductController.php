<?php

namespace App\Http\Controllers;

use App\Models\App\Product;
use App\Models\Unit;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with('productDetail')->paginate(10);

        return view('app.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $units = Unit::all();

        return view('app.product.add', compact('units'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validacao
        $regras = [
            'name' => 'required|min:3|max:40',
            'description' => 'required|min:3|max:200',
            'weight' => 'required|integer',
            'unit_id' => 'required|exists:units,id'
        ];

        $feedback = [
            'required' => 'O campo :attribute deve ser preenchida',
            'name.min' => 'O campo nome deve ter no mínimo 3 caracteres',
            'name.max' => 'O campo nome deve ter no máximo 40 caracteres',
            'description.min' => 'O campo :attribute deve ter no mínimo 3 caracteres',
            'description.max' => 'O campo :attribute deve ter no máximo 200 caracteres',
            'weight.integer' => 'O campo peso deve ser um inteiro',
            'unit_id.exists' => 'O campo unidade não existe',
        ];

        $request->validate($regras, $feedback);

        Product::create($request->all());

        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('app.product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $units = Unit::all();

        return view('app.product.add', compact('units', 'product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
        $product->update($request->all());
        return redirect()->route('product.show', compact('product'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
        // dd($product);
        $product->delete();
        return redirect()->route('products.index');
    }
}
