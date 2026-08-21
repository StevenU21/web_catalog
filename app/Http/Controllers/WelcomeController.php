<?php

namespace App\Http\Controllers;

use App\Services\ProductCatalogService;
use Inertia\Inertia;
use Inertia\Response;

class WelcomeController extends Controller
{
    public function __construct(private readonly ProductCatalogService $catalogService)
    {
    }

    /**
     * Display the welcome page.
     */
    public function index(): Response
    {
        $allProducts = $this->catalogService->getAllProducts();
        
        // Group by category to ensure variety
        $categories = [];
        foreach ($allProducts as $product) {
            $categories[$product->category][] = $product;
        }

        $premiumProducts = [];
        // Take the top 2 most expensive products from each category (assuming 3 categories, total = 6)
        foreach ($categories as $categoryProducts) {
            usort($categoryProducts, fn($a, $b) => $b->priceNumeric <=> $a->priceNumeric);
            $premiumProducts = array_merge($premiumProducts, array_slice($categoryProducts, 0, 2));
        }
        $dtoArrays = array_map(fn($dto) => $dto->toArray(), $premiumProducts);

        return Inertia::render('Welcome', [
            'featuredProducts' => $dtoArrays,
        ]);
    }
}
