<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CategoriesController extends Controller
{
    public function index()
    {
        // Appeler le model et recuperer les données des produits dans la base
        $categories = Category::all()->sortBy('created_at');

        return view('/categories', compact('categories'));
    }

    public function create()
    {
        return view('/categories');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|unique:categories',
            'description' => 'max:500'
        ]);

        $category = Category::create($data);
        return redirect(route('categories'))->with('message', 'Category created successfully.');
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'id' => 'required|string',
            'name' => ['required',
                Rule::unique('users')->ignore($request->only('id')['id'])
            ],
            'description' => 'max:500'
        ]);

        $category = Category::find($data['id']);
        $category->update($data);

        return redirect(route('categories'))->with('message', 'Category updated successfully.');
    }

    public function delete(Request $request)
    {
        $data = $request->only('id');

        $category = Category::find($data['id']);
        $category->delete();

        return redirect(route('categories'))->with('message', 'Category deleted successfully.');
    }
}
