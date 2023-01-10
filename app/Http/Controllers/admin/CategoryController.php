<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class CategoryController extends Controller
{
    public function index(Request $request): Factory|View|Application
    {
        $categories = Category::all();
        if (isset($request->error)) {
            $error = $request->error;
            return view('category.index', compact('categories', 'error'));
        }
        return view('category.index', compact('categories'));
    }

    public function store(Request $request): RedirectResponse
    {
        Category::query()->create($request->all());

        return redirect()->route('category.index');
    }

    public function update(Request $request): RedirectResponse
    {
        $category = Category::query()->find($request->id);

        $category->title = $request->title;
        $category->save();

        return redirect()->route('category.index');
    }

    public function destroy(Category $category): RedirectResponse
    {
        try {
            $category->delete();
        } catch (\Throwable) {
            return redirect()->route('category.index', ['error' => 'relation']);
        }

        return redirect()->route('category.index');
    }
}
