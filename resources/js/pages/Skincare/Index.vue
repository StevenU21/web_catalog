<script setup lang="ts">
import { ref } from 'vue';
import { Head } from '@inertiajs/vue3';
import AppLayout from '@/layouts/AppLayout.vue';
import ProductGrid from '@/components/ProductGrid.vue';
import { type Product } from '@/types';

defineProps<{
    categoryName: string;
    products: Product[];
}>();

const cartCount = ref(0);

function handleAddToCart(product: Product) {
    cartCount.value++;
    // Future: Call Cart API or emit event
}
</script>

<template>
    <Head :title="categoryName + ' | Jolismar Store'" />

    <AppLayout :cart-count="cartCount">
        <main class="max-w-7xl mx-auto px-4 sm:px-6 pt-6 sm:pt-10 pb-12 md:pt-12 md:pb-16">
            <div class="mb-8">
                <h1 class="text-3xl sm:text-4xl text-[#8C6A5D] font-serif font-semibold mb-2">
                    {{ categoryName }}
                </h1>
                <p class="text-[#2C2C2C]/80 text-sm sm:text-base font-sans">
                    Explora nuestra selección de {{ categoryName.toLowerCase() }} de alta calidad.
                </p>
            </div>

            <!-- Curated Products Showcase -->
            <div class="w-full">
                <ProductGrid 
                    :products="products" 
                    title="Catálogo Completo" 
                    @add-to-cart="handleAddToCart" 
                />
            </div>
        </main>
    </AppLayout>
</template>
