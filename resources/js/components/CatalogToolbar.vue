<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';
import { faChevronRight, faFilter, faSort } from '@fortawesome/free-solid-svg-icons';

defineProps<{
    breadcrumbs: { label: string, url?: string }[];
    totalProducts: number;
}>();

const emit = defineEmits<{
    (e: 'toggleFilters'): void;
    (e: 'sortChange', value: string): void;
}>();
</script>

<template>
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 py-4 mb-6 border-b border-[#DAB6C4]/30">
        <!-- Breadcrumbs -->
        <nav class="flex items-center text-sm text-[#2C2C2C]/70">
            <template v-for="(crumb, index) in breadcrumbs" :key="index">
                <Link 
                    v-if="crumb.url" 
                    :href="crumb.url"
                    class="hover:text-[#A388A9] transition-colors"
                >
                    {{ crumb.label }}
                </Link>
                <span v-else class="text-[#8C6A5D] font-medium">{{ crumb.label }}</span>
                
                <FontAwesomeIcon 
                    v-if="index < breadcrumbs.length - 1" 
                    :icon="faChevronRight" 
                    class="mx-2 text-xs opacity-50" 
                />
            </template>
        </nav>

        <!-- Actions (Mobile Filter + Sorting) -->
        <div class="flex items-center justify-between md:justify-end gap-4 w-full md:w-auto">
            <span class="text-sm text-[#2C2C2C]/70 md:hidden">{{ totalProducts }} productos</span>
            
            <div class="flex items-center gap-3">
                <!-- Mobile Filter Toggle -->
                <button 
                    @click="emit('toggleFilters')"
                    class="md:hidden flex items-center gap-2 px-3 py-1.5 border border-[#DAB6C4] text-[#8C6A5D] rounded hover:bg-[#F7F5F8] transition-colors"
                >
                    <FontAwesomeIcon :icon="faFilter" class="text-xs" />
                    <span class="text-sm font-medium">Filtros</span>
                </button>

                <!-- Sort Dropdown -->
                <div class="relative flex items-center gap-2">
                    <FontAwesomeIcon :icon="faSort" class="text-[#A388A9] text-xs absolute left-3 pointer-events-none" />
                    <select 
                        @change="emit('sortChange', ($event.target as HTMLSelectElement).value)"
                        class="appearance-none pl-8 pr-8 py-1.5 border border-[#DAB6C4] rounded text-sm text-[#8C6A5D] bg-transparent focus:ring-2 focus:ring-[#A388A9] focus:border-[#A388A9] outline-none"
                    >
                        <option value="relevance">Relevancia</option>
                        <option value="price_asc">Precio: Menor a Mayor</option>
                        <option value="price_desc">Precio: Mayor a Menor</option>
                        <option value="newest">Más recientes</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
</template>
