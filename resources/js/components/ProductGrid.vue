<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';
import { faArrowRight, faSearch } from '@fortawesome/free-solid-svg-icons';
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
        title: undefined,
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
        <!-- Section Header (Only shown when title is provided) -->
        <div v-if="title" class="flex items-center justify-between mb-6 sm:mb-10 border-b border-[#DAB6C4]/30 pb-3 sm:pb-4">
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

        <!-- Empty State -->
        <div v-if="products.length === 0" class="flex flex-col items-center justify-center py-16 sm:py-24 px-4 text-center">
            <div class="w-20 h-20 bg-white shadow-xs rounded-full flex items-center justify-center mb-6">
                <FontAwesomeIcon :icon="faSearch" class="text-3xl text-[#DAB6C4]" />
            </div>
            <h3 class="text-xl sm:text-2xl text-[#8C6A5D] font-serif font-semibold mb-3">
                No encontramos productos
            </h3>
            <p class="text-[#2C2C2C]/70 text-sm sm:text-base max-w-sm">
                No hay resultados que coincidan con los filtros seleccionados. Intenta cambiar algunas opciones para ver más.
            </p>
        </div>

        <!-- Product Grid Layout (2 cols on mobile, 3 on tablet/desktop) -->
        <div v-else class="grid grid-cols-2 md:grid-cols-3 gap-3.5 sm:gap-6 md:gap-10">
            <ProductCard 
                v-for="product in products" 
                :key="product.id" 
                :product="product" 
                @add-to-cart="emit('addToCart', $event)" 
            />
        </div>
    </section>
</template>
