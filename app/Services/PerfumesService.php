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
            new ProductDTO(901, 'Lattafa - Asad Bourbon', 'Perfumería', 'C$ 1,450.00', $imgDark),
            new ProductDTO(902, 'Lattafa - Khamrah Qahwa', 'Perfumería', 'C$ 1,550.00', $imgAmber),
            new ProductDTO(903, 'Odyssey Mandarin Sky (100ml) - Armaf', 'Perfumería', 'C$ 1,350.00', $imgFresh),
            new ProductDTO(904, 'Lattafa Eclaire', 'Perfumería', 'C$ 1,700.00', $imgAmber),
            new ProductDTO(905, 'Lattafa Yara Pink', 'Perfumería', 'C$ 1,350.00', $imgPink),
            new ProductDTO(906, 'Club de Nuit - Women (105ml) - Armaf', 'Perfumería', 'C$ 1,400.00', $imgDark),
            new ProductDTO(907, 'Lattafa - Khamrah', 'Perfumería', 'C$ 1,600.00', $imgAmber),
            new ProductDTO(908, 'Lattafa - Delilah', 'Perfumería', 'C$ 1,250.00', $imgPink),
            new ProductDTO(909, '9 PM Rebel - Afnan', 'Perfumería', 'C$ 1,700.00', $imgDark),
            new ProductDTO(910, 'Armaf Odyssey Aqua Men (100ml)', 'Perfumería', 'C$ 1,500.00', $imgFresh),
        ];
    }
}
