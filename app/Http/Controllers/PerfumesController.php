<?php

namespace App\Http\Controllers;

use App\Services\PerfumesService;
use Inertia\Inertia;

class PerfumesController extends Controller
{
    public function __construct(private readonly PerfumesService $perfumesService)
    {
    }

    public function index()
    {
        $products = $this->perfumesService->getAllProducts();
        
        $dtoArrays = array_map(fn($dto) => $dto->toArray(), array_values($products));

        return Inertia::render('Perfumes/Index', [
            'categoryName' => 'Perfumería',
            'products' => $dtoArrays,
        ]);
    }
}
