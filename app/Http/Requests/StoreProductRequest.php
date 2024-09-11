<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;

class StoreProductRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $categoryId = $this->input('ProductCategoryId');

        $category = Category::find($categoryId);
        if ($category && $category->Status === 'pasif') {
            return [
                'ProductTitle' => 'required',
                'ProductCategoryId' => 'required',
                'ProductStatus' => 'required|in:pasif', // Kategori pasifse sadece pasif olabilir
            ];
        }

        return [
            'ProductTitle' => 'required',
            'ProductCategoryId' => 'required',
            'ProductStatus' => 'required|in:aktif,pasif', // Normalde hem aktif hem de pasif olabilir
        ];
    }

    public function messages()
    {
        return [
            'ProductStatus.in' => 'Kategori pasifse ürün aktif olamaz.',
        ];
    }
}