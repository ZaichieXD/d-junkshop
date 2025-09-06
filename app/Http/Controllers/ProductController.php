<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('admin_views.inventory',compact('products'));
    }

    public function home(){
        $products = Product::paginate(25);
        return view('user_views.home',compact('products'));
    }

    public function purchase(Request $request, $id)
    {
        // Validate the incoming request
        $validated = $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        // Find the product
        $product = Product::findOrFail($id);

        // Check if there’s enough stock
        if ($product->stock < $validated['quantity']) {
            return redirect()->back()->with('error', 'Not enough stock available.');
        }

        // Decrease the stock by the quantity requested
        $product->decrement('stock', $validated['quantity']);

        return redirect()->back()->with('success', 'Purchase successful!');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.inventory-create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
        'name'  => 'required|string|max:255',
        'stock' => 'required|integer|min:0',
        'price' => 'required|numeric|min:0',
        ]);

        Product::create($validated);

        return redirect()->route('admin.inventory')->with('success', 'Product added successfully!');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        
        // Validate the incoming request
        $validated = $request->validate([
            'name'  => 'required|string|max:255',
            'stock' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
        ]);

        // Find the product
        $product = Product::findOrFail($id);

        // Update with validated data
        $product->update([
            'name'  => $validated['name'],
            'stock' => $validated['stock'],
            'price' => $validated['price'],
        ]);

        return redirect()->back()->with('success', 'Product updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product, $id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->back()->with('success', 'Product deleted successfully!');
    }
}
