<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Shop;
use App\Models\WorkTime;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class ShopController extends Controller
{
    public function index(): Factory|View|Application
    {
        $shops = Shop::all();
        $categories = Category::all();

        return view('shop.index', compact('shops', 'categories'));
    }

    public function store(Request $request): RedirectResponse
    {
        $shop= new Shop();
        if ($request->file('banner')) {
            $file_name = mt_rand(1000000, 9999999).$request->banner->getClientOriginalName();
            $request->banner->move(public_path('storage'), $file_name);
            $shop->banner = $file_name;
            $shop->banner_link = 'https://aport.double.kz/storage/'.$file_name;
            $shop->floor = $request->floor;
            $shop->title = $request->title;
            $shop->description = $request->description;
            $shop->category_id  = $request->category_id ;
            $shop->save();
        }

        foreach ($request->work_time as $key => $work_time) {
            WorkTime::query()->create([
                'name' => $key,
                'since' => $work_time["since"],
                'till' => $work_time["till"],
                'shop_id' => $shop->id
            ]);
        }

        return redirect()->route('shop.index');
    }

    public function destroy(Shop $shop): RedirectResponse
    {
        unlink(public_path('storage/'.$shop->banner));
        WorkTime::query()->where('shop_id', $shop->id)->delete();
        $shop->delete();

        return redirect()->route('shop.index');
    }

    public function update(Request $request): RedirectResponse
    {
        $shop = Shop::query()->find($request->id);
        $shop->floor = $request->floor;
        $shop->title = $request->title;
        $shop->description = $request->description;
        if ($request->file('banner')) {
            unlink(public_path('storage/'.$shop->banner));
            $file_name = mt_rand(1000000, 9999999).$request->banner->getClientOriginalName();
            $request->banner->move(public_path('storage'), $file_name);
            $shop->banner = $file_name;
            $shop->banner_link = 'https://aport.double.kz/storage/'.$file_name;
        }
        $shop->save();
        foreach ($request->work_time as $key => $work_time) {
            WorkTime::query()
                ->where([
                    ['shop_id', $shop->id],
                    ['name', $key]
                ])->update([
                'since' => $work_time["since"],
                'till' => $work_time["till"],
            ]);
        }

        return redirect()->route('shop.index');
    }
}
