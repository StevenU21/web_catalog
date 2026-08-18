<script setup lang="ts">
import { ref } from 'vue';
import { Link } from '@inertiajs/vue3';
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';
import { faBagShopping, faUser, faBars, faXmark } from '@fortawesome/free-solid-svg-icons';

defineProps<{
    cartCount?: number;
}>();

const isMobileMenuOpen = ref(false);
</script>

<template>
    <header class="w-full border-b border-[#DAB6C4]/30 bg-[#F7F5F8]/95 backdrop-blur-xs sticky top-0 z-40">
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
                <Link href="#" class="text-[#2C2C2C] hover:text-[#8C6A5D] transition-colors">
                    Skincare
                </Link>
                <Link href="#" class="text-[#2C2C2C] hover:text-[#8C6A5D] transition-colors">
                    Maquillaje
                </Link>
                <Link href="#" class="text-[#2C2C2C] hover:text-[#8C6A5D] transition-colors">
                    Perfumería
                </Link>
            </nav>

            <!-- Actions & Mobile Toggle -->
            <div class="flex items-center gap-3 sm:gap-5">
                <Link href="#" class="hidden sm:inline-flex text-sm font-medium text-[#2C2C2C] hover:text-[#8C6A5D] transition-colors items-center gap-2">
                    <FontAwesomeIcon :icon="faUser" class="text-xs text-[#8C6A5D]" />
                    <span>Iniciar Sesión</span>
                </Link>
                <button 
                    type="button"
                    class="px-3.5 sm:px-5 py-2 sm:py-2.5 bg-[#A388A9] text-white text-xs sm:text-sm font-medium hover:bg-[#8C6A5D] transition-colors shadow-xs rounded-sm cursor-pointer inline-flex items-center gap-2 sm:gap-2.5 focus:ring-2 focus:ring-[#A388A9] focus:outline-hidden"
                >
                    <FontAwesomeIcon :icon="faBagShopping" />
                    <span class="hidden xs:inline">Carrito</span>
                    <span class="bg-white/20 px-1.5 py-0.5 rounded-full text-xs font-semibold">
                        {{ cartCount ?? 0 }}
                    </span>
                </button>

                <!-- Mobile Hamburger Button -->
                <button 
                    type="button"
                    @click="isMobileMenuOpen = !isMobileMenuOpen"
                    class="md:hidden w-9 h-9 flex items-center justify-center text-[#8C6A5D] hover:bg-[#DAB6C4]/20 rounded-sm transition-colors cursor-pointer"
                    aria-label="Abrir menú"
                >
                    <FontAwesomeIcon :icon="isMobileMenuOpen ? faXmark : faBars" class="text-base" />
                </button>
            </div>
        </div>

        <!-- Mobile Navigation Menu -->
        <div v-if="isMobileMenuOpen" class="md:hidden border-t border-[#DAB6C4]/30 bg-[#F7F5F8] px-6 py-4 space-y-3">
            <nav class="flex flex-col space-y-2 text-sm font-medium">
                <Link href="#" @click="isMobileMenuOpen = false" class="py-2 text-[#2C2C2C] hover:text-[#8C6A5D] transition-colors border-b border-[#DAB6C4]/20">
                    Skincare
                </Link>
                <Link href="#" @click="isMobileMenuOpen = false" class="py-2 text-[#2C2C2C] hover:text-[#8C6A5D] transition-colors border-b border-[#DAB6C4]/20">
                    Maquillaje
                </Link>
                <Link href="#" @click="isMobileMenuOpen = false" class="py-2 text-[#2C2C2C] hover:text-[#8C6A5D] transition-colors border-b border-[#DAB6C4]/20">
                    Perfumería
                </Link>
                <Link href="#" @click="isMobileMenuOpen = false" class="py-2 text-[#2C2C2C] hover:text-[#8C6A5D] transition-colors flex items-center gap-2">
                    <FontAwesomeIcon :icon="faUser" class="text-xs text-[#8C6A5D]" />
                    <span>Iniciar Sesión</span>
                </Link>
            </nav>
        </div>
    </header>
</template>
