<?php

namespace App\Http\Controllers;

use App\Imports\ProductsImport;
use App\Models\Product;

define('paginationCount', 10);

use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::paginate(paginationCount);
        return view('home')->with('products', $products);
    }

    public function import(Request $request)
    {

        $import =  new ProductsImport;
        $import->import($request->file('productsFile'));
        return redirect()->route('products.index')->with('success', 'Products Imported Successfully');
    }
}
