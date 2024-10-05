<?php

namespace App\Http\Controllers\API\Public;

use Illuminate\Http\Request;
use App\Models\TravelArticle;
use App\Http\Controllers\Controller;
use App\Http\Resources\MetaPaginateResource;
use App\Http\Resources\Public\TravelArticleResource;

class TravelArticleController extends Controller
{
    public function index(Request $request)
    {
        $page = $request->input('page', 1);

        $news = TravelArticle::latest()->paginate(10, ["*"], 'page', $page);

        $data = [
            'status' => true,
            'message' => 'Menampilkan Artikel Wisata',
            'meta' => new MetaPaginateResource($news),
            'data' => TravelArticleResource::collection($news),
        ];

        return response()->json($data, 200);
    }

    public function show(TravelArticle $travel_article)
    {
        $data = [
            'status' => true,
            'message' => 'Menampilkan Artikel Wisata By Slug',
            'data' => new TravelArticleResource($travel_article),
        ];

        return response()->json($data, 200);
    }
}
