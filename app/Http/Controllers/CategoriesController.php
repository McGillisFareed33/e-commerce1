<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('category.list', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('category.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'CategoryTitle' => 'required|unique:categories',
            'Status' => 'required|in:aktif,pasif'
            
        ], [
            'Status.in' => 'Status alanı sadece "aktif" veya "pasif" değerlerini alabilir.',
        ]);


        $category = Category::create([
            'CategoryTitle' => $request->CategoryTitle,
            'CategoryDescription' => $request->CategoryDescription,
            'Status'=> $request->Status
        ]);
        $category->save();

        return redirect()->route('category.list')->with('success', 'Kategori başarıyla güncellendi.');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::findOrFail($id);

        return view('category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'Status' => 'required|in:aktif,pasif'
            
        ], [
            'Status.in' => 'Status alanı sadece "aktif" veya "pasif" değerlerini alabilir.',
        ]);

        $category = Category::findOrFail($id);
        

        if($category->CategoryTitle !== $request->CategoryTitle){
            $request->validate([
                'CategoryTitle' => 'required|unique:categories',
            ]);
            }

        $category->CategoryTitle = $request->CategoryTitle;

        if ($request->filled('CategoryDescription')) {
            $category->CategoryDescription = $request->CategoryDescription;
        }

        if ($request->filled('Status')) {
            $category->Status = $request->Status;
        }
        if ($category->Status === 'pasif') {
            Product::where('ProductCategoryId', $category->id)->update(['ProductStatus' => 'pasif']);
        }
        
        
        
        $category->save();

        return redirect()->route('category.edit', $id)->with('success', 'Kategori başarılıyla güncellendi!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);
        Product::where('ProductCategoryId', $id)->update(['ProductCategoryId' => null,'ProductStatus' => 'pasif']);
        $category->delete();

        return redirect()->route('category.list', $id)->with('success', 'Kullanıcı başarılıyla silindi!');
    }
}
