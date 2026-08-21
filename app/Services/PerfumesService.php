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
        $img = 'https://images.unsplash.com/photo-1594035910387-fea47714263f?auto=format&fit=crop&q=80&w=600'; // General perfume image

        return [
            // Perfumes Árabes
            new ProductDTO(901, 'Lattafa - Asad Bourbon', 'Perfumería', 'C$ 1,450.00', $img),
            new ProductDTO(902, 'Lattafa - Khamrah Qahwa', 'Perfumería', 'C$ 1,550.00', $img),
            new ProductDTO(903, 'Odyssey Mandarin Sky (100ml) - Armaf', 'Perfumería', 'C$ 1,350.00', $img),
            new ProductDTO(904, 'Lattafa Eclaire', 'Perfumería', 'C$ 1,700.00', $img),
            new ProductDTO(905, 'Lattafa Yara Pink', 'Perfumería', 'C$ 1,350.00', $img),
            new ProductDTO(906, 'Club de Nuit - Women (105ml) - Armaf', 'Perfumería', 'C$ 1,400.00', $img),
            new ProductDTO(907, 'Lattafa - Khamrah', 'Perfumería', 'C$ 1,600.00', $img),
            new ProductDTO(908, 'Lattafa - Delilah', 'Perfumería', 'C$ 1,250.00', $img),
            new ProductDTO(909, '9 PM Rebel - Afnan', 'Perfumería', 'C$ 1,700.00', $img),
            new ProductDTO(910, 'Armaf Odyssey Aqua Men (100ml)', 'Perfumería', 'C$ 1,500.00', $img),
        ];
    }
}
