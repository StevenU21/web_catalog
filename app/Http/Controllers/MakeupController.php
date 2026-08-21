<?php

namespace App\Http\Controllers;

use App\Services\CatalogService;
use Inertia\Inertia;

class MakeupController extends Controller
{
    public function __construct(private readonly CatalogService $catalogService)
    {
    }

    public function index()
    {
        $products = $this->catalogService->getProductsByCategory('maquillajes');
        
        $dtoArrays = array_map(fn($dto) => $dto->toArray(), array_values($products));

        return Inertia::render('Makeup/Index', [
            'categoryName' => 'Maquillaje',
            'products' => $dtoArrays,
        ]);
    }
}
