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
        ];
    }
}
