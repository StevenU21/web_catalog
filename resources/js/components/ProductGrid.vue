<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import ProductCard from '@/components/ProductCard.vue';
import type { Product } from '@/types';

withDefaults(
    defineProps<{
        products: Product[];
        title?: string;
        viewAllHref?: string;
    }>(),
    {
        title: 'Colección Destacada',
        viewAllHref: '#',
    }
);

const emit = defineEmits<{
    (e: 'addToCart', product: Product): void;
}>();
</script>

<template>
    <section class="w-full text-left">
        <!-- Section Header -->
        <div class="flex items-center justify-between mb-10 border-b border-[#DAB6C4]/30 pb-4">
            <h2 class="text-2xl md:text-3xl text-[#8C6A5D] font-serif font-semibold">
                {{ title }}
            </h2>
            <Link 
                v-if="viewAllHref" 
                :href="viewAllHref" 
                class="text-sm font-medium text-[#A388A9] hover:text-[#8C6A5D] transition-colors flex items-center gap-1 group"
            >
                <span>Ver Todo</span>
                <svg class="w-4 h-4 transition-transform group-hover:translate-x-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </Link>
        </div>

        <!-- Product Grid Layout -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8 md:gap-10">
            <ProductCard 
                v-for="product in products" 
                :key="product.id" 
                :product="product" 
                @add-to-cart="emit('addToCart', $event)" 
            />
        </div>
    </section>
</template>
