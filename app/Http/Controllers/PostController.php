<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $filter = $request->query('filter');
        // dd($filter);
        if($filter)
        {
            $products = Product::where('category', $filter)->get();

        }else{

            $products = Product::latest()->get(); // Fetch products
        }

        $categories = Product::distinct()->pluck('category');
        return view('post.index', compact('products', 'categories','filter'));
    }
    // }

    public function filter($value)
    {
        if($value == 'Science'){
            $products = Product::where('category', $value)->get();
        }elseif($value == 'Technology'){
            $products = Product::where('category', $value)->get();
        }elseif($value == 'Travel'){
            $products = Product::where('category', $value)->get();
        }elseif($value == 'Food'){
            $products = Product::where('category', $value)->get();
        }elseif($value == 'Fashion'){
            $products = Product::where('category', $value)->get();
        }

        return response()->json($products);
    }

    public function checkStatus($id)
    {
        // dd($id);
        $product = Product::where('id', $id)->first();

        if($product->status === 0){
            $product->status = 1;
        }else{
            $product->status = 0;
        }
        // $status = $product->status;
        // dd($product);
        return response()->json($product);   

    }
}
