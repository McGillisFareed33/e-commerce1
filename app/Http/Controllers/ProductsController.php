<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use App\Http\Requests\StoreProductRequest;
use Illuminate\Support\Facades\File;


class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::paginate(5);
        
        return view('product.list', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Tüm kategorileri çek
        $categories = Category::all();

        return view('product.add', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $request->validate([
            'ProductTitle' => 'required',
            'ProductCategoryId' => 'required',
            'ProductStatus' => 'required|in:aktif,pasif'

        ], [
            'ProductStatus.in' => 'ProductStatus alanı sadece "aktif" veya "pasif" değerlerini alabilir.',
        ]);

        // Rastgele barkod oluştur
          $randomBarcode = Str::random(10); // 10 karakter uzunluğunda rastgele bir barkod



        $product = Product::create([
            'ProductTitle' => $request->ProductTitle,
            'ProductCategoryId' => $request->ProductCategoryId,
            'Barcode' => $randomBarcode,
            'ProductStatus' =>$request->ProductStatus
        ]);
        $product->save();

        return redirect()->route('product.list')->with('success', 'Ürün başarıyla güncellendi.');

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
        {
            $product = Product::findOrFail($id);
            return view('product.edit',compact('product'));
        }
    }

    /**
     * Update the specified resource in storage.
     */
     public function update(Request $request, string $id)
    {
       $request->validate([
        'Image.*'=> 'required|Image|mimes:png,jpg,jpeg,webp'
       ]);
        $product = Product::findOrFail($id);
       
       if($request->file('Image')){
        $file = $request->file('Image');
        $extension = $file->getClientOriginalExtension();

        $filename = time().'.'.$extension;

        $path = 'uploads/products/';
        $file->move($path,$filename);


        $product->Image = $path.$filename;
    }
        $product->save();
        return redirect()->route('product.list')->with('success', 'Resim başarıyla yüklendi.');
       
    }

    /**
     * Remove the specified resource from storage.
     */
    

    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('product.list')->with('success', 'Ürün başarılıyla silindi!');
    }
}
