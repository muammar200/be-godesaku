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

        $news = Product::latest()->paginate($perpage, ["*"], 'page', $page);

        $data = [
            'status' => true,
            'message' => 'Menampilkan Produk Desa',
            'meta' => new MetaPaginateResource($news),
            'data' => ProductResource::collection($news),
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
}
