<script setup lang="ts">
import { ref } from 'vue';
import { Head } from '@inertiajs/vue3';
import AppLayout from '@/layouts/AppLayout.vue';
import AiSearchBar from '@/components/AiSearchBar.vue';
import ProductGrid from '@/components/ProductGrid.vue';
import HeroGallery from '@/components/HeroGallery.vue';
import type { Product } from '@/types';

const searchQuery = ref('');
const isSearching = ref(false);
const cartCount = ref(0);
const aiRationale = ref('');

const largeHeroImages = [
    '/hero/01.avif',
    '/hero/02.avif',
    '/hero/03.avif',
    '/hero/07.avif',
];

const squareHeroImages = [
    '/hero/04.avif',
    '/hero/05.avif',
    '/hero/06.avif',
];

const products = ref<Product[]>([
    {
        id: 1,
        name: 'Serum Iluminador Vitamina C',
        category: 'Skincare',
        price: 'C$ 450.00',
        description: 'Fórmula antioxidante de alta potencia para unificar el tono y aportar luminosidad radiante.',
        image: 'https://images.unsplash.com/photo-1620916566398-39f1143ab7be?auto=format&fit=crop&q=80&w=600',
    },
    {
        id: 2,
        name: 'Labial Mate Aterciopelado',
        category: 'Maquillaje',
        price: 'C$ 220.00',
        description: 'Color intenso de larga duración con acabado mate aterciopelado y sensación ligera.',
        image: 'https://images.unsplash.com/photo-1586495777744-4413f21062fa?auto=format&fit=crop&q=80&w=600',
    },
    {
        id: 3,
        name: 'Midnight Bloom Eau de Parfum',
        category: 'Perfumería',
        price: 'C$ 850.00',
        description: 'Fragancia sofisticada con notas florales nocturnas, toques de vainilla y ámbar cálido.',
        image: 'https://images.unsplash.com/photo-1594035910387-fea47794261f?auto=format&fit=crop&q=80&w=600',
    },
]);

async function handleAiSearch(query: string) {
    if (!query.trim()) return;
    
    isSearching.value = true;
    aiRationale.value = '';
    
    try {
        const xsrfCookie = document.cookie
            .split('; ')
            .find(row => row.startsWith('XSRF-TOKEN='))
            ?.split('=')[1];

        const response = await fetch('/search/ai', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'X-XSRF-TOKEN': decodeURIComponent(xsrfCookie || '')
            },
            body: JSON.stringify({ query })
        });

        if (!response.ok) {
            throw new Error('Network response was not ok');
        }

        const data = await response.json();
        
        if (data.products && data.products.length > 0) {
            products.value = data.products;
        } else {
            products.value = [];
        }
        
        if (data.rationale) {
            aiRationale.value = data.rationale;
        }
    } catch (error) {
        console.error('AI Search Error:', error);
        aiRationale.value = 'Lo sentimos, hubo un problema al procesar tu búsqueda. Por favor, intenta de nuevo.';
    } finally {
        isSearching.value = false;
    }
}

function handleAddToCart(product: Product) {
    cartCount.value++;
}
</script>

<template>
    <Head title="Elegancia en cada gota" />

    <AppLayout :cart-count="cartCount">
        <main class="max-w-7xl mx-auto px-4 sm:px-6 pt-6 sm:pt-10 pb-12 md:pt-12 md:pb-16">
            <!-- Hero Section -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-8 items-center">
                <!-- Left Column: Content -->
                <div class="flex flex-col items-start justify-center text-left">
                    <!-- Badge -->
                    <div class="inline-flex items-center space-x-2 px-3 sm:px-4 py-1 rounded-full bg-[#F3EBED] text-[#8C6A5D]/90 text-[10px] sm:text-xs font-medium tracking-wider uppercase mb-4 sm:mb-6">
                        <span>Catalogo Web Inteligente</span>
                    </div>

                    <h1 class="text-4xl sm:text-4xl lg:text-5xl xl:text-[3.25rem] text-[#8C6A5D] font-serif font-semibold mb-4 sm:mb-6 leading-tight max-w-xl">
                        Tienda en Linea de cosmética y cuidado personal de alta fidelidad
                    </h1>
                    
                    <p class="text-base sm:text-lg text-[#2C2C2C]/80 mb-6 sm:mb-8 max-w-lg font-sans leading-relaxed">
                        Eleva tu rutina diaria con productos rigurosamente seleccionados para la vitalidad de tu piel.
                    </p>

                    <!-- AI Natural Language Search -->
                    <div class="w-full max-w-xl">
                        <AiSearchBar 
                            v-model="searchQuery" 
                            :loading="isSearching" 
                            @submit="handleAiSearch"
                            placeholder="¿Qué buscas hoy?"
                        />
                    </div>
                </div>

                <!-- Right Column: Images (Desktop Only) -->
                <HeroGallery 
                    :large-images="largeHeroImages" 
                    :square-images="squareHeroImages" 
                />
            </div>

            <!-- Curated Products Showcase -->
            <div class="mt-12 sm:mt-16 md:mt-20 w-full">
                <!-- AI Rationale Banner -->
                <div v-if="aiRationale" class="mb-8 p-6 bg-white border border-[#DAB6C4] rounded-2xl shadow-sm animate-fade-in-up">
                    <div class="flex items-start gap-4">
                        <div class="p-3 bg-[#F3EBED] text-[#A388A9] rounded-full shrink-0 mt-1">
                            <FontAwesomeIcon icon="wand-magic-sparkles" class="w-5 h-5" />
                        </div>
                        <div>
                            <h3 class="text-[#8C6A5D] font-serif text-lg font-semibold mb-2">Recomendación de la IA</h3>
                            <p class="text-[#2C2C2C]/80 font-sans leading-relaxed">{{ aiRationale }}</p>
                        </div>
                    </div>
                </div>

                <ProductGrid 
                    :products="products" 
                    title="Resultados del Catálogo" 
                    @add-to-cart="handleAddToCart" 
                />
            </div>
        </main>
    </AppLayout>
</template>
