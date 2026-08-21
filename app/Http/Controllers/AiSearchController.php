<?php

namespace App\Http\Controllers;

use App\Ai\Agents\CatalogAssistant;
use App\Services\ProductCatalogService;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AiSearchController extends Controller
{
    public function __construct(protected ProductCatalogService $catalogService)
    {
    }

    public function search(Request $request, CatalogAssistant $agent)
    {
        $request->validate([
            'query' => 'required|string|max:255',
        ]);

        try {
            $response = $agent->prompt($request->input('query'));
            
            $rationale = $response['rationale'] ?? 'Aquí tienes algunas recomendaciones:';
            $productIds = $response['product_ids'] ?? [];

            $products = $this->catalogService->getProductsByIds($productIds);

            return Inertia::render('Search/Index', [
                'rationale' => $rationale,
                'products' => $products,
                'initialQuery' => $request->input('query'),
            ]);
        } catch (\Exception $e) {
            return back()->with('error', 'Hubo un error al consultar la IA. Por favor, intenta de nuevo.');
        }
    }
}
