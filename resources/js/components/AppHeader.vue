<script setup lang="ts">
import { 
    faUser, 
    faSpa,
    faBrush,
    faSprayCanSparkles 
} from '@fortawesome/free-solid-svg-icons';
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';
import { Link } from '@inertiajs/vue3';
import { index as makeupIndex } from '@/routes/makeup';
import { index as perfumesIndex } from '@/routes/perfumes';
import { index as skincareIndex } from '@/routes/skincare';
import CartBottomSheet from './CartBottomSheet.vue';
import CartDropdown from './CartDropdown.vue';

// Props not needed for cart anymore

</script>

<template>
    <header class="w-full border-b border-[#DAB6C4]/30 bg-[#F7F5F8]/95 backdrop-blur-xs sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 py-4 sm:py-6 flex items-center justify-between">
            <!-- Brand Logo & Typographic Wordmark -->
            <Link href="/" class="flex items-center gap-2.5 sm:gap-3 hover:opacity-90 transition-opacity">
                <img src="/img/logo.png" alt="Jolismar Store" class="h-9 sm:h-11 w-auto object-contain rounded-xs" />
                <span class="text-lg sm:text-2xl md:text-3xl font-bold text-[#8C6A5D] font-serif tracking-wide">
                    Jolismar Store
                </span>
            </Link>

            <!-- Desktop Categorized Navigation -->
            <nav class="hidden md:flex items-center gap-8 text-sm font-medium tracking-wide">
                <Link :href="skincareIndex.url()" class="text-[#2C2C2C] hover:text-[#8C6A5D] transition-colors inline-flex items-center gap-2 group">
                    <FontAwesomeIcon :icon="faSpa" class="text-xs text-[#A388A9] group-hover:text-[#8C6A5D] transition-colors" />
                    <span>Skincare</span>
                </Link>
                <Link :href="makeupIndex.url()" class="text-[#2C2C2C] hover:text-[#8C6A5D] transition-colors inline-flex items-center gap-2 group">
                    <FontAwesomeIcon :icon="faBrush" class="text-xs text-[#A388A9] group-hover:text-[#8C6A5D] transition-colors" />
                    <span>Maquillaje</span>
                </Link>
                <Link :href="perfumesIndex.url()" class="text-[#2C2C2C] hover:text-[#8C6A5D] transition-colors inline-flex items-center gap-2 group">
                    <FontAwesomeIcon :icon="faSprayCanSparkles" class="text-xs text-[#A388A9] group-hover:text-[#8C6A5D] transition-colors" />
                    <span>Perfumería</span>
                </Link>
            </nav>

            <!-- Actions -->
            <div class="flex items-center gap-3 sm:gap-5">
                <Link href="#" class="hidden sm:inline-flex text-sm font-medium text-[#2C2C2C] hover:text-[#8C6A5D] transition-colors items-center gap-2 group">
                    <FontAwesomeIcon :icon="faUser" class="text-xs text-[#8C6A5D] group-hover:text-[#A388A9] transition-colors" />
                    <span>Iniciar Sesión</span>
                </Link>
                <!-- Desktop Cart -->
                <div class="hidden sm:block">
                    <CartDropdown />
                </div>
                <!-- Mobile Cart -->
                <div class="sm:hidden">
                    <CartBottomSheet />
                </div>
            </div>
        </div>
    </header>
</template>
