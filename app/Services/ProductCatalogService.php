<?php

namespace App\Services;

class ProductCatalogService
{
    public function __construct(
        protected SkincareService $skincareService,
        protected MakeupService $makeupService,
        protected PerfumesService $perfumesService
    ) {}

    /**
     * Get all products combined from all categories.
     *
     * @return array<int, \App\DTOs\ProductDTO>
     */
    public function getAllProducts(): array
    {
        return array_merge(
            $this->skincareService->getAllProducts(),
            $this->makeupService->getAllProducts(),
            $this->perfumesService->getAllProducts()
        );
    }

    /**
     * Get products by their IDs.
     *
     * @param array<int> $ids
     * @return array<int, \App\DTOs\ProductDTO>
     */
    public function getProductsByIds(array $ids): array
    {
        if (empty($ids)) {
            return [];
        }

        $allProducts = $this->getAllProducts();
        
        return array_values(array_filter($allProducts, function ($product) use ($ids) {
            return in_array($product->id, $ids);
        }));
    }

    /**
     * Return a minimal JSON string of the catalog to feed into the AI context.
     *
     * @return string
     */
    public function getMinimalCatalogForAi(): string
    {
        $allProducts = $this->getAllProducts();
        
        $minimal = array_map(function ($product) {
            return [
                'id' => $product->id,
                'name' => $product->name,
                'category' => $product->category,
                'brand' => $product->brand,
                'skinType' => $product->skinType,
                'price' => $product->price,
                'description' => $product->description,
            ];
        }, $allProducts);

        return json_encode($minimal, JSON_UNESCAPED_UNICODE);
    }
}
