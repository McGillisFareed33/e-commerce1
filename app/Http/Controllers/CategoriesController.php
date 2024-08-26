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
        return view('category.categoryList', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('category.categoryAdd');
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

        return redirect()->route('kategori.listesi')->with('success', 'Kategori başarıyla güncellendi.');

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

        return view('category.categoryadj', compact('category'));
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
        $category->save();

        return redirect()->route('kategori.duzenleme', $id)->with('success', 'Kategori başarılıyla güncellendi!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);
        Product::where('ProductCategoryId', $id)->update(['ProductCategoryId' => null]);
        $category->delete();

        return redirect()->route('kategori.listesi', $id)->with('success', 'Kullanıcı başarılıyla silindi!');
    }
}
