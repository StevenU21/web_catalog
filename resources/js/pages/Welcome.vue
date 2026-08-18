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
        <main class="max-w-7xl mx-auto px-4 sm:px-6 py-10 sm:py-16 md:py-24 flex flex-col items-center justify-center text-center">
            <!-- Hero Section -->
            <h1 class="text-3xl sm:text-5xl md:text-6xl text-[#8C6A5D] font-serif font-semibold mb-4 sm:mb-6 max-w-3xl leading-tight">
                Descubre tu look ideal con recomendaciones inteligentes.
            </h1>
            <p class="text-sm sm:text-lg md:text-xl text-[#2C2C2C]/80 mb-8 sm:mb-12 max-w-2xl font-sans leading-relaxed">
                Explora nuestra colección curada de cuidado facial, maquillaje y perfumería original. Deja que nuestro asistente inteligente encuentre exactamente lo que necesitas.
            </p>

            <!-- AI Natural Language Search -->
            <AiSearchBar 
                v-model="searchQuery" 
                :loading="isSearching" 
                @submit="handleAiSearch" 
            />

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
