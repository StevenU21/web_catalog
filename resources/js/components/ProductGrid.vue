<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';
import { faArrowRight } from '@fortawesome/free-solid-svg-icons';
import ProductCard from '@/components/ProductCard.vue';
import type { Product } from '@/types';

withDefaults(
    defineProps<{
        products: Product[];
        title?: string;
        viewAllHref?: string;
        hideViewAll?: boolean;
    }>(),
    {
        title: 'Colección Destacada',
        viewAllHref: '#',
        hideViewAll: false,
    }
);

const emit = defineEmits<{
    (e: 'addToCart', product: Product): void;
}>();
</script>

<template>
    <section class="w-full text-left">
        <!-- Section Header -->
        <div class="flex items-center justify-between mb-6 sm:mb-10 border-b border-[#DAB6C4]/30 pb-3 sm:pb-4">
            <h2 class="text-xl sm:text-2xl md:text-3xl text-[#8C6A5D] font-serif font-semibold">
                {{ title }}
            </h2>
            <Link 
                v-if="viewAllHref && !hideViewAll" 
                :href="viewAllHref" 
                class="text-xs sm:text-sm font-medium text-[#A388A9] hover:text-[#8C6A5D] transition-colors flex items-center gap-1.5 sm:gap-2 group"
            >
                <span>Ver Todo</span>
                <FontAwesomeIcon :icon="faArrowRight" class="text-xs transition-transform group-hover:translate-x-1" />
            </Link>
        </div>

        <!-- Product Grid Layout (2 cols on mobile, 3 on tablet/desktop) -->
        <div class="grid grid-cols-2 md:grid-cols-3 gap-3.5 sm:gap-6 md:gap-10">
            <ProductCard 
                v-for="product in products" 
                :key="product.id" 
                :product="product" 
                @add-to-cart="emit('addToCart', $event)" 
            />
        </div>
    </section>
</template>
