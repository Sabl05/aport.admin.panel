<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\Foundation\Application;

class BannerController extends Controller
{
    public function index(): Factory|View|Application
    {
        $banners = Banner::all();

        return view('banner.index', compact('banners'));
    }

    public function update(Request $request): RedirectResponse
    {
        $banner = Banner::query()->find($request->id)->first();
        if ($request->file('picture')) {
            unlink(public_path('storage/'.$request->old_picture));
            $file_name = mt_rand(1000000, 9999999).$request->picture->getClientOriginalName();
            $request->picture->move(public_path('storage'), $file_name);
            $banner->picture = $file_name;
            $banner->picture_link = 'https://aport.double.kz/storage/'.$file_name;
            $banner->save();
        }

        return redirect()->route('banner.index');
    }

    public function store(Request $request): RedirectResponse
    {
        $banner = new Banner();
        if ($request->file('picture')) {
            $file_name = mt_rand(1000000, 9999999).$request->picture->getClientOriginalName();
            $request->picture->move(public_path('storage'), $file_name);
            $banner->picture = $file_name;
            $banner->picture_link = 'https://aport.double.kz/storage/'.$file_name;
            $banner->save();
        }

        return redirect()->route('banner.index');
    }

    public function destroy(Banner $banner): RedirectResponse
    {
        unlink(public_path('storage/'.$banner->picture));
        $banner->delete();

        return redirect()->route('banner.index');
    }
}
