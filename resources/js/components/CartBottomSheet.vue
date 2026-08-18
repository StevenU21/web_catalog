<script setup lang="ts">
import { ref } from 'vue';
import { Link } from '@inertiajs/vue3';
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';
import { faBagShopping, faTrash, faXmark } from '@fortawesome/free-solid-svg-icons';

defineProps<{
    cartCount?: number;
}>();

const isOpen = ref(false);

// Mock data for design
const mockCartItems = [
    {
        id: 1,
        name: 'Serum Iluminador Vitamina C',
        price: 'C$ 450.00',
        quantity: 1,
        image: 'https://images.unsplash.com/photo-1620916566398-39f1143ab7be?auto=format&fit=crop&q=80&w=150',
    },
    {
        id: 2,
        name: 'Labial Mate Aterciopelado',
        price: 'C$ 220.00',
        quantity: 2,
        image: 'https://images.unsplash.com/photo-1586495777744-4413f21062fa?auto=format&fit=crop&q=80&w=150',
    }
];

const toggleBottomSheet = () => {
    isOpen.value = !isOpen.value;
};

const closeBottomSheet = () => {
    isOpen.value = false;
};
</script>

<template>
    <div class="relative">
        <!-- Cart Toggle Button (Mobile Header) -->
        <button 
            type="button"
            @click="toggleBottomSheet"
            class="px-3.5 py-2 bg-[#A388A9] text-white text-xs font-medium hover:bg-[#8C6A5D] transition-colors shadow-xs rounded-full cursor-pointer inline-flex items-center gap-2 focus:ring-2 focus:ring-[#A388A9] focus:outline-hidden min-h-[44px]"
            :aria-expanded="isOpen"
        >
            <FontAwesomeIcon :icon="faBagShopping" />
            <span class="bg-white/20 px-1.5 py-0.5 rounded-full text-xs font-semibold">
                {{ cartCount ?? 0 }}
            </span>
        </button>

        <!-- Teleport to body to escape header's backdrop-filter stacking context -->
        <Teleport to="body">
            <!-- Mobile Backdrop Overlay -->
            <transition
                enter-active-class="transition-opacity ease-linear duration-300"
                enter-from-class="opacity-0"
                enter-to-class="opacity-100"
                leave-active-class="transition-opacity ease-linear duration-200"
                leave-from-class="opacity-100"
                leave-to-class="opacity-0"
            >
                <div 
                    v-if="isOpen" 
                    class="fixed inset-0 bg-black/40 z-[50]" 
                    @click.stop="closeBottomSheet" 
                    aria-hidden="true"
                ></div>
            </transition>

            <!-- Bottom Sheet Menu -->
            <transition
                enter-active-class="transition ease-out duration-300"
                enter-from-class="opacity-0 translate-y-full"
                enter-to-class="opacity-100 translate-y-0"
                leave-active-class="transition ease-in duration-200"
                leave-from-class="opacity-100 translate-y-0"
                leave-to-class="opacity-0 translate-y-full"
            >
                <div 
                    v-if="isOpen" 
                    class="fixed bottom-0 left-0 right-0 w-full bg-white rounded-t-3xl shadow-2xl border-t border-[#DAB6C4]/30 z-[60] overflow-hidden flex flex-col max-h-[85vh]"
                >
                <!-- Header -->
                <div class="px-5 py-4 border-b border-[#F7F5F8] flex items-center justify-between bg-[#F7F5F8]/50">
                    <h3 class="text-[#8C6A5D] font-serif font-semibold text-lg">Tu Carrito</h3>
                    <button 
                        @click="closeBottomSheet"
                        class="text-[#2C2C2C]/50 hover:text-[#2C2C2C] transition-colors w-11 h-11 flex items-center justify-center rounded-full hover:bg-[#DAB6C4]/20"
                        aria-label="Cerrar carrito"
                    >
                        <FontAwesomeIcon :icon="faXmark" />
                    </button>
                </div>

                <!-- Cart Items (Mock) -->
                <div class="overflow-y-auto px-5 py-3 space-y-4 flex-1">
                    <template v-if="cartCount && cartCount > 0">
                        <div v-for="item in mockCartItems" :key="item.id" class="flex gap-4 items-center group">
                            <!-- Image -->
                            <div class="w-16 h-16 rounded-xl overflow-hidden bg-[#F7F5F8] shrink-0 border border-[#DAB6C4]/20">
                                <img :src="item.image" :alt="item.name" class="w-full h-full object-cover" />
                            </div>
                            
                            <!-- Info -->
                            <div class="flex-1 min-w-0">
                                <h4 class="text-sm font-medium text-[#2C2C2C] truncate">{{ item.name }}</h4>
                                <div class="text-[#8C6A5D] font-semibold text-sm mt-0.5">{{ item.price }}</div>
                                <div class="text-xs text-[#2C2C2C]/60 mt-1">Cant: {{ item.quantity }}</div>
                            </div>

                            <!-- Remove Action -->
                            <button 
                                class="w-11 h-11 flex items-center justify-center text-[#2C2C2C]/40 hover:text-red-500 transition-colors"
                                aria-label="Eliminar item"
                            >
                                <FontAwesomeIcon :icon="faTrash" class="text-sm" />
                            </button>
                        </div>
                    </template>
                    <template v-else>
                        <div class="py-8 text-center flex flex-col items-center">
                            <div class="w-16 h-16 bg-[#F7F5F8] rounded-full flex items-center justify-center text-[#DAB6C4] mb-3">
                                <FontAwesomeIcon :icon="faBagShopping" class="text-2xl" />
                            </div>
                            <p class="text-[#2C2C2C]/70 font-medium">Tu carrito está vacío</p>
                        </div>
                    </template>
                </div>

                <!-- Footer / Totals -->
                <div class="px-5 py-4 bg-[#F7F5F8]/50 border-t border-[#DAB6C4]/20">
                    <div class="flex justify-between items-center mb-4">
                        <span class="text-[#2C2C2C] font-medium">Subtotal</span>
                        <span class="text-[#8C6A5D] font-bold text-lg">C$ 890.00</span>
                    </div>
                    
                    <Link 
                        href="/cart"
                        @click="closeBottomSheet"
                        class="w-full flex items-center justify-center py-3 bg-[#A388A9] text-white font-medium rounded-xl hover:bg-[#8C6A5D] transition-colors gap-2 min-h-[44px]"
                    >
                        <span>Ver Vista Completa</span>
                    </Link>
                </div>
            </div>
        </transition>
        </Teleport>
    </div>
</template>
