<?php

namespace App\Services;

use App\DTOs\ProductDTO;

class MakeupService
{
    /**
     * @return array<ProductDTO>
     */
    public function getAllProducts(): array
    {
        $img = 'https://images.unsplash.com/photo-1596462502278-27bfdc403348?auto=format&fit=crop&q=80&w=600';
        $imgBase = 'https://images.unsplash.com/photo-1512496115841-a45b7367c3bb?auto=format&fit=crop&q=80&w=600';
        $imgLip = 'https://images.unsplash.com/photo-1586495777744-4413f21062fa?auto=format&fit=crop&q=80&w=600';

        return [
            // Maquillajes
            new ProductDTO(id: 1, name: 'Base Maybelline Fit me 12H Matte + Poreless', category: 'Maquillajes', price: 'C$ 430.00', image: $imgBase, brand: 'Maybelline', priceNumeric: 430),
            new ProductDTO(id: 2, name: 'Polvo compacto Maybelline Fit me', category: 'Maquillajes', price: 'C$ 380.00', image: $img, brand: 'Maybelline', priceNumeric: 380),
            new ProductDTO(id: 3, name: 'L\'Oréal Infallible Pro-Matte', category: 'Maquillajes', price: 'C$ 430.00', image: $imgBase, brand: 'L\'Oréal', priceNumeric: 430),
            new ProductDTO(id: 4, name: 'Corrector e.l.f. Hydrating Camo', category: 'Maquillajes', price: 'C$ 450.00', image: $img, brand: 'e.l.f.', priceNumeric: 450),
            new ProductDTO(id: 5, name: 'NYX Pore Filler Primer', category: 'Maquillajes', price: 'C$ 350.00', image: $img, brand: 'NYX', priceNumeric: 350),
            new ProductDTO(id: 6, name: 'Primer E.l.f', category: 'Maquillajes', price: 'C$ 380.00', image: $img, brand: 'e.l.f.', priceNumeric: 380),
            new ProductDTO(id: 7, name: 'Tinta de Labios e.l.f.', category: 'Maquillajes', price: 'C$ 400.00', image: $imgLip, brand: 'e.l.f.', priceNumeric: 400),
            new ProductDTO(id: 8, name: 'Maybelline Super Stay Ink Crayon', category: 'Maquillajes', price: 'C$ 350.00', image: $imgLip, brand: 'Maybelline', priceNumeric: 350),
            new ProductDTO(id: 9, name: 'Gloss e.l.f', category: 'Maquillajes', price: 'C$ 450.00', image: $imgLip, brand: 'e.l.f.', priceNumeric: 450),
            new ProductDTO(id: 10, name: 'Labiales Maybelline Super Stay Matte Ink', category: 'Maquillajes', price: 'C$ 420.00', image: $imgLip, brand: 'Maybelline', priceNumeric: 420),
            new ProductDTO(id: 11, name: 'Gloss Maybelline', category: 'Maquillajes', price: 'C$ 420.00', image: $imgLip, brand: 'Maybelline', priceNumeric: 420),
            new ProductDTO(id: 12, name: 'Rubor NYX', category: 'Maquillajes', price: 'C$ 400.00', image: $img, brand: 'NYX', priceNumeric: 400),
            new ProductDTO(id: 13, name: 'Labiales L\'Oréal Paris Mate', category: 'Maquillajes', price: 'C$ 420.00', image: $imgLip, brand: 'L\'Oréal', priceNumeric: 420),
            new ProductDTO(id: 14, name: 'Rubor líquido e.l.f.', category: 'Maquillajes', price: 'C$ 380.00', image: $img, brand: 'e.l.f.', priceNumeric: 380),
            new ProductDTO(id: 15, name: 'Primer NYX en spray', category: 'Maquillajes', price: 'C$ 400.00', image: $img, brand: 'NYX', priceNumeric: 400),
            new ProductDTO(id: 16, name: 'Bases e.l.f', category: 'Maquillajes', price: 'C$ 400.00', image: $imgBase, brand: 'e.l.f.', priceNumeric: 400),
            new ProductDTO(id: 17, name: 'Fijador de maquillaje L\'Oréal', category: 'Maquillajes', price: 'C$ 600.00', image: $img, brand: 'L\'Oréal', priceNumeric: 600),
            new ProductDTO(id: 18, name: 'Got2b Glued Styling Spiking Glue', category: 'Maquillajes', price: 'C$ 370.00', image: $img, brand: 'Got2b', priceNumeric: 370),
            new ProductDTO(id: 19, name: 'Fijadores e.l.f', category: 'Maquillajes', price: 'C$ 450.00', image: $img, brand: 'e.l.f.', priceNumeric: 450),
            new ProductDTO(id: 20, name: 'Bronceador y contorno (e.l.f. Camo Liquid Bronzer)', category: 'Maquillajes', price: 'C$ 380.00', image: $img, brand: 'e.l.f.', priceNumeric: 380),
            new ProductDTO(id: 21, name: 'Corrector de ojos Maybelline', category: 'Maquillajes', price: 'C$ 400.00', image: $img, brand: 'Maybelline', priceNumeric: 400),
            new ProductDTO(id: 22, name: 'Polvo suelto fijador Infallible Blur-fection de L\'Oréal', category: 'Maquillajes', price: 'C$ 400.00', image: $img, brand: 'L\'Oréal', priceNumeric: 400),
            new ProductDTO(id: 23, name: 'Aceite Labial Voluminizador Hyaluronic de L\'Oréal', category: 'Maquillajes', price: 'C$ 420.00', image: $imgLip, brand: 'L\'Oréal', priceNumeric: 420),
            new ProductDTO(id: 24, name: 'Halo Glow Liquid Filter', category: 'Maquillajes', price: 'C$ 440.00', image: $imgBase, brand: 'e.l.f.', priceNumeric: 440),
            new ProductDTO(id: 25, name: 'Pixi by Petra On-the-Glow Blush (19gr)', category: 'Maquillajes', price: 'C$ 480.00', image: $img, brand: 'Pixi', priceNumeric: 480),
            new ProductDTO(id: 26, name: 'Polvo iluminador Pixi Glow-y Powder', category: 'Maquillajes', price: 'C$ 380.00', image: $img, brand: 'Pixi', priceNumeric: 380),
            new ProductDTO(id: 27, name: 'Tintas de labios Maybelline SuperStay Teddy Tint', category: 'Maquillajes', price: 'C$ 420.00', image: $imgLip, brand: 'Maybelline', priceNumeric: 420),
            new ProductDTO(id: 28, name: 'L\'Oréal Paris Infallible 32 Hour Fresh Wear Foundation', category: 'Maquillajes', price: 'C$ 480.00', image: $imgBase, brand: 'L\'Oréal', priceNumeric: 480),
            new ProductDTO(id: 29, name: 'Polvo Infallible 24H Fresh Wear de L\'Oréal', category: 'Maquillajes', price: 'C$ 420.00', image: $img, brand: 'L\'Oréal', priceNumeric: 420),
            new ProductDTO(id: 30, name: 'Base Maybelline Lumi Matte', category: 'Maquillajes', price: 'C$ 480.00', image: $imgBase, brand: 'Maybelline', priceNumeric: 480),
            new ProductDTO(id: 31, name: 'Corrector Skin Ink L\'Oréal', category: 'Maquillajes', price: 'C$ 400.00', image: $img, brand: 'L\'Oréal', priceNumeric: 400),
            new ProductDTO(id: 32, name: 'Blush On the Glow Pixi (10gr)', category: 'Maquillajes', price: 'C$ 380.00', image: $img, brand: 'Pixi', priceNumeric: 380),
            new ProductDTO(id: 33, name: 'Máscara de pestañas Great Lash de Maybelline', category: 'Maquillajes', price: 'C$ 420.00', image: $img, brand: 'Maybelline', priceNumeric: 420),
            new ProductDTO(id: 34, name: 'Maybelline Great Lash Waterproof', category: 'Maquillajes', price: 'C$ 480.00', image: $img, brand: 'Maybelline', priceNumeric: 480),
            new ProductDTO(id: 35, name: 'Contour Halo Glow Elf', category: 'Maquillajes', price: 'C$ 380.00', image: $img, brand: 'e.l.f.', priceNumeric: 380),
            new ProductDTO(id: 36, name: 'Gloss Serum NYX', category: 'Maquillajes', price: 'C$ 380.00', image: $imgLip, brand: 'NYX', priceNumeric: 380),
            new ProductDTO(id: 37, name: 'Pro Gloss L\'Oréal', category: 'Maquillajes', price: 'C$ 380.00', image: $imgLip, brand: 'L\'Oréal', priceNumeric: 380),
            new ProductDTO(id: 38, name: 'Blush Halo Glow Elf', category: 'Maquillajes', price: 'C$ 380.00', image: $img, brand: 'e.l.f.', priceNumeric: 380),
            new ProductDTO(id: 39, name: 'Blush Stick Neutrogena', category: 'Maquillajes', price: 'C$ 400.00', image: $img, brand: 'Neutrogena', priceNumeric: 400),
            new ProductDTO(id: 40, name: 'Eraser Treatment Base Concealer', category: 'Maquillajes', price: 'C$ 450.00', image: $img, brand: 'Maybelline', priceNumeric: 450),
            new ProductDTO(id: 41, name: 'Base Plump y Glow Maybelline', category: 'Maquillajes', price: 'C$ 450.00', image: $imgBase, brand: 'Maybelline', priceNumeric: 450),
            new ProductDTO(id: 42, name: 'Polvo Finishing Powder C...', category: 'Maquillajes', price: 'C$ 380.00', image: $img, brand: 'NYX', priceNumeric: 380),
            new ProductDTO(id: 43, name: 'Corrector Maybelline', category: 'Maquillajes', price: 'C$ 380.00', image: $img, brand: 'Maybelline', priceNumeric: 380),
            new ProductDTO(id: 44, name: 'Corrector L\'Oréal', category: 'Maquillajes', price: 'C$ 400.00', image: $img, brand: 'L\'Oréal', priceNumeric: 400),

            // Productos Pixi
            new ProductDTO(id: 801, name: 'Pixi by Petra On-the-Glow Blush', category: 'Maquillajes', price: 'C$ 480.00', image: $img, brand: 'Pixi', priceNumeric: 480),
            new ProductDTO(id: 802, name: 'Polvo Iluminador Pixi Glow-y Powder', category: 'Maquillajes', price: 'C$ 380.00', image: $img, brand: 'Pixi', priceNumeric: 380),
            new ProductDTO(id: 803, name: 'Blush On the Glow Pixi (10gr)', category: 'Maquillajes', price: 'C$ 380.00', image: $img, brand: 'Pixi', priceNumeric: 380),
        ];
    }
}
