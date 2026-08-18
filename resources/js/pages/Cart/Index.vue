<script setup lang="ts">
import { ref, computed } from 'vue';
import { Head, Link } from '@inertiajs/vue3';
import AppLayout from '@/layouts/AppLayout.vue';
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';
import { faTrash, faMinus, faPlus, faArrowLeft, faBagShopping, faTruckFast, faShieldHalved } from '@fortawesome/free-solid-svg-icons';
import { faWhatsapp } from '@fortawesome/free-brands-svg-icons';

// Mock data
const cartItems = ref([
    {
        id: 1,
        name: 'Serum Iluminador Vitamina C',
        category: 'Skincare',
        price: 450.00,
        quantity: 1,
        image: 'https://images.unsplash.com/photo-1620916566398-39f1143ab7be?auto=format&fit=crop&q=80&w=300',
    },
    {
        id: 2,
        name: 'Labial Mate Aterciopelado',
        category: 'Maquillaje',
        price: 220.00,
        quantity: 2,
        image: 'https://images.unsplash.com/photo-1586495777744-4413f21062fa?auto=format&fit=crop&q=80&w=300',
    }
]);

const subtotal = computed(() => {
    return cartItems.value.reduce((total, item) => total + (item.price * item.quantity), 0);
});

const shipping = 80.00; // Mock shipping cost
const total = computed(() => subtotal.value > 0 ? subtotal.value + shipping : 0);

const increaseQuantity = (item: any) => {
    item.quantity++;
};

const decreaseQuantity = (item: any) => {
    if (item.quantity > 1) {
        item.quantity--;
    }
};

const removeItem = (id: number) => {
    cartItems.value = cartItems.value.filter(item => item.id !== id);
};

const formatPrice = (amount: number) => {
    return `C$ ${amount.toFixed(2)}`;
};

const handleWhatsAppCheckout = () => {
    // This is where we will serialize the cart and redirect to wa.me
    console.log('Redirecting to WhatsApp...');
};
</script>

<template>
    <Head title="Tu Carrito - Jolismar Store" />

    <AppLayout :cart-count="cartItems.length">
        <main class="max-w-7xl mx-auto px-4 sm:px-6 py-4 sm:py-6">
            
            <!-- Breadcrumb / Header Row -->
            <div class="flex items-center justify-between mb-4">
                <Link href="/" class="inline-flex items-center gap-2 text-[#2C2C2C]/70 hover:text-[#8C6A5D] transition-colors font-medium text-xs sm:text-sm">
                    <FontAwesomeIcon :icon="faArrowLeft" />
                    <span>Continuar Comprando</span>
                </Link>
            </div>

            <div class="flex flex-col lg:flex-row gap-5 lg:gap-6 items-start">
                
                <!-- Cart Items Section -->
                <div class="flex-1 w-full">
                    <div class="flex items-center justify-between mb-3.5">
                        <h1 class="text-xl sm:text-2xl text-[#8C6A5D] font-serif font-semibold">Tu Carrito</h1>
                        <span class="text-xs text-[#2C2C2C]/60 font-medium">{{ cartItems.length }} {{ cartItems.length === 1 ? 'producto' : 'productos' }}</span>
                    </div>

                    <template v-if="cartItems.length > 0">
                        <div class="space-y-3">
                            <div 
                                v-for="item in cartItems" 
                                :key="item.id" 
                                class="flex gap-3.5 sm:gap-4 bg-white p-3 sm:p-4 rounded-xl shadow-2xs border border-[#DAB6C4]/20 items-center"
                            >
                                <!-- Image -->
                                <div class="w-18 h-18 sm:w-20 sm:h-20 rounded-lg overflow-hidden bg-[#F7F5F8] shrink-0 border border-[#DAB6C4]/15">
                                    <img :src="item.image" :alt="item.name" class="w-full h-full object-cover" />
                                </div>
                                
                                <!-- Details -->
                                <div class="flex flex-1 flex-col sm:flex-row sm:items-center justify-between gap-2 sm:gap-4 min-w-0">
                                    <div class="min-w-0">
                                        <span class="text-[10px] font-bold text-[#A388A9] uppercase tracking-wider">{{ item.category }}</span>
                                        <h3 class="text-sm sm:text-base font-medium text-[#2C2C2C] truncate">{{ item.name }}</h3>
                                        <div class="text-xs text-[#2C2C2C]/50 mt-0.5 sm:hidden">
                                            {{ formatPrice(item.price) }} c/u
                                        </div>
                                    </div>

                                    <div class="flex items-center justify-between sm:justify-end gap-4 sm:gap-6 shrink-0">
                                        <!-- Quantity Controls -->
                                        <div class="flex items-center bg-[#F7F5F8] rounded-full p-0.5 border border-[#DAB6C4]/30">
                                            <button 
                                                @click="decreaseQuantity(item)"
                                                class="w-7 h-7 flex items-center justify-center rounded-full text-[#2C2C2C] hover:bg-white transition-colors"
                                                :class="{ 'opacity-40 cursor-not-allowed': item.quantity <= 1 }"
                                                :disabled="item.quantity <= 1"
                                                aria-label="Disminuir cantidad"
                                            >
                                                <FontAwesomeIcon :icon="faMinus" class="text-[10px]" />
                                            </button>
                                            <span class="w-7 text-center font-semibold text-xs text-[#2C2C2C]">
                                                {{ item.quantity }}
                                            </span>
                                            <button 
                                                @click="increaseQuantity(item)"
                                                class="w-7 h-7 flex items-center justify-center rounded-full text-[#2C2C2C] hover:bg-white transition-colors"
                                                aria-label="Aumentar cantidad"
                                            >
                                                <FontAwesomeIcon :icon="faPlus" class="text-[10px]" />
                                            </button>
                                        </div>
                                        
                                        <!-- Price -->
                                        <div class="text-right min-w-[90px]">
                                            <div class="text-sm sm:text-base font-bold text-[#8C6A5D]">{{ formatPrice(item.price * item.quantity) }}</div>
                                            <div v-if="item.quantity > 1" class="hidden sm:block text-[11px] text-[#2C2C2C]/50">
                                                {{ formatPrice(item.price) }} c/u
                                            </div>
                                        </div>

                                        <!-- Remove Action -->
                                        <button 
                                            @click="removeItem(item.id)"
                                            class="w-8 h-8 flex items-center justify-center text-[#2C2C2C]/35 hover:text-red-500 hover:bg-red-50 rounded-full transition-colors shrink-0"
                                            title="Eliminar producto"
                                        >
                                            <FontAwesomeIcon :icon="faTrash" class="text-xs" />
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </template>
                    
                    <template v-else>
                        <div class="bg-white rounded-2xl p-8 text-center shadow-2xs border border-[#DAB6C4]/20 flex flex-col items-center justify-center min-h-[280px]">
                            <div class="w-16 h-16 bg-[#F7F5F8] rounded-full flex items-center justify-center text-[#DAB6C4] mb-4">
                                <FontAwesomeIcon :icon="faBagShopping" class="text-2xl" />
                            </div>
                            <h2 class="text-xl font-serif text-[#8C6A5D] font-medium mb-2">Tu carrito está vacío</h2>
                            <p class="text-xs sm:text-sm text-[#2C2C2C]/70 mb-5 max-w-sm mx-auto">Explora nuestro catálogo para descubrir productos ideales para tu piel y estilo.</p>
                            <Link 
                                href="/"
                                class="px-6 py-2.5 bg-[#A388A9] text-white text-xs sm:text-sm font-medium rounded-full hover:bg-[#8C6A5D] transition-colors shadow-2xs inline-flex items-center gap-2"
                            >
                                <FontAwesomeIcon :icon="faBagShopping" />
                                <span>Explorar Catálogo</span>
                            </Link>
                        </div>
                    </template>
                </div>

                <!-- Order Summary Sidebar (Compact) -->
                <div v-if="cartItems.length > 0" class="w-full lg:w-80 shrink-0">
                    <div class="bg-white p-4 sm:p-5 rounded-2xl shadow-2xs border border-[#DAB6C4]/30 sticky top-24">
                        <h2 class="text-base font-serif text-[#8C6A5D] font-semibold mb-3 pb-2 border-b border-[#F7F5F8]">Resumen del Pedido</h2>
                        
                        <div class="space-y-2 mb-3 text-xs sm:text-sm">
                            <div class="flex justify-between items-center text-[#2C2C2C]/80">
                                <span>Subtotal</span>
                                <span class="font-medium text-[#2C2C2C]">{{ formatPrice(subtotal) }}</span>
                            </div>
                            <div class="flex justify-between items-center text-[#2C2C2C]/80">
                                <span>Envío estimado</span>
                                <span class="font-medium text-[#2C2C2C]">{{ formatPrice(shipping) }}</span>
                            </div>
                        </div>
                        
                        <div class="border-t border-[#DAB6C4]/25 pt-2.5 mb-4 flex justify-between items-baseline">
                            <span class="text-sm font-semibold text-[#2C2C2C]">Total</span>
                            <span class="text-xl sm:text-2xl font-bold text-[#8C6A5D]">{{ formatPrice(total) }}</span>
                        </div>

                        <!-- Primary CTA -->
                        <button 
                            @click="handleWhatsAppCheckout"
                            class="w-full py-3 px-4 bg-[#A388A9] text-white font-semibold rounded-xl hover:bg-[#8C6A5D] hover:shadow-md transition-all duration-200 flex items-center justify-center gap-2.5 text-sm sm:text-base cursor-pointer"
                        >
                            <FontAwesomeIcon :icon="faWhatsapp" class="text-lg" />
                            <span>Confirmar Pedido por WhatsApp</span>
                        </button>
                        
                        <p class="text-[11px] text-center text-[#2C2C2C]/60 mt-2.5 leading-tight">
                            Te redirigiremos a WhatsApp con el detalle listo para coordinar tu entrega.
                        </p>

                        <!-- Compact Trust Badges -->
                        <div class="mt-4 space-y-1.5 border-t border-[#F7F5F8] pt-3 text-[11px] text-[#2C2C2C]/75">
                            <div class="flex items-center gap-2">
                                <FontAwesomeIcon :icon="faShieldHalved" class="text-[#A388A9] text-xs" />
                                <span>Productos 100% originales</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <FontAwesomeIcon :icon="faTruckFast" class="text-[#A388A9] text-xs" />
                                <span>Envíos seguros a toda Nicaragua</span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </main>
    </AppLayout>
</template>
