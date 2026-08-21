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
            new ProductDTO(id: 201, name: 'Sérum Facial con Ácido Azelaico 12% TIRTIR', category: 'Skincare', price: 'C$ 1,100.00', image: $img, brand: 'TIRTIR', skinType: 'Mixta', priceNumeric: 1100),
            new ProductDTO(id: 202, name: 'Ampolla Facial Madagascar Centella Asiatica 100ML Ampoule', category: 'Skincare', price: 'C$ 950.00', image: $img, brand: 'Skin1004', skinType: 'Sensible', priceNumeric: 950),
            new ProductDTO(id: 203, name: 'Crema Hidratante 147 Barrier Cream', category: 'Skincare', price: 'C$ 1,140.00', image: $img, brand: 'Skin1004', skinType: 'Seca', priceNumeric: 1140),
            new ProductDTO(id: 204, name: 'Ampolla Facial Iluminadora Tone Brightening Capsule Ampoule Jumbo', category: 'Skincare', price: 'C$ 940.00', image: $img, brand: 'Skin1004', skinType: 'Mixta', priceNumeric: 940),
            new ProductDTO(id: 205, name: 'Pure Glow Essentials Set', category: 'Skincare', price: 'C$ 1,100.00', image: $img, brand: 'Skin1004', skinType: 'Mixta', priceNumeric: 1100),
            new ProductDTO(id: 206, name: 'Pine Calming Cica Trial Kit - Round Lab', category: 'Skincare', price: 'C$ 1,150.00', image: $img, brand: 'Round Lab', skinType: 'Sensible', priceNumeric: 1150),
            new ProductDTO(id: 207, name: 'Mascarilla de Arcilla Madagascar Centella Poremizing Quick Clay Stick Mask', category: 'Skincare', price: 'C$ 700.00', image: $img, brand: 'Skin1004', skinType: 'Grasa', priceNumeric: 700),
            new ProductDTO(id: 208, name: 'Crema Hidratante Madagascar Centella Soothing Cream Bundle', category: 'Skincare', price: 'C$ 880.00', image: $img, brand: 'Skin1004', skinType: 'Sensible', priceNumeric: 880),
            new ProductDTO(id: 209, name: 'Ampolla Facial Madagascar Centella Polemerizin 100ML', category: 'Skincare', price: 'C$ 900.00', image: $img, brand: 'Skin1004', skinType: 'Grasa', priceNumeric: 900),
            new ProductDTO(id: 210, name: 'Ampolla Facial Madagascar Centella Tea-Trica Relief Jumbo Ampoule', category: 'Skincare', price: 'C$ 1,050.00', image: $img, brand: 'Skin1004', skinType: 'Grasa', priceNumeric: 1050),
            new ProductDTO(id: 211, name: 'Madagascar Centella Hyalu-Cica Blue Serum 50 ML', category: 'Skincare', price: 'C$ 800.00', image: $img, brand: 'Skin1004', skinType: 'Mixta', priceNumeric: 800),
            new ProductDTO(id: 212, name: 'Protector Solar en Barra Madagascar Centella Hyalu-Cica Silky-Fit Sun Stick', category: 'Skincare', price: 'C$ 650.00', image: $img, brand: 'Skin1004', skinType: 'Mixta', priceNumeric: 650),
            new ProductDTO(id: 213, name: 'Madagascar Centella Hyalu-Cica Travel Kit', category: 'Skincare', price: 'C$ 1,250.00', image: $img, brand: 'Skin1004', skinType: 'Mixta', priceNumeric: 1250),

            // Skincare e.l.f.
            new ProductDTO(id: 301, name: 'Makeup Melting Cleansing Balm XXL 100gr', category: 'Skincare', price: 'C$ 550.00', image: $img, brand: 'e.l.f.', skinType: 'Mixta', priceNumeric: 550),
            new ProductDTO(id: 302, name: 'Daily Cleanser (Holy Hydration!)', category: 'Skincare', price: 'C$ 480.00', image: $img, brand: 'e.l.f.', skinType: 'Seca', priceNumeric: 480),
            new ProductDTO(id: 303, name: 'SKIN Bronzing Drops', category: 'Skincare', price: 'C$ 450.00', image: $img, brand: 'e.l.f.', skinType: 'Mixta', priceNumeric: 450),
            new ProductDTO(id: 304, name: 'Holy Hydration! Sleeping Mask', category: 'Skincare', price: 'C$ 470.00', image: $img, brand: 'e.l.f.', skinType: 'Seca', priceNumeric: 470),
            new ProductDTO(id: 305, name: 'Eye Cream (Holy Hydration!)', category: 'Skincare', price: 'C$ 470.00', image: $img, brand: 'e.l.f.', skinType: 'Sensible', priceNumeric: 470),
            new ProductDTO(id: 306, name: 'Crema Facial / Holy Hydration! Face Cream', category: 'Skincare', price: 'C$ 450.00', image: $img, brand: 'e.l.f.', skinType: 'Seca', priceNumeric: 450),
            new ProductDTO(id: 307, name: 'Thirst Burst Drops (Holy Hydration!)', category: 'Skincare', price: 'C$ 460.00', image: $img, brand: 'e.l.f.', skinType: 'Mixta', priceNumeric: 460),
            new ProductDTO(id: 308, name: 'Triple Bounce Serum (Holy Hydration!)', category: 'Skincare', price: 'C$ 500.00', image: $img, brand: 'e.l.f.', skinType: 'Seca', priceNumeric: 500),
            new ProductDTO(id: 309, name: 'The Hottest Drops Duo', category: 'Skincare', price: 'C$ 400.00', image: $img, brand: 'e.l.f.', skinType: 'Mixta', priceNumeric: 400),

            // Skincare CeraVe
            new ProductDTO(id: 401, name: 'Sérum Hidratante con Ácido Hialurónico 30ML', category: 'Skincare', price: 'C$ 700.00', image: $img, brand: 'CeraVe', skinType: 'Seca', priceNumeric: 700),
            new ProductDTO(id: 402, name: 'Loción Hidratante Facial CeraVe (AM con SPF 30) 60ML', category: 'Skincare', price: 'C$ 760.00', image: $img, brand: 'CeraVe', skinType: 'Mixta', priceNumeric: 760),
            new ProductDTO(id: 403, name: 'Eye Repair Cream (0.5oz)', category: 'Skincare', price: 'C$ 700.00', image: $img, brand: 'CeraVe', skinType: 'Sensible', priceNumeric: 700),
            new ProductDTO(id: 404, name: 'Acne Clay-to-Foam Cleanser 118ML', category: 'Skincare', price: 'C$ 750.00', image: $img, brand: 'CeraVe', skinType: 'Grasa', priceNumeric: 750),
            new ProductDTO(id: 405, name: 'Acne Control Gel (40ml)', category: 'Skincare', price: 'C$ 800.00', image: $img, brand: 'CeraVe', skinType: 'Grasa', priceNumeric: 800),
            new ProductDTO(id: 406, name: 'Sérum Retinol Resurfacing 30ML', category: 'Skincare', price: 'C$ 850.00', image: $img, brand: 'CeraVe', skinType: 'Sensible', priceNumeric: 850),

            // Skincare The Ordinary
            new ProductDTO(id: 501, name: 'The Acne Set', category: 'Skincare', price: 'C$ 1,100.00', image: $img, brand: 'The Ordinary', skinType: 'Grasa', priceNumeric: 1100),
            new ProductDTO(id: 502, name: 'Caffeine Solution 5% + EGCG 30ML', category: 'Skincare', price: 'C$ 600.00', image: $img, brand: 'The Ordinary', skinType: 'Mixta', priceNumeric: 600),
            new ProductDTO(id: 503, name: 'Niacinamide 10% + Zinc 1% 30ML', category: 'Skincare', price: 'C$ 550.00', image: $img, brand: 'The Ordinary', skinType: 'Grasa', priceNumeric: 550),
            new ProductDTO(id: 504, name: 'Glycolic Acid 7% Exfoliating Toner 240ML', category: 'Skincare', price: 'C$ 1,000.00', image: $img, brand: 'The Ordinary', skinType: 'Mixta', priceNumeric: 1000),
            new ProductDTO(id: 505, name: 'AHA 30% + BHA 2% Peeling Solution 30ML', category: 'Skincare', price: 'C$ 600.00', image: $img, brand: 'The Ordinary', skinType: 'Mixta', priceNumeric: 600),
            new ProductDTO(id: 506, name: 'Soothing & Barrier Support Serum', category: 'Skincare', price: 'C$ 900.00', image: $img, brand: 'The Ordinary', skinType: 'Sensible', priceNumeric: 900),
            new ProductDTO(id: 507, name: 'Multi-Peptide Lash and Brow Serum', category: 'Skincare', price: 'C$ 850.00', image: $img, brand: 'The Ordinary', skinType: 'Mixta', priceNumeric: 850),
            new ProductDTO(id: 508, name: 'Hyaluronic Acid 2% + B5 (With Ceramides)', category: 'Skincare', price: 'C$ 650.00', image: $img, brand: 'The Ordinary', skinType: 'Seca', priceNumeric: 650),
            new ProductDTO(id: 509, name: 'Retinol 1% in Squalane', category: 'Skincare', price: 'C$ 650.00', image: $img, brand: 'The Ordinary', skinType: 'Sensible', priceNumeric: 650),
            new ProductDTO(id: 510, name: 'Glycolic Acid 7% Exfoliating Toner 100ML', category: 'Skincare', price: 'C$ 600.00', image: $img, brand: 'The Ordinary', skinType: 'Mixta', priceNumeric: 600),

            // Haircare The Ordinary
            new ProductDTO(id: 601, name: 'Natural Moisturizing Factors + HA for Scalp', category: 'Skincare', price: 'C$ 800.00', image: $img, brand: 'The Ordinary', skinType: 'Sensible', priceNumeric: 800),

            // Filtros UV
            new ProductDTO(id: 701, name: 'Loción Hidratante Facial CeraVe (AM Facial Moisturising Lotion SPF 30) 60ML', category: 'Skincare', price: 'C$ 760.00', image: $img, brand: 'CeraVe', skinType: 'Mixta', priceNumeric: 760),
            new ProductDTO(id: 702, name: 'Suero con filtro UV SPF 45 (The Ordinary)', category: 'Skincare', price: 'C$ 1,200.00', image: $img, brand: 'The Ordinary', skinType: 'Sensible', priceNumeric: 1200),
        ];
    }
}
