<?php

namespace App\Services;

use App\DTOs\ProductDTO;

class CatalogService
{
    /**
     * @return array<ProductDTO>
     */
    public function getProductsByCategory(string $categorySlug): array
    {
        $allProducts = $this->getAllProducts();
        
        return array_filter($allProducts, function (ProductDTO $product) use ($categorySlug) {
            // Slugify the category to compare
            $slug = strtolower(str_replace(' ', '-', $product->category));
            return $slug === strtolower($categorySlug);
        });
    }

    /**
     * @return array<ProductDTO>
     */
    private function getAllProducts(): array
    {
        return [
            // Maquillajes
            new ProductDTO(1, 'Base Maybelline Fit me 12H Matte + Poreless', 'Maquillajes', 'C$ 430.00', 'https://images.unsplash.com/photo-1620916566398-39f1143ab7be?auto=format&fit=crop&q=80&w=600'),
            new ProductDTO(2, 'Polvo compacto Maybelline Fit me', 'Maquillajes', 'C$ 380.00', 'https://images.unsplash.com/photo-1596462502278-27bfdc403348?auto=format&fit=crop&q=80&w=600'),
            new ProductDTO(3, 'L\'Oréal Infallible Pro-Matte', 'Maquillajes', 'C$ 430.00', 'https://images.unsplash.com/photo-1512496115841-a45b7367c3bb?auto=format&fit=crop&q=80&w=600'),
            new ProductDTO(4, 'Corrector e.l.f. Hydrating Camo', 'Maquillajes', 'C$ 450.00', 'https://images.unsplash.com/photo-1596462502278-27bfdc403348?auto=format&fit=crop&q=80&w=600'),
            new ProductDTO(5, 'NYX Pore Filler Primer', 'Maquillajes', 'C$ 350.00', 'https://images.unsplash.com/photo-1596462502278-27bfdc403348?auto=format&fit=crop&q=80&w=600'),
            new ProductDTO(6, 'Primer E.l.f', 'Maquillajes', 'C$ 380.00', 'https://images.unsplash.com/photo-1596462502278-27bfdc403348?auto=format&fit=crop&q=80&w=600'),
            new ProductDTO(7, 'Tinta de Labios e.l.f.', 'Maquillajes', 'C$ 400.00', 'https://images.unsplash.com/photo-1586495777744-4413f21062fa?auto=format&fit=crop&q=80&w=600'),
            new ProductDTO(8, 'Maybelline Super Stay Ink Crayon', 'Maquillajes', 'C$ 350.00', 'https://images.unsplash.com/photo-1586495777744-4413f21062fa?auto=format&fit=crop&q=80&w=600'),
            new ProductDTO(9, 'Gloss e.l.f', 'Maquillajes', 'C$ 450.00', 'https://images.unsplash.com/photo-1586495777744-4413f21062fa?auto=format&fit=crop&q=80&w=600'),
            new ProductDTO(10, 'Labiales Maybelline Super Stay Matte Ink', 'Maquillajes', 'C$ 420.00', 'https://images.unsplash.com/photo-1586495777744-4413f21062fa?auto=format&fit=crop&q=80&w=600'),
            new ProductDTO(11, 'Gloss Maybelline', 'Maquillajes', 'C$ 420.00', 'https://images.unsplash.com/photo-1586495777744-4413f21062fa?auto=format&fit=crop&q=80&w=600'),
            new ProductDTO(12, 'Rubor NYX', 'Maquillajes', 'C$ 400.00', 'https://images.unsplash.com/photo-1596462502278-27bfdc403348?auto=format&fit=crop&q=80&w=600'),
            new ProductDTO(13, 'Labiales L\'Oréal Paris Mate', 'Maquillajes', 'C$ 420.00', 'https://images.unsplash.com/photo-1586495777744-4413f21062fa?auto=format&fit=crop&q=80&w=600'),
            new ProductDTO(14, 'Rubor líquido e.l.f.', 'Maquillajes', 'C$ 380.00', 'https://images.unsplash.com/photo-1596462502278-27bfdc403348?auto=format&fit=crop&q=80&w=600'),
            new ProductDTO(15, 'Primer NYX en spray', 'Maquillajes', 'C$ 400.00', 'https://images.unsplash.com/photo-1596462502278-27bfdc403348?auto=format&fit=crop&q=80&w=600'),
            new ProductDTO(16, 'Bases e.l.f', 'Maquillajes', 'C$ 400.00', 'https://images.unsplash.com/photo-1512496115841-a45b7367c3bb?auto=format&fit=crop&q=80&w=600'),
            new ProductDTO(17, 'Fijador de maquillaje L\'Oréal', 'Maquillajes', 'C$ 600.00', 'https://images.unsplash.com/photo-1596462502278-27bfdc403348?auto=format&fit=crop&q=80&w=600'),
            new ProductDTO(18, 'Got2b Glued Styling Spiking Glue', 'Maquillajes', 'C$ 370.00', 'https://images.unsplash.com/photo-1596462502278-27bfdc403348?auto=format&fit=crop&q=80&w=600'),
            new ProductDTO(19, 'Fijadores e.l.f', 'Maquillajes', 'C$ 450.00', 'https://images.unsplash.com/photo-1596462502278-27bfdc403348?auto=format&fit=crop&q=80&w=600'),
            new ProductDTO(20, 'Bronceador y contorno (e.l.f. Camo Liquid Bronzer)', 'Maquillajes', 'C$ 380.00', 'https://images.unsplash.com/photo-1596462502278-27bfdc403348?auto=format&fit=crop&q=80&w=600'),
            new ProductDTO(21, 'Corrector de ojos Maybelline', 'Maquillajes', 'C$ 400.00', 'https://images.unsplash.com/photo-1596462502278-27bfdc403348?auto=format&fit=crop&q=80&w=600'),
            new ProductDTO(22, 'Polvo suelto fijador Infallible Blur-fection de L\'Oréal', 'Maquillajes', 'C$ 400.00', 'https://images.unsplash.com/photo-1596462502278-27bfdc403348?auto=format&fit=crop&q=80&w=600'),
            new ProductDTO(23, 'Aceite Labial Voluminizador Hyaluronic de L\'Oréal', 'Maquillajes', 'C$ 420.00', 'https://images.unsplash.com/photo-1586495777744-4413f21062fa?auto=format&fit=crop&q=80&w=600'),
            new ProductDTO(24, 'Halo Glow Liquid Filter', 'Maquillajes', 'C$ 440.00', 'https://images.unsplash.com/photo-1512496115841-a45b7367c3bb?auto=format&fit=crop&q=80&w=600'),
            new ProductDTO(25, 'Pixi by Petra On-the-Glow Blush (19gr)', 'Maquillajes', 'C$ 480.00', 'https://images.unsplash.com/photo-1596462502278-27bfdc403348?auto=format&fit=crop&q=80&w=600'),
            new ProductDTO(26, 'Polvo iluminador Pixi Glow-y Powder', 'Maquillajes', 'C$ 380.00', 'https://images.unsplash.com/photo-1596462502278-27bfdc403348?auto=format&fit=crop&q=80&w=600'),
            new ProductDTO(27, 'Tintas de labios Maybelline SuperStay Teddy Tint', 'Maquillajes', 'C$ 420.00', 'https://images.unsplash.com/photo-1586495777744-4413f21062fa?auto=format&fit=crop&q=80&w=600'),
            new ProductDTO(28, 'L\'Oréal Paris Infallible 32 Hour Fresh Wear Foundation', 'Maquillajes', 'C$ 480.00', 'https://images.unsplash.com/photo-1512496115841-a45b7367c3bb?auto=format&fit=crop&q=80&w=600'),
            new ProductDTO(29, 'Polvo Infallible 24H Fresh Wear de L\'Oréal', 'Maquillajes', 'C$ 420.00', 'https://images.unsplash.com/photo-1596462502278-27bfdc403348?auto=format&fit=crop&q=80&w=600'),
            new ProductDTO(30, 'Base Maybelline Lumi Matte', 'Maquillajes', 'C$ 480.00', 'https://images.unsplash.com/photo-1512496115841-a45b7367c3bb?auto=format&fit=crop&q=80&w=600'),
            new ProductDTO(31, 'Corrector Skin Ink L\'Oréal', 'Maquillajes', 'C$ 400.00', 'https://images.unsplash.com/photo-1596462502278-27bfdc403348?auto=format&fit=crop&q=80&w=600'),
            new ProductDTO(32, 'Blush On the Glow Pixi (10gr)', 'Maquillajes', 'C$ 380.00', 'https://images.unsplash.com/photo-1596462502278-27bfdc403348?auto=format&fit=crop&q=80&w=600'),
            new ProductDTO(33, 'Máscara de pestañas Great Lash de Maybelline', 'Maquillajes', 'C$ 420.00', 'https://images.unsplash.com/photo-1596462502278-27bfdc403348?auto=format&fit=crop&q=80&w=600'),
            new ProductDTO(34, 'Maybelline Great Lash Waterproof', 'Maquillajes', 'C$ 480.00', 'https://images.unsplash.com/photo-1596462502278-27bfdc403348?auto=format&fit=crop&q=80&w=600'),
            new ProductDTO(35, 'Contour Halo Glow Elf', 'Maquillajes', 'C$ 380.00', 'https://images.unsplash.com/photo-1596462502278-27bfdc403348?auto=format&fit=crop&q=80&w=600'),
            new ProductDTO(36, 'Gloss Serum NYX', 'Maquillajes', 'C$ 380.00', 'https://images.unsplash.com/photo-1586495777744-4413f21062fa?auto=format&fit=crop&q=80&w=600'),
            new ProductDTO(37, 'Pro Gloss L\'Oréal', 'Maquillajes', 'C$ 380.00', 'https://images.unsplash.com/photo-1586495777744-4413f21062fa?auto=format&fit=crop&q=80&w=600'),
            new ProductDTO(38, 'Blush Halo Glow Elf', 'Maquillajes', 'C$ 380.00', 'https://images.unsplash.com/photo-1596462502278-27bfdc403348?auto=format&fit=crop&q=80&w=600'),
            new ProductDTO(39, 'Blush Stick Neutrogena', 'Maquillajes', 'C$ 400.00', 'https://images.unsplash.com/photo-1596462502278-27bfdc403348?auto=format&fit=crop&q=80&w=600'),
            new ProductDTO(40, 'Eraser Treatment Base Concealer', 'Maquillajes', 'C$ 450.00', 'https://images.unsplash.com/photo-1596462502278-27bfdc403348?auto=format&fit=crop&q=80&w=600'),
            new ProductDTO(41, 'Base Plump y Glow Maybelline', 'Maquillajes', 'C$ 450.00', 'https://images.unsplash.com/photo-1512496115841-a45b7367c3bb?auto=format&fit=crop&q=80&w=600'),
            new ProductDTO(42, 'Polvo Finishing Powder C...', 'Maquillajes', 'C$ 380.00', 'https://images.unsplash.com/photo-1596462502278-27bfdc403348?auto=format&fit=crop&q=80&w=600'),
            new ProductDTO(43, 'Corrector Maybelline', 'Maquillajes', 'C$ 380.00', 'https://images.unsplash.com/photo-1596462502278-27bfdc403348?auto=format&fit=crop&q=80&w=600'),
            new ProductDTO(44, 'Corrector L\'Oréal', 'Maquillajes', 'C$ 400.00', 'https://images.unsplash.com/photo-1596462502278-27bfdc403348?auto=format&fit=crop&q=80&w=600'),
        ];
    }
}
