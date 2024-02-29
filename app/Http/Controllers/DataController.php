<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function getData()
    {
        $data = Product::all(); 

        return response()->json($data);
    }

    public function showDataView()
    {
        return view('data.index'); // Renders the data.blade.php view
    }

    
}
