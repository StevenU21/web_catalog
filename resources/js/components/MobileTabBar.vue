<script setup lang="ts">
import { usePage, Link } from '@inertiajs/vue3';
import { index as skincareIndex } from '@/routes/skincare';
import { index as makeupIndex } from '@/routes/makeup';
import { index as perfumesIndex } from '@/routes/perfumes';
import { home } from '@/routes';
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';
import { 
    faHouse, 
    faSpa,
    faBrush,
    faSprayCanSparkles
} from '@fortawesome/free-solid-svg-icons';

const page = usePage();

// Simple route matching logic for active state
const isActive = (path: string) => {
    return page.url === path || (path !== '/' && page.url.startsWith(path));
};
</script>

<template>
    <!-- Tab Bar -->
    <div class="md:hidden fixed bottom-0 left-0 right-0 bg-white/95 backdrop-blur-md border-t border-[#DAB6C4]/30 z-[45] pb-safe shadow-[0_-4px_20px_rgba(0,0,0,0.05)]">
        <div class="flex justify-around items-center px-2 py-2">
            
            <!-- Home -->
            <Link :href="home.url()" class="flex flex-col items-center justify-center w-16 min-h-[44px] transition-colors" :class="isActive(home.url()) ? 'text-[#8C6A5D]' : 'text-[#2C2C2C]/50 hover:text-[#A388A9]'">
                <FontAwesomeIcon :icon="faHouse" class="text-xl mb-1" />
                <span class="text-[10px] font-medium">Inicio</span>
            </Link>

            <!-- Skincare -->
            <Link :href="skincareIndex.url()" class="flex flex-col items-center justify-center w-16 min-h-[44px] transition-colors" :class="isActive(skincareIndex.url()) ? 'text-[#8C6A5D]' : 'text-[#2C2C2C]/50 hover:text-[#A388A9]'">
                <FontAwesomeIcon :icon="faSpa" class="text-xl mb-1" />
                <span class="text-[10px] font-medium">Skincare</span>
            </Link>

            <!-- Maquillaje -->
            <Link :href="makeupIndex.url()" class="flex flex-col items-center justify-center w-16 min-h-[44px] transition-colors" :class="isActive(makeupIndex.url()) ? 'text-[#8C6A5D]' : 'text-[#2C2C2C]/50 hover:text-[#A388A9]'">
                <FontAwesomeIcon :icon="faBrush" class="text-xl mb-1" />
                <span class="text-[10px] font-medium">Maquillaje</span>
            </Link>

            <!-- Perfumería -->
            <Link :href="perfumesIndex.url()" class="flex flex-col items-center justify-center w-16 min-h-[44px] transition-colors" :class="isActive(perfumesIndex.url()) ? 'text-[#8C6A5D]' : 'text-[#2C2C2C]/50 hover:text-[#A388A9]'">
                <FontAwesomeIcon :icon="faSprayCanSparkles" class="text-xl mb-1" />
                <span class="text-[10px] font-medium">Perfumería</span>
            </Link>

        </div>
    </div>


</template>
