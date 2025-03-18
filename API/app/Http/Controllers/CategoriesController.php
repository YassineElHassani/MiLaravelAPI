<?php

namespace App\Http\Controllers;

use App\Models\categories;
use App\Http\Requests\StorecategoriesRequest;
use App\Http\Requests\UpdatecategoriesRequest;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(categories::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorecategoriesRequest $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $product = categories::create($request->all());
        return response()->json($product);
    }

    /**
     * Display the specified resource.
     */
    public function show(categories $categories)
    {
        return response()->json($categories);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatecategoriesRequest $request, categories $categories)
    {
        $request->validate([
            'name' => 'sometimes|required|string|max:255'
        ]);

        $categories->update($request->all());
        return response()->json($categories);   
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(categories $categories)
    {
        $categories->delete();
        return response()->json(null);
    }
}
