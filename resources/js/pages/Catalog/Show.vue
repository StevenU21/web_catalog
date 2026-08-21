<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';
import { index as catalogIndex } from '@/routes/catalog';
import AppLayout from '@/layouts/AppLayout.vue';
import ProductGrid from '@/components/ProductGrid.vue';
import { useCart } from '@/composables/useCart';
import type { Product } from '@/types';
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';
import { faCartPlus, faArrowLeft } from '@fortawesome/free-solid-svg-icons';
import { ref } from 'vue';

const props = defineProps<{
    product: Product;
    relatedProducts: Product[];
}>();

const { addToCart } = useCart();
const quantity = ref(1);
const isAdding = ref(false);

function handleAddToCart() {
    isAdding.value = true;
    for (let i = 0; i < quantity.value; i++) {
        addToCart(props.product);
    }
    
    // Provide a small visual feedback of action taking place
    setTimeout(() => {
        isAdding.value = false;
        quantity.value = 1;
    }, 400);
}

function handleAddRelatedToCart(product: Product) {
    addToCart(product);
}

function incrementQuantity() {
    quantity.value++;
}

function decrementQuantity() {
    if (quantity.value > 1) {
        quantity.value--;
    }
}
</script>

<template>
    <Head :title="`${product.name} | Jolismar Store`" />

    <AppLayout>
        <main class="max-w-7xl mx-auto px-4 sm:px-6 pt-4 pb-12 md:pt-8 md:pb-24">
            
            <!-- Breadcrumbs / Back button -->
            <div class="mb-6 sm:mb-8">
                <Link 
                    :href="catalogIndex.url()" 
                    class="inline-flex items-center gap-2 text-sm text-[#8C6A5D] hover:text-[#A388A9] transition-colors font-sans font-medium group"
                >
                    <FontAwesomeIcon :icon="faArrowLeft" class="transition-transform group-hover:-translate-x-1" />
                    Volver al Catálogo
                </Link>
            </div>

            <!-- Product Detail Section -->
            <div class="flex flex-col md:flex-row gap-8 lg:gap-16">
                <!-- Product Image -->
                <div class="w-full md:w-1/2 lg:w-[45%] shrink-0">
                    <div class="aspect-[4/5] bg-white rounded-lg shadow-sm overflow-hidden relative group">
                        <img 
                            :src="product.image" 
                            :alt="product.name" 
                            class="w-full h-full object-cover mix-blend-multiply opacity-95 transition-transform duration-700 ease-out group-hover:scale-105"
                        >
                        <!-- Badges -->
                        <div class="absolute top-4 left-4 flex flex-col gap-2">
                            <span class="bg-[#DAB6C4] text-white text-[10px] sm:text-xs font-bold px-3 py-1.5 rounded-full uppercase tracking-wider shadow-xs">
                                {{ product.category }}
                            </span>
                            <span v-if="product.skinType" class="bg-[#8C6A5D] text-white text-[10px] sm:text-xs font-bold px-3 py-1.5 rounded-full uppercase tracking-wider shadow-xs self-start">
                                Piel {{ product.skinType }}
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Product Info -->
                <div class="w-full md:w-1/2 lg:w-[55%] flex flex-col justify-center">
                    <div class="mb-2">
                        <p class="text-sm font-semibold uppercase tracking-widest text-[#A388A9] mb-1">
                            {{ product.brand }}
                        </p>
                        <h1 class="text-3xl sm:text-4xl lg:text-5xl font-serif text-[#8C6A5D] leading-tight mb-4">
                            {{ product.name }}
                        </h1>
                        <p class="text-2xl sm:text-3xl font-sans font-medium text-[#2C2C2C] mb-6">
                            {{ product.price }}
                        </p>
                    </div>

                    <div class="prose prose-sm sm:prose-base prose-p:text-[#2C2C2C]/80 prose-p:leading-relaxed mb-8">
                        <p v-if="product.description">
                            {{ product.description }}
                        </p>
                        <p v-else>
                            Descubre los beneficios de este producto premium diseñado para potenciar tu belleza natural. En Jolismar Store nos aseguramos de ofrecerte únicamente artículos de alta gama, con ingredientes seleccionados para el cuidado de tu piel.
                        </p>
                    </div>

                    <!-- Add to Cart Actions -->
                    <div class="flex flex-row items-center gap-3 sm:gap-4 mt-auto border-t border-[#DAB6C4]/30 pt-6 sm:pt-8">
                        <!-- Quantity Selector -->
                        <div class="flex items-center border border-[#DAB6C4] rounded-sm bg-white overflow-hidden shrink-0 h-[48px] sm:h-[52px]">
                            <button 
                                type="button"
                                @click="decrementQuantity"
                                class="w-11 sm:w-12 h-full flex items-center justify-center text-[#8C6A5D] hover:bg-[#F7F5F8] transition-colors disabled:opacity-50"
                                :disabled="quantity <= 1"
                                aria-label="Decrementar cantidad"
                            >
                                <span class="text-xl font-medium leading-none">-</span>
                            </button>
                            
                            <div class="w-11 sm:w-12 h-full flex items-center justify-center font-sans font-semibold text-[#2C2C2C] border-x border-[#DAB6C4]/30">
                                {{ quantity }}
                            </div>
                            
                            <button 
                                type="button"
                                @click="incrementQuantity"
                                class="w-11 sm:w-12 h-full flex items-center justify-center text-[#8C6A5D] hover:bg-[#F7F5F8] transition-colors"
                                aria-label="Incrementar cantidad"
                            >
                                <span class="text-xl font-medium leading-none">+</span>
                            </button>
                        </div>

                        <!-- Add to Cart Button -->
                        <button 
                            @click="handleAddToCart"
                            class="flex-1 bg-[#A388A9] hover:bg-[#8C6A5D] text-white font-sans font-semibold text-sm min-[375px]:text-base sm:text-lg h-[48px] sm:h-[52px] px-2 sm:px-8 rounded-sm transition-all duration-300 flex items-center justify-center gap-2 sm:gap-3 shadow-md hover:shadow-lg disabled:opacity-75 disabled:cursor-not-allowed transform active:scale-[0.98]"
                            :disabled="isAdding"
                        >
                            <FontAwesomeIcon :icon="faCartPlus" :class="{'animate-bounce': isAdding}" />
                            <span class="whitespace-nowrap">{{ isAdding ? 'Agregando...' : 'Agregar al carrito' }}</span>
                        </button>
                    </div>

                    <!-- Extra Perks -->
                    <div class="mt-8 grid grid-cols-1 sm:grid-cols-2 gap-4 text-sm font-sans text-[#2C2C2C]/70">
                        <div class="flex items-center gap-2">
                            <svg class="w-5 h-5 text-[#DAB6C4]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            <span>Producto 100% Original</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <svg class="w-5 h-5 text-[#DAB6C4]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            <span>Disponibilidad Inmediata</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Related Products Section -->
            <div v-if="relatedProducts && relatedProducts.length > 0" class="mt-24">
                <div class="flex items-center justify-between mb-8 border-b border-[#DAB6C4]/30 pb-4">
                    <h2 class="text-2xl sm:text-3xl font-serif text-[#8C6A5D]">
                        Productos Relacionados
                    </h2>
                    <Link :href="catalogIndex.url({ query: { category: product.category } })" class="text-sm font-sans font-semibold text-[#A388A9] hover:text-[#8C6A5D] transition-colors">
                        Ver más
                    </Link>
                </div>
                
                <ProductGrid 
                    :products="relatedProducts" 
                    @add-to-cart="handleAddRelatedToCart"
                />
            </div>
            
        </main>
    </AppLayout>
</template>
