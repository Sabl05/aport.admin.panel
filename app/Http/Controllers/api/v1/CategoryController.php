<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse as Json;

class CategoryController extends Controller
{
    public function index(): Json
    {
        $categories = Category::all();

        return response()->json($categories);
    }
}
