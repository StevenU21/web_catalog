<?php

namespace App\Http\Controllers;

use App\Services\MakeupService;
use Inertia\Inertia;

class MakeupController extends Controller
{
    public function __construct(private readonly MakeupService $makeupService)
    {
    }

    public function index(\Illuminate\Http\Request $request)
    {
        $products = $this->makeupService->getAllProducts();
        
        $availableBrands = array_values(array_unique(array_filter(array_map(fn($p) => $p->brand, $products))));
        $maxAvailablePrice = count($products) > 0 ? max(array_map(fn($p) => $p->priceNumeric, $products)) : 0;

        $activeBrand = $request->query('brand');
        $activeMaxPrice = $request->query('maxPrice');
        $sort = $request->query('sort');

        if ($activeBrand) {
            $products = array_filter($products, fn($p) => $p->brand === $activeBrand);
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

        return Inertia::render('Makeup/Index', [
            'categoryName' => 'Maquillaje',
            'products' => $dtoArrays,
            'filters' => [
                'brands' => $availableBrands,
                'maxPrice' => $maxAvailablePrice,
            ],
            'activeFilters' => [
                'brand' => $activeBrand,
                'maxPrice' => $activeMaxPrice,
                'sort' => $sort,
            ]
        ]);
    }
}
