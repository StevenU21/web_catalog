<script setup lang="ts">
import { ref } from 'vue';
import { Head, router } from '@inertiajs/vue3';
import AppLayout from '@/layouts/AppLayout.vue';
import ProductGrid from '@/components/ProductGrid.vue';
import CatalogToolbar from '@/components/CatalogToolbar.vue';
import CatalogFilters from '@/components/CatalogFilters.vue';
import ScrollToTop from '@/components/ScrollToTop.vue';
import { type Product } from '@/types';

const props = defineProps<{
    categoryName: string;
    products: Product[];
    filters?: Record<string, any>;
    activeFilters?: Record<string, any>;
}>();

const cartCount = ref(0);
const isFiltersOpen = ref(false);

function handleAddToCart(product: Product) {
    cartCount.value++;
    // Future: Call Cart API or emit event
}

function handleSortChange(value: string) {
    const urlParams = new URLSearchParams(window.location.search);
    const query: Record<string, any> = {};
    urlParams.forEach((v, k) => { query[k] = v; });
    query.sort = value;
    router.get(window.location.pathname, query, {
        preserveState: true,
        preserveScroll: true,
        replace: true,
    });
}
</script>

<template>
    <Head :title="categoryName + ' | Jolismar Store'" />

    <AppLayout :cart-count="cartCount">
        <main class="max-w-7xl mx-auto px-4 sm:px-6 pt-6 sm:pt-10 pb-12 md:pt-12 md:pb-16 relative">
            <div class="mb-8">
                <h1 class="text-3xl sm:text-4xl text-[#8C6A5D] font-serif font-semibold mb-2">
                    {{ categoryName }}
                </h1>
                <p class="text-[#2C2C2C]/80 text-sm sm:text-base font-sans">
                    Explora nuestra selección de {{ categoryName.toLowerCase() }} de alta calidad.
                </p>
            </div>

            <CatalogToolbar 
                :total-products="products.length"
                :active-sort="activeFilters?.sort"
                @toggle-filters="isFiltersOpen = true"
                @sort-change="handleSortChange"
            />

            <!-- Layout: Filters + Grid -->
            <div class="flex flex-col md:flex-row gap-8">
                <CatalogFilters 
                    :is-open="isFiltersOpen"
                    :filters="filters"
                    :active-filters="activeFilters"
                    @close="isFiltersOpen = false"
                />

                <div class="flex-1 w-full min-w-0">
                    <ProductGrid 
                        :products="products" 
                        @add-to-cart="handleAddToCart" 
                    />
                </div>
            </div>
            
            <ScrollToTop />
        </main>
    </AppLayout>
</template>
