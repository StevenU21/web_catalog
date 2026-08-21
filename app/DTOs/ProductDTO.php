<?php

namespace App\DTOs;

class ProductDTO
{
    public function __construct(
        public readonly int $id,
        public readonly string $name,
        public readonly string $category,
        public readonly string $price,
        public readonly string $image,
        public readonly ?string $description = null,
        public readonly ?string $brand = null,
        public readonly ?string $skinType = null,
        public readonly ?string $gender = null,
        public readonly int $priceNumeric = 0,
    ) {}

    /**
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'category' => $this->category,
            'price' => $this->price,
            'image' => $this->image,
            'description' => $this->description,
            'brand' => $this->brand,
            'skinType' => $this->skinType,
            'gender' => $this->gender,
            'priceNumeric' => $this->priceNumeric,
        ];
    }
}
