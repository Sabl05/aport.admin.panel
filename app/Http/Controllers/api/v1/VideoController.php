<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse as Json;

class VideoController extends Controller
{
    public function index(): Json
    {
        $video = Video::query()->first();
        $video->video = $video->video_link;
        return response()->json($video);
    }
}
