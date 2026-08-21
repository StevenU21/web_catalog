<script setup lang="ts">
import { faWandMagicSparkles } from '@fortawesome/free-solid-svg-icons';
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';
import { Head, router } from '@inertiajs/vue3';
import { ref } from 'vue';
import AiLoadingOverlay from '@/components/AiLoadingOverlay.vue';
import AiSearchBar from '@/components/AiSearchBar.vue';
import HeroGallery from '@/components/HeroGallery.vue';
import ProductGrid from '@/components/ProductGrid.vue';
import AppLayout from '@/layouts/AppLayout.vue';
import type { Product } from '@/types';

const props = defineProps<{
    featuredProducts: Product[];
}>();

const searchQuery = ref('');
const isSearching = ref(false);
import { useCart } from '@/composables/useCart';

const { addToCart } = useCart();

const largeHeroImages = [
    '/hero/01.avif',
    '/hero/02.avif',
    '/hero/03.avif',
    '/hero/07.avif',
];

const squareHeroImages = [
    '/hero/04.avif',
    '/hero/05.avif',
    '/hero/06.avif',
];


async function handleAiSearch(query: string) {
    if (!query.trim()) {
return;
}
    
    router.get('/search/ai', { query }, {
        preserveState: true,
        onStart: () => {
 isSearching.value = true; 
},
        onFinish: () => {
 isSearching.value = false; 
},
        onError: () => {
 isSearching.value = false; 
}
    });
}

function handleAddToCart(product: Product) {
    addToCart(product);
}
</script>

<template>
    <Head title="Elegancia en cada gota" />

    <AppLayout>
        <main class="max-w-7xl mx-auto px-4 sm:px-6 pt-6 sm:pt-10 pb-12 md:pt-12 md:pb-16">
            <!-- Hero Section -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-8 items-center">
                <!-- Left Column: Content -->
                <div class="flex flex-col items-start justify-center text-left">
                    
                    <!-- Texts Wrapper -->
                    <div class="mb-6 sm:mb-8">
                        <!-- Badge -->
                        <div class="inline-flex items-center space-x-2 px-3 sm:px-4 py-1 rounded-full bg-[#F3EBED] text-[#8C6A5D]/90 text-[10px] sm:text-xs font-medium tracking-wider uppercase mb-4 sm:mb-6">
                            <span>Catalogo Web Inteligente</span>
                        </div>

                        <h1 class="text-4xl sm:text-4xl lg:text-5xl xl:text-[3.25rem] text-[#8C6A5D] font-serif font-semibold mb-4 sm:mb-6 leading-tight max-w-xl">
                            Tienda en Linea de cosmética y cuidado personal de alta fidelidad
                        </h1>
                        
                        <p class="text-base sm:text-lg text-[#2C2C2C]/80 max-w-lg font-sans leading-relaxed">
                            Eleva tu rutina diaria con productos rigurosamente seleccionados para la vitalidad de tu piel.
                        </p>
                    </div>

                    <!-- AI Natural Language Search -->
                    <div class="w-full max-w-xl">
                        <AiSearchBar 
                            v-model="searchQuery" 
                            :loading="isSearching" 
                            @submit="handleAiSearch"
                            placeholder="¿Qué buscas hoy?"
                        />
                    </div>
                </div>

                <!-- Right Column: Images (Desktop Only) -->
                <div>
                    <HeroGallery 
                        :large-images="largeHeroImages" 
                        :square-images="squareHeroImages" 
                    />
                </div>
            </div>

            <!-- Curated Products Showcase -->
            <div class="mt-12 sm:mt-16 md:mt-20 w-full">
                <ProductGrid 
                    :products="featuredProducts" 
                    title="Colección Premium" 
                    view-all-href="/catalogo"
                    @add-to-cart="handleAddToCart" 
                />
            </div>

            <!-- Global Fullscreen AI Loading Overlay -->
            <AiLoadingOverlay :show="isSearching" />
        </main>
    </AppLayout>
</template>
