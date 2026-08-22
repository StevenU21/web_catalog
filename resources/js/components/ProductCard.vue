<script setup lang="ts">
import { faCartPlus } from '@fortawesome/free-solid-svg-icons';
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';
import { Link } from '@inertiajs/vue3';
import { ref } from 'vue';
import { show as catalogShow } from '@/routes/catalog';
import type { Product } from '@/types';

defineProps<{
    product: Product;
}>();

const emit = defineEmits<{
    (e: 'addToCart', product: Product): void;
}>();

const isImageLoaded = ref(false);
</script>

<template>
    <Link :href="catalogShow.url({ id: product.id })" class="group cursor-pointer flex flex-col h-full">
        <!-- Product Image Surface -->
        <div class="relative w-full aspect-[4/5] bg-white rounded-sm mb-2.5 sm:mb-4 overflow-hidden shadow-xs transition-transform duration-500 group-hover:-translate-y-1 group-hover:shadow-md">
            <!-- Skeleton Loader -->
            <div 
                v-if="!isImageLoaded" 
                class="absolute inset-0 bg-[#F7F5F8] animate-pulse flex items-center justify-center z-0"
            >
                <div class="w-12 h-12 rounded-full bg-[#DAB6C4]/20"></div>
            </div>

            <img 
                :src="product.image" 
                :alt="product.name" 
                loading="lazy"
                @load="isImageLoaded = true"
                @error="isImageLoaded = true"
                :class="[
                    'object-cover w-full h-full mix-blend-multiply transition-all duration-700 ease-in-out relative z-10',
                    isImageLoaded ? 'opacity-95 group-hover:scale-105' : 'opacity-0 scale-95'
                ]"
            >
            <div class="absolute top-2.5 left-2.5 sm:top-4 sm:left-4 bg-[#DAB6C4] text-white text-[9px] sm:text-[10px] font-bold px-2 py-0.5 sm:px-3 sm:py-1.5 rounded-full uppercase tracking-wider shadow-xs">
                {{ product.category }}
            </div>
        </div>

        <!-- Product Information & Actions -->
        <div class="flex flex-col space-y-1 sm:space-y-1.5 px-0.5 sm:px-1 flex-1">
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
            <p v-if="product.description" class="text-[11px] sm:text-xs md:text-sm text-[#2C2C2C]/70 font-sans line-clamp-2 leading-relaxed pt-0.5">
                {{ product.description }}
            </p>
        </div>
    </Link>
</template>
