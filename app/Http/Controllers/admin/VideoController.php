<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;

class VideoController extends Controller
{
    public function index(): Factory|View|Application
    {
        $video = Video::query()->first();

        return view('video.index', compact('video'));
    }

    public function update(Request $request): RedirectResponse
    {
        $video = Video::query()->first();
        if ($request->file('video')) {
            if ($video->video != '*') {
                unlink(public_path('storage/'.$video->video));
            }
            $file_name = mt_rand(1000000, 9999999).$request->video->getClientOriginalName();
            $request->video->move(public_path('storage'), $file_name);
            $video->video = $file_name;
            $video->video_link = 'https://aport.double.kz/storage/'.$file_name;
//            if ($preview = $request->file('preview')) {
//                $preview = $preview->store('public');
//                $video->preview_picture = pathinfo($preview)['basename'];
//            }
            $video->save();
        }

        return redirect()->route('video.index');
    }
}
