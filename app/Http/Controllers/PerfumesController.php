<?php

namespace App\Http\Controllers;

use App\Services\PerfumesService;
use Inertia\Inertia;

class PerfumesController extends Controller
{
    public function __construct(private readonly PerfumesService $perfumesService)
    {
    }

    public function index(\Illuminate\Http\Request $request)
    {
        $products = $this->perfumesService->getAllProducts();
        
        $availableBrands = array_values(array_unique(array_filter(array_map(fn($p) => $p->brand, $products))));
        $availableGenders = array_values(array_unique(array_filter(array_map(fn($p) => $p->gender, $products))));
        $maxAvailablePrice = count($products) > 0 ? max(array_map(fn($p) => $p->priceNumeric, $products)) : 0;

        $activeBrand = $request->query('brand');
        $activeGender = $request->query('gender');
        $activeMaxPrice = $request->query('maxPrice');
        $sort = $request->query('sort');

        if ($activeBrand) {
            $products = array_filter($products, fn($p) => $p->brand === $activeBrand);
        }
        if ($activeGender) {
            $products = array_filter($products, fn($p) => $p->gender === $activeGender);
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

        return Inertia::render('Perfumes/Index', [
            'categoryName' => 'Perfumería',
            'products' => $dtoArrays,
            'filters' => [
                'brands' => $availableBrands,
                'genders' => $availableGenders,
                'maxPrice' => $maxAvailablePrice,
            ],
            'activeFilters' => [
                'brand' => $activeBrand,
                'gender' => $activeGender,
                'maxPrice' => $activeMaxPrice,
                'sort' => $sort,
            ]
        ]);
    }
}
