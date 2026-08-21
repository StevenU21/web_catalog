<script setup lang="ts">
import { faFilter, faSort } from '@fortawesome/free-solid-svg-icons';
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';

defineProps<{
    totalProducts: number;
    activeSort?: string;
}>();

const emit = defineEmits<{
    (e: 'toggleFilters'): void;
    (e: 'sortChange', value: string): void;
}>();
</script>

<template>
    <div class="flex items-center justify-between py-3 mb-6 border-b border-[#DAB6C4]/30">
        <!-- Product Count Indicator (Desktop only) -->
        <span class="hidden md:inline-block text-sm text-[#2C2C2C]/70 font-medium">
            {{ totalProducts }} productos disponibles
        </span>

        <!-- Actions (Mobile Filter + Sorting) -->
        <div class="flex items-center justify-between md:justify-end gap-3 w-full md:w-auto">
            <!-- Mobile Filter Toggle -->
            <button 
                @click="emit('toggleFilters')"
                class="md:hidden flex items-center justify-center gap-1.5 px-4 py-2 border border-[#DAB6C4] text-[#8C6A5D] rounded-lg hover:bg-[#F7F5F8] transition-colors flex-1"
                type="button"
            >
                <FontAwesomeIcon :icon="faFilter" class="text-xs text-[#A388A9]" />
                <span class="text-xs font-semibold">Filtros</span>
            </button>

            <!-- Sort Dropdown -->
            <div class="relative flex items-center flex-1 md:flex-initial">
                <FontAwesomeIcon :icon="faSort" class="text-[#A388A9] text-xs absolute left-3 pointer-events-none" />
                <select 
                    :value="activeSort || 'relevance'"
                    @change="emit('sortChange', ($event.target as HTMLSelectElement).value)"
                    class="appearance-none w-full md:w-auto pl-8 pr-8 py-2 border border-[#DAB6C4] rounded-lg text-xs sm:text-sm text-[#8C6A5D] bg-transparent focus:ring-2 focus:ring-[#A388A9] focus:border-[#A388A9] outline-none cursor-pointer font-medium"
                >
                    <option value="relevance">Relevancia</option>
                    <option value="price_asc">Precio: Menor a Mayor</option>
                    <option value="price_desc">Precio: Mayor a Menor</option>
                    <option value="newest">Más recientes</option>
                </select>
            </div>
        </div>
    </div>
</template>
