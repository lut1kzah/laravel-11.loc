<?php

namespace App\Http\Controllers\Api;

use App\Exceptions\ApiException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\CategoryRequest;
use App\Models\Category;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function Symfony\Component\Translation\t;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CategoryController extends Controller
{

    public function index()
    {
        return response()->json(Category::all())->setStatusCode(200);
    }

use AuthorizesRequests;
    public function store(CategoryRequest $request)
    {

        $category = Category::create($request->validated());
        return response()->json($category)->setStatusCode(201);
    }


    public function show(Category $category)
    {
        if (empty(!$category->id)) {
            throw new ApiException('Not found', 404);
        }
        return response()->json($category)->setStatusCode(200);
    }

    public function update(CategoryRequest $request, Category $category)
    {

        if (empty(!$category->id)) {
            throw new ApiException('Not found', 404);
        }
        $category->update($request->validated());
        return response()->json($category)->setStatusCode(200);
    }


    public function destroy(CategoryRequest $request, Category $category)
    {

        if (empty(!$category->id)) {
            throw new ApiException('Not found', 404);
        }
        $category->delete();
        return response()->json(null)->setStatusCode(204);
    }
}
