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

        $news = News::latest()->paginate(9, ["*"], 'page', $page);

        $data = [
            'status' => true,
            'message' => 'Show News Success',
            'meta' => new MetaPaginateResource($news),
            'data' => NewsResource::collection($news),
        ];

        return response()->json($data, 200);
    }

    public function show(News $news)
    {
        $data = [
            'status' => true,
            'message' => 'Get News By Slug Success',
            'data' => new NewsResource($news),
        ];

        return response()->json($data, 200);
    }

    public function latestNews()
    {
        $news = News::latest()->limit(7)->get();

        $data = [
            'status' => true,
            'message' => 'Show Latest News Success',
            'data' => NewsResource::collection($news),
        ];

        return response()->json($data, 200);
    }
}
