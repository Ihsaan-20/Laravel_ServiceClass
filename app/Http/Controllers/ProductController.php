<?php

namespace App\Http\Controllers;

use DataTables;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Services\ProductService;
use App\Http\Controllers\Controller;
use App\Http\Controllers\DataController;

class ProductController extends Controller
{

    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }
    
    /**
     * Display a listing of the resource.
     */
    
    public function index(Request $request)
    {

        $products = Product::latest()->get();
        return view('product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $product = new Product();
        $product->user_id = 1;
        $product->category_id = 1;
        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;

        if ($request->has('discount_type')) {
            $grandTotal = $this->productService->calculateDiscountWithTax(
                $request->discount_type,
                $request->discount,
                $request->price,
                $request->tax
            );
        } else {
            $grandTotal = $request->price;
        }

        $product->grand_total = $grandTotal;
        $product->discount_type = $request->discount_type;
        $product->discount = $request->discount;
        $product->tax = $request->tax;
        $product->status = $request->status;

        $product->save();

        // dd($product);
        flash('Message working')->success();
        flash('Message')->error();
        flash('Message')->warning();
        flash('Message')->overlay();
        // flash()->overlay('Modal Message', 'Modal Title');
        // flash('Message')->important();
        // flash('Message')->error()->important();

        return back();
        // return response()->json(['success' => 'Product saved successfully.']);
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
    public function edit($id)
    {
        $product = Product::find($id);
        return response()->json($product);
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
    public function destroy($id)
    {
        Product::find($id)->delete();
     
        return response()->json(['success'=>'Product deleted successfully.']);
    }
}
