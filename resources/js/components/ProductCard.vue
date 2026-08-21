<script setup lang="ts">
import { faCartPlus } from '@fortawesome/free-solid-svg-icons';
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';
import { Link } from '@inertiajs/vue3';
import { show as catalogShow } from '@/routes/catalog';
import type { Product } from '@/types';

defineProps<{
    product: Product;
}>();

const emit = defineEmits<{
    (e: 'addToCart', product: Product): void;
}>();
</script>

<template>
    <Link :href="catalogShow.url({ id: product.id })" class="group cursor-pointer flex flex-col h-full">
        <!-- Product Image Surface -->
        <div class="relative w-full aspect-[4/5] bg-white rounded-sm mb-2.5 sm:mb-4 overflow-hidden shadow-xs transition-transform duration-500 group-hover:-translate-y-1 group-hover:shadow-md">
            <img 
                :src="product.image" 
                :alt="product.name" 
                loading="lazy"
                class="object-cover w-full h-full mix-blend-multiply opacity-95 group-hover:scale-105 transition-transform duration-700 ease-in-out"
            >
            <div class="absolute top-2.5 left-2.5 sm:top-4 sm:left-4 bg-[#DAB6C4] text-white text-[9px] sm:text-[10px] font-bold px-2 py-0.5 sm:px-3 sm:py-1.5 rounded-full uppercase tracking-wider shadow-xs">
                {{ product.category }}
            </div>
        </div>

        <!-- Product Information & Actions -->
        <div class="flex flex-col space-y-1 sm:space-y-2 px-0.5 sm:px-1">
            <div class="flex items-center justify-between gap-1">
                <span class="font-sans font-semibold text-sm sm:text-base md:text-lg text-[#2C2C2C]">{{ product.price }}</span>
                <button 
                    type="button"
                    @click.prevent="emit('addToCart', product)"
                    class="text-xs sm:text-sm font-semibold text-[#A388A9] hover:text-[#8C6A5D] transition-colors cursor-pointer focus:outline-hidden inline-flex items-center gap-1 sm:gap-1.5"
                    aria-label="Agregar al Carrito"
                >
                    <FontAwesomeIcon :icon="faCartPlus" class="text-xs" />
                    <span class="hidden sm:inline">Agregar al Carrito</span>
                    <span class="sm:hidden">Agregar</span>
                </button>
            </div>
            <h3 class="text-sm sm:text-lg md:text-xl font-serif text-[#8C6A5D] group-hover:text-[#A388A9] transition-colors line-clamp-2 leading-snug">
                {{ product.name }}
            </h3>
            <p v-if="product.description" class="hidden sm:block text-xs sm:text-sm text-[#2C2C2C]/70 font-sans line-clamp-2 leading-relaxed pt-0.5">
                {{ product.description }}
            </p>
        </div>
    </Link>
</template>
