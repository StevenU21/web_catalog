<script setup lang="ts">
import { faWandMagicSparkles, faArrowLeft } from '@fortawesome/free-solid-svg-icons';
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';
import { Head, router } from '@inertiajs/vue3';
import { ref } from 'vue';
import AiLoadingOverlay from '@/components/AiLoadingOverlay.vue';
import AiSearchBar from '@/components/AiSearchBar.vue';
import ProductGrid from '@/components/ProductGrid.vue';
import AppLayout from '@/layouts/AppLayout.vue';
import type { Product } from '@/types';

const props = defineProps<{
    products: Product[];
    rationale: string;
    initialQuery: string;
}>();

const searchQuery = ref(props.initialQuery);
const isSearching = ref(false);
import { useCart } from '@/composables/useCart';

const { addToCart } = useCart();

function handleAiSearch(query: string) {
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
    <Head :title="`Búsqueda: ${initialQuery}`" />

    <AppLayout>
        <main class="max-w-7xl mx-auto px-4 sm:px-6 py-6 md:py-10">
            <!-- Breadcrumb / Header Row -->
            <div class="flex items-center justify-between mb-5 w-full max-w-3xl mx-auto">
                <button @click="router.visit('/')" class="inline-flex items-center gap-2 text-[#2C2C2C]/70 hover:text-[#8C6A5D] transition-colors font-medium text-sm">
                    <FontAwesomeIcon :icon="faArrowLeft" />
                    <span>Volver al inicio</span>
                </button>
            </div>

            <!-- Mobile Optimized Header / Search -->
            <div class="mb-8 w-full max-w-3xl mx-auto">
                <div class="flex items-center justify-between mb-6">
                    <h1 class="text-2xl sm:text-3xl text-[#8C6A5D] font-serif font-semibold">Resultados</h1>
                </div>

                <!-- Ai Search Bar -->
                <AiSearchBar 
                    v-model="searchQuery" 
                    :loading="isSearching" 
                    @submit="handleAiSearch"
                    placeholder="¿Buscas algo más?"
                />
            </div>

            <!-- AI Rationale Banner -->
            <div v-if="rationale" class="mb-10 w-full max-w-3xl mx-auto p-5 sm:p-6 bg-white border border-[#DAB6C4] rounded-2xl shadow-sm animate-fade-in-up">
                <div class="flex flex-col sm:flex-row items-start gap-4">
                    <div class="p-3 bg-[#F3EBED] text-[#A388A9] rounded-full shrink-0 self-start">
                        <FontAwesomeIcon :icon="faWandMagicSparkles" class="w-5 h-5" />
                    </div>
                    <div>
                        <h3 class="text-[#8C6A5D] font-serif text-lg font-semibold mb-2">Recomendación de la IA</h3>
                        <p class="text-[#2C2C2C]/80 font-sans leading-relaxed text-sm sm:text-base">{{ rationale }}</p>
                    </div>
                </div>
            </div>

            <!-- Curated Products Showcase -->
            <div class="w-full mt-4">
                <ProductGrid 
                    :products="products" 
                    title="Productos Recomendados" 
                    :hide-view-all="true" 
                    @add-to-cart="handleAddToCart" 
                />
            </div>

            <AiLoadingOverlay :show="isSearching" />
        </main>
    </AppLayout>
</template>
