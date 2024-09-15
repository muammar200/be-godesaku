<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use App\Http\Requests\NewsRequest;
use App\Http\Resources\NewsResource;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\MetaPaginateResource;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $page = $request->input('page', 1);
        $perpage = $request->input('perpage', 10);
        $search = $request->input("search", "");

        $news = News::latest()->where("title", "LIKE", "%$search%")->orWhere("content", "LIKE", "%$search%")->latest()->paginate($perpage, ["*"], 'page', $page);

        $data = [
            'status' => true,
            'message' => 'Show News Success',
            'meta' => new MetaPaginateResource($news),
            'data' => NewsResource::collection($news),
        ];

        return response()->json($data, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(NewsRequest $request)
    {
        try {
            $validatedData = $request->only('title', 'content');

            $imagePath = $request->file('image')->store('images/news', 'public');
            $imageFileName = basename($imagePath);

            $validatedData['image'] =  $imageFileName;

            $news = News::create($validatedData);

            $data = [
                'status' => true,
                'message' => 'Create News Success',
                'data' => new NewsResource($news),
            ];

            return response()->json($data, 201);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage(),
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(News $news)
    {
        $data = [
            'status' => true,
            'message' => 'Get News By Slug Success',
            'data' => new NewsResource($news),
        ];

        return response()->json($data, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(NewsRequest $request, News $news)
    {
        try {
            $validatedData = $request->only(['title', 'content']);

            if ($request->hasFile('image')) {
                Storage::delete('public/images/news/' . $news->image);
                $imagePath = $request->file('image')->store('images/news', 'public');
                $imageFileName = basename($imagePath);
                $validatedData['image'] = $imageFileName;
            }

            $news->update($validatedData);

            $data = [
                'status' => true,
                'message' => 'Update News Success',
                'data' => new NewsResource($news),
            ];

            return response()->json($data, 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage(),
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(News $news)
    {
        try {
            Storage::delete('public/images/news/' . $news->image);

            $news->delete();

            $data = [
                'status' => true,
                'message' => 'Delete News Success',
            ];

            return response()->json($data, 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage(),
            ], 500);
        }
    }
}

