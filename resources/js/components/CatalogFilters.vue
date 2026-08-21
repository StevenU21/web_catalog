<script setup lang="ts">
import { ref } from 'vue';
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';
import { faTimes } from '@fortawesome/free-solid-svg-icons';

defineProps<{
    isOpen: boolean;
}>();

const emit = defineEmits<{
    (e: 'close'): void;
}>();

// Mock filter state
const activeBrand = ref<string>('');
const activeSkinType = ref<string>('');
const priceRange = ref<number>(2000);

const brands = ['The Ordinary', 'CeraVe', 'L\'Oréal', 'Maybelline', 'e.l.f.', 'NYX'];
const skinTypes = ['Grasa', 'Seca', 'Mixta', 'Sensible'];

const clearFilters = () => {
    activeBrand.value = '';
    activeSkinType.value = '';
    priceRange.value = 2000;
};
</script>

<template>
    <!-- Overlay for mobile -->
    <div 
        v-if="isOpen"
        class="fixed inset-0 bg-black/50 z-40 md:hidden transition-opacity"
        @click="emit('close')"
    ></div>

    <!-- Filter Container -->
    <aside 
        class="fixed md:static inset-y-0 right-0 z-50 w-80 md:w-64 shrink-0 bg-[#F7F5F8] md:bg-transparent p-6 md:p-0 overflow-y-auto transform transition-transform duration-300 md:transform-none border-l md:border-none border-[#DAB6C4]/30 h-full"
        :class="isOpen ? 'translate-x-0' : 'translate-x-full md:translate-x-0'"
    >
        <div class="flex items-center justify-between mb-6 md:hidden">
            <h2 class="text-xl font-serif font-semibold text-[#8C6A5D]">Filtros</h2>
            <button @click="emit('close')" class="text-[#2C2C2C]/70 hover:text-[#8C6A5D] transition-colors">
                <FontAwesomeIcon :icon="faTimes" class="text-lg" />
            </button>
        </div>

        <div class="space-y-8">
            <!-- Brand Filter -->
            <div>
                <h3 class="text-sm font-semibold text-[#8C6A5D] uppercase tracking-wider mb-3">Marca</h3>
                <div class="space-y-2">
                    <label v-for="brand in brands" :key="brand" class="flex items-center gap-2 cursor-pointer group">
                        <input 
                            type="radio" 
                            name="brand" 
                            :value="brand" 
                            v-model="activeBrand"
                            class="text-[#A388A9] focus:ring-[#A388A9] border-[#DAB6C4] bg-transparent cursor-pointer"
                        >
                        <span class="text-sm text-[#2C2C2C] group-hover:text-[#A388A9] transition-colors">{{ brand }}</span>
                    </label>
                </div>
            </div>

            <!-- Skin Type Filter -->
            <div>
                <h3 class="text-sm font-semibold text-[#8C6A5D] uppercase tracking-wider mb-3">Tipo de Piel</h3>
                <div class="space-y-2">
                    <label v-for="type in skinTypes" :key="type" class="flex items-center gap-2 cursor-pointer group">
                        <input 
                            type="radio" 
                            name="skinType" 
                            :value="type" 
                            v-model="activeSkinType"
                            class="text-[#A388A9] focus:ring-[#A388A9] border-[#DAB6C4] bg-transparent cursor-pointer"
                        >
                        <span class="text-sm text-[#2C2C2C] group-hover:text-[#A388A9] transition-colors">{{ type }}</span>
                    </label>
                </div>
            </div>

            <!-- Price Filter -->
            <div>
                <h3 class="text-sm font-semibold text-[#8C6A5D] uppercase tracking-wider mb-3">Precio Máximo</h3>
                <div class="space-y-4">
                    <input 
                        type="range" 
                        min="0" 
                        max="2000" 
                        step="50"
                        v-model="priceRange"
                        class="w-full accent-[#A388A9]"
                    >
                    <div class="flex justify-between text-sm text-[#2C2C2C]/80">
                        <span>C$ 0</span>
                        <span class="font-medium text-[#A388A9]">C$ {{ priceRange }}</span>
                    </div>
                </div>
            </div>

            <!-- Actions -->
            <div class="pt-4 border-t border-[#DAB6C4]/30 flex flex-col gap-3">
                <button 
                    @click="emit('close')"
                    class="w-full md:hidden bg-[#A388A9] text-white py-2 rounded font-medium hover:bg-[#8C6A5D] transition-colors"
                >
                    Aplicar Filtros
                </button>
                <button 
                    @click="clearFilters"
                    class="w-full text-sm text-[#2C2C2C]/70 hover:text-[#8C6A5D] transition-colors"
                >
                    Limpiar Todo
                </button>
            </div>
        </div>
    </aside>
</template>
