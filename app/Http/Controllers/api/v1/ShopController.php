<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Shop;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse as Json;

class ShopController extends Controller
{
    public function index(Request $request): Json
    {
        if (isset($request->floor) && isset($request->category)) {
            $category = Category::query()->where('title', $request->category)->first();
            $shops = Shop::query()
                ->where([
                    ['shops.floor', $request->floor],
                    ['category_id', $category->id]
                ])
                ->with(['workTime'])
                ->select('id', 'floor', 'title', 'description')
                ->selectRaw('banner_link as banner')
                ->selectRaw('category_id as category')
                ->get();
            if ($category == null || $shops == null) {
                return response()->json(['Пусто']);
            }
            foreach ($shops as $shop) {
                $count = 1;
                $shop->category = $category->title;

                foreach ($shop->workTime as $work_time) {
                    $work_time->id = $count;
                    $count++;
                }
            }

            return response()->json($shops);
        }

        $shops = Shop::query()
            ->where([
                ['shops.floor', $request->floor]
            ])
            ->with(['workTime'])
            ->select('id', 'floor', 'title', 'description')
            ->selectRaw('banner_link as banner')
            ->selectRaw('category_id as category')
            ->get();

        foreach ($shops as $shop) {
            $count = 1;
            $category = Category::query()->find($shop->category);
            $shop->category = $category->title;

            foreach ($shop->workTime as $work_time) {
                $work_time->id = $count;
                $count++;
            }
        }

        return response()->json($shops);
    }
}
