<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse as Json;

class BannerController extends Controller
{
    public function index(): Json
    {
        $banners = Banner::all();
        $response = [];
        foreach ($banners as $key => $banner) {
            $response[$key]['id'] = $banner->id;
            $response[$key]['picture'] = $banner->picture_link;
        }
        return response()->json($response);
    }
}
