<?php

namespace App\Services;

use App\DTOs\ProductDTO;

class SkincareService
{
    /**
     * @return array<ProductDTO>
     */
    public function getAllProducts(): array
    {
        $img = 'https://images.unsplash.com/photo-1620916566398-39f1143ab7be?auto=format&fit=crop&q=80&w=600'; // General skincare image

        return [
            // Skincare Coreano
            new ProductDTO(201, 'Sérum Facial con Ácido Azelaico 12% TIRTIR', 'Skincare', 'C$ 1,100.00', $img),
            new ProductDTO(202, 'Ampolla Facial Madagascar Centella Asiatica 100ML Ampoule', 'Skincare', 'C$ 950.00', $img),
            new ProductDTO(203, 'Crema Hidratante 147 Barrier Cream', 'Skincare', 'C$ 1,140.00', $img),
            new ProductDTO(204, 'Ampolla Facial Iluminadora Tone Brightening Capsule Ampoule Jumbo', 'Skincare', 'C$ 940.00', $img),
            new ProductDTO(205, 'Pure Glow Essentials Set', 'Skincare', 'C$ 1,100.00', $img),
            new ProductDTO(206, 'Pine Calming Cica Trial Kit - Round Lab', 'Skincare', 'C$ 1,150.00', $img),
            new ProductDTO(207, 'Mascarilla de Arcilla Madagascar Centella Poremizing Quick Clay Stick Mask', 'Skincare', 'C$ 700.00', $img),
            new ProductDTO(208, 'Crema Hidratante Madagascar Centella Soothing Cream Bundle', 'Skincare', 'C$ 880.00', $img),
            new ProductDTO(209, 'Ampolla Facial Madagascar Centella Polemerizin 100ML', 'Skincare', 'C$ 900.00', $img),
            new ProductDTO(210, 'Ampolla Facial Madagascar Centella Tea-Trica Relief Jumbo Ampoule', 'Skincare', 'C$ 1,050.00', $img),
            new ProductDTO(211, 'Madagascar Centella Hyalu-Cica Blue Serum 50 ML', 'Skincare', 'C$ 800.00', $img),
            new ProductDTO(212, 'Protector Solar en Barra Madagascar Centella Hyalu-Cica Silky-Fit Sun Stick', 'Skincare', 'C$ 650.00', $img),
            new ProductDTO(213, 'Madagascar Centella Hyalu-Cica Travel Kit', 'Skincare', 'C$ 1,250.00', $img),

            // Skincare e.l.f.
            new ProductDTO(301, 'Makeup Melting Cleansing Balm XXL 100gr', 'Skincare', 'C$ 550.00', $img),
            new ProductDTO(302, 'Daily Cleanser (Holy Hydration!)', 'Skincare', 'C$ 480.00', $img),
            new ProductDTO(303, 'SKIN Bronzing Drops', 'Skincare', 'C$ 450.00', $img),
            new ProductDTO(304, 'Holy Hydration! Sleeping Mask', 'Skincare', 'C$ 470.00', $img),
            new ProductDTO(305, 'Eye Cream (Holy Hydration!)', 'Skincare', 'C$ 470.00', $img),
            new ProductDTO(306, 'Crema Facial / Holy Hydration! Face Cream', 'Skincare', 'C$ 450.00', $img),
            new ProductDTO(307, 'Thirst Burst Drops (Holy Hydration!)', 'Skincare', 'C$ 460.00', $img),
            new ProductDTO(308, 'Triple Bounce Serum (Holy Hydration!)', 'Skincare', 'C$ 500.00', $img),
            new ProductDTO(309, 'The Hottest Drops Duo', 'Skincare', 'C$ 400.00', $img),

            // Skincare CeraVe
            new ProductDTO(401, 'Sérum Hidratante con Ácido Hialurónico 30ML', 'Skincare', 'C$ 700.00', $img),
            new ProductDTO(402, 'Loción Hidratante Facial CeraVe (AM con SPF 30) 60ML', 'Skincare', 'C$ 760.00', $img),
            new ProductDTO(403, 'Eye Repair Cream (0.5oz)', 'Skincare', 'C$ 700.00', $img),
            new ProductDTO(404, 'Acne Clay-to-Foam Cleanser 118ML', 'Skincare', 'C$ 750.00', $img),
            new ProductDTO(405, 'Acne Control Gel (40ml)', 'Skincare', 'C$ 800.00', $img),
            new ProductDTO(406, 'Sérum Retinol Resurfacing 30ML', 'Skincare', 'C$ 850.00', $img),

            // Skincare The Ordinary
            new ProductDTO(501, 'The Acne Set', 'Skincare', 'C$ 1,100.00', $img),
            new ProductDTO(502, 'Caffeine Solution 5% + EGCG 30ML', 'Skincare', 'C$ 600.00', $img),
            new ProductDTO(503, 'Niacinamide 10% + Zinc 1% 30ML', 'Skincare', 'C$ 550.00', $img),
            new ProductDTO(504, 'Glycolic Acid 7% Exfoliating Toner 240ML', 'Skincare', 'C$ 1,000.00', $img),
            new ProductDTO(505, 'AHA 30% + BHA 2% Peeling Solution 30ML', 'Skincare', 'C$ 600.00', $img),
            new ProductDTO(506, 'Soothing & Barrier Support Serum', 'Skincare', 'C$ 900.00', $img),
            new ProductDTO(507, 'Multi-Peptide Lash and Brow Serum', 'Skincare', 'C$ 850.00', $img),
            new ProductDTO(508, 'Hyaluronic Acid 2% + B5 (With Ceramides)', 'Skincare', 'C$ 650.00', $img),
            new ProductDTO(509, 'Retinol 1% in Squalane', 'Skincare', 'C$ 650.00', $img),
            new ProductDTO(510, 'Glycolic Acid 7% Exfoliating Toner 100ML', 'Skincare', 'C$ 600.00', $img),

            // Haircare The Ordinary
            new ProductDTO(601, 'Natural Moisturizing Factors + HA for Scalp', 'Skincare', 'C$ 800.00', $img),

            // Filtros UV
            new ProductDTO(701, 'Loción Hidratante Facial CeraVe (AM Facial Moisturising Lotion SPF 30) 60ML', 'Skincare', 'C$ 760.00', $img),
            new ProductDTO(702, 'Suero con filtro UV SPF 45 (The Ordinary)', 'Skincare', 'C$ 1,200.00', $img),
        ];
    }
}
