<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Models\TravelArticle;
use App\Models\TravelArticleImage;
use App\Models\TravelArticleVideo;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\TravelArticleRequest;
use App\Http\Resources\MetaPaginateResource;
use App\Http\Resources\TravelArticleResource;

class TravelArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $page = $request->input('page', 1);
        $perpage = $request->input('perpage', 10);
        $search = $request->input("search", "");

        $travel_articles = TravelArticle::latest()->where("title", "LIKE", "%$search%")->orWhere("content", "LIKE", "%$search%")->latest()->paginate($perpage, ["*"], 'page', $page);

        $data = [
            'status' => true,
            'message' => 'Show Travel Article Success',
            'meta' => new MetaPaginateResource($travel_articles),
            'data' => TravelArticleResource::collection($travel_articles),
        ];

        return response()->json($data, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TravelArticleRequest $request)
    {
        try {
            $validatedData = $request->only('title', 'content');

            $travel_article = TravelArticle::create($validatedData);

            foreach ($request->file('images') as $image) {
                $imagePath = $image->store('images/travel_articles', 'public');
                $imageFileName = basename($imagePath);

                TravelArticleImage::create([
                    'travel_article_id' => $travel_article->id,
                    'image' => $imageFileName
                ]);
            }

            foreach ($request->file('videos') as $video) {
                $videoPath = $video->store('videos/travel_articles', 'public');
                $videoFileName = basename($videoPath);

                TravelArticleVideo::create([
                    'travel_article_id' => $travel_article->id,
                    'video' => $videoFileName
                ]);
            }

            $data = [
                'status' => true,
                'message' => 'Create Travel Article Success',
                'data' => new TravelArticleResource($travel_article),
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
    public function show(TravelArticle $travel_article)
    {
        $data = [
            'status' => true,
            'message' => 'Get Travel Article By Slug Success',
            'data' => new TravelArticleResource($travel_article),
        ];

        return response()->json($data, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(TravelArticleRequest $request, TravelArticle $travel_article)
    // {
    //     try {
    //         $validatedData = $request->only(['title', 'content']);

    //         if ($request->hasFile('image')) {
    //             Storage::delete('public/images/news/' . $travel_article->image);
    //             $imagePath = $request->file('image')->store('images/news', 'public');
    //             $imageFileName = basename($imagePath);
    //             $validatedData['image'] = $imageFileName;
    //         }

    //         $news->update($validatedData);

    //         $data = [
    //             'status' => true,
    //             'message' => 'Update News Success',
    //             'data' => new NewsResource($news),
    //         ];

    //         return response()->json($data, 200);
    //     } catch (\Throwable $th) {
    //         return response()->json([
    //             'status' => false,
    //             'message' => $th->getMessage(),
    //         ], 500);
    //     }
    // }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TravelArticle $travel_article)
    {
        try {
            foreach ($travel_article->images as $image) {
                Storage::delete('public/images/travel_articles/' . $image->image);
            }

            foreach ($travel_article->videos as $video) {
                Storage::delete('public/videos/travel_articles/' . $video->video);
            }

            $travel_article->delete();

            $data = [
                'status' => true,
                'message' => 'Delete Travel Article Success',
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
