<?php

namespace App\Ai\Agents;

use App\Services\ProductCatalogService;
use Illuminate\Contracts\JsonSchema\JsonSchema;
use Laravel\Ai\Contracts\Agent;
use Laravel\Ai\Contracts\Conversational;
use Laravel\Ai\Contracts\HasStructuredOutput;
use Laravel\Ai\Messages\Message;
use Laravel\Ai\Promptable;
use Stringable;

class CatalogAssistant implements Agent, HasStructuredOutput
{
    use Promptable;

    public function __construct(protected ProductCatalogService $catalogService)
    {
    }

    /**
     * Get the instructions that the agent should follow.
     */
    public function instructions(): Stringable|string
    {
        $catalogJson = $this->catalogService->getMinimalCatalogForAi();

        return <<<TEXT
You are an expert dermocosmetic advisor for "Jolismar Store". Your goal is to help users find the perfect products for their needs based on the catalog provided below.

When a user asks for recommendations (e.g., "piel grasa con acné", "busco un perfume"):
1. Analyze their request carefully.
2. Select the most relevant products from the catalog.
3. Provide a short, empathetic, and professional explanation (rationale) of why you chose these products. Do NOT include markdown formatting in the rationale, just plain text.
4. Return the IDs of the products you recommend.

Here is the entire current inventory in JSON format:
{$catalogJson}

Remember to ONLY recommend products that are explicitly listed in this catalog.
TEXT;
    }

    /**
     * Define the structured output schema.
     */
    public function schema(JsonSchema $schema): array
    {
        return [
            'rationale' => $schema->string()->description('A short, empathetic explanation of why these products were selected.')->required(),
            'product_ids' => $schema->array()->items($schema->integer())->description('An array of recommended product IDs from the catalog.')->required(),
        ];
    }
}
