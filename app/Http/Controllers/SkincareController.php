<?php

namespace App\Http\Controllers;

use App\Services\CatalogService;
use Inertia\Inertia;

class SkincareController extends Controller
{
    public function __construct(private readonly CatalogService $catalogService)
    {
    }

    public function index()
    {
        $products = $this->catalogService->getProductsByCategory('skincare');
        
        $dtoArrays = array_map(fn($dto) => $dto->toArray(), array_values($products));

        return Inertia::render('Skincare/Index', [
            'categoryName' => 'Skincare',
            'products' => $dtoArrays,
        ]);
    }
}
