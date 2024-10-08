<?php

namespace App\Http\Controllers\API\Public;

use App\Models\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Public\NewsResource;
use App\Http\Resources\MetaPaginateResource;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $page = $request->input('page', 1);
        $perpage = $request->input("perpage", 9);

        $news = News::latest()->paginate($perpage, ["*"], 'page', $page);

        $data = [
            'status' => true,
            'message' => 'Menampilkan Berita',
            'meta' => new MetaPaginateResource($news),
            'data' => NewsResource::collection($news),
        ];

        return response()->json($data, 200);
    }

    public function show(News $news)
    {
        $data = [
            'status' => true,
            'message' => 'Get Berita By Slug',
            'data' => new NewsResource($news),
        ];

        return response()->json($data, 200);
    }

    public function latestNews(Request $request)
    {
        $limit = $request->input('limit', 7);
        $news = News::latest()->limit($limit)->get();

        $data = [
            'status' => true,
            'message' => 'Menampilkan Berita Terbaru',
            'meta' => [
                'limit' => $limit
            ],
            'data' => NewsResource::collection($news),
        ];

        return response()->json($data, 200);
    }
    public function latestNewsExceptVisited(News $news, Request $request)
    {
        $limit = $request->input('limit', 7);
        $news = News::latest()->where('id', '!=', $news->id)->limit($limit)->get();

        $data = [
            'status' => true,
            'message' => 'Menampilkan Berita Terbaru Kecuali yang Sedang Dikunjungi',
            'meta' => [
                'limit' => $limit
            ],
            'data' => NewsResource::collection($news),
        ];

        return response()->json($data, 200);
    }
}
