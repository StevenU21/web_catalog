<script setup lang="ts">
import type { Product } from '@/types';

defineProps<{
    product: Product;
}>();

const emit = defineEmits<{
    (e: 'addToCart', product: Product): void;
}>();
</script>

<template>
    <div class="group cursor-pointer flex flex-col">
        <!-- Product Image Surface -->
        <div class="relative w-full aspect-[4/5] bg-white rounded-sm mb-4 overflow-hidden shadow-xs transition-transform duration-500 group-hover:-translate-y-1 group-hover:shadow-md">
            <img 
                :src="product.image" 
                :alt="product.name" 
                loading="lazy"
                class="object-cover w-full h-full mix-blend-multiply opacity-95 group-hover:scale-105 transition-transform duration-700 ease-in-out"
            >
            <div class="absolute top-4 left-4 bg-[#DAB6C4] text-white text-[10px] font-bold px-3 py-1.5 rounded-full uppercase tracking-wider shadow-xs">
                {{ product.category }}
            </div>
        </div>

        <!-- Product Information & Actions -->
        <div class="flex flex-col space-y-2 px-1">
            <div class="flex items-center justify-between">
                <span class="font-sans font-semibold text-lg text-[#2C2C2C]">{{ product.price }}</span>
                <button 
                    type="button"
                    @click.stop="emit('addToCart', product)"
                    class="text-sm font-semibold text-[#A388A9] hover:text-[#8C6A5D] transition-colors underline underline-offset-4 cursor-pointer focus:outline-hidden"
                >
                    Agregar al Carrito
                </button>
            </div>
            <h3 class="text-xl font-serif text-[#8C6A5D] group-hover:text-[#A388A9] transition-colors line-clamp-1">
                {{ product.name }}
            </h3>
        </div>
    </div>
</template>
