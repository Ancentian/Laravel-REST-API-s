<?php

namespace App\Http\Controllers;
use App\Http\Resources\ProductResource;
use App\Models\Product;

use Illuminate\Http\Request;
use DataTables;
use DNS1D;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        $response = ProductResource::collection($products);
        return response($response, 200);
    }

    public function getProducts()
    {
        if (request()->ajax()) {
            $products = Product::orderBy('id', 'desc')->get();

            return DataTables::of($products)
                ->addColumn('action', function ($row) {
                    $html = '<div class="btn-group">
                        <button type="button" class="badge btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item edit-button" data-action="' . url('allowances/editAllowance', [$row->id]) . '" href="#"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                            <a class="dropdown-item delete-button" data-action="' . url('allowances/delete_allowance', [$row->id]) . '" href="#"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                        </div>
                    </div>';

                    return $html;
                })
                ->editColumn('product_code', function ($row) {
                    $barcodeHTML = DNS1D::getBarcodeHTML($row->product_code, 'CODABAR', 2, 33);
                    return $barcodeHTML . ' p - ' . $row->product_code;
                })
                ->rawColumns(['action', 'product_code'])
                ->make(true);
        }
        return view('products.index');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $product_name = $request->input('name');
        $category = $request->input('category');
        $product_price = $request->input('price');
        $product_description = $request->input('description');

        $number = mt_rand(100000000, 9999999999);
        if($this->productCodeExists($number))
        {
            $number = mt_rand(100000000, 9999999999);
        }
        $request['product_code'] = $number;

        $product = Product::create([
            'name' => $product_name,
            'category' => $category,
            'price' => $product_price,
            'product_code' => $number,
            'description' => $product_description,
        ]);
        return response()->json([
            'data' => new ProductResource($product)
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return new ProductResource($product);
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
    public function update(Request $request, Product $product)
    {
        $product_name = $request->input('name');
        $product_price = $request->input('price');
        $category = $request->input('category');
        $product_description = $request->input('description');

        $product->update([
            'name' => $product_name,
            'price' => $product_price,
            'category' => $category,
            'description' => $product_description,
        ]);
        return response()->json([
            'data' => new ProductResource($product)
        ], 200);
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return response()->json(null, 204);
    }

    public function productCodeExists($number)
    {
        return Product::whereproductCode($number)->exists();
    }
}
