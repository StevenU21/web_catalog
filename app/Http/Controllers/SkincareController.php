<?php

namespace App\Http\Controllers;

use App\Services\SkincareService;
use Inertia\Inertia;

class SkincareController extends Controller
{
    public function __construct(private readonly SkincareService $skincareService)
    {
    }

    public function index(\Illuminate\Http\Request $request)
    {
        $products = $this->skincareService->getAllProducts();
        
        $availableBrands = array_values(array_unique(array_filter(array_map(fn($p) => $p->brand, $products))));
        $availableSkinTypes = array_values(array_unique(array_filter(array_map(fn($p) => $p->skinType, $products))));
        $maxAvailablePrice = count($products) > 0 ? max(array_map(fn($p) => $p->priceNumeric, $products)) : 0;

        $activeBrand = $request->query('brand');
        $activeSkinType = $request->query('skinType');
        $activeMaxPrice = $request->query('maxPrice');
        $sort = $request->query('sort');

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

        return Inertia::render('Skincare/Index', [
            'categoryName' => 'Skincare',
            'products' => $dtoArrays,
            'filters' => [
                'brands' => $availableBrands,
                'skinTypes' => $availableSkinTypes,
                'maxPrice' => $maxAvailablePrice,
            ],
            'activeFilters' => [
                'brand' => $activeBrand,
                'skinType' => $activeSkinType,
                'maxPrice' => $activeMaxPrice,
                'sort' => $sort,
            ]
        ]);
    }
}
