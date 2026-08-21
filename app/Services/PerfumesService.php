<?php

namespace App\Services;

use App\DTOs\ProductDTO;

class PerfumesService
{
    /**
     * @return array<ProductDTO>
     */
    public function getAllProducts(): array
    {
        $imgAmber = 'https://images.unsplash.com/photo-1541643600914-78b084683601?auto=format&fit=crop&q=80&w=600';
        $imgDark = 'https://images.unsplash.com/photo-1523293182086-7651a899d37f?auto=format&fit=crop&q=80&w=600';
        $imgPink = 'https://images.unsplash.com/photo-1588405748480-1cf414c843f8?auto=format&fit=crop&q=80&w=600';
        $imgFresh = 'https://images.unsplash.com/photo-1592945403244-b3fbafd7f539?auto=format&fit=crop&q=80&w=600';

        return [
            // Perfumes Árabes
            new ProductDTO(id: 901, name: 'Lattafa - Asad Bourbon', category: 'Perfumería', price: 'C$ 1,450.00', image: $imgDark, brand: 'Lattafa', gender: 'Hombre', priceNumeric: 1450),
            new ProductDTO(id: 902, name: 'Lattafa - Khamrah Qahwa', category: 'Perfumería', price: 'C$ 1,550.00', image: $imgAmber, brand: 'Lattafa', gender: 'Unisex', priceNumeric: 1550),
            new ProductDTO(id: 903, name: 'Odyssey Mandarin Sky (100ml) - Armaf', category: 'Perfumería', price: 'C$ 1,350.00', image: $imgFresh, brand: 'Armaf', gender: 'Hombre', priceNumeric: 1350),
            new ProductDTO(id: 904, name: 'Lattafa Eclaire', category: 'Perfumería', price: 'C$ 1,700.00', image: $imgAmber, brand: 'Lattafa', gender: 'Unisex', priceNumeric: 1700),
            new ProductDTO(id: 905, name: 'Lattafa Yara Pink', category: 'Perfumería', price: 'C$ 1,350.00', image: $imgPink, brand: 'Lattafa', gender: 'Mujer', priceNumeric: 1350),
            new ProductDTO(id: 906, name: 'Club de Nuit - Women (105ml) - Armaf', category: 'Perfumería', price: 'C$ 1,400.00', image: $imgDark, brand: 'Armaf', gender: 'Mujer', priceNumeric: 1400),
            new ProductDTO(id: 907, name: 'Lattafa - Khamrah', category: 'Perfumería', price: 'C$ 1,600.00', image: $imgAmber, brand: 'Lattafa', gender: 'Unisex', priceNumeric: 1600),
            new ProductDTO(id: 908, name: 'Lattafa - Delilah', category: 'Perfumería', price: 'C$ 1,250.00', image: $imgPink, brand: 'Lattafa', gender: 'Mujer', priceNumeric: 1250),
            new ProductDTO(id: 909, name: '9 PM Rebel - Afnan', category: 'Perfumería', price: 'C$ 1,700.00', image: $imgDark, brand: 'Afnan', gender: 'Hombre', priceNumeric: 1700),
            new ProductDTO(id: 910, name: 'Armaf Odyssey Aqua Men (100ml)', category: 'Perfumería', price: 'C$ 1,500.00', image: $imgFresh, brand: 'Armaf', gender: 'Hombre', priceNumeric: 1500),
        ];
    }
}
