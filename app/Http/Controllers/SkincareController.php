<?php

namespace App\Http\Controllers;

use App\Services\SkincareService;
use Inertia\Inertia;

class SkincareController extends Controller
{
    public function __construct(private readonly SkincareService $skincareService)
    {
    }

    public function index()
    {
        $products = $this->skincareService->getAllProducts();
        
        $dtoArrays = array_map(fn($dto) => $dto->toArray(), array_values($products));

        return Inertia::render('Skincare/Index', [
            'categoryName' => 'Skincare',
            'products' => $dtoArrays,
        ]);
    }
}
