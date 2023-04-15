<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    public static $wrap = false;

    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     * @throws \Exception
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'subcategories' => $this->subcategories->map(fn($item) => [
                'id' => $item->id,
                'name' => $item->name,
                'category_id' => $this->id,
                'created_at' => (new \DateTime($item->created_at))->format('Y-m-d H:i:s'),
                'updated_at' => (new \DateTime($item->updated_at))->format('Y-m-d H:i:s'),
            ]),
            'productCategories' => $this->productCategories->map(fn($item) => [
                'id' => $item->id,
                'created_at' => (new \DateTime($item->created_at))->format('Y-m-d H:i:s'),
                'updated_at' => (new \DateTime($item->updated_at))->format('Y-m-d H:i:s'),
            ]),
            'created_at' => (new \DateTime($this->created_at))->format('Y-m-d H:i:s'),
            'updated_at' => (new \DateTime($this->updated_at))->format('Y-m-d H:i:s'),
        ];
    }
}
