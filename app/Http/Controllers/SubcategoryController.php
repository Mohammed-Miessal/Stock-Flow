<?php

namespace App\Http\Controllers;

use App\Models\Subcategory;
use App\Services\SubcategoryService;
use App\Http\Requests\StoreSubcategoryRequest;
use App\Http\Requests\UpdateSubcategoryRequest;
use App\Services\CategoryService;

class SubcategoryController extends Controller
{

    protected $subcategory;
    protected $category;

    public function __construct(SubcategoryService $subcategory, CategoryService $category)
    {
        $this->subcategory = $subcategory;
        $this->category = $category;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subcategories = $this->subcategory->index();
        return view('chapters.SubCategory.read', compact('subcategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = $this->category->index();
        return view('chapters.SubCategory.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSubcategoryRequest $request)
    {
        $data = $request->validated();

        $this->subcategory->store($data);
        return redirect()->route('subcategory.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Subcategory $subcategory)
    {
        $subcategory = $this->subcategory->show($subcategory->id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subcategory $subcategory)
    {
        $subcategory = $this->subcategory->show($subcategory->id);
        $categories = $this->category->index();

        return view('chapters.SubCategory.edit', compact('subcategory', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSubcategoryRequest $request, Subcategory $subcategory)
    {
        $data = $request->validated();
        $this->subcategory->update($data , $subcategory->id);
        return redirect()->route('subcategory.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subcategory $subcategory)
    {
        $this->subcategory->destroy($subcategory->id);
        return redirect()->route('subcategory.index');
    }
}
