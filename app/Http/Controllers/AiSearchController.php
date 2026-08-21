<?php

namespace App\Http\Controllers;

use App\Ai\Agents\CatalogAssistant;
use App\Services\ProductCatalogService;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class AiSearchController extends Controller
{
    public function __construct(protected ProductCatalogService $catalogService)
    {
    }

    public function search(Request $request, CatalogAssistant $agent): JsonResponse
    {
        $request->validate([
            'query' => 'required|string|max:255',
        ]);

        try {
            $response = $agent->prompt($request->input('query'));
            
            $rationale = $response['rationale'] ?? 'Aquí tienes algunas recomendaciones:';
            $productIds = $response['product_ids'] ?? [];

            $products = $this->catalogService->getProductsByIds($productIds);

            return response()->json([
                'rationale' => $rationale,
                'products' => $products,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Hubo un error al consultar la IA. Por favor, intenta de nuevo.',
                'message' => $e->getMessage(),
            ], 500);
        }
    }
}
