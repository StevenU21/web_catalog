<script setup lang="ts">
import { faTimes, faRotateLeft } from '@fortawesome/free-solid-svg-icons';
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';
import { router } from '@inertiajs/vue3';
import { ref, watch } from 'vue';

const props = defineProps<{
    isOpen: boolean;
    filters?: {
        categories?: string[];
        brands?: string[];
        skinTypes?: string[];
        genders?: string[];
        maxPrice?: number;
    };
    activeFilters?: {
        category?: string;
        brand?: string;
        skinType?: string;
        gender?: string;
        maxPrice?: number;
    };
}>();

const emit = defineEmits<{
    (e: 'close'): void;
}>();

const currentFilters = ref({
    category: props.activeFilters?.category || '',
    brand: props.activeFilters?.brand || '',
    skinType: props.activeFilters?.skinType || '',
    gender: props.activeFilters?.gender || '',
    maxPrice: props.activeFilters?.maxPrice || props.filters?.maxPrice || 2000,
});

const localPrice = ref(currentFilters.value.maxPrice);

const applyFilters = () => {
    const query: any = {};

    if (currentFilters.value.category) {
        query.category = currentFilters.value.category;
    }

    if (currentFilters.value.brand) {
        query.brand = currentFilters.value.brand;
    }

    if (currentFilters.value.skinType) {
query.skinType = currentFilters.value.skinType;
}

    if (currentFilters.value.gender) {
query.gender = currentFilters.value.gender;
}

    if (currentFilters.value.maxPrice && currentFilters.value.maxPrice < (props.filters?.maxPrice || 2000)) {
        query.maxPrice = currentFilters.value.maxPrice;
    }
    
    const urlParams = new URLSearchParams(window.location.search);

    if (urlParams.has('sort')) {
        query.sort = urlParams.get('sort');
    }

    router.get(window.location.pathname, query, {
        preserveState: true,
        preserveScroll: true,
        replace: true,
    });
};

watch(
    () => [currentFilters.value.category, currentFilters.value.brand, currentFilters.value.skinType, currentFilters.value.gender, currentFilters.value.maxPrice],
    () => {
        applyFilters();
    }
);

const onPriceChange = (event: Event) => {
    const val = parseInt((event.target as HTMLInputElement).value);
    currentFilters.value.maxPrice = val;
};

const clearFilters = () => {
    currentFilters.value.category = '';
    currentFilters.value.brand = '';
    currentFilters.value.skinType = '';
    currentFilters.value.gender = '';
    currentFilters.value.maxPrice = props.filters?.maxPrice || 2000;
    localPrice.value = currentFilters.value.maxPrice;
    // applyFilters is automatically called by watch
};
</script>

<template>
    <!-- Overlay for mobile -->
    <div 
        v-if="isOpen"
        class="fixed inset-0 bg-black/50 z-50 md:hidden transition-opacity"
        @click="emit('close')"
    ></div>

    <!-- Filter Container -->
    <aside 
        class="fixed md:static inset-x-0 bottom-0 md:inset-y-0 md:right-0 z-50 md:z-auto w-full md:w-64 shrink-0 bg-[#F7F5F8] md:bg-transparent p-6 md:p-0 overflow-y-auto transform transition-transform duration-300 md:transform-none border-t md:border-l md:border-none border-[#DAB6C4]/30 md:h-full max-h-[85vh] md:max-h-none rounded-t-3xl md:rounded-none"
        :class="isOpen ? 'translate-y-0' : 'translate-y-full md:translate-y-0 md:translate-x-0'"
    >
        <!-- Mobile Header & Drag Handle -->
        <div class="md:hidden flex flex-col items-center mb-6">
            <div class="w-12 h-1.5 bg-[#DAB6C4]/50 rounded-full mb-4"></div>
            <div class="flex items-center justify-between w-full">
                <h2 class="text-xl font-serif font-semibold text-[#8C6A5D]">Filtros</h2>
                <button @click="emit('close')" class="text-[#2C2C2C]/70 hover:text-[#8C6A5D] transition-colors p-2">
                    <FontAwesomeIcon :icon="faTimes" class="text-lg" />
                </button>
            </div>
        </div>

        <div class="space-y-8" v-if="filters">
            <!-- Category Filter -->
            <div v-if="filters.categories && filters.categories.length > 0">
                <h3 class="text-sm font-semibold text-[#8C6A5D] uppercase tracking-wider mb-3">Categoría</h3>
                <div class="space-y-2">
                    <label v-for="category in filters.categories" :key="category" class="flex items-center gap-2 cursor-pointer group">
                        <input 
                            type="radio" 
                            name="category" 
                            :value="category" 
                            v-model="currentFilters.category"
                            class="text-[#A388A9] focus:ring-[#A388A9] border-[#DAB6C4] bg-transparent cursor-pointer"
                        >
                        <span class="text-sm text-[#2C2C2C] group-hover:text-[#A388A9] transition-colors">{{ category }}</span>
                    </label>
                </div>
            </div>

            <!-- Brand Filter -->
            <div v-if="filters.brands && filters.brands.length > 0">
                <h3 class="text-sm font-semibold text-[#8C6A5D] uppercase tracking-wider mb-3">Marca</h3>
                <div class="space-y-2">
                    <label v-for="brand in filters.brands" :key="brand" class="flex items-center gap-2 cursor-pointer group">
                        <input 
                            type="radio" 
                            name="brand" 
                            :value="brand" 
                            v-model="currentFilters.brand"
                            class="text-[#A388A9] focus:ring-[#A388A9] border-[#DAB6C4] bg-transparent cursor-pointer"
                        >
                        <span class="text-sm text-[#2C2C2C] group-hover:text-[#A388A9] transition-colors">{{ brand }}</span>
                    </label>
                </div>
            </div>

            <!-- Skin Type Filter -->
            <div v-if="filters.skinTypes && filters.skinTypes.length > 0">
                <h3 class="text-sm font-semibold text-[#8C6A5D] uppercase tracking-wider mb-3">Tipo de Piel</h3>
                <div class="space-y-2">
                    <label v-for="type in filters.skinTypes" :key="type" class="flex items-center gap-2 cursor-pointer group">
                        <input 
                            type="radio" 
                            name="skinType" 
                            :value="type" 
                            v-model="currentFilters.skinType"
                            class="text-[#A388A9] focus:ring-[#A388A9] border-[#DAB6C4] bg-transparent cursor-pointer"
                        >
                        <span class="text-sm text-[#2C2C2C] group-hover:text-[#A388A9] transition-colors">{{ type }}</span>
                    </label>
                </div>
            </div>

            <!-- Gender Filter -->
            <div v-if="filters.genders && filters.genders.length > 0">
                <h3 class="text-sm font-semibold text-[#8C6A5D] uppercase tracking-wider mb-3">Para</h3>
                <div class="space-y-2">
                    <label v-for="gender in filters.genders" :key="gender" class="flex items-center gap-2 cursor-pointer group">
                        <input 
                            type="radio" 
                            name="gender" 
                            :value="gender" 
                            v-model="currentFilters.gender"
                            class="text-[#A388A9] focus:ring-[#A388A9] border-[#DAB6C4] bg-transparent cursor-pointer"
                        >
                        <span class="text-sm text-[#2C2C2C] group-hover:text-[#A388A9] transition-colors">{{ gender }}</span>
                    </label>
                </div>
            </div>

            <!-- Price Filter -->
            <div v-if="filters.maxPrice">
                <h3 class="text-sm font-semibold text-[#8C6A5D] uppercase tracking-wider mb-3">Precio Máximo</h3>
                <div class="space-y-4">
                    <input 
                        type="range" 
                        min="0" 
                        :max="filters.maxPrice" 
                        step="50"
                        v-model="localPrice"
                        @change="onPriceChange"
                        class="w-full accent-[#A388A9]"
                    >
                    <div class="flex justify-between text-sm text-[#2C2C2C]/80">
                        <span>C$ 0</span>
                        <span class="font-medium text-[#A388A9]">C$ {{ localPrice }}</span>
                    </div>
                </div>
            </div>

            <!-- Actions -->
            <div class="pt-4 border-t border-[#DAB6C4]/30 flex flex-col gap-3">
                <button 
                    @click="emit('close')"
                    class="w-full md:hidden bg-[#A388A9] text-white py-3 rounded-xl font-medium shadow-xs hover:bg-[#8C6A5D] transition-colors min-h-[44px] cursor-pointer"
                    type="button"
                >
                    Ver Productos
                </button>
                <button 
                    @click="clearFilters"
                    class="w-full flex items-center justify-center gap-2 py-2.5 px-4 rounded-xl border border-[#DAB6C4] text-[#8C6A5D] bg-white/60 hover:bg-[#DAB6C4]/20 hover:border-[#8C6A5D] font-medium text-xs sm:text-sm transition-all shadow-2xs cursor-pointer min-h-[40px] active:scale-98"
                    type="button"
                >
                    <FontAwesomeIcon :icon="faRotateLeft" class="text-xs text-[#A388A9]" />
                    <span>Limpiar Filtros</span>
                </button>
            </div>
        </div>
    </aside>
</template>
