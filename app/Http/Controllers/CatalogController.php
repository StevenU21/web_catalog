<?php

namespace App\Http\Controllers;

use App\Services\ProductCatalogService;
use Inertia\Inertia;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function __construct(private readonly ProductCatalogService $catalogService)
    {
    }

    public function index(Request $request)
    {
        $products = $this->catalogService->getAllProducts();
        
        $availableCategories = array_values(array_unique(array_filter(array_map(fn($p) => $p->category, $products))));
        $availableBrands = array_values(array_unique(array_filter(array_map(fn($p) => $p->brand, $products))));
        $availableSkinTypes = array_values(array_unique(array_filter(array_map(fn($p) => $p->skinType, $products))));
        $maxAvailablePrice = count($products) > 0 ? max(array_map(fn($p) => $p->priceNumeric, $products)) : 0;

        $activeCategory = $request->query('category');
        $activeBrand = $request->query('brand');
        $activeSkinType = $request->query('skinType');
        $activeMaxPrice = $request->query('maxPrice');
        $sort = $request->query('sort');

        if ($activeCategory) {
            $products = array_filter($products, fn($p) => $p->category === $activeCategory);
        }
        if ($activeBrand) {
            $products = array_filter($products, fn($p) => $p->brand === $activeBrand);
        }
        if ($activeSkinType) {
            $products = array_filter($products, fn($p) => $p->skinType === $activeSkinType);
        }
        if ($activeMaxPrice) {
            $products = array_filter($products, fn($p) => $p->priceNumeric <= (int) $activeMaxPrice);
        }

        if ($sort === 'price_asc') {
            usort($products, fn($a, $b) => $a->priceNumeric <=> $b->priceNumeric);
        } elseif ($sort === 'price_desc') {
            usort($products, fn($a, $b) => $b->priceNumeric <=> $a->priceNumeric);
        }

        $dtoArrays = array_map(fn($dto) => $dto->toArray(), array_values($products));

        return Inertia::render('Catalog/Index', [
            'categoryName' => 'Catálogo Completo',
            'products' => $dtoArrays,
            'filters' => [
                'categories' => $availableCategories,
                'brands' => $availableBrands,
                'skinTypes' => $availableSkinTypes,
                'maxPrice' => $maxAvailablePrice,
            ],
            'activeFilters' => [
                'category' => $activeCategory,
                'brand' => $activeBrand,
                'skinType' => $activeSkinType,
                'maxPrice' => $activeMaxPrice,
                'sort' => $sort,
            ]
        ]);
    }
}
