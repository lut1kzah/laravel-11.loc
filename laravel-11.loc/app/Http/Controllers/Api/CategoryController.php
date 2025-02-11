<?php

namespace App\Http\Controllers\Api;

use App\Exceptions\ApiException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\CategoryRequest;
use App\Models\Category;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Category::all())->setStatusCode(200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        $category = Category::create($request->all());
        return response()->json($category)->setStatusCode(201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = Category::find($id);

        if (!$category) {
            throw new ApiException('Not found', 404);
        }

        return response()->json($category)->setStatusCode(200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, string $id)
    {
        $category = Category::find($id);

        if (!$category) {
            throw new ApiException('Not found', 404);
        }

        $category->update($request->all());

        return response()->json($category)->setStatusCode(200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CategoryRequest $request, string $id)
    {
        $category = Category::find($id);

        if (!$category) {
            throw new ApiException('Not found', 404);
        }

        $category->delete();

        return response()->json(null)->setStatusCode(204);
    }
}
