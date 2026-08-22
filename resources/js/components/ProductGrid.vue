<script setup lang="ts">
import { faArrowRight, faSearch, faChevronLeft, faChevronRight } from '@fortawesome/free-solid-svg-icons';
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';
import { Link } from '@inertiajs/vue3';
import { ref, computed, watch } from 'vue';
import ProductCard from '@/components/ProductCard.vue';
import { useMediaQuery } from '@/composables/useMediaQuery';
import type { Product } from '@/types';

const props = withDefaults(
    defineProps<{
        products: Product[];
        title?: string;
        description?: string;
        viewAllHref?: string;
        viewAllLabel?: string;
        hideViewAll?: boolean;
        itemsPerPage?: number;
    }>(),
    {
        title: undefined,
        description: undefined,
        viewAllHref: '#',
        viewAllLabel: 'Ver Todo',
        hideViewAll: false,
        itemsPerPage: 12,
    }
);

const emit = defineEmits<{
    (e: 'addToCart', product: Product): void;
}>();

const isDesktop = useMediaQuery('(min-width: 768px)');
const currentPage = ref(1);

// When products change (e.g. filters applied), reset pagination
watch(() => props.products, () => {
    currentPage.value = 1;
}, { deep: true });

const totalPages = computed(() => Math.ceil(props.products.length / props.itemsPerPage));

const paginatedProducts = computed(() => {
    if (isDesktop.value) {
        // Desktop: Traditional pagination (replaces the current view)
        const start = (currentPage.value - 1) * props.itemsPerPage;

        return props.products.slice(start, start + props.itemsPerPage);
    } else {
        // Mobile: Load more pagination (appends to the current view)
        return props.products.slice(0, currentPage.value * props.itemsPerPage);
    }
});

const hasMore = computed(() => currentPage.value < totalPages.value);

function loadMore() {
    if (hasMore.value) {
        currentPage.value++;
    }
}

function goToPage(page: number) {
    if (page >= 1 && page <= totalPages.value) {
        currentPage.value = page;
        window.scrollTo({ top: 0, behavior: 'smooth' }); // Scroll top when changing page in desktop
    }
}

const visiblePages = computed(() => {
    const pages = [];

    for (let i = 1; i <= totalPages.value; i++) {
        pages.push(i);
    }

    return pages;
});

const currentlyShowingCount = computed(() => {
    if (isDesktop.value) {
        return paginatedProducts.value.length;
    }

    return Math.min(currentPage.value * props.itemsPerPage, props.products.length);
});

const progressPercentage = computed(() => {
    if (props.products.length === 0) {
return 0;
}

    return (currentlyShowingCount.value / props.products.length) * 100;
});
</script>

<template>
    <section class="w-full text-left">
        <!-- Section Header (Only shown when title is provided) -->
        <div v-if="title" class="flex flex-col sm:flex-row sm:items-end justify-between gap-2 sm:gap-4 mb-6 sm:mb-10 border-b border-[#DAB6C4]/30 pb-3 sm:pb-4">
            <div>
                <h2 class="text-xl sm:text-2xl md:text-3xl text-[#8C6A5D] font-serif font-semibold">
                    {{ title }}
                </h2>
                <p v-if="description" class="text-[#2C2C2C]/80 text-xs sm:text-sm font-sans mt-1">
                    {{ description }}
                </p>
            </div>
            <Link 
                v-if="viewAllHref && !hideViewAll" 
                :href="viewAllHref" 
                class="text-xs sm:text-sm font-medium text-[#A388A9] hover:text-[#8C6A5D] transition-colors flex items-center gap-1.5 sm:gap-2 group self-start sm:self-auto shrink-0"
            >
                <span>{{ viewAllLabel }}</span>
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
        <div v-else>
            <div class="grid grid-cols-2 md:grid-cols-3 gap-3.5 sm:gap-6 md:gap-10">
                <ProductCard 
                    v-for="product in paginatedProducts" 
                    :key="product.id" 
                    :product="product" 
                    @add-to-cart="emit('addToCart', $event)" 
                />
            </div>
            
            <!-- Pagination Controls (Only show if totalPages > 1) -->
            <div v-if="totalPages > 1" class="mt-10 sm:mt-16">
                <!-- Mobile: Load More + Progress -->
                <div class="md:hidden flex flex-col items-center">
                    <p class="text-xs text-[#2C2C2C]/70 mb-3 font-sans">
                        Mostrando {{ currentlyShowingCount }} de {{ products.length }} productos
                    </p>
                    <div class="w-64 max-w-full h-1.5 bg-[#DAB6C4]/30 rounded-full mb-6 overflow-hidden">
                        <div class="h-full bg-[#A388A9] transition-all duration-300" :style="{ width: `${progressPercentage}%` }"></div>
                    </div>
                    <button 
                        v-if="hasMore"
                        @click="loadMore"
                        class="px-8 py-3 bg-[#A388A9] text-white rounded-full font-medium text-sm hover:bg-[#8C6A5D] transition-colors shadow-sm w-full max-w-xs"
                    >
                        Cargar más
                    </button>
                </div>

                <!-- Desktop: Traditional Pagination -->
                <div class="hidden md:flex justify-center items-center gap-2">
                    <button 
                        @click="goToPage(currentPage - 1)" 
                        :disabled="currentPage === 1"
                        class="w-10 h-10 rounded-full flex items-center justify-center border border-[#DAB6C4] text-[#8C6A5D] disabled:opacity-40 disabled:cursor-not-allowed hover:bg-[#F7F5F8] transition-colors"
                        aria-label="Anterior"
                    >
                        <FontAwesomeIcon :icon="faChevronLeft" class="text-sm" />
                    </button>
                    
                    <button 
                        v-for="page in visiblePages" 
                        :key="page"
                        @click="goToPage(page)"
                        :class="[
                            'w-10 h-10 rounded-full flex items-center justify-center font-medium transition-colors text-sm',
                            page === currentPage 
                                ? 'bg-[#A388A9] text-white border-transparent' 
                                : 'border border-[#DAB6C4] text-[#8C6A5D] hover:bg-[#F7F5F8]'
                        ]"
                    >
                        {{ page }}
                    </button>

                    <button 
                        @click="goToPage(currentPage + 1)" 
                        :disabled="currentPage === totalPages"
                        class="w-10 h-10 rounded-full flex items-center justify-center border border-[#DAB6C4] text-[#8C6A5D] disabled:opacity-40 disabled:cursor-not-allowed hover:bg-[#F7F5F8] transition-colors"
                        aria-label="Siguiente"
                    >
                        <FontAwesomeIcon :icon="faChevronRight" class="text-sm" />
                    </button>
                </div>
            </div>
        </div>
    </section>
</template>
