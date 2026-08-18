<script setup lang="ts">
import { ref } from 'vue';
import { Head } from '@inertiajs/vue3';
import AppLayout from '@/layouts/AppLayout.vue';
import AiSearchBar from '@/components/AiSearchBar.vue';
import ProductGrid from '@/components/ProductGrid.vue';
import type { Product } from '@/types';

const searchQuery = ref('');
const isSearching = ref(false);
const cartCount = ref(0);

const products: Product[] = [
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
];

function handleAiSearch(query: string) {
    if (!query.trim()) return;
    isSearching.value = true;
    // Future AI intent parsing & recommendation flow
    setTimeout(() => {
        isSearching.value = false;
    }, 600);
}

function handleAddToCart(product: Product) {
    cartCount.value++;
}
</script>

<template>
    <Head title="Elegancia en cada gota" />

    <AppLayout :cart-count="cartCount">
        <main class="max-w-7xl mx-auto px-4 sm:px-6 pt-10 sm:pt-16 pb-16 md:pt-24 md:pb-24">
            <!-- Hero Section -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-8 items-center">
                <!-- Left Column: Content -->
                <div class="flex flex-col items-start justify-center text-left">
                    <!-- Badge -->
                    <div class="inline-flex items-center space-x-2 px-3 sm:px-4 py-1.5 rounded-full bg-[#F3EBED] text-[#8C6A5D] text-[10px] sm:text-xs font-bold tracking-wider uppercase mb-6 sm:mb-8">
                        <span class="text-blue-500 bg-white rounded-full w-4 h-4 sm:w-5 sm:h-5 flex items-center justify-center text-[10px] sm:text-xs shadow-sm">✨</span>
                        <span>Asistente de belleza inteligente</span>
                    </div>

                    <h1 class="text-4xl sm:text-5xl lg:text-5xl xl:text-6xl text-[#8C6A5D] font-serif font-semibold mb-6 leading-tight max-w-xl">
                        Descubre tu look ideal con recomendaciones personalizadas
                    </h1>
                    
                    <p class="text-base sm:text-lg text-[#2C2C2C]/80 mb-8 sm:mb-10 max-w-lg font-sans leading-relaxed">
                        Descubre productos para cuidar tu piel y expresar tu estilo, con recomendaciones de IA pensadas para ti
                    </p>

                    <!-- AI Natural Language Search -->
                    <div class="w-full max-w-xl">
                        <AiSearchBar 
                            v-model="searchQuery" 
                            :loading="isSearching" 
                            @submit="handleAiSearch"
                            placeholder="¿Qué buscas hoy? Ej. Serum para manchas..."
                        />
                    </div>
                </div>

                <!-- Right Column: Images -->
                <div class="grid grid-cols-2 gap-3 sm:gap-4 h-[400px] sm:h-[500px] lg:h-[550px] xl:h-[600px] min-h-0">
                    <div class="relative w-full h-full rounded-2xl sm:rounded-3xl overflow-hidden bg-gray-100 shadow-sm">
                        <img src="/hero/01.jpg" alt="Skincare routine" class="absolute inset-0 w-full h-full object-cover" />
                    </div>
                    <div class="grid grid-rows-2 gap-3 sm:gap-4 h-full min-h-0">
                        <div class="relative w-full h-full rounded-2xl sm:rounded-3xl overflow-hidden bg-gray-100 shadow-sm">
                            <img src="/hero/02.jpg" alt="Makeup collection" class="absolute inset-0 w-full h-full object-cover" />
                        </div>
                        <div class="relative w-full h-full rounded-2xl sm:rounded-3xl overflow-hidden bg-gray-100 shadow-sm">
                            <img src="/hero/03.png" alt="Perfume" class="absolute inset-0 w-full h-full object-cover" />
                        </div>
                    </div>
                </div>
            </div>

            <!-- Curated Products Showcase -->
            <div class="mt-14 sm:mt-24 md:mt-32 w-full">
                <ProductGrid 
                    :products="products" 
                    title="Colección Destacada" 
                    @add-to-cart="handleAddToCart" 
                />
            </div>
        </main>
    </AppLayout>
</template>
