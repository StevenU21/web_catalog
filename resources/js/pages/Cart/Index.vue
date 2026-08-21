<script setup lang="ts">
import { faWhatsapp } from '@fortawesome/free-brands-svg-icons';
import { faTrash, faMinus, faPlus, faArrowLeft, faBagShopping, faTruckFast, faShieldHalved } from '@fortawesome/free-solid-svg-icons';
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';
import { Head, Link } from '@inertiajs/vue3';
import { computed } from 'vue';
import AppLayout from '@/layouts/AppLayout.vue';
import { useCart } from '@/composables/useCart';
import type { CartItem } from '@/composables/useCart';

const { cartItems, cartTotalNumber, removeFromCart, parsePrice, formatPrice, generateWhatsAppLink } = useCart();

const subtotal = computed(() => cartTotalNumber.value);
const total = computed(() => subtotal.value);

const increaseQuantity = (item: CartItem) => {
    item.quantity++;
};

const decreaseQuantity = (item: CartItem) => {
    if (item.quantity > 1) {
        item.quantity--;
    }
};

const removeItem = (id: number) => {
    removeFromCart(id);
};
</script>

<template>
    <Head title="Tu Carrito - Jolismar Store" />

    <AppLayout>
        <main class="max-w-7xl mx-auto px-4 sm:px-6 py-6 md:py-10">
            
            <!-- Breadcrumb / Header Row -->
            <div class="flex items-center justify-between mb-5">
                <Link href="/" class="inline-flex items-center gap-2 text-[#2C2C2C]/70 hover:text-[#8C6A5D] transition-colors font-medium text-sm">
                    <FontAwesomeIcon :icon="faArrowLeft" />
                    <span>Continuar Comprando</span>
                </Link>
            </div>

            <div class="flex flex-col lg:flex-row gap-6 lg:gap-10 items-start">
                
                <!-- Cart Items Section -->
                <div class="flex-1 w-full">
                    <div class="flex items-center justify-between mb-4">
                        <h1 class="text-2xl sm:text-3xl text-[#8C6A5D] font-serif font-semibold">Tu Carrito</h1>
                        <span class="text-sm text-[#2C2C2C]/60 font-medium">{{ cartItems.length }} {{ cartItems.length === 1 ? 'producto' : 'productos' }}</span>
                    </div>

                    <template v-if="cartItems.length > 0">
                        <div class="space-y-4">
                            <div 
                                v-for="item in cartItems" 
                                :key="item.id" 
                                class="flex gap-4 sm:gap-6 bg-white p-3.5 sm:p-5 rounded-2xl shadow-xs border border-[#DAB6C4]/20 items-start sm:items-center"
                            >
                                <!-- Image -->
                                <div class="w-20 h-20 sm:w-28 sm:h-28 rounded-xl overflow-hidden bg-[#F7F5F8] shrink-0 border border-[#DAB6C4]/15">
                                    <img :src="item.image" :alt="item.name" class="w-full h-full object-cover" />
                                </div>
                                
                                <!-- Details -->
                                <div class="flex flex-1 flex-col justify-between h-full min-w-0">
                                    <div class="flex justify-between items-start gap-4">
                                        <div class="min-w-0 pr-2">
                                            <span class="text-[10px] sm:text-xs font-bold text-[#A388A9] uppercase tracking-wider">{{ item.category }}</span>
                                            <h3 class="text-sm sm:text-lg font-medium text-[#2C2C2C] mt-0.5 line-clamp-2 sm:truncate">{{ item.name }}</h3>
                                            <!-- Mobile Price -->
                                            <div class="text-base font-bold text-[#8C6A5D] mt-1 sm:hidden">
                                                {{ formatPrice(parsePrice(item.price) * item.quantity) }}
                                            </div>
                                        </div>
                                        
                                        <!-- Remove Action (Desktop position) -->
                                        <button 
                                            @click="removeItem(item.id)"
                                            class="hidden sm:flex w-9 h-9 items-center justify-center text-[#2C2C2C]/40 hover:text-red-500 hover:bg-red-50 rounded-full transition-colors shrink-0"
                                            title="Eliminar producto"
                                            aria-label="Eliminar producto"
                                        >
                                            <FontAwesomeIcon :icon="faTrash" />
                                        </button>
                                    </div>

                                    <div class="flex items-center justify-between mt-3 sm:mt-0">
                                        <!-- Quantity Controls -->
                                        <div class="flex items-center bg-[#F7F5F8] rounded-full p-1 border border-[#DAB6C4]/30">
                                            <button 
                                                @click="decreaseQuantity(item)"
                                                class="w-9 h-9 sm:w-8 sm:h-8 flex items-center justify-center rounded-full text-[#2C2C2C] hover:bg-white transition-colors"
                                                :class="{ 'opacity-50 cursor-not-allowed': item.quantity <= 1 }"
                                                :disabled="item.quantity <= 1"
                                                aria-label="Disminuir cantidad"
                                            >
                                                <FontAwesomeIcon :icon="faMinus" class="text-xs" />
                                            </button>
                                            <span class="w-8 text-center font-semibold text-sm text-[#2C2C2C]">
                                                {{ item.quantity }}
                                            </span>
                                            <button 
                                                @click="increaseQuantity(item)"
                                                class="w-9 h-9 sm:w-8 sm:h-8 flex items-center justify-center rounded-full text-[#2C2C2C] hover:bg-white transition-colors"
                                                aria-label="Aumentar cantidad"
                                            >
                                                <FontAwesomeIcon :icon="faPlus" class="text-xs" />
                                            </button>
                                        </div>
                                        
                                        <div class="flex items-center gap-4">
                                            <!-- Price -->
                                            <div class="hidden sm:block text-right">
                                                <div class="text-lg font-bold text-[#8C6A5D]">{{ formatPrice(parsePrice(item.price) * item.quantity) }}</div>
                                                <div v-if="item.quantity > 1" class="text-xs text-[#2C2C2C]/50 mt-0.5">
                                                    {{ item.price }} c/u
                                                </div>
                                            </div>

                                            <!-- Remove Action (Mobile position) -->
                                            <button 
                                                @click="removeItem(item.id)"
                                                class="sm:hidden w-9 h-9 flex items-center justify-center text-[#2C2C2C]/40 hover:text-red-500 hover:bg-red-50 rounded-full transition-colors shrink-0"
                                                title="Eliminar producto"
                                                aria-label="Eliminar producto"
                                            >
                                                <FontAwesomeIcon :icon="faTrash" class="text-sm" />
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </template>
                    
                    <template v-else>
                        <div class="bg-white rounded-3xl p-10 text-center shadow-xs border border-[#DAB6C4]/20 flex flex-col items-center justify-center min-h-[350px]">
                            <div class="w-20 h-20 bg-[#F7F5F8] rounded-full flex items-center justify-center text-[#DAB6C4] mb-5">
                                <FontAwesomeIcon :icon="faBagShopping" class="text-3xl" />
                            </div>
                            <h2 class="text-2xl font-serif text-[#8C6A5D] font-medium mb-3">Tu carrito está vacío</h2>
                            <p class="text-sm text-[#2C2C2C]/70 mb-6 max-w-sm mx-auto leading-relaxed">Explora nuestro catálogo para descubrir productos ideales para tu piel y estilo.</p>
                            <Link 
                                href="/"
                                class="px-7 py-3 bg-[#A388A9] text-white text-sm font-medium rounded-full hover:bg-[#8C6A5D] transition-colors shadow-sm inline-flex items-center gap-2.5"
                            >
                                <FontAwesomeIcon :icon="faBagShopping" />
                                <span>Explorar Catálogo</span>
                            </Link>
                        </div>
                    </template>
                </div>

                <!-- Order Summary Sidebar (Middle Ground) -->
                <div v-if="cartItems.length > 0" class="w-full lg:w-[22rem] shrink-0">
                    <div class="bg-white p-5 sm:p-6 rounded-3xl shadow-sm border border-[#DAB6C4]/30 sticky top-28">
                        <h2 class="text-lg font-serif text-[#8C6A5D] font-semibold mb-4 pb-3 border-b border-[#F7F5F8]">Resumen del Pedido</h2>
                        
                        <div class="space-y-3 mb-5 text-sm">
                            <div class="flex justify-between items-center text-[#2C2C2C]/80">
                                <span>Subtotal</span>
                                <span class="font-medium text-[#2C2C2C]">{{ formatPrice(subtotal) }}</span>
                            </div>

                        </div>
                        
                        <div class="border-t border-[#DAB6C4]/25 pt-4 mb-6 flex justify-between items-baseline">
                            <span class="text-base font-semibold text-[#2C2C2C]">Total</span>
                            <span class="text-2xl sm:text-3xl font-bold text-[#8C6A5D]">{{ formatPrice(total) }}</span>
                        </div>

                        <!-- Primary CTA -->
                        <a 
                            :href="generateWhatsAppLink()"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="w-full py-3.5 px-5 bg-[#A388A9] text-white font-bold rounded-2xl hover:bg-[#8C6A5D] hover:shadow-lg transition-all duration-300 flex items-center justify-center gap-3 text-base cursor-pointer"
                        >
                            <FontAwesomeIcon :icon="faWhatsapp" class="text-xl" />
                            <span>Confirmar Pedido</span>
                        </a>
                        
                        <p class="text-xs text-center text-[#2C2C2C]/60 mt-3.5 leading-relaxed">
                            Te redirigiremos a WhatsApp con los detalles de tu pedido listos para coordinar.
                        </p>

                        <!-- Trust Badges -->
                        <div class="mt-6 space-y-2.5 border-t border-[#F7F5F8] pt-4 text-xs text-[#2C2C2C]/80">
                            <div class="flex items-center gap-2.5">
                                <div class="w-6 h-6 rounded-full bg-[#F3EBED] text-[#A388A9] flex items-center justify-center shrink-0">
                                    <FontAwesomeIcon :icon="faShieldHalved" class="text-[10px]" />
                                </div>
                                <span>Productos 100% originales</span>
                            </div>
                            <div class="flex items-center gap-2.5">
                                <div class="w-6 h-6 rounded-full bg-[#F3EBED] text-[#A388A9] flex items-center justify-center shrink-0">
                                    <FontAwesomeIcon :icon="faTruckFast" class="text-[10px]" />
                                </div>
                                <span>Envíos seguros a toda Nicaragua</span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </main>
    </AppLayout>
</template>
