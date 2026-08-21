<?php

namespace App\Http\Controllers;

use App\Services\MakeupService;
use Inertia\Inertia;

class MakeupController extends Controller
{
    public function __construct(private readonly MakeupService $makeupService)
    {
    }

    public function index()
    {
        $products = $this->makeupService->getAllProducts();
        
        $dtoArrays = array_map(fn($dto) => $dto->toArray(), array_values($products));

        return Inertia::render('Makeup/Index', [
            'categoryName' => 'Maquillaje',
            'products' => $dtoArrays,
        ]);
    }
}
