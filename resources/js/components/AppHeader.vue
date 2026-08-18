<script setup lang="ts">
import { Link } from '@inertiajs/vue3';

defineProps<{
    cartCount?: number;
}>();
</script>

<template>
    <header class="w-full border-b border-[#DAB6C4]/30 bg-[#F7F5F8]/95 backdrop-blur-xs sticky top-0 z-40">
        <div class="max-w-7xl mx-auto px-6 py-6 flex items-center justify-between">
            <!-- Typographic Wordmark -->
            <Link href="/" class="text-2xl md:text-3xl font-bold text-[#8C6A5D] font-serif tracking-wide hover:opacity-90 transition-opacity">
                Jolismar Store
            </Link>

            <!-- Categorized Navigation -->
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

            <!-- Actions -->
            <div class="flex items-center gap-4">
                <Link href="#" class="text-sm font-medium text-[#2C2C2C] hover:text-[#8C6A5D] transition-colors">
                    Iniciar Sesión
                </Link>
                <button 
                    type="button"
                    class="px-5 py-2.5 bg-[#A388A9] text-white text-sm font-medium hover:bg-[#8C6A5D] transition-colors shadow-xs rounded-sm cursor-pointer inline-flex items-center gap-2 focus:ring-2 focus:ring-[#A388A9] focus:outline-hidden"
                >
                    <span>Carrito</span>
                    <span class="bg-white/20 px-1.5 py-0.5 rounded-full text-xs font-semibold">
                        {{ cartCount ?? 0 }}
                    </span>
                </button>
            </div>
        </div>
    </header>
</template>
