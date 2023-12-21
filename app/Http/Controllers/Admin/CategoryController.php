<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\StoreCategoryRequest;
use App\Http\Requests\Admin\Category\UpdateCategoryRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * منجيب كل شي من الداتا بيز على الصفحة 
     */
    public function index()
    {
        $categories = Category::all();

        return view('admin.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.Category.add_category');
    }

    /**
     * تخرين الحقل في الداتا بيز
     */
    public function store(StoreCategoryRequest $request)
    {
        $categories = $request->validated();
        Category::create($categories);

        return redirect()->route('admin.categories.index');
    }

    /**
     * رجعلي الصفحة يلي بدي عدل عن طريقها
     */
    public function edit(Category $category)
    {
        return view('admin.Category.edit_category', compact('category'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $category_data = $request->validated();
        $category->update($category_data);

        return redirect()->route('admin.categories.index');
    }

    /**
     * الحذف من الداتا بيز 
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('admin.categories.index');
    }
}
