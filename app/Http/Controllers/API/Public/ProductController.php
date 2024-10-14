<?php

namespace App\Http\Controllers\API\Public;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\MetaPaginateResource;
use App\Http\Resources\Public\ProductResource;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $page = $request->input('page', 1);
        $perpage = $request->input("perpage", 9);

        $products = Product::latest()->paginate($perpage, ["*"], 'page', $page);

        $data = [
            'status' => true,
            'message' => 'Menampilkan Produk Desa',
            'meta' => new MetaPaginateResource($products),
            'data' => ProductResource::collection($products),
        ];

        return response()->json($data, 200);
    }

    public function show(Product $product)
    {
        $data = [
            'status' => true,
            'message' => 'Menampilkan Produk Desa By Slug',
            'data' => new ProductResource($product),
        ];

        return response()->json($data, 200);
    }

    public function otherProduct(Request $request, Product $product)
    {
        $limit = $request->input('limit', 4);
        $products = Product::latest()->where('id', '!=', $product->id)->limit($limit)->get();

        $data = [
            'status' => true,
            'message' => 'Menampilkan Produk Desa Lainnya',
            'meta' => [
                'limit' => $limit
            ],
            'data' => ProductResource::collection($products),
        ];

        return response()->json($data, 200);
    }
}
