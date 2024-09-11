<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'productTitle' => $this->ProductTitle,
            'productCategoryId' => $this->ProductCategoryId,
            'barcode' => $this->Barcode,
            'productStatus' => $this->ProductStatus,
            'image' => $this->Image,
            'createdAt' => $this->created_at,
            'updatedAt' => $this->updated_at,
            'deletedAt' => $this->deleted_at,
    ];
    }
}
